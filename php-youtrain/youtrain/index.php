<?php
$title = 'Home Page';
$username = 'Will';
?>

<?php
include 'header.php';
?>

<h1>Hello World</h1>

<p><?php echo 'Hello <strong>'.$username.'</strong>, hope you enjoy the site.'  ?></p>

<p>Hello <strong><?php echo $username ?></strong>, hope you enjoy the site.</p>


<?php
include 'footer.php';
?>





