<?php

class Counter{
    var $step;
    var $count;
    
    public function __construct(){
        echo 'object created';
        $this->reset();
    }
    
    function getcount(){
        return $this->count;
    }
    
    function getstep(){
        return $this->step;
    }
    
    function setstep($newval){
        if(is_integer($newval))
            $this->step = $newval;
    }
    
    function step(){
        $this->count += $this->step;
    }  
    
    private function reset(){
        $this->count = 0;
        $this->step = 1;
    }
        
}

$ticker = new Counter();

$ticker->setstep(1);

while($ticker->getcount() <= 100){
    echo 'Value is ' . $ticker->getcount() . '<br>';
    $ticker->step();
}


?>