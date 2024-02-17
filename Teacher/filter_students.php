<?php
// Establish database connection
include_once('../include/db_connection.php'); // Include your database connection file here
include("../header.php");
include("../footer.php");

// Check if the class parameter is provided in the request
if (isset($_GET['class'])) {
    // Sanitize the input to prevent SQL injection
    $class = mysqli_real_escape_string($conn, $_GET['class']);

    // Construct the SQL query to fetch student data for the specified class
    $sql = "SELECT * FROM student_data 
            INNER JOIN parent_data ON student_data.u_email = parent_data.u_email 
            INNER JOIN users ON parent_data.u_email = users.u_email 
            WHERE users.u_role = 'STUDENT' AND users.status = 1 AND student_data.standard = '$class'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Display student data in table rows
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr align='center'>
    <td><?php echo $row['u_name']; ?></td>
    <td><?php echo $row['parent_name']; ?></td>
    <td><?php echo $row['standard']; ?></td>
    <td>
        <button data-u_email='<?php echo $row['u_email']; ?>' class='view-details btn btn-outline-primary' data-toggle='modal' data-target='#exampleModalCenter'>
            <i class='bx bx-expand'></i>
        </button>
    </td>
</tr>

            <?php
        }
    } else {
        echo "<tr><td colspan='6' class='text-center'>No student records found for class $class</td></tr>";
    }
} else {
    echo "<tr><td colspan='6' class='text-center'>Invalid request</td></tr>";
}

// Close database connection
mysqli_close($conn);
?>

