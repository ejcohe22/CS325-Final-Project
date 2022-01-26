<?php
    if( isset($_POST['email']) && isset($_POST['password'])){
        $db = new PDO("mysql:dbname=ProjectCollection;host=localhost", "sam", "blueMooN#101");
        $db->query("INSERT INTO Administrators(email, password) VALUES ('" . $_POST['email'] . "','" . $_POST['password'] . "');");
    }
?>