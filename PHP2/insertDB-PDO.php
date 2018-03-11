<html>
<body>
<style>
.errorText{
	color:red;	
}

ul{
	padding:0;
	margin:0;
	list-style:none;
	text-align:right;	
}

input[type=submit]{
	border:1px solid #ccc;
	background:white;
	padding:5px;
	margin:10px 10px 0 0 ;	
}

form{
	border:1px solid #ccc;
	padding:10px;
	width:300px;
}

.persons{
	width:400px;
	text-align:left;	
}

</style>

<form action="" method="post">
<ul>
<li><label>Firstname: <input type="text" name="firstname" value="<?php echo $_POST['firstname']; ?>"><small class="errorText"><?php echo ($_POST["firstname"] == "") ? "*" : ""; ?></small></label></li>
<li><label>Lastname: <input type="text" name="lastname" value="<?php echo $_POST['lastname']; ?>"><small class="errorText"><?php echo ($_POST["lastname"] == "") ? "*" : ""; ?></small></label></li>
<li><label>Age: <input type="text" name="age" value="<?php echo $_POST['age']; ?>"></label><small class="errorText"><?php echo ($_POST["age"] == "") ? "*" : ""; ?></small></li>
<li><label>Email: <input type="text" name="email"></label><small class="errorText"><?php echo ($_POST["email"] == "") ? "*" : ""; ?></small></li>
<input type="submit" />
</ul>
</form>



<?php

if (isset($_POST['firstname'])) {
	$firstname = ($_POST[firstname]);
	$lastname = ($_POST[lastname]);
	$age = ($_POST[age]);
	$email = ($_POST[email]);
	
	
	
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
	
	
	
	// PDO
	$pdo = new PDO("mysql:host=localhost;dbname=my_db;charset=utf8", 'will', 'nelsonroy');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	try {
		//connect as appropriate as above
		//$db->query('hi'); //invalid query!
		$stmt = $pdo->prepare("INSERT INTO Persons(FirstName, LastName, Age, email) VALUES(?, ?, ?, ?)");
		$stmt->execute(array($firstname, $lastname,  $age, $email));
	} catch(PDOException $ex) {
		echo "An Error occured!"; //user friendly message
		echo ($ex->getMessage());
	}
	
	$return['message'] = 'Person Inserted';
	
	
	echo json_encode($return);
	
	try {
		//connect as appropriate as above
		//$db->query('hi'); //invalid query!
		$stmt = $pdo->prepare("SELECT * FROM Persons");
		$stmt->execute();
	} catch(PDOException $ex) {
		echo "An Error occured!"; //user friendly message
		echo ($ex->getMessage());
	}
	
	echo '<ul class="persons">';
	// while there are rows to be fetched...
	while ($list = $stmt->fetch()) {
	   // echo data
	   echo '<li>'.$list['FirstName'] . " " . $list['LastName'] . "</li>";
	} // end while
	
	echo '</ul>';
}




?>

</body>
</html>