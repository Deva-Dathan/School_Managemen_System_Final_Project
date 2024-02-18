<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['standard'])) {

    $standard = $_POST['standard'];
    $loged_user = $_SESSION['u_email'];
    
    $sql = "SELECT u_subject FROM subject_teacher WHERE standard = '$standard' AND u_email = '$loged_user'";
    $result = $conn->query($sql);

    // Create options based on the result
    $options = '<option selected disabled>Choose...</option>';
    while($row = $result->fetch_assoc()) {
        $options .= '<option value="'.$row['u_subject'].'">'.$row['u_subject'].'</option>';
    }

    // Return the options as the response
    echo $options;
} else {
    // Handle if standard is not set
    echo '<option selected disabled>Error: Standard not set</option>';  
}
?>
