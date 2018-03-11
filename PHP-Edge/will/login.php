<?php

$title = 'PHP Home Page';
include 'header.php';

?>

    <!--   This is location for content-->
    <form action="index.php" method='get'>
        <label>Username: </label>
        <input type="text" name="userName">
        <button type="submit">Log in</button>
    </form>



    <?php

include 'footer.php';

?>