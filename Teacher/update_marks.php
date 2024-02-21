<?php
session_start();
include("../include/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $rollNo = $_POST['rollNo'];
    $subject = $_POST['subject'];
    $standard = $_POST['standard'];
    $mark1 = $_POST['mark1'];
    $mark2 = $_POST['mark2'];
    $mark3 = $_POST['mark3'];
    
    // Update marks in the database
    $sql = "UPDATE subject_mark SET mark1='$mark1', mark2='$mark2', mark3='$mark3' WHERE roll_no='$rollNo' AND subject='$subject' AND standard='$standard'";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_msg'] = "MARK UPDATED SUCCESSFULLY";
        header("Location:upload_mark.php");
    } else {
        $_SESSION['error_msg'] = "ERROR UPDATING MARKS " . mysqli_error($conn);
        header("Location:upload_mark.php");
    }
}

// Close connection
mysqli_close($conn);
?>
