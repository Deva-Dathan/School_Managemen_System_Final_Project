
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$delete_subject = $_GET['subject'];
$delete_no = $_GET['activityNo'];
$sql = "DELETE FROM upload_activity WHERE subject = '$delete_subject' AND activity_no = '$delete_no'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success_msg'] = "ACTIVITY UNSUBMITTED";
    header("Location:view_activity.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>