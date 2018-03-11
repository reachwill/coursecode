<?php

$title = 'PHP Home Page';
include 'header.php';

?>

    <!--   This is location for content-->
    <?php
require_once('config.php');
$sql = 'SELECT * FROM products';

//now go get the products from the product table
if(!$result = $conn->query($sql)){
    die('Error retrieving results: '.$conn->error);
}

?>

        <table id="products">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>

                <?php

while($row = $result->fetch_array()){
    //var_dump($row);
    echo '<tr>';
    echo '<td>'.$row['productName'].'</td>';
    echo '<td>'.$row['productDescription'].'</td>';
    echo '<td>'.$row['buyPrice'].'</td>';
    echo '<td><a href="productDetails.php?id='.$row['productCode'].'">more details</a></td>';
    echo '<td><a href="updateProduct.php?id='.$row['productCode'].'">update</a></td>';
    echo '</tr>';
}


$result->free();
$conn->close();


?>
            </tbody>
        </table>



        <?php

include 'footer.php';

?>