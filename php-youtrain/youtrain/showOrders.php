<?php
if(!isset($_GET['customerNumber'])){
	header( 'Location: selectCustomers.php' ) ;
}

?>



<?php
$title = 'Show Orders';
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

$sql = 'SELECT * FROM orders WHERE customerNumber = ' . $_GET["customerNumber"];

if(!$result = $conn->query($sql)){
	echo $conn->error();	
}

echo '<table border="1"><tr><th>Order Number</th><th>Order Date</th></tr>';
while($row = $result->fetch_array()){
	echo '<tr>';
	echo '<td>' . $row['orderNumber'] . '</td>';
	echo '<td>' . $row['orderDate'] . '</td>';
	echo '</tr>';
}
echo '</table>';

?>



<?php
include 'footer.php';
?>





