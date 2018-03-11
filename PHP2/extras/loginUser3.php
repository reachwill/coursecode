<?php


if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['SERVER_NAME']){
	$rows = array();
	$rows[] = 'csrf';
	echo json_encode($rows);
	exit();
}


require_once('../config.php');

$password = $_POST['password'];

$email = $_POST['email'] ;

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
	$data['passed']=true;
}else{
	$data['passed']=false;
	echo json_encode($data);
	exit();	
}


if($_POST['p']!=''){
	$data['p']='not empty';
		if(!ctype_alnum($_POST['p'])){
		$data['passed']=false;
		echo json_encode($data);
		exit();	
	}
}



/*echo parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
echo $_SERVER['SERVER_NAME'];*/



$con = new mysqli($dbIp, $user, $pwd,$db);


if ( !$stmt = $con->prepare("SELECT registered_users.password,registered_users.user_id,registered_users.user_domain,registered_users.first_visit,registered_users.firstname,registered_users.paramcheck,registered_domains.single_lang from registered_users,registered_domains WHERE registered_domains.domain = registered_users.user_domain AND registered_users.user_email=?") ) 
 echo "Prepare Error: ($con->errno) $con->error";
if ( !$stmt->bind_param("s", $email) )
  echo "Binding Parameter Error: ($con->errno) $con->error";
if ( !$stmt->execute() ) 
 echo "Execute Error: ($stmt->errno)  $stmt->error";
 
 $result = $stmt->get_result();

$numRows = $result->num_rows;






if($numRows > 0)
{
	
	if(isset($_POST['p'])){//need to check if paramcheck matches for newly registered user
		
		while($r = $result->fetch_assoc()) {
			
			if(mc_decrypt($r['password'], ENCRYPTION_KEY)==$password){
				
				
				if($r['paramcheck']==$_POST['p']){
				
					$rows = array();
					$rows[] = $r;
					//reset paramcheck now user has successfully validated registration
					
		
					if ( !$stmt = $con->prepare("UPDATE registered_users SET paramcheck = 0, first_visit = 1 WHERE user_id = ?") ) 
					 echo "Prepare Error: ($con->errno) $con->error";
					if ( !$stmt->bind_param("i", $r['user_id']) )
					  echo "Binding Parameter Error: ($con->errno) $con->error";
					if ( !$stmt->execute() ) 
					 echo "Execute Error: ($stmt->errno)  $stmt->error";
		
		
		
				}else{
					if(strlen($r['paramcheck'])==1){
						$rows = array();
						$rows[] = $r;
						
		
						if ( !$stmt = $con->prepare("UPDATE registered_users SET first_visit = 1 WHERE user_id = ?") ) 
						 echo "Prepare Error: ($con->errno) $con->error";
						if ( !$stmt->bind_param("i", $r['user_id']) )
						  echo "Binding Parameter Error: ($con->errno) $con->error";
						if ( !$stmt->execute() ) 
						 echo "Execute Error: ($stmt->errno)  $stmt->error";
		
		
		
		
		
					}else{
						$rows[] = 'param mismatch';
					}
					
				}
				
				
				
				
				
				
			}else{
				$rows = array();
				$rows[] = 'none';
				echo json_encode($rows);
				exit;
			}
			
			
			
			
				
		}
		
	}else{//need to check if the registrated user has previously validated by email
		
		while($r = $result->fetch_assoc()) {
			
			if(mc_decrypt($r['password'], ENCRYPTION_KEY)==$password){
				
				
				if(strlen($r['paramcheck'])==1){
					$rows = array();
					$rows[] = $r;
					
		
					if ( !$stmt = $con->prepare("UPDATE registered_users SET first_visit = 1 WHERE user_id = ?") ) 
						 echo "Prepare Error: ($con->errno) $con->error";
						if ( !$stmt->bind_param("i", $r['user_id']) )
						  echo "Binding Parameter Error: ($con->errno) $con->error";
						if ( !$stmt->execute() ) 
						 echo "Execute Error: ($stmt->errno)  $stmt->error";
					
				}else{
					$rows[] = 'unvalidated user';
				}
				
				
				
			}else{
				$rows = array();
				$rows[] = 'none';
				echo json_encode($rows);
				exit;	
				
			}
			
			
			
			
			
		}
		
		
	}
	

	
}else{
	$rows[] = 'none';
}

if($rows[0]->password){
	$rows[0]['password']='';
}


echo json_encode($rows);





?>