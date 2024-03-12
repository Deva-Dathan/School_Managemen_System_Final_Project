<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>CANDIDATE LOGIN</h4>
          </div>
          <div class="card-body">
            <form action="login.php" method="POST">
              <div class="form-group">
                <label for="candidateNo">Candidate Number</label>
                <input type="text" name="candidateNo" id="candidateNo" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control" required>
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