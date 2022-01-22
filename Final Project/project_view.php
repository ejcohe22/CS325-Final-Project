<?php 
    session_start(); 
    echo "<span style='color: white'>" . print_r($_SESSION, true) . "</span>";
    echo "<span style='color: white'>" . session_id() . "</span>";
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
    <link rel="stylesheet" href="./css/project_view.css" type="text/css"/>
    <!-- <link rel="stylesheet" href= type="text/css"/> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/theme.js"></script>
    <!-- <script src= ></script> -->
    <?php
        // get data from database when this is fixed
        $name = "Mobile Inventory";
        $desc = "This is some project";
        $dev1 = "Nick English";
        $dev2 = "Sam Munoz";
        $frontend = "HTML";
        $backend = "PHP";
        $database = "MySQL";
        $imagepath = "path/to/file";
    ?>

    <title>Project</title>
</head>
<body>
    <!-- Top Navigation Menu -->
<div class="topnav primary">
    <a href="./index.php" id="home" class="active">Home</a>
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
        <a href="./authenticate.html" class="right">Login</a>
    </div>
    <i class="fa fa-bars fa-3x" id="mobile-menu"></i>
</div>

<div class="project-content">
    <img src="<?= $imagepath ?>" />
    <h1><?= $name ?></h1>
    <p>Developers: <?= $dev1 ?>, <?= $_SESSION['name'] ?></p>
    <p>Database: <?= $database ?></p>
    <p>Other software: <?= $frontend ?>, <?= $backend ?></p>
    <p>Project Description: <?= $desc ?></p>
</div>
    
</body>
</html>
