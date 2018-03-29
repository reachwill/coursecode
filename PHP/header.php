<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <style>
    
        body{
            font-family: arial;
        }
        
        nav{
            margin-bottom: 30px;
        }
        
        nav ul{
            padding:0;
            margin:0;
            list-style: none;
        }
        
        nav li{
            display: inline-block;
        }
        
        footer{
            margin-top: 40px;
            border-top: 1px solid #ccc;
        }
        
        table{
            border-collapse: collapse;
        }
        
        th{
            background-color: coral;
            color:white;
        }
        
        td,th{
            padding:10px;
        }
        
        tbody tr:nth-child(even){
            background-color: azure;
        }
        
    
    
    </style>
</head>
<body>

    <header>
        <h1>Intro to PHP</h1>
        <nav>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="users.php">Users</a></li>
            </ul>
        </nav>
    </header>




