<?php
function checkNum($number){
	if($number < 1){
		throw new Exception('Value must be greater than 1');
	}
}

try{
	checkNum(0);	
}

catch(Exception $e){
	echo $e->getMessage();
}


?>

<?php
//example of how to deal with multiple exceptions
class CustomException extends Exception{
	
	public function customErrorMessage(){
		$errorStr = 'Error on line ' . $this->getLine() . 'in ' . $this->getFile();
		return $errorStr;
	}
	
}

$email = 'someone@domain.com';

try{
	if(filter_var($email,FILTER_VALIDATE_EMAIL) == FALSE){
		throw new CustomException();
	}
	if(strpos($email,'example') == FALSE){
		throw new Exception('Wrong domain on email address');
	}
}

catch(CustomException $e){
	echo $e->customErrorMessage();
}

catch(Exception $e){
	echo $e->getMessage();	
}



?>






















