<?php

$title = 'PHP Home Page';
include 'header.php';

?>

    <!--   This is location for content-->
    <?php
require_once('Tree.php');
//create an instance of the Tree class
$tree = new Tree('images');

?>



        <?php

include 'footer.php';

?>