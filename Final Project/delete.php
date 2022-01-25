<?php
    if( isset($_POST['id']) ){
        $db = new PDO("mysql:dbname=ProjectCollection;host=localhost", "sam", "blueMooN#101");
        $db->query("DELETE FROM projects WHERE id=" . $_POST['id']);
    }
?>