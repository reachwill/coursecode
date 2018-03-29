<?php

    //go get connection
    require('config.php');
    
    //check user has come via the register page
    if(isset($_GET['firstname'])==false){
        header('location:register.php');
    }


    //insert the new user
    $today = date('c');
    $sql = "INSERT INTO users (firstname,lastname,email,date_registered) VALUES('$_GET[firstname]','$_GET[lastname]','$_GET[email]','$today')";

    


    if(!$result = $conn->query($sql)){
        die('Error inserting user ' . $conn->error);
    }


?>
   

   
<?php
    
    //set the page title here!!!!!!
    $title = 'Intro to PHP Login';

    //include the header
    include 'header.php';
?>

<!-- Content goes here -->
<h2>User registered</h2>


<?php
    //include the footer
    include 'footer.php';
?>