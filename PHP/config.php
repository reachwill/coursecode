<?php

//connect to database
$conn = new mysqli('localhost','espc','password','espc');
//check no connection errors
if(mysqli_connect_errno()){
    echo 'Connection error ' . mysqli_connect_errno();
    exit();
}

?>