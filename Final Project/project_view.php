<?php
    // Names: Samuel Munoz
    // Names: Erik Cohen
?>

<?php 
    session_start(); 
    // echo "<span style='color: white'>" . print_r($_SESSION, true) . "</span>";
    // echo "<span style='color: white'>" . print_r($_GET, true) . "</span>";
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
    <script>
        var project_id = <?php echo json_encode($_GET['id']) ?>;
    </script>
    <script src="js/project_view.js"></script>
    <title>Project view</title>
    <?php
        if( isset($_GET['id']) ) {
            $db = new PDO("mysql:dbname=smunoz23;host:localhost", "smunoz23", "blueMooN101");
            $project = $db->query("SELECT name, db FROM Projects WHERE id=" . $_GET['id'])->fetch();
            $devs = $db->query("SELECT d.fname, d.lname, pd.role FROM Projects p INNER JOIN ProjectDeveloper pd ON pd.prj_id = p.id INNER JOIN Developers d ON d.id = pd.dev_id WHERE p.id=" . $_GET['id']);
            $frontend = $db->query("SELECT pf.frontend FROM Projects p INNER JOIN ProjectFrontEnd pf ON pf.prj_id = p.id WHERE p.id=" . $_GET['id']);
            $backend = $db->query("SELECT pb.backend FROM Projects p INNER JOIN ProjectBackEnd pb ON pb.prj_id = p.id WHERE p.id=" . $_GET['id']);
        }
        else {
            $error_message = "An error has occured. Please return to the home page";
        }

        // function returns a string, formated as a list of words from data stored in rows from database
        function get_data($rows, $field_names, $class_type) {
            $rtn_str = "";
            $is_first = true;
            $row = $rows->fetch();
            while($row) { 
                if( !$is_first ) {
                    $rtn_str .= ", ";
                }
                for($index = 0; $index < count($field_names); $index++) {
                    if($index == 0) {
                        $rtn_str .= "<span class='editable " . $class_type . "'>";
                    }
                    $rtn_str .= $row[$field_names[$index]];
                    if($index != count($field_names) - 1) {
                        $rtn_str .= " ";
                    } else {
                        $rtn_str .= "</span>";
                    }
                }
                $is_first = false;
                $row = $rows->fetch(); 
            }
            return $rtn_str;
        }

        function get_devs($rows) {
            $rtn_str = "";
            $row = $rows->fetch();
            $count = 1;
            while($row) { 
                $rtn_str .= "<p class='profile-content indent'>Developer " . $count . ": <span class='editable devs'>" . $row['fname'] . " " . $row['lname'] . "</span></p>";
                $rtn_str .= "<p class='profile-content super-indent'>Role: <span class='editable roles'>" . $row['role'] . "</span></p>";
                $row = $rows->fetch(); 
                $count += 1;
            }
            return $rtn_str;
        }
        // get data from database when this is fixed
        // $name = "Mobile Inventory";
        // $desc = "This is some project";
        // $dev1 = "Nick English";
        // $dev2 = "Sam Munoz";
        // $frontend = "HTML";
        // $backend = "PHP";
        // $database = "MySQL";
        $imagepath = "assets/defaultPrjImg.jpg";
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

<?php if( isset($_GET['id']) ) { ?>
<div id="admin-grid">
    <div class="project-content">
        <input id="project-id" type="hidden" value="<?= $_GET['id'] ?>" />
        <h1 class="editable"><?= $project['name'] ?></h1>
        <?= get_devs($devs) ?>
        <p class="profile-content indent">Database:&nbsp;<span class="editable database"><?= $project['db'] ?></span></p>
        <p class="profile-content indent">FrontEnd:&nbsp;<?= get_data($frontend, array("frontend"), "frontend") ?></p>
        <p class="profile-content indent">BackEnd:&nbsp;<?= get_data($backend, array("backend"), "backend") ?></p>
    </div>
    <div>
        <img class="editableImg" src="<?= $imagepath ?>" />
    </div>
</div>

<div id="all-btns">
<div id="admin-buttons">
    <button id="cancel" class="primary form" value="Cancel"> Cancel</button>
    <button id="submit" class="primary form"> UPDATE PROJECT <i class="fa fa-check-square success"></i></button>
    <button id="delete" class="warning form"> DELETE PROJECT <i class="fa fa-trash"></i></button>
</div>

<?php if( $_SESSION['is_login'] == 1 ) { ?>
<button id="edit-btn" class="primary form" > EDIT <i class="fa fa-edit"></i></button>
<?php } ?>
</div>
<?php }
      else { ?>
<div class="error-message">
    <p><?= $error_message ?></p>
</div>
<?php } ?>
    
</body>
</html>
