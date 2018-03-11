<?php

$title = 'PHP Home Page';
include 'header.php';

?>

    <!--   This is location for content-->
    <?php
//create a connection object to the database
$conn = new mysqli('localhost','edge','password','edge_db');

$sql = "INSERT INTO customers(name,city,tel) VALUES('Edge Testing','Bellshill',0123456789)";

if($conn->query($sql)){
    echo 'Customer inserted';
}else{
    die('Error: '.$conn->error);
}

?>



        <?php

include 'footer.php';

?>