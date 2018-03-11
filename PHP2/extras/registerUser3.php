<?php


if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['SERVER_NAME']){
	$rows = array();
	$rows[] = 'csrf';
	echo json_encode($rows);
	exit();
}



require_once('../config.php');

$password = $_POST['pwd'];

$encrypt_password=mc_encrypt($password, ENCRYPTION_KEY);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$domain = $_POST['domain'];
$email = $_POST['username'].'@'.$_POST['domain'];
$paramcheck = createRandomParam();



if(preg_match('/^[\p{L}-]*$/u', $firstname)){
	$data['passed']=true;
}else{
	$data['passed']=false;
	echo json_encode($data);
	exit();	
}

if(preg_match('/^[\p{L}-]*$/u', $lastname)){
	$data['passed']=true;
}else{
	$data['passed']=false;
	echo json_encode($data);
	exit();	
}

if(preg_match('/^[\p{L}-]*$/u', $username)){
	$data['passed']=true;
}else{
	$data['passed']=false;
	echo json_encode($data);
	exit();	
}

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
	$data['passed']=true;
}else{
	$data['passed']=false;
	echo json_encode($data);
	exit();
	
}

$data['email'] = $email;
$data['domain'] = $domain;
$data['domainexists'] = false;
$data['userexists'] = true;

/*$data['email'] = $email;
$data['domain'] = htmlspecialchars($domain, ENT_QUOTES, 'UTF-8');
$data['domainexists'] = false;
$data['userexists'] = true;*/





function createRandomParam() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 
    return $pass; 
} 




require_once('../config.php');


$con = new mysqli($dbIp, $user, $pwd,$db);




if ( !$stmt = $con->prepare("SELECT * from registered_domains WHERE domain=?") ) 
 echo "Prepare Error: ($con->errno) $con->error";
if ( !$stmt->bind_param("s", $domain) )
  echo "Binding Parameter Error: ($con->errno) $con->error";
if ( !$stmt->execute() ) 
 echo "Execute Error: ($stmt->errno)  $stmt->error";
 
 $result = $stmt->get_result();

$numRows = $result->num_rows;


$data['numrows'] = $numRows;
if($numRows > 0)
{
    $data['domainexists'] = true;
	$now = date("Y-m-d H:i:s");
	//user's domain is a registered domain so continue with registration
	//first check they are not already there
	
	
	if ( !$stmt = $con->prepare("SELECT * from registered_users WHERE user_email=?") ) 
	 echo "Prepare Error: ($con->errno) $con->error";
	if ( !$stmt->bind_param("s", $email) )
	  echo "Binding Parameter Error: ($con->errno) $con->error";
	if ( !$stmt->execute() ) 
	 echo "Execute Error: ($stmt->errno)  $stmt->error";
	 
	 $result = $stmt->get_result();
	
	$numRows = $result->num_rows;
	
	
	if($numRows < 1)
	{
		$data['userexists'] = false;
		//the user hasn't previously registered so continue with registration
		
		if ( !$stmt = $con->prepare("INSERT INTO registered_users (user_email,firstname,lastname,password,user_domain,registration_date,paramcheck) VALUES(?,?,?,?,?,?,?)") ) 
		 echo "Prepare Error: ($con->errno) $con->error";
		if ( !$stmt->bind_param("sssssss", $email,$firstname,$lastname,$encrypt_password,$domain,$now,$paramcheck) )
		  echo "Binding Parameter Error: ($con->errno) $con->error";
		if ( !$stmt->execute() ) 
		 echo "Execute Error: ($stmt->errno)  $stmt->error";
		
		
		
		
	}else{
		//================================display message to say user already registered	
	}
	
}else{
	//==============================display message to say domain is not recognised	
}

echo json_encode($data);


?>