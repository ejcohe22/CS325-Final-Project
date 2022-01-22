<?php 
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--mobile first design tips from W3schools-->
    <!--icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/theme.css" type="text/css"/>
    <link rel="stylesheet" href="./css/index.css" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="assets/clover_favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/theme.js"></script>
    <!-- <script src="js/connect_db.js"></script> -->
    <title>CS330/CS340 Gallery</title>

    <?php
    ?>
</head>
<body>
<!-- Top Navigation Menu -->
<div class="topnav primary">
    <a href="./index.html" id="home" class="active">Home</a>
    <div class="myLinks">
        <a href="./projects.php">Projects</a>
        <div class="dropdown">
            <button class="dropbtn nav-tool">Admin Tools
              <i class="fa fa-caret-down"></i>
            </button>
            <div id="admin" class="dropdown-content tools">
                <a href="#">New Project</a>
                <a href="#">User Administration</a>
                <a href="#" class="warning">Log Out</a>
            </div>
        </div>
        <a href="./project_view.php">Project View</a>
        <a href="./authenticate.html" class="right">Login</a>
    </div>
    <i class="fa fa-bars fa-3x" id="mobile-menu"></i>
</div>
    <div  id="masthead">
        <img src="./assets/Miller1.jpg" alt="Colby College">
        <h1>Professor Stacy Doore's<br />
            CS 330 & CS430 project gallery.</h1>
    </div>
    <div class="main primary">
        <p>This website serves as a directory of projects completed
            in professor Stacy Doore’s database sequence at Colby College</p>
        <div class="main secondary">
            CS330: Real-World Database Design, Development, and Deployment <br />
            CS430: Advanced Database Design, Development, and Deployment
        </div>
    </div> </body> </html>
