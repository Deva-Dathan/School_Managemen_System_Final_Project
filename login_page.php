<?php
include('include/db_connection.php');

function authenticateUser($username, $password, $conn) {
    $username = mysqli_real_escape_string($conn, $username);
    $password = md5($password);

    $sql = "SELECT u_name, u_role, status FROM users WHERE u_email='$username' AND u_pass='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

session_start();

if(isset($_POST['u_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = authenticateUser($username, $password, $conn);

    if ($user) {
        $_SESSION['u_email'] = $username;
        $_SESSION['u_name'] = $user['u_name'];
        $_SESSION['u_role'] = $user['u_role'];

        switch ($user['u_role']) {
            case 'Management':
                header("Location: Super_Admin/admin_dash.php");
                break;
            case 'PRINCIPAL':
                header("Location: Principal/principal_dash.php");
                break;
            case 'VICE PRINCIPAL':
                header("Location: Vice_Principal/vice_principal_dash.php");
                break;
            case 'TEACHER':
                header("Location: teacher/teacher_dash.php");
                break;
            case 'CLASS TEACHER':
                header("Location: Class_Teacher/class_teacher_dash.php");
                break;
            case 'OFFICE STAFF':
                header("Location: Office_Staff/office_dash.php");
                break;
            case 'STUDENT':
                if($user['status'] == 1) {
                    header("Location: Student/student_dash.php");
                } else {
                    $errorMessage = 'ACCOUNT NOT VERIFIED...';
                }
                break;
            case 'PARENT':
                if($user['status'] == 1) {
                    header("Location: Parent/parent_dash.php");
                } else {
                    $errorMessage = 'ACCOUNT NOT VERIFIED...';
                }
                break;
            case 'ALLOTMENT CELL':
                header("Location: Allotment_Cell/cell_dash.php");
                break;
            default:
                $errorMessage = 'UNKNOWN ROLE...';
        }
    } else {
        $errorMessage = 'WRONG USERNAME OR PASSWORD...';
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
<a href="landing_page.php" style="font-size:28px;"><div class="arrow" style="margin-left:10px;"><i class='bx bx-arrow-back'></i></div></a>
<div class="login-container mt-n5">
    <div class="login-form mt-n5">
        <form method="POST">
          <div class="text-center"><img class="img-fluid" src="assets/images/school_logo.png" alt="" width=150 height=150></div>
            <h1 class="text-center font-weight-bold mb-3">LOGIN</h1><br>
            <?php if(isset($errorMessage)): ?>
            <div class="alert alert-danger text-center font-weight-bold mt-5" role="alert">
                <?php echo $errorMessage; ?>
            </div>
            <?php endif; ?>
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
