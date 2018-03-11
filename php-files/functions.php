<?php
include 'Theme.php';

function buildNav(){
	
	$themeObj = new Theme();
	
	$nav_items = array( array('label' => 'Home','url' => 'index.php'),
								array('label' => 'About','url' => 'about.php'));
								
	return $themeObj->navigation($nav_items);
	
}

?>