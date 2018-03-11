<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Tree Nav of Files and Folders</title>

</head>

<body>
<h1>List of Files</h1>
<?php
include 'get-files-in-dir.php';
$filelist = new FileList('images');
?>


</body>
</html>
