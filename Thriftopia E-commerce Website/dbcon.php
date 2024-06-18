<?php
$dbserver = "localhost";
$username = "root";
$password = "";
$dbname = "thriftopia";

// Create connection
$conn = new mysqli($dbserver, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>