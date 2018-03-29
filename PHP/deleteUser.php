<?php
    
    if(!isset($_GET['id'])){
        header('location:users.php');
    }
    
    require('config.php');
    
    //set the page title here!!!!!!
    $title = 'Delete User';

    //include the header
    include 'header.php';
?>

<!-- Content goes here -->
<?php
    
    if(!$stmt = $conn->prepare("SELECT id,firstname,lastname FROM users WHERE id = ?"))
        echo 'Prepare error';
    if(!$stmt->bind_param('i',$_GET['id']))
        echo 'Binding error';
    if(!$stmt->execute())
        echo 'Execute error';

    //$result = $stmt->get_result();

$stmt->store_result();

//echo $stmt->num_rows;

$stmt->bind_result($id, $firstname, $lastname);
$stmt->fetch();
//while ($stmt->fetch()) {
//        //printf ("%s (%s)\n", $firstname, $lastname);
//}



//    while($row = $result->fetch_assoc()){
//        $firstname = $row['firstname'];
//        $lastname = $row['lastname'];
//        $email = $row['email'];
//        $id = $row['id'];
//    }


?>

<h2>Are you sure you want to delete <?php echo $firstname . ' ' . $lastname; ?></h2>

<a href="deleteUserAction.php?id=<?php echo $id; ?>">Yes</a> <a href="users.php">No</a>





<?php
    //include the footer
    include 'footer.php';
?>