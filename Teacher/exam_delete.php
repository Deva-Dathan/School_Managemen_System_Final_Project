
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$delete_subject = $_GET['subject'];
$delete_id = $_GET['exam_id'];

$sql = "DELETE FROM exam_questions WHERE subject = '$delete_subject' AND online_exam_id = '$delete_id'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success_msg'] = "ONLINE EXAM DELETED";
    header("Location:create_online_exam.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>