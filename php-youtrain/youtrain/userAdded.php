<?php
$title = 'User Added to Database';
$username = 'Will';
?>

<?php
include 'header.php';
?>

<?php
$conn = new MySQLi('localhost','youtrain_admin','password','youtrain');//(host,username,password,databaseName)

if(mysqli_connect_errno()){
	echo 'Connection to database failed. ' . mysqli_connect_error();
	exit();	
}else{
	echo 'connected';	
}

//store values passed from insertUser.php in variables
$first_name = $_GET['firstname'];
$last_name = $_GET['lastname'];
$email = $_GET['email'];
$tel = $_GET['tel'];

$sql = "INSERT INTO users (first_name,last_name,email,tel_no) VALUES('$first_name','$last_name','$email','$tel')";

if(!$result = $conn->query($sql)){
	echo $conn->error;	
}else{
	echo 'user added';	
}

?>


<?php
include 'footer.php';
?>





