<?php
session_start();
unset($_SESSION['email']);
$_SESSION['is_login'] = 0;
header("Location: index.php");
?>
