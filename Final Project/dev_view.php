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
    <link rel="stylesheet" href="./css/dev_view.css" type="text/css"/>
    <!-- <link rel="stylesheet" href= type="text/css"/> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/theme.js"></script>
    <!-- <script src= ></script> -->
    <?php
        session_start();
        // get data from database when this is fixed
        $name = "Sam Munoz";
        $imagepath = "/assets/defaultDev.png";
        $grad_year = "2023";
        $project_name = "Mobile Inventory";
        $role = "Front-End Developer";
    ?>

    <title>Project</title>
</head>
<body>
    <!-- Top Navigation Menu -->
<div class="topnav primary">
    <a href="./index.html" id="home" class="active">Home</a>
    <div class="myLinks">
        <a href="./projects.html">Projects</a>
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

<div class="dev-content">
    <img src="<?= $imagepath ?>" />
    <p><?= $name ?> <?= $grad_year ?></p>
    <p><?= $project_name ?> | <?= $role ?></p>
</div>
    
</body>
</html>
