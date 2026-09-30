<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "library";

$conn = new mysqli('localhost', 'root', '', 'library');

if($conn->connect_error) {
    die('Database connect error' . $conn->connect_error);
} 
?>