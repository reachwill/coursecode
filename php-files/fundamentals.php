<?php
$title = 'Home Page - Fife Council';
$userName = 'Will';
$password = 'test';
$cars = array('Saab','Volvo','BMW','Toyota');

$ages = array('Peter'=>32,'Jane'=>22);
$ages['Peter']=32;

$families = array(
	'Griffin'=>array(
		'Peter',
		'Jane',
		'Bill'
	),
	'Brown'=>array(
		'Jim',
		'Ann'
	)
);

?>


<!doctype html>
<html lang="en-gb">
<head>
<meta charset="UTF-8">
<title><?php echo $title;    ?></title>
</head>

<body>

<?php
if($userName == 'Will'){
	echo 'Welcome ' . $userName . ', you drive a ' . $cars[0];
}
?>


<p>
<?php
echo 'Is ' . $families['Griffin'][1]  . ' a part of the Griffin family';

?></p>







</body>
</html>