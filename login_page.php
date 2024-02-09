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
            header("Location: Super_Admin/admin_dash.php");
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | School Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="assets/images/school_logo.png">
    <style>
        input[type=email], input[type=password] {
            width: 100%;
        }
        .login-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }
    </style>
</head>
<body>
<?php include("loader.php");?>
<div class="login-container mt-n5">
    <div class="login-form mt-n5">
        <form method="POST">
          <div class="text-center"><img class="img-fluid" src="assets/images/school_logo.png" alt="" width=150 height=150></div>
            <h1 class="text-center font-weight-bold mb-3">LOGIN</h1><br>
            <div class="form-group">
                <input type="email" name="username" class="form-control" placeholder="USERNAME" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="PASSWORD" required>
            </div>
            <button type="submit" name="u_login" class="btn btn-primary btn-block">Log in</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>





