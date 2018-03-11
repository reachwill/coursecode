<html>
<body>

<?php
echo "Hello World";
?>

<?php
//This is a comment

/*
This is
a comment
block
*/
?>

<?php
$a = 5; // global scope

function myTest()
{
echo $a; // local scope (wont reference var above
} 

myTest();
?>

<?php
$a = 5;
$b = 10;

function myTest()
{
global $a, $b;
$b = $a + $b;
} 

myTest();
echo $b;
?>

</body>
</html>