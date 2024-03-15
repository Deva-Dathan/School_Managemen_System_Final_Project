
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "allotment_system";

// Create connection
$allot_conn = new mysqli($servername, $username, $password, $dbname);

$delete_allotment_type = $_GET['allotment_type'];
$sql = "DELETE FROM allotment_limit_data WHERE allotment_type='$delete_allotment_type'";

if ($allot_conn->query($sql) === TRUE) {
    $_SESSION['success_msg'] = "ALLOTMENT LIMIT DELETED SUCCESSFULLY";
    header("Location:set_limit.php");
} else {
  echo "Error deleting record: " . $allot_conn->error;
}

$allot_conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>