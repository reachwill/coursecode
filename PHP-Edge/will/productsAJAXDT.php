<?php

$title = 'PHP Home Page';
include 'header.php';

?>

    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready(function () {

            $('#example').DataTable({
                "ajax": "data.txt",
                "columns": [
                    {
                        "data": "name"
                    },
                    {
                        "data": "position"
                    },
                    {
                        "data": "office"
                    },
                    {
                        "data": "extn"
                    },
                    {
                        "data": "start_date"
                    },
                    {
                        "data": "salary"
                    }
        ]
            });



        });
    </script>

    <?php

include 'footer.php';

?>