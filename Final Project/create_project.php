<?php
    // Names: Samuel Munoz
    // Names: Erik Cohen
?>

<?php 
    // echo print_r($_POST, true) . "\n";
    try {
        $db = new PDO("mysql:dbname=smunoz23;host=localhost", "smunoz23", "blueMooN101");
        // attributes go here

        // start creating query to add project to Project table
        $p_query = "INSERT INTO Projects(name, class_year, class_name, db, demo, imagepath) VALUES(";
        $p_query .= "'" . $_POST['name'] . "', ";
        $p_query .= "'" . $_POST['year'] . "', ";
        $p_query .= "'" . $_POST['class_name'] . "', ";
        $p_query .= "'" . $_POST['database'] . "', ";
        $p_query .= "'" . $_POST['link'] . "', "; //presentation
        $p_query .= "'" . $_POST['image'] . "')";
        $db->exec($p_query);

        // fetch project id of the recently added project
        $id = $db->query("SELECT id FROM Projects WHERE name='" . $_POST['name'] . "' AND class_year='" . $_POST['year'] . "' AND class_name='" . $_POST['class_name'] . "' AND db='" . $_POST['database'] . "' AND demo='" . $_POST['link'] . "'")->fetch()['id'];

        // add all frontend features of the project
        $f_query = "INSERT INTO ProjectFrontEnd(prj_id, frontend) VALUES";
        for($i = 0; $i < count($_POST['frontend']); $i++) {
            $f_query .= "(" . $id . ", '" . $_POST['frontend'][$i] . "')";
            if($i != count($_POST['frontend'])-1) {
                $f_query .= ", ";
            }
        }
        $db->exec($f_query);

        // add all backend features of the project
        $b_query = "INSERT INTO ProjectBackEnd(prj_id, backend) VALUES";
        for($i = 0; $i < count($_POST['backend']); $i++) {
            $b_query .= "(" . $id . ", '" . $_POST['backend'][$i] . "')";
            if($i != count($_POST['backend'])-1) {
                $b_query .= ", ";
            }
        }
        $db->exec($b_query);

        // $_POST['devrole'] is a new array that can be added on schema 
        // update it should match the number of devs
        // link all developers to this project
        $d_query = "INSERT INTO ProjectDeveloper(prj_id, dev_id, role) VALUES";
        for($i = 0; $i < count($_POST['devs']); $i++) {
            $d_query .= "(" . $id . ", '" . substr($_POST['devs'][$i], 1, -1) . "', '" . $_POST['devrole'][$i] ."')";
            if($i != count($_POST['devs'])-1) {
                $d_query .= ", ";
            }
        }
        $db->exec($d_query);

        header("Location: index.php");
    }
    catch(PDOexception $err) {
        echo $err->getMessage(); // this is a placeholder and will need to be replaced with something more useful
    }
?>


<?php
// code to start uploading images (i think)
$target_dir = "assets/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
?>
