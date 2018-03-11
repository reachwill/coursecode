<?php

require_once('../config.php');
$name = $_POST['name'];
$locale = $_POST['locale'];
$folder = $_POST['folder'];
$type = $_POST['type'];
$tab = $_POST['tab'];



/*mysql_connect($dbIp, $user, $pwd) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());*/
$con = new mysqli($dbIp, $user, $pwd,$db);


/*mysql_query("INSERT INTO packages (name,locale,folder,type,tab) VALUES('$name','$locale','$folder','$type','$tab')")
	or die(mysql_error());*/
if ( !$stmt = $con->prepare("INSERT INTO packages (name,locale,folder,type,tab) VALUES(?,?,?,?,?)") ) 
 echo "Prepare Error: ($con->errno) $con->error";
if ( !$stmt->bind_param("sssss", $name,$locale,$folder,$type,$tab) )
  echo "Binding Parameter Error: ($con->errno) $con->error";
if ( !$stmt->execute() ) 
 echo "Execute Error: ($stmt->errno)  $stmt->error";


	
if ( !$stmt = $con->prepare("SELECT * FROM packages ORDER BY id DESC LIMIT 1;") ) 
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