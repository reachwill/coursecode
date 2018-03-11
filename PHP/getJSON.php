<?php



// Make a MySQL Connection
mysql_connect("localhost", "reachwil_clipper", "R%Sy6#Axb^PX") or die(mysql_error());
mysql_select_db("reachwil_clipper") or die(mysql_error());

	

$allClips=array();
// sql query deleted..
$result = mysql_query("SELECT * FROM userCats WHERE userID = $_POST[userID]")
	or die(mysql_error());
 
//$sth = mysql_query("SELECT ...");
$rows = array();
while($r = mysql_fetch_assoc($result)) {
    $rows[] = $r;
}


echo json_encode($rows);
mysql_close($con);
?>