<?php
$mysqli = new mysqli("localhost", "will", "nelsonroy");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if($mysqli->query("CREATE DATABASE my_db")){
	echo 'yehah';	
}




$mysqli->close();


?>