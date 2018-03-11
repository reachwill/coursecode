<?php
require_once('config.php');

$sql = 'SELECT DISTINCT a.customerNumber,a.customerName FROM customers a JOIN orders b ON a.customerNumber = b.customerNumber  ORDER BY a.customerName';

if(!$result = $conn->query($sql)){
    die('Error: '.$conn->error);
}

$rows=array();//create an array to store data to be sent to the client
//loop thru each item in $result and add to $rows
while($r = $result->fetch_assoc()){
    //convert special chars to safe HTML equivilent
    $r['customerName'] = htmlspecialchars($r['customerName']);
    array_push($rows,$r);
}


//pass data back to client
echo json_encode($rows);
    
?>