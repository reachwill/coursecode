<?php

$inVal = $_POST['inVal'];
$endVal = $_POST['endVal'];
$vidID = $_POST['vidID'];
$title = $_POST['title'];
$duration = $_POST['duration'];
$userID = $_POST['userID'];
$categoryID = $_POST['categoryID'];
$description = $_POST['description'];

// Make a MySQL Connection
mysql_connect("localhost", "reachwil_clipper", "R%Sy6#Axb^PX") or die(mysql_error());
mysql_select_db("reachwil_clipper") or die(mysql_error());
mysql_query("INSERT INTO clips (vidID,inPoint,outPoint,title,duration,userID,categoryID,description) VALUES('$vidID',$inVal,$endVal,'$title',$duration,$userID,$categoryID,'$description')")
	or die(mysql_error());
	
//$data = '';


$return['msg'] = 'Clip saved';


echo json_encode($return);
?>