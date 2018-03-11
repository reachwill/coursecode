
<?php
/*if(!file_exists("welcome.txt"))
  {
  die("File not found");
  }
else
  {
  $file=fopen("welcome.txt","r");
  }*/
?>



<?php
//error handler function
function customError($errno, $errstr)
  {
  echo "<b>Sorry Error:</b> [$errno] $errstr";
  }

//set error handler
set_error_handler("customError");

//trigger error
//echo($test);

?>

<?php
$file=fopen("welcome.txt","r");
?>

