<?php
//Open images directory
$dir = dir("images");

//List files in images directory
while (($file = $dir->read()) !== false)
{
echo "filename: " . $file . "--" . filesize("images/".$file) . " bytes" . "<br />";

}

$dir->close();
?>