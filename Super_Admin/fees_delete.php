
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$delete_standard= $_GET['standard'];
$sql = "DELETE FROM update_fees WHERE standard='$delete_standard'";

if ($conn->query($sql) === TRUE) {
    header("Location:update_fees.php");
    echo '<script>Swal.fire({
        title: "SUBJECT RECORD DELETED SUCCESSFULLY",
        text: "Performed Successfully",
        icon: "success"
      });</script>';
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>