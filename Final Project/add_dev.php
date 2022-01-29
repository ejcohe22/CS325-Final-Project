<?php
    // Names: Samuel Munoz
    // Names: Erik Cohen
    // Purpose: Add a new developer
?>

<?php
    if( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['year']) ){
        $db = new PDO("mysql:dbname=smunoz23;host=localhost", "smunoz23", "blueMooN101");
        $db->query("INSERT INTO Developers (fname,lname,class_year) VALUES ('" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['year'] . "');");
        header("Location: administration.php");
    }
?>
