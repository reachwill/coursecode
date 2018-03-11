<?php
if(!isset($_GET['userName'])){ header('Location:login.php'); }
$title = 'PHP Home Page';
include 'header.php';

?>

    <?php



$userName = $_GET['userName'];

echo 'Hello '.$userName;

$total = 100 + 22;
echo '<p>'.$total.'</p>';

/*store values in arrays*/
$cars = array('Subaru','Saab','Ford','Volvo');
//echo $cars[0];
//var_dump($cars);
array_push($cars,'Porsche');
echo '<ul>';
$numCars = count($cars);
for($i=0 ; $i<$numCars ; $i++){
    echo '<li>' . $cars[$i] . '</li>' ;
}
echo '</ul>';


//array of complex data
$families = array(
    array('Jane','John'),
    array('Peter','Paul')
);

echo $families[1][0];






    
?>


        <?php

include 'footer.php';

?>