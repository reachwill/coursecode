<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Test DB Connection</title>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;	
}

table{
	border-collapse:collapse;	
}

tr:nth-child(even){
	background:#ccc;	
}

td{
	padding:8px;	
}


</style>
</head>

<body>
<?php
$dbconn = new mysqli('localhost','will-fife','password','classicmodels');
if(mysqli_connect_errno()){
	echo 'DB connection failed. '.mysqli_connect_error();
	exit();	
}

$sql = 'SELECT * FROM Products ORDER BY productName ASC';

$result = $dbconn->query($sql);

echo '<table border="1">';
while($row = $result->fetch_array()){
	echo '<tr>';
	echo '<td>' . $row['productName'] . '</td>';
	echo '<td>' . $row['buyPrice'] . '</td>';
	echo '</tr>';
}
echo '</table>';

$result->free();
$dbconn->close();

?>


</body>
</html>