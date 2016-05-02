<?php

$host = "localhost";
$user = "root";
$password = "Entombed1290";
$dbName = "assign2_ser322";
$port = 3306;

$conn = new mysqli($host,$user,$password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>