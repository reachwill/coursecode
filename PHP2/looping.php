
<?php
$i=1;
while($i<=5)
  {
  //echo "The number is " . $i . "<br />";
  $i++;
  }
?>


<?php
$i=1;
do
  {
  $i++;
  //echo "The number is " . $i . "<br />";
  }
while ($i<=5);
?>


<?php
for ($i=1; $i<=5; $i++)
  {
  //echo "The number is " . $i . "<br />";
  }
?>

<?php
$x=array("one","two","three");
foreach ($x as $value)
  {
  echo $value . "<br />";
  }
?>

<?php
$people = array("Peter", "Joe", "Glenn", "Cleveland");
foreach ($people as $value)
  {
  echo $value . "<br />";
  }
?>