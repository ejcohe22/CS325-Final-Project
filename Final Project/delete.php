<?php
    if( isset($_POST['id']) ){
        $db = new PDO("mysql:dbname=ProjectCollection;host=localhost", "sam", "blueMooN#101");
        $db->query("DELETE FROM ProjectBackend WHERE prj_id=" . $_POST['id']);
        $db->query("DELETE FROM ProjectFrontend WHERE prj_id=" . $_POST['id']);
        $db->query("DELETE FROM ProjectDeveloper WHERE prj_id=" . $_POST['id']);
        $db->query("DELETE FROM projects WHERE id=" . $_POST['id']);
    }
?>