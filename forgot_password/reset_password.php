<?php
session_start();
include("../include/db_connection.php");
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$email = $_SESSION['u_email'];
$new = md5($_POST['new_password']);
$confirm = md5($_POST['confirm_password']);

$sql = "SELECT u_pass FROM users WHERE u_email = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
    {
        if($new == $confirm)
        {
            $update_pw = "UPDATE users SET u_pass = '$confirm' WHERE u_email='$email'";
            $conn->query($update_pw);
            $_SESSION['reset_success'] = "Password Changed Successfully";
            header("Location:../login_page.php");
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">New Password & Confirm Password is Mismatching</div>';
        }
    }
} 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/school_logo.png" type="image/x-icon">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">

    <?php
          if(isset($_SESSION['otp_verify']))
          {
            ?>
          <div class="alert alert-success text-center font-weight-bold mt-3" role="alert"><?php echo $_SESSION['otp_verify'];?></div>
          <?php
            unset($_SESSION['otp_verify']);
          }
          ?>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Reset Password</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="new_password">New Password:</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
