<?php

$mysqli = new mysqli("localhost", "will", "nelsonroy","classicmodels");

/* check connection */
if (mysqli_connect_errno()) {
    echo("Connect failed: ". mysqli_connect_error());
    exit();
}

$sql = 'Select * from products';

if(!$result = $mysqli->query($sql)){
    die('There was an error running the query [' . $mysqli->error . ']');
}

$rows = array();
while($r = $result->fetch_assoc()){
	$rows[] = $r;	
}

echo json_encode($rows);

$mysqli->close();



?>