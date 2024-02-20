<?php
session_start();
// insert_marks.php

// Include your database connection
include("../include/db_connection.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if marks data and exam type are set and not empty
    if(isset($_POST['studentName']) && isset($_POST['rollNo']) && isset($_POST['email']) && isset($_POST['marks']) && isset($_POST['exam_type'])) {
        // Sanitize the input to prevent SQL injection
        $standard = $_POST['standard'];
        $subject = $_POST['subject'];
        $examType = $_POST['exam_type'];
        $studentNames = $_POST['studentName'];
        $rollNos = $_POST['rollNo'];
        $emails = $_POST['email'];
        $marks = $_POST['marks'];
        $examType = mysqli_real_escape_string($conn, $_POST['exam_type']);
        
        // Iterate over each set of marks
        for ($i = 0; $i < count($studentNames); $i++) {
            $studentName = mysqli_real_escape_string($conn, $studentNames[$i]);
            $rollNo = mysqli_real_escape_string($conn, $rollNos[$i]);
            $email = mysqli_real_escape_string($conn, $emails[$i]);
            $mark = mysqli_real_escape_string($conn, $marks[$i]);
            
            // Check if the marks exist for the given exam type and student
            $sql_check = "SELECT * FROM subject_mark WHERE u_name='$studentName' AND roll_no='$rollNo' AND u_email='$email'";
            $result_check = $conn->query($sql_check);
            
            if ($result_check->num_rows > 0) {
                // Marks exist for the given student, perform update based on exam type
                switch ($examType) {
                    case 'II Term':
                        $sql_update = "UPDATE subject_mark SET mark2='$mark' WHERE u_name='$studentName' AND roll_no='$rollNo' AND u_email='$email'";
                        break;
                    case 'Final Exam':
                        $sql_update = "UPDATE subject_mark SET mark3='$mark' WHERE u_name='$studentName' AND roll_no='$rollNo' AND u_email='$email'";
                        break;
                    default:
                        echo "Invalid exam type";
                        continue 2; // Skip to next iteration of the loop
                }
                
                if ($conn->query($sql_update) === TRUE) {
                    $_SESSION['success_msg'] = "MARKS INSERTED SUCCESSFULLY";
                    header("Location:upload_marks.php");
                } else {
                    echo "Error updating marks: " . $conn->error;
                }
            } else {
                // Marks do not exist for the given student, perform insert
                $sql_insert = "INSERT INTO subject_mark (roll_no, u_name, u_email, subject, standard, exam_type, mark1) VALUES ('$rollNo', '$studentName', '$email', '$subject', '$standard', '$examType', '$mark')";
                
                if ($conn->query($sql_insert) === TRUE) {
                    $_SESSION['success_msg'] = "MARKS INSERTED SUCCESSFULLY";
                    header("Location:upload_marks.php");
                } else {
                    echo "Error inserting marks: " . $conn->error;
                }
            }
        }
    } else {
        // If marks data or exam type is not set or empty, return an error message
        echo "Error: Marks data or exam type not provided";
    }
} else {
    // If form is not submitted, return an error message
    echo "Error: Form not submitted";
}

// Close the database connection
$conn->close();
?>
