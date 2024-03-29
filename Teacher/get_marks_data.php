<?php
session_start();
include("../include/db_connection.php");

$login_email = $_SESSION['u_email'];
$standard = $_POST['standard'];
$subject = $_POST['subject'];
// Use parentheses to properly group the conditions
$sql = "SELECT * FROM subject_mark WHERE standard = '$standard' AND subject='$subject' AND (mark1 < 0 OR mark2 < 0 OR mark3 < 0)";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    ?>
    <tr>
        <th>Roll No</th>
        <th>Name</th>
        <th>STD</th>
        <th>Subject</th>
        <th>I<sup>st</sup> Term</th>
        <th>II<sup>st</sup> Term</th>
        <th>Final Exam</th>
        <th>Exam Score</th>
        <th>Predict</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr align="center">
            <td><?php echo $row['roll_no']; ?></td>
            <td><?php echo $row['u_name']; ?></td>
            <td><?php echo $row['standard']; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td>
            <?php
                if(number_format($row['mark1'], 2) > 0)
                {
                    echo number_format($row['mark1'], 2);
                }
                else
                {
                    echo '<span style="color: red; font-weight:bold;">ABSENT</span>';
                }
                ?>
            </td>
            <td>
            <?php
                if(number_format($row['mark2'], 2) > 0)
                {
                    echo number_format($row['mark2'], 2);
                }
                else
                {
                    echo '<span style="color: red; font-weight:bold;">ABSENT</span>';
                }
                ?>
            </td>
            <td>
            <?php
                if(number_format($row['mark3'], 2) > 0)
                {
                    echo number_format($row['mark3'], 2);
                }
                else
                {
                    echo '<span style="color: red; font-weight:bold;">ABSENT</span>';
                }
                ?>
            </td>
            <td><?php echo number_format((($row['mark1'] + $row['mark2'] + $row['mark3']) * 100) / 300, 2); ?></td>
            <td>
                <a href="predict_function.php?email=<?php echo $row['u_email'];?>&std=<?php echo $row['standard'];?>&subject=<?php echo $row['subject'];?>"><button class="btn btn-primary edit-btn"><i class='bx bx-search-alt-2'></i></button></a>
            </td>
        </tr>
        <?php
    }
} else {
    echo '<tr><td colspan="9" class="alert alert-danger font-weight-bold text-center" role="alert">NO RECORD PREDICTION FOUND....!</td></tr>';
}
?>
