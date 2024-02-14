
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$delete_email = $_GET['u_email'];
$sql = "DELETE FROM subject_teacher WHERE u_email='$delete_email'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success_msg'] = "RECORD DELETED";
    header("Location:subject_teacher.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>