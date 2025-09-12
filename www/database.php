<?php

$dbname = "Plushiess";

// Correct mysqli_connect parameters: host, username, password, database name
$conn = new PDO("mysql:host=mariadb;dbname=$dbname", "root", "password");

if (!$conn) {
    // Better error message
    die("Connection failed: " . $conn->errorInfo()[2]);
}
?>