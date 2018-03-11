<?php

class counter {
     var $step;
     var $count; 

     function getcount() {
          return $this->count;
     }
 
     function getstep() {
          return $this->step;
     }

     function changestep($newval) {
          if(is_integer($newval))
          $this->step = $newval;
     }

     function step() {
          $this->count += $this->step;
     }

     function reset() {
          $this->count = 0;
          $this->step = 1;
     }
}
?>

<?php

$ticker = new counter();

$ticker->reset();

            $ticker->changestep(1); 

            while($ticker->getcount() <= 10) {

echo "The value of the ticker is " .

                        $ticker->getcount()."<BR>";

$ticker->step();

}

?>