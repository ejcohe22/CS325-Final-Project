<?php session_start(); ?>

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
    <link rel="icon" type="image/x-icon" href="assets/clover_favicon.ico" />
    <link rel="stylesheet" href="./css/project.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/projects.js" ></script>
    <title>Projects</title>

    <?php
    /* CONNECT TO DATABASE */
    $db = new PDO("mysql:dbname=ProjectCollection;host:localhost", "sam", "blueMooN#101");

    // get all projects
    $projects = $db->query("SELECT id, name, class_year, class_name, db FROM Projects");

    // get all database types
    $database = $db->query("SELECT DISTINCT db FROM Projects");

    // get all frontend types
    $frontend = $db->query("SELECT DISTINCT frontend FROM ProjectFrontEnd");

    // get all backend types
    $backend = $db->query("SELECT DISTINCT backend FROM ProjectBackEnd");
    ?>
</head>
<body>
    <!-- Top Navigation Menu -->
<div class="topnav primary">
    <a href="./index.php" id="home" class="active">Home</a>
    <div class="myLinks">
        <a href="./projects.php">Projects</a>
        <?php if( $_SESSION['is_login'] == 1 ) { ?>
        <div class="dropdown">
            <button class="dropbtn nav-tool">Admin Tools
              <i class="fa fa-caret-down"></i>
            </button>
            <div id="admin" class="dropdown-content tools">
                <a href="./add_project.php">New Project</a>
                <a href="./administration.php">User Administration</a>
                <a href="./logout.php" class="warning">Log Out</a>
            </div>
        </div>
        <?php } ?>
        <?php if( !isset( $_SESSION['is_login'] ) || $_SESSION['is_login'] <= 0 ) { ?>
        <a href="./authenticate.php" class="right">Login</a>
        <?php } ?>
    </div>
    <i class="fa fa-bars fa-3x" id="mobile-menu"></i>
</div>

<button id="filter-btn" > Filter <i class="fa fa-filter"></i></button>

<div class="filters">
    <form class="secondary">
        <fieldset> 
            <legend>Filter Projects <i class="fa fa-chevron-left" id="close-filter"></i></legend>
            <h2>Database:<h2>
            <div id ="db" class="multi-dropdown">
                <!-- populate with db values using php-->
                <?php foreach($database as $row) { ?>
                <input type="checkbox" id=<?= "'" . $row['db'] . "'" ?> name=<?= "'" . $row['db'] . "'" ?> value=<?= "'db-" . $row['db'] . "'" ?>>
                <label for=<?= "'" . $row['db'] . "'" ?>><?= $row['db'] ?></label><br>
                <?php } ?>
            </div>
            <br />
            <h2>Backend:<h2>
            <div id ="backend" class="multi-dropdown">
                <!-- populate with db values using php-->
                <?php foreach($backend as $row) { ?>
                <input type="checkbox" id=<?= "'" . $row['backend'] . "'" ?> name=<?= "'" . $row['backend'] . "'" ?> value=<?= "'backend-" . $row['backend'] . "'" ?>>
                <label for=<?= "'" . $row['backend'] . "'" ?>><?= $row['backend'] ?></label><br>
                <?php } ?>
            </div>
            <br />
            <h2>Frontend:<h2>
            <div id ="frontend" class="multi-dropdown">
                <!-- populate with db values using php-->
                <?php foreach($frontend as $row) { ?>
                <input type="checkbox" id=<?= "'" . $row['frontend'] . "'" ?> name=<?= "'" . $row['frontend'] . "'" ?> value=<?= "'frontend-" . $row['frontend'] . "'" ?>>
                <label for=<?= "'" . $row['frontend'] . "'" ?>><?= $row['frontend'] ?></label><br>
                <?php } ?>
            </div>
            <br />
        </fieldset>
    </form>
</div>

<div id="projects">
    <!-- for every 3 projects-->
    <div id="grid">
    </div>
</div>
</body>
</html>
