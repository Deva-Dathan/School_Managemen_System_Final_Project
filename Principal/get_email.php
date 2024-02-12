<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['teacher_name'])) {
    $teacherName = $_POST['teacher_name'];

    $sql = "SELECT u_email FROM teachers_data WHERE u_name = '$teacherName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['u_email'];
    } else {
        echo "Email Not found";
    }
} else {
    echo "Invalid request";
}

?>

