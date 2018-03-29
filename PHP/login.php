<?php
    
    //set the page title here!!!!!!
    $title = 'Intro to PHP Login';

    //include the header
    include 'header.php';
?>

<form action="index.php" method="post">
    
    <input type="text" name="firstname" placeholder="First Name">
    <button type="submit">Login</button>
    
</form>


<?php
    //include the footer
    include 'footer.php';
?>