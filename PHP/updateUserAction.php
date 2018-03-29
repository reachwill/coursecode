<?php

    require('config.php');

    if(!$stmt = $conn->prepare("UPDATE users SET firstname = ?, lastname = ?, email = ? WHERE id = ?"))
        echo 'Prepare error';
    if(!$stmt->bind_param('sssi',$_GET['firstname'],$_GET['lastname'],$_GET['email'],$_GET['id']))
        echo 'Bind Error';
    if(!$stmt->execute())
        echo 'Execute Error';

    header('location:users.php');


?>