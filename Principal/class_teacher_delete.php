
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$delete_email = $_GET['u_email'];
$sql = "DELETE FROM class_teacher WHERE u_email='$delete_email'";

if ($conn->query($sql) === TRUE) {
    $sql1 = "UPDATE users SET u_role='TEACHER' WHERE u_email='$delete_email'";
    $conn->query($sql1);
    $_SESSION['success_msg'] = "BACK TO TEACHER";
    header("Location:class_teacher.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>