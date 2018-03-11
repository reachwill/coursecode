<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert Employee</title>
</head>

<body>
<?php
(isset($_POST['firstName']))? $fname = $_POST['firstName'] : $fname = '';

?>

<form action="" method="post">
	<ul>
    	<li>
        	<label>First Name:<input type="text" name="firstName"
            
            		value="<?php echo $fname;  ?>">
            
 		<small class="required">
 		<?php 
				echo ($fname=='') ? '*' : ''; 
			 ?>
        </small>
            </label>
        </li>
        <li>
        	<label>Last Name:<input type="text" name="lastName"></label>
        </li>
        <li>
        	<label>Age:<input type="number" min="0" max="10" name="age"></label>
        </li>
        <li>
        	<label>Email:<input type="email" name="email"></label>
        </li>
        <li>
        	<button type="submit" name="submit">Submit</button>
        </li>
    </ul>
</form>

<?php
//check if form has been posted
if(isset($_POST['firstName'])){
	$firstName = $_POST['firstName'];	
	$lastName = $_POST['lastName'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	
	//validate the email address
	if(!filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
		echo 'Email not valid';
		exit();	
	}
	
	$pdoConn = new PDO('mysql:host=localhost;dbname=fife;charset=utf8','will-fife','password');
	$pdoConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	try{
	$sql = $pdoConn->prepare('INSERT INTO employees (first_name,last_name,age,email) VALUES (:firstname,:lastname,:age,:email)');
	$sql->execute(array(':firstname'=>$firstName,':lastname'=>$lastName,':age'=>$age,':email'=>$email));
	}
	
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
	//now get the data and display
	
	try{
		$stmt = $pdoConn->prepare('SELECT * FROM employees');
		$stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	
	echo '<ul>';
	
	while($items = $stmt->fetch()){
		echo '<li>'. $items['first_name'] . ' ' . $items['last_name'] . '</li>';
		
	}
	
	echo '</ul>';
	
	
}




?>












</body>
</html>