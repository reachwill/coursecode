<?php

    //go get connection
    require('config.php');


    function checkAlphaNumeric($value){
        
        if(!preg_match('/[^a-z_\-0-9]/i',$value)){
            echo 'bad data';
            exit();
        }
    }


    //check referer matches the hosting domain
    if(parse_url($_SERVER['HTTP_REFERER'],PHP_URL_HOST) != $_SERVER['SERVER_NAME']){
        exit();
    }

//check firstname is not suspicious
    checkAlphaNumeric($_POST['firstname']);
    //check lastname is not suspicious
    checkAlphaNumeric($_POST['lastname']);




    //check if it looks like a real email address
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        echo 'bad email address';
        exit();
    }

    

    //insert the new user
    $today = date('c');
    $sql = "INSERT INTO users (firstname,lastname,email,date_registered) VALUES('$_POST[firstname]','$_POST[lastname]','$_POST[email]','$today')";

    


    if(!$result = $conn->query($sql)){
        echo 'Error inserting user ' . $conn->error;
    }else{
        echo 'done';
    }


?>
   

   
