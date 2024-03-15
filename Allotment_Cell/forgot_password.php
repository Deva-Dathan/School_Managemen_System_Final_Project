
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
include("../include/allotment_db.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  $email_id = $_POST['email_id'];
  $sql = "SELECT * FROM `register_tbl` WHERE email_id = '$email_id'";

  $result = mysqli_query($allot_conn, $sql);

  if(mysqli_num_rows($result) > 0) 
  {
      echo "<p>Email ID found in the database. You can proceed with further actions.</p>";
  }
  else 
  {
      echo "<p>Email ID not found in the database. Please enter a valid email ID.</p>";
  }
}
?>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center font-weight-bold">FORGOT PASSWORD</h4>
          </div>
          <div class="card-body">
            <form method="POST">
              <div class="form-group">
                <label for="candidateNo">Registered Mail ID</label>
                <input type="email" name="email_id" id="email_id" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-success btn-block">Send OTP</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
