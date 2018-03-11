<?php

$title = 'PHP Home Page';
include 'header.php';

?>

    <!--   This is location for content-->
    <select id="customerSelect"></select>

    <h2 id="custName"></h2>
    <table id="ordersTable">
        <thead>
            <tr>
                <th>Order No</th>
                <th>Order Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        $(document).ready(function () {

            $('#customerSelect').change(function () {
                $.ajax({
                    url: 'getCustomerOrders.php',
                    dataType: 'json',
                    type: 'get',
                    success: function (data) {
                        for (var i = 0; i < data.length; i++) {
                            console.log(data[i])
                            var row = '<tr>';
                            row += '<td>' + data[i].orderNumber + '</td>';
                            row += '<td>' + data[i].orderDate + '</td>';
                            row += '<td>' + data[i].status + '</td>';
                            $('#ordersTable').append(row);
                        }
                        $('#ordersTable').DataTable();
                    },
                    error: function (h, s, m) {
                        alert(m)
                    }
                });

            });


            $.ajax({
                url: 'getCustomers.php',
                dataType: 'json',
                type: 'get',
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        //console.log(data[i].productName)
                        //$('#prodsSelect').append("<option>" + data[i].productName + " < /option>");
                        $('#customerSelect').append('<option value="' + data[i].customerNumber + '">' + data[i].customerName + '</option>');
                        //                        if (data[i].customerName != '') {
                        //                            $('body').prepend(data[i].customerName + '<br>')
                        //                        }
                    }
                },
                error: function (h, s, m) {
                    alert(m)
                }
            });
        });
    </script>

    <?php

include 'footer.php';

?>