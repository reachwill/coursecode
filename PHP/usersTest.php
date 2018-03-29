<?php

    //go get connection
    require('config.php');
    
    //set the page title here!!!!!!
    $title = 'Users';

    //include the header
    include 'header.php';
?>

<!-- Content goes here -->


<pre>
<?php
    
$sql = "SELECT * FROM users ORDER BY lastname ASC";
if(!$result = $conn->query($sql)){
    die('Select error');
}

$rows = array();
while($row = $result->fetch_assoc()){   
    $rows[] = $row;
}

$result->free();
$conn->close();
        

echo json_encode($rows);

?>
    
</pre>

<?php
    //include the footer
    include 'footer.php';
?>