<?php
session_start();

$db = new PDO("mysql:dbname=ProjectCollection;host=localhost", "sam", "blueMooN#101");
if($db === FALSE) {
    echo "An error has occured when connecting to the database";
}
else {
    $_SESSION['db'] = $db;
    echo "Connected to database successfully";
}
?>
