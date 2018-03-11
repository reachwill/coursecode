<?php
$title = 'Insert User to Database';
$username = 'Will';
?>

<?php

if(isset($_GET['firstname'])){//check if user has submitted the form

	$conn = new MySQLi('localhost','youtrain_admin','password','youtrain');//(host,username,password,databaseName)
	
	if(mysqli_connect_errno()){
		echo 'Connection to database failed. ' . mysqli_connect_error();
		exit();	
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
	
	$conn->close();
}
?>




<?php
include 'header.php';
?>

<form method="get">
	<ul>
    	<li>
        	<label for="firstname">First Name:
            <input type="text" name="firstname">
            </label>
        </li>
        <li>
        	<label for="lastname">Last Name:
            <input type="text" name="lastname">
            </label>
        </li>
        <li>
        	<label for="email">Email:
            <input type="text" name="email">
            </label>
        </li>
        <li>
        	<label for="tel">Tel:
            <input type="text" name="tel">
            </label>
        </li>
        <li>
        	<button type="submit">Insert User</button>
        </li>
    </ul>
</form>







<?php
include 'footer.php';
?>





