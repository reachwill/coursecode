<?php

/*$productName = $_POST['productName'];
$productDescription = $_POST['productDescription'];
$MSRP = $_POST['MSRP'];*/
$productName = "yu'k";
$productDescription = 'really yukky';
$MSRP = '35.00';

$mysqli = new mysqli("localhost", "will", "nelsonroy","classicmodels");

$productName = $mysqli->real_escape_string($productName);

/* check connection */
if (mysqli_connect_errno()) {
    echo("Connect failed: ". mysqli_connect_error());
    exit();
}


$sql="INSERT INTO products (productName,productDescription,MSRP) 
			VALUES ('$productName','$productDescription','$MSRP')";
			



if(!$result = $mysqli->query($sql)){
    die('There was an error running the query [' . $mysqli->error . ']');
}


$return['message'] = 'Product Inserted';


echo json_encode($return);


$mysqli->close();



?>