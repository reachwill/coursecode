<?php

require_once('../config.php');



$type = $_POST['typeStr'];

$con = new mysqli($dbIp, $user, $pwd,$db);


if ( !$stmt = $con->prepare("INSERT INTO types (type) VALUES(?)") ) 
 echo "Prepare Error: ($con->errno) $con->error";
if ( !$stmt->bind_param("s", $type) )
  echo "Binding Parameter Error: ($con->errno) $con->error";
if ( !$stmt->execute() ) 
 echo "Execute Error: ($stmt->errno)  $stmt->error";
	
//get all domains and send back to dashboard
if ( !$stmt = $con->prepare("SELECT * FROM types ORDER BY type ASC") ) 
 echo "Prepare Error: ($con->errno) $con->error";
if ( !$stmt->execute() ) 
 echo "Execute Error: ($stmt->errno)  $stmt->error";
 
 $result = $stmt->get_result();

$numRows = $result->num_rows;
 
//$sth = mysql_query("SELECT ...");
$rows = array();
while($r = $result->fetch_assoc()) {
    $rows[] = $r;
}


echo json_encode($rows);


?>