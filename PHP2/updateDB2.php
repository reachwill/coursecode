<?php
$mysqli = new mysqli("localhost", "will", "nelsonroy","my_db");

/* check connection */
if (mysqli_connect_errno()) {
    echo("Connect failed: ". mysqli_connect_error());
    exit();
}


// find out how many rows are in the table 
$sql = "UPDATE Persons SET Age=36 WHERE FirstName='d' AND LastName='g'";

if(!$result = $mysqli->query($sql)){
    die('There was an error running the query [' . $mysqli->error . ']');
}



$mysqli->close();

echo 'done';
?>