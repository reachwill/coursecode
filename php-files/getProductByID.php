<?php
$conn = new mysqli('localhost','will-fife','password','classicmodels');
if(mysqli_connect_errno()){
	echo mysqli_connect_error();
	exit();
}

$sql = "SELECT * FROM Products WHERE productCode = '".$_GET['productCode']."'";
if(!$result = $conn->query($sql)){
	echo $conn->error;
	exit();
}

$rows = array();
while($row = $result->fetch_assoc()){
	$rows[] = $row;
}

echo json_encode($rows);

$conn->close();





?>






