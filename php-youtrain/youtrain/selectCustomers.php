<?php
$title = 'Home Page';
$username = 'Will';
?>

<?php
include 'header.php';
?>

<?php
$conn = new MySQLi('localhost','youtrain_admin','password','classicmodels');//(host,username,password,databaseName)
	
if(mysqli_connect_errno()){
	echo 'Connection to database failed. ' . mysqli_connect_error();
	exit();	
}

$sql = 'SELECT * FROM customers ORDER BY customerName ASC';

if(!$result = $conn->query($sql)){
	echo $conn->error();	
}

echo '<table border="1"><tr><th>Name</th><th>City</th></tr>';
while($row = $result->fetch_array()){
	echo '<tr>';
	echo '<td><a href="showOrders.php?customerNumber='.$row['customerNumber'].'">' . $row['customerName'] . '</a></td>';
	echo '<td>' . $row['city'] . '</td>';
	echo '</tr>';
}
echo '</table>';
	
	

?>



<?php
include 'footer.php';
?>





