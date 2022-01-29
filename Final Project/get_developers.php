<?php
    // Names: Samuel Munoz
    // Names: Erik Cohen
    // Purpose: Displays all developers names for AJAX purposes
?>

<?php
try {
    $db = new PDO("mysql:dbname=smunoz23;host=localhost", "smunoz23", "blueMooN101");
    $rows = $db->query("SELECT id, fname, lname FROM Developers");
    foreach($rows as $row) {
        echo $row['id'] . "," . $row['fname'] . "," . $row['lname'] . "\n";
    }
}
catch(PDOexception $err) {
    echo $err->getMessage();
}
?>
