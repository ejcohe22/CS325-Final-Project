<?php
    // Names: Samuel Munoz
    // Names: Erik Cohen
?>

<?php
session_start();
unset($_SESSION['email']);
$_SESSION['is_login'] = 0;
header("Location: index.php");
?>
