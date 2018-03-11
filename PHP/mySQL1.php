<?php
$con = mysql_connect("localhost","will","nelsonroy");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// some code
mysql_close($con);
?>


