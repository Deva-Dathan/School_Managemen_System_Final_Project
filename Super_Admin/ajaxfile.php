<style>
    .label_name{
        width:150px;
        display: inline-block;
        font-weight:bold;
    }
    .label_dot{
        width:70px;
        display: inline-block;
        font-weight:bold;
    }
</style>

<?php
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

$u_email = $_POST['u_email'];
$sql = "SELECT * FROM student_data INNER JOIN parent_data ON student_data.u_email=parent_data.u_email WHERE student_data.u_email = '$u_email'";
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) )
{
//  echo $row['id'];
 
?>
<table border='0' width='100%'>
<tr>
    <td>
    <p><label class="label_name">Name</label><label class="label_dot">:</label><?php echo $row['u_name']; ?></p>
    <p><label class="label_name">Gender</label><label class="label_dot">:</label><?php echo $row['u_gender'];?></p>
    <p><label class="label_name">E-Mail</label><label class="label_dot">:</label><?php echo $row['u_email']; ?></p>
    <p><label class="label_name">Parent Name</label><label class="label_dot">:</label><?php echo $row['parent_name']; ?></p>
    <p><label class="label_name">Parent E-Mail</label><label class="label_dot">:</label><?php echo $row['parent_email']; ?></p>
    <p><label class="label_name">Date-Of-Birth</label><label class="label_dot">:</label><?php echo date('d-M-Y', strtotime($row['u_dob']));?></p>
    <p><label class="label_name">Standard</label><label class="label_dot">:</label><?php echo $row['standard']; ?></p>
    <p><label class="label_name">Mobile Number</label><label class="label_dot">:</label><?php echo $row['u_mobile']; ?></p>
    <p><label class="label_name">Address</label><label class="label_dot">:</label><?php echo $row['u_address']; ?></p>
    <p><label class="label_name">City</label><label class="label_dot">:</label><?php echo $row['u_city']; ?></p>
    <p><label class="label_name">District</label><label class="label_dot">:</label><?php echo $row['u_district']; ?></p>
    <p><label class="label_name">State</label><label class="label_dot">:</label><?php echo $row['u_state']; ?></p>
    <p><label class="label_name">Zip Code</label><label class="label_dot">:</label><?php echo $row['u_zip']; ?></p>
    </td>
</tr>
</table>
 
<?php
}
?>