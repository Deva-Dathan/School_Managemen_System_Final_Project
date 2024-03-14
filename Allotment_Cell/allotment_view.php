

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/images/school_logo.png" type="image/x-icon">
  <title>Candidate Login (2024 - 2026)</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    /* Style the navigation bar */
    *{
        margin:0;
        top:0;
        left:0;
        font-family: Arial, sans-serif;
    }
    .topnav {
      overflow: hidden;
      background-color: #004e8e; /* Background color */
    }

    /* Style the links inside the navigation bar */
    .topnav a {
      float: right; /* Align content to the right */
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    /* Add a color to the active/current link */
    .active {
      background-color: #fff;
      border-bottom:1px solid #000;
      font-weight:bold;
    }

    /* Custom CSS for uppercase text */
    .col-form-label {
      text-transform: uppercase; /* Convert text to uppercase */
      font-weight: bold;
    }
  </style>
</head>
<body>
<?php include("../loader.php");?>

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-12"> <!-- Adjusted to col-md-12 -->
        <div class="card mb-5">
          <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
            <h6 class="font-weight-bold">SSLC School Details</h6>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td class="text-uppercase font-weight-bold w-25">Application Number</td>
                  <td class="text-center font-weight-bold" style="color:green;"><?php echo $_GET['app_no'];?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
<!-- SSLC School Details code ends here -->


<!-- Qualifying Examination Details code starts here -->
      <div class="col-md-6">
            <div class="card mb-5" style="height:400px;"    >
                <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
                    <h6 class="font-weight-bold">Qualifying Examination Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">Qualifying Exam</td>
                                <td>SSLC (2022-2024)</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Register No</td>
                                <td>
                                    <?php
                                    include("../include/allotment_db.php");
                                    $sql = "SELECT * FROM register_tbl WHERE app_no = {$_GET['app_no']}";
                                    $result = mysqli_query($allot_conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['reg_no'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Month pass</td>
                                <td>
                                <?php
                                    include("../include/allotment_db.php");
                                    $sql = "SELECT * FROM register_tbl WHERE app_no = {$_GET['app_no']}";
                                    $result = mysqli_query($allot_conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo strtoupper($row['pass_month']);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Year pass</td>
                                <td>
                                <?php
                                    include("../include/allotment_db.php");
                                    $sql = "SELECT * FROM register_tbl WHERE app_no = {$_GET['app_no']}";
                                    $result = mysqli_query($allot_conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['pass_year'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Passed in Board exam</td>
                                <td>YES</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Studied Here</td>
                                <td>
                                <?php
                                    include("../include/allotment_db.php");
                                    $sql = "SELECT * FROM register_tbl WHERE app_no = {$_GET['app_no']}";
                                    $result = mysqli_query($allot_conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo strtoupper($row['studied_not']);
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<!-- Qualifying Examination Details code ends here -->

        
<!-- Qualifying Examination Details code starts here -->
<?php
include("../include/allotment_db.php");
$sql = "SELECT * FROM candidate_data WHERE app_no = {$_GET['app_no']}";
$result = mysqli_query($allot_conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
?>
<div class="col-md-6">
            <div class="card mb-5" style="height:400px;">
                <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
                    <h6 class="font-weight-bold">Personal Details</h6>
                </div>
                <div class="card-body">
                <table class="table table-bordered" style="height:100px;">
                        <tbody>
                        <tr>
    <td class="font-weight-bold">Name</td>
    <td><?php echo $row['name'];?></td>
</tr>
<tr>
    <td class="font-weight-bold">Gender</td>
    <td><?php echo $row['gender']; ?></td>
</tr>

<tr>
                                <td class="font-weight-bold">Date of Birth</td>
                                <td><?php echo $row['dob'];?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Father's Name</td>
                                <td><?php echo $row['father_name'];?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Mother's Name</td>
                                <td><?php echo $row['mother_name'];?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Mobile Number</td>
                                <td><?php echo $row['mobile'];?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<!-- Qualifying Examination Details code ends here -->

<!-- Permanent Address Details code starts here -->
<div class="col-md-6">
            <div class="card mb-5">
                <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
                    <h6 class="font-weight-bold">Permanent Address</h6>
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                        <tbody>
                        <tr>
    <td class="font-weight-bold">House No/ House Name</td>
    <td><?php echo $row['address'];?></td>
</tr>
<tr>
    <td class="font-weight-bold">Locality</td>
    <td><?php echo $row['locality'];?></td>
</tr>
<tr>
    <td class="font-weight-bold">Post office</td>
    <td><?php echo $row['post_office'];?></td>
</tr>
<tr>
    <td class="font-weight-bold">Village</td>
    <td><?php echo $row['village']; ?></td>
</tr>
<tr>
    <td class="font-weight-bold">City</td>
    <td><?php echo $row['city']; ?></td>
</tr>
<tr>
    <td class="font-weight-bold">District</td>
    <td><?php echo $row['district']; ?></td>
</tr>
<tr>
    <td class="font-weight-bold">State</td>
    <td><?php echo $row['state']; ?></td>
</tr>
<tr>
    <td class="font-weight-bold">Pin code</td>
    <td><?php echo $row['zip']; ?></td>
</tr>
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
<!-- Permanent Address Details code ends here -->
<?php
}
?>


<?php
include("../include/allotment_db.php");
$sql = "SELECT * FROM communication_address WHERE app_no = {$_GET['app_no']}";
$result = mysqli_query($allot_conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
?>
<!-- Communication Address Details code starts here -->
<div class="col-md-6">
            <div class="card mb-5">
            <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h6 class="font-weight-bold">Communication Address</h6>
            </div>
        </div>
    </div>


        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
    <td class="font-weight-bold">House No/ House Name</td>
    <td><?php echo $row['address']; ?></td>
</tr>
<tr>
    <td class="font-weight-bold">Locality</td>
    <td><?php echo $row['locality']; ?></td>
</tr>
<tr>
    <td class="font-weight-bold">Post office</td>
    <td><?php echo $row['post_office']; ?></td>
</tr>
<tr>
    <td class="font-weight-bold">Village</td>
    <td><?php echo $row['village']; ?></td>
</tr>
<tr>
    <td class="font-weight-bold">City</td>
    <td><?php echo $row['city']; ?></td>
</tr>
<tr>
    <td class="font-weight-bold">District</td>
    <td><?php echo $row['district']; ?></td>
</tr>
<tr>
    <td class="font-weight-bold">State</td>
    <td><?php echo $row['state']; ?></td>
</tr>
<tr>
    <td class="font-weight-bold">Pin code</td>
    <td><?php echo $row['zip']; ?></td>
</tr>
<?php
}
?>
                </tbody>
            </table>
                    </div>
            </div>
        </div>
<!-- Communication Address Details code ends here -->


<!-- Qualifying Examination Details code starts here -->
<div class="col-md-6">
            <div class="card mb-5">
                <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
                    <h6 class="font-weight-bold">Grade Details</h6>
                </div>
                <div class="card-body">

                <table class="table table-bordered" style="height:100px; margin-top:20px; text-align:center">
                <tbody>
                <tr>
    <td class="font-weight-bold">SL. No</td>
    <td class="font-weight-bold">Paper Name</td>
    <td class="font-weight-bold">Mark</td>
</tr>
<?php
include("../include/allotment_db.php");
$sql = "SELECT * FROM candidate_mark WHERE app_no = {$_GET['app_no']}";
$result = mysqli_query($allot_conn, $sql);
$row = mysqli_fetch_assoc($result)
?>
<tr>
    <td>1</td>
    <td>Malayalam I</td>
    <td><?php echo $row['mal1'];?></td>
</tr>
<tr>
    <td>2</td>
    <td>Malayalam II</td>
    <td><?php echo $row['mal2'];?></td>
</tr>
<tr>
    <td>3</td>
    <td>English</td>
    <td><?php echo $row['english'];?></td>
</tr>
<tr>
    <td>4</td>
    <td>Hindi</td>
    <td><?php echo $row['hindi'];?></td>
</tr>
<tr>
    <td>5</td>
    <td>Mathematics</td>
    <td><?php echo $row['maths'];?></td>
</tr>
<tr>
    <td>6</td>
    <td>Social Science</td>
    <td><?php echo $row['ss'];?></td>
</tr>
<tr>
    <td>7</td>
    <td>Physics</td>
    <td><?php echo $row['physics'];?></td>
</tr>
<tr>
    <td>8</td>
    <td>Chemistry</td>
    <td><?php echo $row['chemistry'];?></td>
</tr>
<tr>
    <td>9</td>
    <td>Biology</td>
    <td><?php echo $row['biology'];?></td>
</tr>
<tr>
    <td>10</td>
    <td>Information Technology</td>
    <td><?php echo $row['IT'];?></td>
</tr>
        </tbody>
                    </table>
                </div>
            </div>
        </div>


<!-- Option Details code starts here -->
<div class="col-md-12"> <!-- Adjusted to col-md-12 -->
        <div class="card mb-5">
          <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
            <h6 class="font-weight-bold">Options Selected</h6>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tbody>
              <?php
include("../include/allotment_db.php");
$sql = "SELECT * FROM option_tbl WHERE app_no = {$_GET['app_no']}";
$result = mysqli_query($allot_conn, $sql);
$row = mysqli_fetch_assoc($result)
?>
                <tr>
                  <td class="text-uppercase font-weight-bold w-25">Option 1</td>
                  <td class="text-center"><?php echo $row['option_1'];?></td>
                </tr>

                <tr>
                  <td class="text-uppercase font-weight-bold w-25">Option 2</td>
                  <td class="text-center"><?php echo $row['option_2'];?></td>
                </tr>

                <tr>
                  <td class="text-uppercase font-weight-bold w-25">Option 3</td>
                  <td class="text-center"><?php echo $row['option_3'];?></td>
                </tr>

                <tr>
                  <td class="text-uppercase font-weight-bold w-25">Option 4</td>
                  <td class="text-center"><?php echo $row['option_4'];?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
<!-- Option Details code ends here -->



<div>
  


    <a href="registered_students.php" class="btn btn-primary" type="submit" style="background-color:#004e95">Go Back</a>
</form>

    </div>
  </div>


</body>
</html>
