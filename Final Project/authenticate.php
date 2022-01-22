<?php
session_start();
// echo "<p style='color: white'>" . print_r($_POST, true) . "</p>";

// set variables needed below
$email = null;
$password = null;

// check if POST method was sent; if so, check if login credentals are valid
if( isset($_POST['email']) && isset($_POST['password']) ) {
    $db = new PDO("mysql:dbname=ProjectCollection;host=localhost", "sam", "blueMooN#101");
    $result = $db->query("SELECT * FROM Administrators WHERE email=\"" . $_POST['email'] . "\" AND password=\"" . $_POST['password'] . "\"")->fetch();
    
    // if query return no results, determine error; otherwise, redirect user to admin home page
    if( !$result ) {
        $emailq = $db->query("SELECT * FROM Administrators WHERE email=\"" . $_POST['email'] . "\"")->fetch()['email'];
        $passwordq = $db->query("SELECT * FROM Administrators WHERE email=\"" . $_POST['email'] . "\" AND password=\"" . $_POST['password'] . "\"")->fetch()['password'];
        if($emailq === null) {
            $email = "You entered an invalid email. Please make sure to correctly enter your email.";
        }
        else if($passwordq === null) {
            $password = "You entered an invalid password. Please make sure to correctly enter your password.";
        }
    }
    else {
        $_SESSION['email'] = $result['email'];
        header("Location: http://localhost");
    }
}
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
    <link rel="stylesheet" href="./css/login.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/login.js"></script>
    <title>Log In</title>
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
    </div>
    <i class="fa fa-bars fa-3x" id="mobile-menu"></i>
</div>

<!-- error message box -->
<?php if( $email != null || $password != null ) { ?>
<div class="error-message">
<?php if( $email != null ) { ?>
    <p><?= $email ?></p>
<?php } 
      if( $password != null ) {?>
    <p><?= $password ?></p>
<?php } ?>
</div>
<?php } ?>

<form class="sign-in" action="authenticate.php" method="post">
    <fieldset>
        <legend> Database Admin Sign In</legend>
        <label for="email">Email: </label>
        <input id="email" type="email" name="email" /> <br />
        <label for="password">Password: </label>
        <input id="password" type="password" name="password" /><br />
        <input type="checkbox" id="reveal"> show password </input> <br />
        <button id="submit" class="primary"> Submit </button>
    </fieldset>
</form>
</body>
</html>
