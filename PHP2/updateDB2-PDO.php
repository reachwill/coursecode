<?php

$conn = new PDO("mysql:host=localhost;dbname=my_db","will","nelsonroy");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conn->beginTransaction();


// find out how many rows are in the table
$age = 32;
$firstName = 'd';
$lastName = 'g'; 
$sql = "UPDATE Persons SET Age=:age WHERE FirstName=:firstName AND LastName=:lastName";
$q = $conn->prepare($sql);
$q->execute(array(':age'=>$age,':firstName'=>$firstName,':lastName'=>$lastName));

$conn->commit();

echo 'done';
?>