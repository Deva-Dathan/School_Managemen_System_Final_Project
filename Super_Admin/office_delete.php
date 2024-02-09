
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$delete_email = $_GET['u_email'];
$sql = "DELETE FROM users WHERE u_email='$delete_email'";

if ($conn->query($sql) === TRUE) {
    $sql1 = "DELETE FROM office_data WHERE u_email='$delete_email'";
    $conn->query($sql1);
    $_SESSION['success_msg'] = "OFFICE STAFF RECORD DELETED SUCCESSFULLY";
    header("Location:add_office.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>