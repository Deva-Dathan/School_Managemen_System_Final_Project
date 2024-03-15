<?php
session_start();
include("../include/allotment_db.php");
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $app_no = $_SESSION['app_no'];
    $option_1 = $_POST['option_1'];
    $option_2 = $_POST['option_2'];
    $option_3 = $_POST['option_3'];
    $option_4 = $_POST['option_4'];

    // Insert data into the database
$sql = "INSERT INTO option_tbl(app_no, option_1, option_2, option_3, option_4) VALUES ('$app_no', '$option_1', '$option_2', '$option_3', '$option_4')";

if (mysqli_query($allot_conn, $sql)) {
    echo "<script>alert('OPTIONS SAVED.');</script>";
    header("Location:interested.php");
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($allot_conn);
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
<div class="col-md-12">
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
          if(isset($_SESSION['mark_success']))
          {
            ?>
          <div class="alert alert-success mt-3 text-center font-weight-bold" role="alert"><?php echo $_SESSION['mark_success'];?></div>
          <?php
            unset($_SESSION['mark_success']);
          }
          ?>

                <table class="table table-bordered" style="height:100px; margin-top:20px; text-align:center">
                <tbody>
                    <!-- First Row -->
            <tr>
                <td class="font-weight-bold">Add Option At</td>
                <td class="font-weight-bold">Course</td>
            </tr>
            <tr>
            <td>Option 1</td>
            <td>
    <select class="form-control" name="option_1">
    <option selected disabled>Choose....</option>
        <option value="Physics, Chemistry, Biology, Mathematics">Physics, Chemistry, Biology, Mathematics</option>
        <option value="Physics, Chemistry, Mathematics, Computer Science">Physics, Chemistry, Mathematics, Computer Science</option>
        <option value="Business Studies, Accountancy, Economics, Computer Application">Business Studies, Accountancy, Economics, Computer Application</option>
        <option value="History, Economics, Political Studies, Social Work">History, Economics, Political Studies, Social Work</option>
    </select>
</td>

            </tr>

                                <!-- Second Row -->
            <tr>
            <td>Option 2</td>
            <td>
    <select class="form-control" name="option_2">
    <option selected disabled>Choose....</option>
        <option value="Bio-Mathematics">Bio-Mathematics</option>
        <option value="Computer Mathematics">Computer Mathematics</option>
        <option value="Commerce">Commerce</option>
        <option value="Humanities">Humanities</option>
    </select>
</td>

            </tr>

                                <!-- Third Row -->
            <tr>
            <td>Option 3</td>
            <td>
    <select class="form-control" name="option_3">
    <option selected disabled>Choose....</option>
        <option value="Bio-Mathematics">Bio-Mathematics</option>
        <option value="Computer Mathematics">Computer Mathematics</option>
        <option value="Commerce">Commerce</option>
        <option value="Humanities">Humanities</option>
    </select>
</td>

            </tr>

                                <!-- Fourth Row -->
            <tr>
            <td>Option 4</td>
            <td>
    <select class="form-control" name="option_4">
    <option selected disabled>Choose....</option>
        <option value="Bio-Mathematics">Bio-Mathematics</option>
        <option value="Computer Mathematics">Computer Mathematics</option>
        <option value="Commerce">Commerce</option>
        <option value="Humanities">Humanities</option>
    </select>
</td>
            </tr>
        </tbody>
                    </table>
                    <div class="container d-flex justify-content-center align-items-center">
    <button class="btn btn-primary" type="submit" style="background-color:#004e95">Save Options</button>
</div>
                </div>
            </div>
        </div>

        <div>
    </div>
  </div>

</body>
</html>
