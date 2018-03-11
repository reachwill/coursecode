<?php
$cars[0]="Saab";
$cars[1]="Volvo";
$cars[2]="BMW";
$cars[3]="Toyota";

$cars=array("Saab","Volvo","BMW","Toyota");
$num = count($cars);
echo 'dddd '.$num;


?>

<?php
$cars[0]="Saab";
$cars[1]="Volvo";
$cars[2]="BMW";
$cars[3]="Toyota"; 
echo $cars[0] . " and " . $cars[1] . " are Swedish cars.";
?>

<?php
$ages = array("Peter"=>32, "Quagmire"=>30, "Joe"=>34);

$ages['Peter'] = "32";
$ages['Quagmire'] = "30";
$ages['Joe'] = "34";


?>

<?php
$ages['Peter'] = "32";
$ages['Quagmire'] = "30";
$ages['Joe'] = "34";

echo "Peter is " . $ages['Peter'] . " years old.";
?>

<?php
$families = array
  (
  "Griffin"=>array
  (
  "Peter",
  "Lois",
  "Megan"
  ),
  "Quagmire"=>array
  (
  "Glenn"
  ),
  "Brown"=>array
  (
  "Cleveland",
  "Loretta",
  "Junior"
  )
  );
  
  echo "Is " . $families['Griffin'][2] . 
" a part of the Griffin family?";
?>