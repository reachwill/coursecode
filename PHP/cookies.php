<?php
$expire=time()+60*60*24*30;
setcookie("user", "Alex Porter", $expire);
?>

<?php
if (isset($_COOKIE["user"]))
  echo "Welcome " . $_COOKIE["user"] . "!<br />";
else
  echo "Welcome guest!<br />";
  
  //to delete set time in past //
  //setcookie("user", "", time()-3600);
?>