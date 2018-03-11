<?php

$title = 'PHP Home Page';
include 'header.php';

?>

    <!--   This is location for content-->
    <?php
//create a database on the MYSql server
//1. create a connection to the DB server
$conn = new mysqli('localhost','edge','password');
//check connection was successful
if(mysqli_connect_errno()){
    echo mysqli_connect_errno();
    exit();
}else{
    echo 'Connection established <br>';
}

//create a new database
if($conn->query('CREATE DATABASE edge_db')){
    echo 'Database created <br>';
}else{
    echo 'Database already exists <br>';
}

//connect to the database
if($conn->select_db('edge_db')){
    echo 'Database selected <br>';
}else{
    echo 'Error: '.mysqli_error($conn);
    exit();
}

//create a table for customers
$sql = 'CREATE TABLE customers(
    id int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    name varchar(64),
    city varchar(64),
    tel int)';


if($conn->query($sql)){
    echo 'Customers table created <br>';
}


//create a table for orders
$sql = 'CREATE TABLE orders(
    id int NOT NULL  AUTO_INCREMENT,
    PRIMARY KEY(id),
    customerId int,
    product varchar(64)
    )';

if($conn->query($sql)){
    echo 'Orders table created <br>';
}




?>



        <?php

include 'footer.php';

?>