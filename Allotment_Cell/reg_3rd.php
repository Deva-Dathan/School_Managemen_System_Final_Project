<?php
session_start();
include("../include/allotment_db.php");
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $app_no = $_SESSION['app_no'];
    $mal1 = $_POST['mal1'];
    $mal2 = $_POST['mal2'];
    $english = $_POST['english'];
    $hindi = $_POST['hindi'];
    $maths = $_POST['maths'];
    $ss = $_POST['ss'];
    $physics = $_POST['physics'];
    $chemistry = $_POST['chemistry'];
    $biology = $_POST['biology'];
    $IT = $_POST['IT'];

    // Insert data into the database
$sql = "INSERT INTO candidate_mark(app_no, mal1, mal2, english, hindi, maths, ss, physics, chemistry, biology, IT) VALUES ('$app_no', '$mal1', '$mal2', '$english', '$hindi', '$maths', '$ss', '$physics', '$chemistry', '$biology', '$IT')";

if (mysqli_query($allot_conn, $sql)) {
$_SESSION['mark_success'] = "MARK INSERTED SUCCESSFULLY";
header("Location:reg_4th.php");
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($x);
}

// Close database allot_conn
mysqli_close($allot_conn);
}
?>
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
<!-- Top Navbar code starts here -->
<div class="topnav">
<img src="../assets/images/school_logo.png" alt="Your Logo" style="height: 50px; margin-left: 20px;">
<a href="allot_registration.php" class="font-weight-bold"><?php echo $_SESSION['app_no'];?></a>
<a href="allot_logout.php">Logout</a>
<a class="active" href="#home" style="color:black;">Home</a> 
</div>
<!-- Top Navbar code end here -->

<!-- Top heading code starts here -->
<h5 class="text-center mt-2" style="color:#706953; font-weight:bold; font-family: Arial, sans-serif;">Candidate Login (2024 - 2026)</h5>
<!-- Top heading code end here -->

<form method="post" class="needs-validation" novalidate>
<!-- SSLC School Details code starts here -->
<div class="container mt-5">
    <div class="row justify-content-center">
        
<!-- Qualifying Examination Details code starts here -->
<div class="col-md-6">
            <div class="card mb-5">
                <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
                    <h6 class="font-weight-bold">Grade Details</h6>
                </div>
                <div class="card-body">

                <div class="col-md-12 text-center" style="border: 1px solid #000;">
    <div class="row head-row" style="padding-top:20px;">
        <div class="col-md-12">
            <p class="font-weight-bold" style="display: inline;">Application Number :</p>
            <p style="display: inline;"> <?php echo $_SESSION['app_no'];?></p>
        </div>
    </div>
    <div class="row" style="padding-bottom:20px;">
        <div class="col-md-12">
            <p class="font-weight-bold" style="display: inline;">SSLC Exam Register Number : </p>
            <p style="display: inline;">
            <?php
                include("../include/allotment_db.php");
                $sql = "SELECT * FROM register_tbl WHERE app_no = {$_SESSION['app_no']}";
                $result = mysqli_query($allot_conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['reg_no'];
                ?>
            </p>
        </div>
    </div>
</div>

<?php
          if(isset($_SESSION['details_success']))
          {
            ?>
          <div class="alert alert-success mt-3 text-center font-weight-bold" role="alert"><?php echo $_SESSION['details_success'];?></div>
          <?php
            unset($_SESSION['details_success']);
          }
          ?>

                <table class="table table-bordered" style="height:100px; margin-top:20px; text-align:center">
                <tbody>
                <tr>
    <td class="font-weight-bold">SL. No</td>
    <td class="font-weight-bold">Paper Name</td>
    <td class="font-weight-bold">Mark</td>
</tr>
<tr>
    <td>1</td>
    <td>Malayalam I</td>
    <td><input type="number" class="form-control" style="height:30px;" id="grade1" name="mal1" required></td>
</tr>
<tr>
    <td>2</td>
    <td>Malayalam II</td>
    <td><input type="number" class="form-control" style="height:30px;" id="grade2" name="mal2" required></td>
</tr>
<tr>
    <td>3</td>
    <td>English</td>
    <td><input type="number" class="form-control" style="height:30px;" id="grade3" name="english" required></td>
</tr>
<tr>
    <td>4</td>
    <td>Hindi</td>
    <td><input type="number" class="form-control" style="height:30px;" id="grade4" name="hindi" required></td>
</tr>
<tr>
    <td>5</td>
    <td>Mathematics</td>
    <td><input type="number" class="form-control" style="height:30px;" id="grade5" name="maths" required></td>
</tr>
<tr>
    <td>6</td>
    <td>Social Science</td>
    <td><input type="number" class="form-control" style="height:30px;" id="grade6" name="ss" required></td>
</tr>
<tr>
    <td>7</td>
    <td>Physics</td>
    <td><input type="number" class="form-control" style="height:30px;" id="grade7" name="physics" required></td>
</tr>
<tr>
    <td>8</td>
    <td>Chemistry</td>
    <td><input type="number" class="form-control" style="height:30px;" id="grade8" name="chemistry" required></td>
</tr>
<tr>
    <td>9</td>
    <td>Biology</td>
    <td><input type="number" class="form-control" style="height:30px;" id="grade9" name="biology" required></td>
</tr>
<tr>
    <td>10</td>
    <td>Information Technology</td>
    <td><input type="number" class="form-control" style="height:30px;" id="grade10" name="IT" required></td>
</tr>
        </tbody>
                    </table>
                    <div class="container d-flex justify-content-center align-items-center">
    <button class="btn btn-primary" type="submit" style="background-color:#004e95">Submit</button>
</div>
                </div>
            </div>
        </div>

        <div>
    </div>
  </div>

</body>
</html>
