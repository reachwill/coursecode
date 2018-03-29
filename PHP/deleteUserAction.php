<?php

    require('config.php');

    if(!$stmt = $conn->prepare("DELETE FROM users WHERE id = ?"))
        echo 'Prepare error';
    if(!$stmt->bind_param('i',$_GET['id']))
        echo 'Bind Error';
    if(!$stmt->execute())
        echo 'Execute Error';

    header('location:users.php');


?>