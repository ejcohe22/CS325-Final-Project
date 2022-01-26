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
    <link rel="stylesheet" href="./css/login.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/login.js"></script>
    <script src="js/admin.js"></script>
    <!-- <script src= ></script> -->
    <title>User</title>
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
                <a href="./add_project.html">New Project</a>
                <a href="./administration.php">User Administration</a>
                <a href="./logout.php" class="warning">Log Out</a>
            </div>
        </div>
    </div>
    <i class="fa fa-bars fa-3x" id="mobile-menu"></i>
</div>
<div id="admin-grid">
    <div class="admin-card secondary">
        <form class="admin" action="" method="post">
            <fieldset>
            <legend> Database User Creation</legend>
                <label for="email">Email: </label>
                <input id="email" type="email" name="email" /> <br />
                <label for="password">Password: </label>
                <input id="password" type="password" name="password" /><br />
                <input type="checkbox" id="reveal"> show password </input> <br />
                <button id="submit" class="primary"> Submit </button>
            </fieldset>
        </form>
    </div>
    <div class="admin-card secondary">
        <form class="admin" id="dev-create">
            <fieldset>
            <legend> Add Developers</legend>
                <label for="fname">First Name: </label>
                <input id="fname" type="text" name="fname" /> <br />
                <label for="lname">Last Name: </label>
                <input id="lname" type="text" name="lname" /> <br />
                <label for="class">Class year:</label>
                <select name="class" id="class">
                </select><br />
                <button id="add-dev" class="primary"> Add </button>
            </fieldset>
        </form>
    </div>
</div>
    
</body>
</html>