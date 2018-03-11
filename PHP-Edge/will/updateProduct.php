<?php
//check we have the product id. If not redirect to products.php
if(!isset($_GET['id'])){
    header('Location:products.php');
}
$title = 'PHP Home Page';
include 'header.php';

?>

    <!--   This is location for content-->
    <?php

require_once('config.php');
$sql = "SELECT * FROM products WHERE productCode = '".$_GET['id']."'";
if(!$result = $conn->query($sql)){
    die('Error: '.$conn->error);
}

?>

        <form action="updateProductAction.php" method="post">
            <?php
                while($row = $result->fetch_array()){
                    echo 'Update '.$row['productName'].'<br>';
echo '<input type="text" name="quantityInStock" value="'.$row['quantityInStock'].'">';
echo '<input type="hidden" name="productCode" value="'.$row['productCode'].'">';
                }

                ?>
                <button type="submit">Update</button>
        </form>



        <?php

include 'footer.php';

?>