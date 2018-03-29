<?php

    //go get connection
    require('config.php');
    
    //set the page title here!!!!!!
    $title = 'Users';

    //include the header
    include 'header.php';
?>

<!-- Content goes here -->

<table border="1">
    <thead>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Action</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

<?php
    
$sql = "SELECT * FROM users ORDER BY lastname ASC";
if(!$result = $conn->query($sql)){
    die('Select error');
}


$file = fopen('users.csv','w');
        
while($row = $result->fetch_array()){
    
    fputcsv($file,$row);
    
    //var_dump($row);
    echo '<tr>';
    echo '<td>' . $row['lastname'] . '</td>';
    echo '<td>' . $row['firstname'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td><a href="updateUser.php?id=' . $row['id'] . '">Edit</a></td>';
    echo '<td><a href="deleteUser.php?id=' . $row['id'] . '">Delete</a></td>';
    echo '</tr>';
}

$result->free();
$conn->close();

?>
    </tbody>
</table>


<?php
    //include the footer
    include 'footer.php';
?>