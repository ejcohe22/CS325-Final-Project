<?php 
    echo print_r($_POST, true);
    try {
        $db = new PDO("mysql:dbname=ProjectCollection;host=localhost", "sam", "blueMooN#101");
        // attributes go here

        $p_query = "INSERT INTO Projects(name, class_year, class_name, db, demo) VALUES(";
        $p_query .= $_POST['name'] . ", ";
        $p_query .= $_POST['course-year'] . ", ";
        $p_query .= $_POST['course-year'] . ", ";
        // missing class name
        $p_query .= $_POST['database'] . ", ";
        $p_query .= $_POST['links'] . ")";

        $f_query = "INSERT TO Projects";


    }
    catch(PDOexception $err) {
        echo $err->getMessage(); // this is a placeholder and will need to be replaced with something more useful
    }
?>
