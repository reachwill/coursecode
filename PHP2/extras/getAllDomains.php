<?php


require_once('../config.php');
$con = new mysqli($dbIp, $user, $pwd,$db);


if ( !$stmt = $con->prepare("SELECT * FROM registered_domains ORDER BY domain ASC") ) 
 echo "Prepare Error: ($con->errno) $con->error";

if ( !$stmt->execute() ) 
 echo "Execute Error: ($stmt->errno)  $stmt->error";
 
 $result = $stmt->get_result();

$numRows = $result->num_rows;
	
//get all domains and send back to dashboard

 
$rows = array();
while($r = $result->fetch_assoc()) {
    $rows[] = $r;
}



echo json_encode($rows);


?>