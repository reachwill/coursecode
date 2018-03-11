<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        <?php echo $title;  ?>
    </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.css" />
    <style>
        body {
            font-family: arial;
        }
        
        table {
            border: 1px solid orange;
            width: 50%;
        }
        
        th,
        td {
            vertical-align: top;
            padding: 7px;
            text-align: left;
        }
        
        th {
            background-color: orange;
        }
        
        tbody tr:nth-child(even) {
            background-color: #efefef;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.js"></script>

</head>

<body>