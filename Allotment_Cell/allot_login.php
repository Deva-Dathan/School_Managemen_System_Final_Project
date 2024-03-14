
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/images/school_logo.png" type="image/x-icon">
  <title>CANDIDATE LOGIN</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .card {
      width: 400px;
      margin: auto;
      margin-top: 30px;
    }
    small{
        font-weight:bold;
        font-size:15px;
    }
  </style>
</head>
<body>
  <div class="arrow" style="margin-top:-550px;">
  <a href="../landing_page.php"><i class='bx bx-left-arrow-alt' style="font-size:28px;"></i></a>
  </div>
<?php include("../loader.php");?>
  <div class="container">
  
  <?php
          if(isset($_SESSION['register_success']))
          {
            ?>
          <div class="alert alert-success mt-3 font-weight-bold" role="alert"><?php echo $_SESSION['register_success'];?></div>
          <?php
            unset($_SESSION['register_success']);
          }
          ?>

<?php
session_start();
include("../include/allotment_db.php");


$sql = "SELECT * FROM register_tbl";
$result = mysqli_query($allot_conn, $sql);

// Check if the query was successful
if ($result) {
    // Check if there are rows returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch each row as an associative array
        while ($row = mysqli_fetch_assoc($result)) 
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
          if($_POST['candidateNo'] == $row['app_no'] && $_POST['dob'] == $row['dob'])
          {
            $sql1 = "SELECT * FROM option_tbl WHERE app_no = {$_POST['candidateNo']}";
            $result1 = mysqli_query($allot_conn, $sql1);
            if (mysqli_num_rows($result) > 0)
            {
              $_SESSION['app_no'] = $row['app_no'];
              header("Location:allotment_page.php");
            }
            else
            {
              $_SESSION['app_no'] = $row['app_no'];
              header("Location:reg_2nd.php");
            }
          }
          else
          {
            ?>
            <div class="alert alert-success mt-3 font-weight-bold" role="alert">CANDIDATE NUMBER OR PASSWORD IS WRONG</div>
            <?php
          }
          }
        }
    } 
}

// Close the database connection
mysqli_close($allot_conn);
?>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center font-weight-bold">CANDIDATE LOGIN</h4>
          </div>
          <div class="card-body">
            <form method="POST">
              <div class="form-group">
                <label for="candidateNo">Candidate Number</label>
                <input type="text" name="candidateNo" id="candidateNo" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control" min="2005-01-01" max="2009-12-31" required>
              </div>
              <div class="form-group">
                <a href="forgot_password.php" class="float-right">Forgot Password?</a>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
          </div>
          <div class="card-footer">
            <small>New User ? <a href="allot_registration.php">Register here</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
