<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$con = mysql_connect("localhost","will","nelsonroy");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("classicmodels", $con);

$result = mysql_query("SELECT * FROM Products  ORDER BY buyPrice ASC");
//$result = mysql_query("SELECT * FROM Products WHERE productLine = 'Motorcycles'");
//$result = mysql_query("SELECT * FROM Products WHERE productName LIKE '%fer%'");
//$result = mysql_query("SELECT * FROM Products WHERE productName LIKE '%fer%' ORDER BY buyPrice ASC");


echo "<table border='1'>
<tr>
<th>Product Name</th>
<th>Product Line</th>
<th>Cost</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['productName'] . "</td>";
  echo "<td>" . $row['productLine'] . "</td>";
  echo "<td>" . $row['buyPrice'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>
</body>
</html>