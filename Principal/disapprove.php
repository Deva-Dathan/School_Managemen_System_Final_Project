
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
    $sql1 = "DELETE FROM parent_data WHERE u_email='$delete_email'";
    $conn->query($sql1);
    $sql2 = "DELETE FROM user WHERE u_email='$delete_email'";
    $conn->query($sql2);
    $sql3 = "DELETE FROM user WHERE u_email='$parent_email'";
    $conn->query($sql3);
    $_SESSION['reject_msg'] = "STUDENT REJECTED";
    header("Location:approve_student.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>