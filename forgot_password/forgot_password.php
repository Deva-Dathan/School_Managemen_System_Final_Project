
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
include("../include/db_connection.php");

session_start(); // Start the session

if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $email_id = $_POST['e_mail_id'];
    $sql = "SELECT * FROM users WHERE u_email = '$email_id'";
  
    $result = mysqli_query($conn, $sql);
  
    if(mysqli_num_rows($result) > 0) 
    {
        $row = $result->fetch_assoc();
        $_SESSION['u_email'] = $row['u_email'];
        include("smtp/PHPMailerAutoload.php"); // Include PHPMailer Autoload file
  
        function smtp_mailer($to, $subject, $msg) {
            $mail = new PHPMailer(); 
            $mail->IsSMTP(); 
            $mail->SMTPAuth = true; 
            $mail->SMTPSecure = 'tls'; 
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; 
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            //$mail->SMTPDebug = 2; 
            $mail->Username = "ghssautonomousschool@gmail.com";
            $mail->Password = "rmaqplwqihxvoptx";
            $mail->SetFrom("ghssautonomousschool@gmail.com");
            $mail->Subject = $subject;
            $mail->Body = $msg;
            $mail->AddAddress($to);
            $mail->SMTPOptions = array('ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            ));
            
            if(!$mail->Send()) {
                return $mail->ErrorInfo;
            } else {
                return 'Sent';
            }
        }

        $subject = "Reset Your Password";

        // Function to generate OTP
        function generateOTP() {
            return mt_rand(100000, 999999); // Generates a random 6-digit number
        }
        
        // Generate OTP
        $otp = generateOTP();

        $msg = "The OTP For Resetting Your Password Is: <b>$otp</b>";

        $msg = "Dear <b>".$row['u_name']."</b>,<br><br>"
        . "Thank you for using our service. To complete your resetting process, please find your One-Time Password (OTP) below:<br><br>"
        . "OTP: <b>$otp</b><br><br>"
        . "Please enter this OTP on the verification page. If you did not request this OTP or if you have any concerns about your account security, please contact our support team immediately.<br><br>"
        . "Thank you for choosing G H S S Autonomous School.<br><br>"
        . "Best regards,<br>"
        . "G H S S Autonomous School Technical Team";
    
        if (smtp_mailer($row['u_email'],$subject ,$msg) === 'Sent') {
            // Redirect to enter OTP page

            $_SESSION['otp'] = $otp;
            $_SESSION['otp_success'] = "OTP Send Successfully";
            header("Location: enter_otp.php");
            exit;
        }
  
    }
    else 
    {
        echo '<div class="alert alert-danger mt-3 font-weight-bold" role="alert">E-Mail ID Not Found</div>';
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
                <input type="email" name="e_mail_id" id="email_id" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-success btn-block">Send OTP</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
