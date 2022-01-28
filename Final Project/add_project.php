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
    <link rel="stylesheet" href="./css/add_project.css" type="text/css" />
    <!-- <link rel="stylesheet" href= type="text/css"/> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/new_project.js" ></script>
    <title>Add New Project</title>
    <?php
    $db = new PDO("mysql:dbname=smunoz23;host:localhost", "smunoz23", "blueMooN101");

    $dev_list = $db->query("SELECT d.id, d.fname, d.lname FROM Developers d");
    ?>
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
                <a href="./administration.php">User Administration</a>
                <a href="./logout.php" class="warning">Log Out</a>
            </div>
        </div>
    </div>
    <i class="fa fa-bars fa-3x" id="mobile-menu"></i>
</div>

<h1>Add New Project</h1>

<div class="new-project">
    <fieldset>
        <form action="create_project.php" method="post">
            <label for="project-name">Name:</label>
            <input id="project-name" type="text" name="name" placeholder="Enter your project name" />
            <br />
            <label for="project-database">Database:</label>
            <input id="project-database" type="text" name="database" placeholder="Enter the database used" />
            <br />
            <div id="front_end_tools">
                <label for="project-frontend">Front-End:</label>
                <input class="project-frontend" type="text" name="frontend[]" placeholder="Enter a front-end tool used" /><br />
            </div>
            <i id="add_frontend" class="fa fa-plus add"> Add more Front-End Tools</i>
            <div id="back_end_tools">
                <label for="project-backend">Back-End:</label>
                <input class="project-backend" type="text" name="backend[]" placeholder="Enter a back-end tool used" /><br />
            </div>
            <i id="add_backend" class="fa fa-plus add"> Add more Back-End Tools</i><br />

            <label for="project-course-year">Course Year:</label>
            <input class="project-course-year" name="year" type="text" placeholder="Enter the course year this project was developed" />
            <br />
            <label for="project-class">Class:</label>
            <select class="project-class" name="class_name">
                <option value="CS330">CS330</option>
                <option value="CS430">CS430</option>
            </select>
            <br />
            <!-- some javascript is going to be necessary to be able to add more developers -->
            <label for="project-username">Developers:</label>
            <select id="developer_select">
                <!-- php query is going to be necessary here to get all developers here from database -->
                <option disable selected>Select a developer</option>
                <?php foreach($dev_list as $dev) { ?>
                <option value="{<?= $dev['id'] ?>}"><?= $dev['fname'] . " " . $dev['lname'] ?></option>
                <?php } ?>
            </select> <i id="add_developer" class="fa fa-plus add"> Add developer</i><br />
            <div id="developer-list">

            </div>
            <label id="links" for="project-link">Presentation Link:</label>
            <input name="link" class="project-links" type="file" />
            <br />
            <label id="file" for="project-link">Image:</label>
            <input type="file" name="image" id="image-select" accept=".jpg, .jpeg, .png">
            <br />
            <input id="project-submit" type="submit" class="primary" value="Submit" />
        </form>
    </fieldset>
</div>
    
</body>
</html>
