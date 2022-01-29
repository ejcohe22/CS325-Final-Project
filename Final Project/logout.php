<?php
    // Names: Samuel Munoz
    // Names: Erik Cohen
    // Purpose: logs out the user by remove the _SESSION variables
?>

<?php
session_start();
unset($_SESSION['email']);
$_SESSION['is_login'] = 0;
header("Location: index.php");
?>
