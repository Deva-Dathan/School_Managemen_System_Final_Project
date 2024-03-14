<?php
session_start();
include("../include/allotment_db.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  // Generate a unique application number using current timestamp
  $app_no = time();
  
  // Retrieve values from POST data
  $reg_no = $_POST['reg_no'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $dob = $_POST['dob'];
  $email_id = $_POST['email_id'];
  $studied_not = $_POST['studied_not'];
  
  // Prepare the SQL query
  $sql = "INSERT INTO register_tbl(app_no, reg_no, pass_month, pass_year, dob, email_id, studied_not) VALUES ($app_no,'$reg_no','$month',$year,'$dob','$email_id','$studied_not')";

  // Execute the query
  $result = mysqli_query($allot_conn, $sql);

  // Check if the query was successful
  if($result) {
    $_SESSION['register_success'] = "CANDIDATE REGISTRATION SUCCESSFULL";
    header("Location:allot_login.php");
  } else {
    echo "Error: " . mysqli_error($allot_conn);
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/images/school_logo.png" type="image/x-icon">
  <title>Candidate Registration</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
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
      <div class="col-md-6">
        <div class="card mb-5">
          <div class="card-header">
            <h4 class="text-center">Candidate Registration Form</h4>
          </div>
          <div class="card-body">
            <form method="POST">
              <div class="border rounded p-3 mb-3">
              <div class="mb-3 row align-items-center">
                  <label for="studiedHere" class="col-sm-4 col-form-label">Studied 10th Standard Here?</label>
                  <div class="col-sm-8">
                    <select class="form-select" name="studied_not" id="studiedHere" required>
                      <option value="" selected disabled>Select</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row align-items-center">
                  <label for="registerNo" class="col-sm-4 col-form-label">Register No.</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="reg_no" id="registerNo" required>
                  </div>
                </div>
                <div class="mb-3 row align-items-center">
                  <label for="monthPass" class="col-sm-4 col-form-label">Month pass</label>
                  <div class="col-sm-8">
                    <select class="form-select" name="month" id="monthPass" required>
                    <option value="" selected disabled>Select Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row align-items-center">
                  <label for="yearPass" class="col-sm-4 col-form-label">Year pass</label>
                  <div class="col-sm-8">
                    <select class="form-select" name="year" id="yearPass" required>
                      <option value="" selected disabled>Select Year</option>
                      <?php
                        $currentYear = date("Y");
                        for ($i = $currentYear; $i >= $currentYear - 5; $i--) {
                          echo "<option value='$i'>$i</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row align-items-center">
                  <label for="dob" class="col-sm-4 col-form-label">Date of Birth (DD-MM-YYYY)</label>
                  <div class="col-sm-8">
                  <input type="date" class="form-control" name="dob" id="dob" min="2005-01-01" max="2009-12-31" required>
                  </div>
                </div>
                <div class="mb-3 row align-items-center">
                  <label for="emailid" class="col-sm-4 col-form-label">E-mail ID</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" name="email_id" id="emailid" required>
                  </div>
                </div>

                <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary" style="width: 200px;">Register</button>
              </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
