<!doctype html>
<html lang="en-uk">
<head>
	<title>Intro to PHP</title>
    

    
    
    
    
</head>

<body>
<?php
include 'header.php';

echo 'Hello '.$_POST['username'];

?>

<form action="" method="post">
	<div>
	<label for="username">Username: </label><input type="text" 
    	placeholder="Type your name here" 
    	name="username">
    </div>
    
    <div>
	<label for="age">Age: </label><input type="text" 
    	placeholder="Type your age here" 
    	name="age">
        
        <?php
		
		if(isset($_POST['age'])){
			if(!filter_var($_POST['age'],FILTER_VALIDATE_INT)){
				echo '<span class="error">Age not valid</span>';
			}
		}
		
		?>
        
        
    </div>
    
    
    
	<div>
    <label for="email">Email: </label><input type="text" 
    	placeholder="Type your email here" 
    	name="email">
        
        <?php
		
		if(isset($_POST['email'])){
			
			if(!filter_has_var(INPUT_POST,'email')){
				echo 'email not entered';
			}else{
				if(filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
					echo 'Email is valid';
				}else{
					echo '<span class="error">Email is not valid</span>';
				}
			}
		
		}
		
		
		?>
        
        
        
    </div>
    <div>
    <input type="submit" name="submit" value="Send">
    
    </div>
</form>



</body>


</html>
