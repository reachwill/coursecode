<?php

$title = 'PHP Home Page';
include 'header.php';

?>

    <table id="products" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>

            </tr>
        </thead>

    </table>

    <script>
        $(document).ready(function () {

            $('#example').DataTable({
                "ajax": "getProducts.php"
            });



        });
    </script>

    <?php

include 'footer.php';

?>