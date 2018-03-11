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

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Vendor</th>
                    <th>Line</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = $result->fetch_array()){
                    echo '<tr>';
                    echo '<td>'.$row['productName'].'</td>';
                    echo '<td>'.$row['productVendor'].'</td>';
                    echo '<td>'.$row['productLine'].'</td>';
                    echo '<td>'.$row['quantityInStock'].'</td>';
                    echo '</tr>';
                }

                ?>
            </tbody>

        </table>




        <?php

include 'footer.php';

?>