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
    <!-- <script src= ></script> -->
    <title>Projects</title>
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
                <a href="./add_project.php">New Project</a>
                <a href="#">User Administration</a>
                <a href="#" class="warning">Log Out</a>
            </div>
        </div>
        <a href="./authenticate.php" class="right">Login</a>
    </div>
    <i class="fa fa-bars fa-3x" id="mobile-menu"></i>
</div>

<button id="filters" > Filter <i class="fa fa-filter"></i></button>

<div class="filters">
    <form class="secondary">  <!-- $('input[type=checkbox]') -->
    
        <fieldset> 
            <legend>Filter Projects <i class="fa fa-chevron-left" id="close-filter"></i></legend>
            <h2>Database:<h2>
            <div id ="db" class="multi-dropdown">
                <!-- populate with db values using php-->
                <input type="checkbox" id="mysql" name="mysql" value="db-mysql">
                <label for="mysql"> MySQL</label><br>
            </div>
            <br />
            <h2>Backend:<h2>
            <div id ="backend" class="multi-dropdown">
                <!-- populate with db values using php-->
                <input type="checkbox" id="php" name="php" value="backend-php">
                <label for="php">PHP</label><br>
            </div>
            <br />
            <h2>Frontend:<h2>
            <div id ="frontend" class="multi-dropdown">
                <!-- populate with db values using php-->
                <input type="checkbox" id="html" name="html" value="frontend-html">
                <label for="html">HTML5</label><br>
            </div>
            <br />
        </fieldset>
    </form>
</div>

<div id="projects">
    <!-- for every 3 projects-->
    <div id="grid">
        <!-- for every project -->
        <div class="card secondary">
            <h2>Project Name<h2>
            <pre>Team-members
                Summary
                Database
                Backend
                Frontend 
                Description
            </pre>
        </div>
        <div class="card secondary">
            <h2>Project Name<h2>
            <pre>Team-members 
                Summary
                Database
                Backend
                Frontend 
                Description
            </pre>
        </div>
        <div class="card secondary">
            <h2>Project Name<h2>
            <pre>Team-members 
                Summary
                Database
                Backend
                Frontend 
                Description
            </pre>
        </div>
        <div class="card secondary">
            <h2>Project Name<h2>
                <pre>Team-members 
                    Summary
                    Database
                    Backend
                    Frontend 
                    Description
                </pre>
        </div>
    </div>
</div>







    
</body>
</html>
