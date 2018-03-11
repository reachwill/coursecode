<?php

//function customError($errno,$errstr){
//    echo 'Whoops : '. $errstr;
//    return true;
//}
//
//set_error_handler(customError);
//
//
//
//echo $test;


class CustomException extends Exception{
    public function customErrorMessage(){
        $errorStr = 'Error on line: '.$this->getLine() . ' in ' . $this->getFile();
        return $errorStr;
    }
}

$email = 'someone@domain.com';

try{
    if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        throw new CustomException();
    }
    
    if(strpos($email,'example')==false){
        throw new Exception('Wrong domain in your email');
    }
}


catch (CustomException $e){
    echo $e->customErrorMessage();
}


catch(Exception $e){
    echo $e->getMessage();
}









?>