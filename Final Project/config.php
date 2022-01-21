<?php
$conn = new mysqli('localhost:3306', 'root', 'placeholder', 'inventory');
 
if ($conn->connect_errno) {
    echo "Error: " . $conn->connect_error;
}
?>
