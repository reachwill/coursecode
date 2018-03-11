<?php
$q=$_GET["q"];
//$q=1002;

$mysqli = new mysqli("localhost", "will", "nelsonroy","classicmodels");

/* check connection */
if (mysqli_connect_errno()) {
    echo("Connect failed: ". mysqli_connect_error());
    exit();
}






$sql="SELECT * FROM employees WHERE employeeNumber = '".$q."'";


if(!$result = $mysqli->query($sql)){
    die('There was an error running the query [' . $mysqli->error . ']');
}




echo "<table border='1'>
<tr>
<th>First name</th>
<th>Last name</th>
<th>Email</th>
</tr>";

while($row = $result->fetch_assoc())
{
	echo "<tr>";
	echo "<td>" . $row['firstName'] . "</td>";
	echo "<td>" . $row['lastName'] . "</td>";
	echo "<td>" . $row['email'] . "</td>";
	echo "</tr>";
}
echo "</table>";
echo 'Total results: ' . $result->num_rows;
echo 'Total rows updated: ' . $db->affected_rows;
$result->free();


$mysqli->close();
?>