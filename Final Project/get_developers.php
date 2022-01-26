<?php
try {
    $db = new PDO("mysql:dbname=ProjectCollection;host=localhost", "sam", "blueMooN#101");
    $rows = $db->query("SELECT id, fname, lname FROM Developers");
    foreach($rows as $row) {
        echo $row['id'] . "," . $row['fname'] . "," . $row['lname'] . "\n";
    }
}
catch(PDOexception $err) {
    echo $err->getMessage();
}
?>
