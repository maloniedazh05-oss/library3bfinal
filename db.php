<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "library";

$conn = new mysqli($host, $username, $password, $database);

if($conn->connect_error) {
    die('Database connect error' . $conn->connect_error);
} 
?>