<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "supermarket";
$port = 3306; // Change this if your MySQL server is using a different port

$conn = new mysqli($servername, $username, $password, $database, $port);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
