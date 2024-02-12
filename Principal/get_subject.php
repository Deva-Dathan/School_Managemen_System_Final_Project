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

if(isset($_POST['teacher_name'])) {

    $teacherName = $_POST['teacher_name'];
    
    // Assuming 'teachers_data' table has a column named 'u_email'
    $sql = "SELECT u_email, u_qualification FROM teachers_data WHERE u_name = '$teacherName'";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['u_qualification'];
    } else {
        echo ""; // If no email found
    }
}
?>
