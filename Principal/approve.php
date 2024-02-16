
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$approve_email = $_GET['u_email'];
$sql = "UPDATE student_data SET status=1 WHERE u_email='$approve_email'";

if ($conn->query($sql) === TRUE) {
    $sql = "INSERT INTO users (id, u_name, u_gender, u_email, u_pass, u_role, u_address, u_mobile, u_city, u_district, u_state, u_zip) VALUES ('$uid', '$fullname', '$gender', '$email', '$password', 'STUDENT', '$address', '$mobile', '$city', '$district', '$state', '$zip')";
    $conn->query($sql1);
    $_SESSION['success_msg'] = "STUDENT RECORD DELETED";
    header("Location:add_students.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>