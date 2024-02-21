<?php
session_start();
// insert_marks.php

// Include your database connection
include("../include/db_connection.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if marks data and exam type are set and not empty
    if(isset($_POST['studentName']) && isset($_POST['rollNo']) && isset($_POST['email']) && isset($_POST['marks'])) {
        // Sanitize the input to prevent SQL injection
        $standard = $_POST['standard'];
        $subject = $_POST['subject'];
        $studentNames = $_POST['studentName'];
        $rollNos = $_POST['rollNo'];
        $emails = $_POST['email'];
        $marks = $_POST['marks'];
        
        // Iterate over each set of marks
        for ($i = 0; $i < count($studentNames); $i++) {
            $studentName = mysqli_real_escape_string($conn, $studentNames[$i]);
            $rollNo = mysqli_real_escape_string($conn, $rollNos[$i]);
            $email = mysqli_real_escape_string($conn, $emails[$i]);
            $mark = mysqli_real_escape_string($conn, $marks[$i]);
            
            // Check if the marks exist for the given exam type and student
            $sql_check = "SELECT * FROM internal_mark WHERE u_name='$studentName' AND roll_no='$rollNo' AND u_email='$email'";
            $result_check = $conn->query($sql_check);
            
            if ($result_check->num_rows > 0) {
        
                if ($conn->query($sql_update) === TRUE) {
                    $_SESSION['success_msg'] = "INTERNAL MARKS INSERTED SUCCESSFULLY";
                    header("Location:internal_marks.php");
                } else {
                    echo "Error updating marks: " . $conn->error;
                }
            } else {
                // Marks do not exist for the given student, perform insert
                $sql_insert = "INSERT INTO internal_mark (roll_no, u_name, u_email, standard, subject, inter_mark) VALUES ('$rollNo', '$studentName', '$email', '$standard', '$subject', '$mark')";
                
                if ($conn->query($sql_insert) === TRUE) {
                    $_SESSION['success_msg'] = "INTERNAL MARKS INSERTED SUCCESSFULLY";
                    header("Location:internal_marks.php");
                } else {
                    echo "Error inserting marks: " . $conn->error;
                }
            }
        }
    } 
} else {
    // If form is not submitted, return an error message
    echo "Error: Form not submitted";
}

// Close the database connection
$conn->close();
?>
