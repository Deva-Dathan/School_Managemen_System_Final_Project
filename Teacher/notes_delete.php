
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$delete_subject = $_GET['subject'];
$title = $_GET['title'];
$sql = "DELETE FROM subject_notes WHERE subject = '$delete_subject' AND file_title = '$title'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success_msg'] = "NOTES DELETED";
    header("Location:subject_notes.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>