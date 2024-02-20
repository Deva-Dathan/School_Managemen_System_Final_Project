<?php
// get_student_count.php

// Include your database connection
include("../include/db_connection.php");

// Check if standard is set and not empty
if(isset($_POST['standard']) && !empty($_POST['standard'])) {
    // Sanitize the input to prevent SQL injection
    $standard = mysqli_real_escape_string($conn, $_POST['standard']);

    // Query to count the number of students for the selected standard
    $sql = "SELECT COUNT(u_name) as student_count FROM student_data WHERE standard = '$standard'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if query executed successfully
    if ($result) {
        // Fetch the result
        $row = $result->fetch_assoc();
        
        // Get the student count
        $student_count = $row['student_count'];
        
        // Return the student count as response
        echo $student_count;
    } else {
        // If query fails, return an error message
        echo "Error: Unable to execute query";
    }
} else {
    // If standard is not set or empty, return an error message
    echo "Error: Standard not provided";
}

// Close the database connection
$conn->close();
?>
