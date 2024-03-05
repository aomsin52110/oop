<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="mystyle.css" />
    <title>user</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="index.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        user
    </a>
    <div class="collapse navbar-collapse float-end" id="navbarNav">
        <ul class="navbar-nav ml-auto float-end">
            
            <li class="nav-item">
                <a class="nav-link" href="user.php">user</a>
            </li>
            <li class="nav-item float-end">
                <a class="nav-link" href="cart.php">cart</a>
            </li>
            <li class="nav-item float-end">
                <a class="nav-link" href="logout.php">logout</a>
            </li>
        </ul>
    </div>
</nav>
<?php
    include "data.php";
    $db =new Database();
    
    ?>