<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "allotment_system";

// Create connection
$allot_conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($allot_conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>