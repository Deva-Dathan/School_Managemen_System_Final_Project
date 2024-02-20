<?php
// get_student_data.php

// Include your database connection
include("../include/db_connection.php");

// Check if standard is set and not empty
if(isset($_POST['standard']) && !empty($_POST['standard'])) {
    // Sanitize the input to prevent SQL injection
    $standard = mysqli_real_escape_string($conn, $_POST['standard']);

    // Query to fetch student data for the selected standard
    $sql = "SELECT * FROM student_data WHERE standard = '$standard' ORDER BY u_name";

    // Execute the query
    $result = $conn->query($sql);

    // Check if query executed successfully
    if ($result) {
        // Fetch all rows as an associative array
        $student_data = array();
        while($row = $result->fetch_assoc()) {
            $student_data[] = $row;
        }
        
        // Return student data as JSON response
        echo json_encode($student_data);
    } else {
        // If query fails, return an error message
        echo json_encode(array('error' => 'Unable to fetch student data'));
    }
} else {
    // If standard is not set or empty, return an error message
    echo json_encode(array('error' => 'Standard not provided'));
}

// Close the database connection
$conn->close();
?>
