<?php
$title = 'Arrays Demo';
$username = 'Will';
?>

<?php
include 'header.php';
?>


<?php
$cars[0] = 'Saab';
$cars[1] = 'Volvo';
$cars[2] = 'BMW';

//an alternative way to create this array would be...
//$cars = array('Saab','Volvo','BMW');

echo '<p>' . $cars[2] . ' is not Swedish.</p>';

//example of storing complex data in arrays
$carObjects = array(
	'Saab'=>array(
		'2004',
		'2300'
	),
	'Volvo'=>array(
		'2009',
		'1600'
	)
);

echo $carObjects['Saab'][0];

?>




<?php
include 'footer.php';
?>





