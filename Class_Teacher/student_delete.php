
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$delete_email = $_GET['u_email'];
$parent_email = $_GET['parent_email'];

$sql = "DELETE FROM student_data WHERE u_email='$delete_email'";

if ($conn->query($sql) === TRUE) {
    $sql_users = "DELETE FROM users WHERE u_email='$delete_email'";
    $conn->query($sql_users);
    $sql1 = "DELETE FROM parent_data WHERE u_email='$delete_email'";
    $conn->query($sql1);
    $sql2 = "DELETE FROM users WHERE u_email='$parent_email'";
    $conn->query($sql2);
    $_SESSION['success_msg'] = "STUDENT RECORD DELETED";
    header("Location:view_students.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>