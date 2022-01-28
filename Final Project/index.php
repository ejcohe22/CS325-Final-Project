<?php
    // Names: Samuel Munoz
    // Names: Erik Cohen
?>

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
    <link rel="stylesheet" href="./css/index.css" type="text/css"/>
    <link rel="icon" type="image/x-icon" href="assets/clover_favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/theme.js"></script>
    <!-- <script src="js/connect_db.js"></script> -->
    <title>CS330/CS340 Gallery</title>

    <?php
        // echo "<p style='color: white'>" . print_r($_SESSION, true) . "</p>";
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

<?php if( isset($_SESSION['is_login']) && ($_SESSION['is_login'] == 0 || $_SESSION['is_login'] == 1) ) { ?>
<div class="message-bar">
    <?php if( $_SESSION['is_login'] == 1 ) { ?>
    <p>Welcome <?= $_SESSION['email'] ?></p>
    <?php } ?>
    <?php if( $_SESSION['is_login'] == 0 ) { ?>
    <p>You have successfully logged out.</p>
    <?php $_SESSION['is_login'] = -1;
          } ?>
</div>
<?php } ?>





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
