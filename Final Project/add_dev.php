<?php
    if( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['year']) ){
        $db = new PDO("mysql:dbname=ProjectCollection;host=localhost", "sam", "blueMooN#101");
        $db->query("INSERT INTO Developers (fname,lname,class_year) VALUES ('" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['year'] . "');");
    }
?>
