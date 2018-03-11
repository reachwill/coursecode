<?php

$title = 'PHP Home Page';
include 'header.php';

?>

    <!--   This is location for content-->
    <select id="customersSelect"></select>

    <table id="ordersTable">
        <thead>
            <tr>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>



    <script>
        $(document).ready(function () {

            $('#ordersTable').hide();

            //listen for user changing selected item in customersSelect
            $('#customersSelect').change(function () {
                $.ajax({
                    url: 'getCustomerOrders.php',
                    type: 'post',
                    data: {
                        customerNumber: $('#customersSelect').val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        $('#ordersTable tbody').html('').hide();
                        for (var i = 0; i < data.length; i++) {
                            var html = '<tr>';
                            html += '<td>' + data[i].orderNumber + '</td>';
                            html += '<td>' + data[i].orderDate + '</td>';
                            html += '<td>' + data[i].status + '</td>';
                            html += '</tr>';
                            $('#ordersTable tbody').append(html);
                        };
                        $('#ordersTable,#ordersTable tbody').fadeIn();

                    },
                    error: function (http, s, m) {
                        console.log(m);
                    }
                });
            });





            //go get the customers
            $.ajax({
                url: 'getCustomers.php',
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    var numCustomers = data.length;
                    for (var i = 0; i < numCustomers; i++) {
                        if (data[i].customerName != '') {
                            $('#customersSelect').append('<option value="' + data[i].customerNumber + '">' + data[i].customerName + '</option>');
                        }
                    };
                },
                error: function (http, status, message) {
                    console.log(message);
                }
            });
        });
    </script>


    <?php

include 'footer.php';

?>