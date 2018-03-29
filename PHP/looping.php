<?php
    
    //set the page title here!!!!!!
    $title = 'Intro to PHP Login';

    //include the header
    include 'header.php';
?>


<!-- Content goes here -->
<ul>

<?php
//create a very simple array
$cars = array('Ford','VW','BMW');
//var_dump($cars);
$numcars = count($cars);

for($i = 0 ; $i < $numcars ; $i++){
    echo '<li>' . $cars[$i] . '</li>';
}

?>

</ul>


<ul>
    
    <?php
    
    $ages = array('Peter'=>32,'Jane'=>30,'Mary'=>23);
    foreach($ages as $value){
        echo '<li>' . $value . '</li>';
    }
    
    ?>
    
    
</ul>







<?php
    //include the footer
    include 'footer.php';
?>