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

$id = $_POST['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) )
{
//  echo $row['id'];
 
?>
<table border='0' width='100%'>
<tr>
    <?php 
    if($row['u_image'] == NULL)
    {
    ?>
        <td width="300" align=center><img src="../assets/images/no_image.jpg" width=150 height=200 style="border:1px solid #f5f5f5; border-radius:15px;">
    <?php
    }
    else{
    ?>
        <td width="300" align=center><img src="../uploads/<?php echo $row['u_image']; ?>" width=150 height=200 style="border:1px solid #f5f5f5; border-radius:15px;">
    <?php
    }
    ?>
    <td>
    <p><label class="label_name">ID</label><label class="label_dot">:</label><?php echo $row['id']; ?></p>
    <p><label class="label_name">Name</label><label class="label_dot">:</label><?php echo $row['u_name']; ?></p>
    <p><label class="label_name">Designation</label><label class="label_dot">:</label><?php echo $row['u_role'];?></p>
    <p><label class="label_name">E-Mail</label><label class="label_dot">:</label><?php echo $row['u_email']; ?></p>
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