<!doctype html>
<html lang="en-uk">
<head>
	<title>Intro to PHP</title>
</head>

<body>

<?php
include 'header.php';

$mysqli = new mysqli("localhost", "will", "nelsonroy","classicmodels");

/* check connection */
if (mysqli_connect_errno()) {
    echo("Connect failed: ". mysqli_connect_error());
    exit();
}

$sql = 'Select * from products';

if(!$result = $mysqli->query($sql)){
    die('There was an error running the query [' . $mysqli->error . ']');
}

$html = '<table border="1"><tr><th>Product Name</th>';
$html .= '<th>Product Line</th>';
$html .= '<th>Cost</th></tr>';

while($row = $result->fetch_assoc()){
	$html .= '<tr>';
	$html .= '<td>'.$row['productName'].'</td>';
	$html .= '<td>'.$row['productLine'].'</td>';
	$html .= '<td class="amount">'.number_format($row['buyPrice'],2).'</td>';
	$html .= '</tr>';
}

$html .= '</table>';
echo $html;

$result->free();

$mysqli->close();

?>

</body>


</html>
