<?php

    //go get connection
    require('config.php');
    
?>

<?php
    
$sql = "SELECT * FROM users ORDER BY lastname ASC";
if(!$result = $conn->query($sql)){
    die('Select error');
}


$rows = array();

while($row = $result->fetch_assoc()){
    
    $rows[] = $row;
    
}

//var_dump($rows);
echo json_encode($rows);

$result->free();
$conn->close();

?>
    


