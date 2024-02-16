
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$approve_email = $_GET['u_email'];
$parent_email = $_GET['parent_email'];
$sql = "UPDATE student_data SET status=1 WHERE u_email='$approve_email'";

if ($conn->query($sql) === TRUE) {
  $sql1 = "UPDATE users SET status=1 WHERE u_email = '$approve_email'";
  $conn->query($sql1);
  $sql2 = "UPDATE users SET status=1 WHERE u_email = '$parent_email'";
  $conn->query($sql2);
    $_SESSION['success_msg'] = "STUDENT APPROVED";
    header("Location:approve_student.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>