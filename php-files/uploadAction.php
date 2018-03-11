<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>File Uploaded</title>
</head>

<body>
<pre>
<?php
var_dump($_FILES);
?>
</pre>


<?php
//$allowedExt = ['jpg','jpeg','gif','png','svg'];
$allowedExt = array('jpg','jpeg','gif','png','svg');
$a = explode('.',$_FILES['file']['name']);
$extension = $a[count($a)-1];

if(
	$_FILES['file']['type'] == 'image/gif' ||
	$_FILES['file']['type'] == 'image/jpeg'
	){
	if(in_array($extension,$allowedExt)){
		if($_FILES['file']['error']>0){
			echo $_FILES['file']['error'];
		}else{
move_uploaded_file($_FILES['file']['tmp_name'],'uploads/'.$_FILES['file']['name']);
echo 'File uploaded';	
		}
	}
}else{
	echo 'problemo'; 	
}







?>


</body>
</html>