<?php
    // Names: Samuel Munoz
    // Names: Erik Cohen
?>

<?php
    if( isset($_POST['email']) && isset($_POST['password'])){
        $db = new PDO("mysql:dbname=smunoz23;host=localhost", "smunoz23", "blueMooN101");
        $db->query("INSERT INTO Administrators(email, password) VALUES ('" . $_POST['email'] . "','" . $_POST['password'] . "');");
        header("Location: administration.php");
    }
?>
