<?php
require_once('config.php');

$sql = 'SELECT * FROM orders WHERE customerNumber = ' . $_POST['customerNumber'];

if(!$result = $conn->query($sql)){
    die('Error: '.$conn->error);
}

$rows=array();//create an array to store data to be sent to the client
//loop thru each item in $result and add to $rows
while($r = $result->fetch_assoc()){
    array_push($rows,$r);
}


//pass data back to client
echo json_encode($rows);
    
?>