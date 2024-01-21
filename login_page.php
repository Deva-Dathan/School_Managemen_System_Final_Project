<?php
session_start();
include('include/db_connection.php');
if(isset($_POST['u_login']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT u_name, u_role FROM users WHERE u_email='$username' AND u_pass='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) 
    {
      while($row = $result->fetch_assoc()) 
      {
        if($row['u_role'] == 'Management')
        {
            $_SESSION['u_email'] = $username;
            $_SESSION['u_name'] = $row['u_name'];
            $_SESSION['u_role'] = $row['u_role'];
            header("Location: Super_Admin/super_admin_dash.php");
        }
        elseif($row['u_role'] == 'Principal')
        {
            $_SESSION['u_email'] = $username;
            $_SESSION['u_name'] = $row['u_name'];
            $_SESSION['u_role'] = $row['u_role'];
            header("Location: Principal/principal_dash.php");  
        }
        else
        {
            echo "Failed";
        }
      }
    } 
    else 
    {
      echo "0 results";
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="assets/images/school_logo.png">
    <title>Login | School Management</title>
    <style>
        input[type=email],input[type=passowrd]
        {
            width:25vw;
        }   
    </style>
  </head>
  <body>


<div class="container min-vh-100 d-flex justify-content-center align-items-center">
  <form method="POST">
  
  <h1 class="text-center font-weight-bold mb-3">LOGIN</h1>  
  <div class="form-outline mb-4">
    <input type="email" name="username" id="form2Example1" class="form-control" placeholder="USERNAME" required>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name="password" id="form2Example2" class="form-control" placeholder="PASSWORD" required>
  </div>

  <!-- Submit button -->
  <button type="submit" name="u_login" class="btn btn-primary btn-block mb-4">Log in</button>

</form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>



