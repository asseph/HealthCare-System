<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "doctor";

// Create connection
$con = new mysqli($servername, $username, $password, $db);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>