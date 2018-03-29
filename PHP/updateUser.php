<?php
    
    if(!isset($_GET['id'])){
        header('location:users.php');
    }
    
    require('config.php');
    
    //set the page title here!!!!!!
    $title = 'Intro to PHP Login';

    //include the header
    include 'header.php';
?>

<!-- Content goes here -->
<?php
    
    if(!$stmt = $conn->prepare("SELECT id,firstname,lastname,email FROM users WHERE id = ?"))
        echo 'Prepare error';
    if(!$stmt->bind_param('i',$_GET['id']))
        echo 'Binding error';
    if(!$stmt->execute())
        echo 'Execute error';



//    $result = $stmt->get_result();
//
//    while($row = $result->fetch_assoc()){
//        $firstname = $row['firstname'];
//        $lastname = $row['lastname'];
//        $email = $row['email'];
//        $id = $row['id'];
//    }

$stmt->store_result();

//echo $stmt->num_rows;

$stmt->bind_result($id, $firstname, $lastname, $email);
$stmt->fetch();


?>

<form action="updateUserAction.php" method="get">
    
    <input type="text" name="firstname" placeholder="First Name" 
        value="<?php echo $firstname; ?>">
    <input type="text" name="lastname" placeholder="Last Name" 
        value="<?php echo $lastname; ?>">
    <input type="email" name="email" placeholder="Email" 
        value="<?php echo $email; ?>">
    
    <input type="hidden" name="id" value="<?php echo $id; ?>">
      
    <button type="submit">Update User</button> 
    
</form>




<?php
    //include the footer
    include 'footer.php';
?>