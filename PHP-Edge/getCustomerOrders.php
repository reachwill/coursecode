<?php

require_once('config.php');
$sql = 'select * from orders';
//$sql = 'Select productName,productCode from products';

if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}



$rows = array();
while($r = $result->fetch_assoc()){
    array_push($rows,$r);
}

echo json_encode($rows);


?>