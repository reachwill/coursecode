<?php
$mysqli = new mysqli("localhost", "will", "nelsonroy");

/* check connection */
if (mysqli_connect_errno()) {
    echo("Connect failed: ". mysqli_connect_error());
    exit();
}

// Create database
if($mysqli->query("CREATE DATABASE my_db")){
	echo 'db created<br>';	
}else{
	echo 'db already created<br>';	
}

if($mysqli->select_db("my_db2")){
	echo 'db selected<br>';	
}else{
	echo ("Error: ".mysqli_error($mysqli));
    exit();	
}

// Create table
$sql = "CREATE TABLE Persons
(
personID int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(personID),
FirstName varchar(15),
LastName varchar(15),
Age int
)";

// Execute query
if($mysqli->query($sql)){
	echo 'table created<br>';	
}

$mysqli->close();
?>