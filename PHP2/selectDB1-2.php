<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$mysqli = new mysqli("localhost", "will", "nelsonroy","classicmodels");

/* check connection */
if (mysqli_connect_errno()) {
    echo("Connect failed: ". mysqli_connect_error());
    exit();
}

$sql = 'SELECT * FROM Products2  ORDER BY buyPrice ASC';

if(!$result = $mysqli->query($sql)){
    die('There was an error running the query [' . $mysqli->error . ']');
}

//"SELECT * FROM Products WHERE productLine = 'Motorcycles'";
//"SELECT * FROM Products WHERE productName LIKE '%fer%'";
//"SELECT * FROM Products WHERE productName LIKE '%fer%' ORDER BY buyPrice ASC";


echo "<table border='1'>
<tr>
<th>Product Name</th>
<th>Product Line</th>
<th>Cost</th>
</tr>";

while($row = $result->fetch_array())
  {
  echo "<tr>";
  echo "<td>" . $row['productName'] . "</td>";
  echo "<td>" . $row['productLine'] . "</td>";
  echo "<td>" . $row['buyPrice'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

$result->free();
$mysqli->close();
?>
</body>
</html>