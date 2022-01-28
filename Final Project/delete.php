<?php
    // Names: Samuel Munoz
    // Names: Erik Cohen
?>

<?php
    $db = new PDO("mysql:dbname=smunoz23;host=localhost", "smunoz23", "blueMooN101");
    $db->query("DELETE FROM ProjectBackEnd WHERE prj_id='" . $_POST['id'] . "'");
    $db->query("DELETE FROM ProjectFrontEnd WHERE prj_id='" . $_POST['id'] . "'");
    $db->query("DELETE FROM ProjectDeveloper WHERE prj_id='" . $_POST['id'] . "'");
    $db->query("DELETE FROM Projects WHERE id='" . $_POST['id'] . "'");
?>
