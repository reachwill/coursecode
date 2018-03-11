<html>
<body>
<style>
.errorText{
	color:red;	
}

</style>

<form action="" method="post">
<ul>
<li><label>Firstname: <input type="text" name="firstname" value="<?php echo $_POST['firstname']; ?>"><small class="errorText"><?php echo ($_POST["firstname"] == "") ? "*" : ""; ?></small></label></li>
<li><label>Lastname: <input type="text" name="lastname" value="<?php echo $_POST['lastname']; ?>"></label></li>
<li><label>Age: <input type="text" name="age" value="<?php echo $_POST['age']; ?>"></label></li>
<li><label>Email: <input type="text" name="email" value="<?php echo $_POST['email']; ?>"></label></li>
<input type="submit" />
</ul>
</form>

</body>
</html>

<?php
if (isset($_POST['firstname'])) {
	
	
	
	//var_dump($_POST);
	foreach($_POST as $item){
		//echo $item.'<br>';
	}
	
	 
	
	$mysqli = new mysqli("localhost", "will", "nelsonroy","my_db");
	
	$productName = $mysqli->real_escape_string($productName);
	
	/* check connection */
	if (mysqli_connect_errno()) {
		echo("Connect failed: ". mysqli_connect_error());
		exit();
	}
	
	$firstname = $mysqli->real_escape_string($_POST[firstname]);
	$lastname = $mysqli->real_escape_string($_POST[lastname]);
	$age = $mysqli->real_escape_string($_POST[age]);
	$email = $mysqli->real_escape_string($_POST[email]);
	
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
		echo 'ok';
	}
	
	if(!filter_has_var(INPUT_POST, "email"))
	{
		echo("Input type does not exist");
		exit();
	}
	else
	{
		if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL))
		{
			echo "E-Mail is not valid";
			exit();
		}
		else
		{
			echo "E-Mail is valid";
		}
	}
	
	$sql="INSERT INTO Persons (FirstName, LastName, Age, email)
								VALUES
								('$firstname','$lastname','$age','$email')";
												
	
	
	exit();
	if(!$result = $mysqli->query($sql)){
		die('There was an error running the query [' . $mysqli->error . ']');
	}
	
	
	$return['message'] = 'Person Inserted';
	
	
	echo json_encode($return);
	
	
	$mysqli->close();
}




?>