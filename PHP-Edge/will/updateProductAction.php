<?php
require_once('config.php');
$sql = "UPDATE products SET quantityInStock = ".$_POST['quantityInStock'] . " WHERE productCode = '".$_POST['productCode']."'";
if(!$result = $conn->query($sql)){
    die('Error updating product: '.$conn->error);
}

header('Location: products.php');

?>