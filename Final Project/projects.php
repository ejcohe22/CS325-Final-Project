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
    <link rel="stylesheet" href="project.css" type="text/css"/>
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

<div id="projects">
    <!-- for every 3 projects-->
    <div class="row">
        <!-- for every project -->
        <div class="card secondary">
            <h2>Project Name<h2>
            <pre>Team-members Summary
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

<div class="filters">
    <form class="secondary">
        <fieldset>
            <legend>Filter Projects</legend>
            <p> holding ctl allows for multiple selections </p>
            <label for="db">Database Type:</label>
            <select name="db" id="db" multiple>
                <!-- populate with db values using php-->
              <option value="sql">sql</option>
            </select>
            <br />
            <label for="backend">Backend:</label>
            <select name="backend" id="backend" multiple>
                <!-- populate with db values using php-->
              <option value="php">php</option>
            </select>
            <br />
            <label for="frontend">Frontend:</label>
            <select name="frontend" id="frontend" multiple>
                <!-- populate with db values using php-->
              <option value="php">php</option>
            </select>
            <br />
        </fieldset>
    </form>
</div>





    
</body>
</html>
