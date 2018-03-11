
<pre>
<?php
	$expires = time() + 60*60*24*30;
	setcookie('fife-cookie','Will',$expires);
	
	var_dump($_COOKIE)

?>

</pre>