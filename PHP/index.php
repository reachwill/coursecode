<?php
    
    //set the page title here!!!!!!
    $title = 'Intro to PHP Home';


    //include the header
    include 'header.php';
?>

<?php
    //check if the user has come from the login page
    if(isset($_POST['firstname'])){
        //create a simple variable
        $firstname = $_POST['firstname'];
        echo 'Hello ' . $firstname;
    }else{
        echo '<a href="login.php">Please sign in here.</a>';
    }  
?>

<?php
    //include the footer
    include 'footer.php';
?>
