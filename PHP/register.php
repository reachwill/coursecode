<?php
    
    //set the page title here!!!!!!
    $title = 'Intro to PHP Register';

    //include the header
    include 'header.php';
?>

<!-- Content goes here -->
<form action="insertUser.php" method="get">
    <input type="text" name="firstname" placeholder="First Name"><br>
    <input type="text" name="lastname" placeholder="Last Name"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <button type="submit">Register</button>
</form>


<?php
    //include the footer
    include 'footer.php';
?>