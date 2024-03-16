<?php
include("../include/db_connection.php");
session_start(); // Start the session

    // Retrieve the OTP sent to the user's email from the session
    $otp_sent = $_SESSION['otp']; 
    // echo $otp_sent;
    $email = $_SESSION['u_email'];

if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $otp1 = $_POST['otp1'];
    $otp2 = $_POST['otp2'];
    $otp3 = $_POST['otp3'];
    $otp4 = $_POST['otp4'];
    $otp5 = $_POST['otp5'];
    $otp6 = $_POST['otp6'];
    
    // Concatenate all OTP variables
    $entered_otp = $otp1 . $otp2 . $otp3 . $otp4 . $otp5 . $otp6;
    
    // echo "<script>alert('Entered OTP: $entered_otp');</script>";

    if($entered_otp == $otp_sent) // Compare the entered OTP with the one sent to the user's email
    { 
      $_SESSION['otp_verify'] = "OTP Verified Successfully";
      header("Location: reset_password.php");
      exit;
    } 
    else 
    {
        // Display an error message if OTP verification fails
        $error_message = "Invalid OTP. Please enter the correct OTP.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/school_logo.png" type="image/x-icon">
    <title>OTP Verification Form</title>
    <style>
/* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
:where(.container, form, .input-field, header) {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.container {
  background: #fff;
  padding: 30px 65px;
  border-radius: 12px;
  row-gap: 20px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.container header {
  height: 65px;
  width: 65px;
  background: #4070f4;
  color: #fff;
  font-size: 2.5rem;
  border-radius: 50%;
}
.container h4 {
  font-size: 1.25rem;
  color: #333;
  font-weight: 500;
}
form .input-field {
  flex-direction: row;
  column-gap: 10px;
}
.input-field input {
  height: 45px;
  width: 42px;
  border-radius: 6px;
  outline: none;
  font-size: 1.125rem;
  text-align: center;
  border: 1px solid #ddd;
}
.input-field input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.input-field input::-webkit-inner-spin-button,
.input-field input::-webkit-outer-spin-button {
  display: none;
}
form button {
  margin-top: 25px;
  width: 100%;
  color: #fff;
  font-size: 1rem;
  border: none;
  padding: 9px 0;
  cursor: pointer;
  border-radius: 6px;
  pointer-events: none;
  background: #6e93f7;
  transition: all 0.2s ease;
}
form button.active {
  background: #4070f4;
  pointer-events: auto;
}
form button:hover {
  background: #0e4bf1;
}
    </style>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container">
    <?php
    if(isset($_SESSION['otp_success']))
    {
      ?>
    <div class="alert alert-success mt-3" role="alert" style="font-weight:bold; color:green;"><?php echo $_SESSION['otp_success'];?></div>
    <?php
      unset($_SESSION['otp_success']);
    }
    ?>
      <header>
        <i class="bx bxs-check-shield"></i>
      </header>
      <h4>Enter the OTP</h4>
      <form method="post">
            <div class="input-field">
                <input type="number" name="otp1" maxlength="1" />
                <input type="number" name="otp2" maxlength="1" disabled />
                <input type="number" name="otp3" maxlength="1" disabled />
                <input type="number" name="otp4" maxlength="1" disabled />
                <input type="number" name="otp5" maxlength="1" disabled />
                <input type="number" name="otp6" maxlength="1" disabled />
            </div>
            <button>Verify OTP</button>
        </form>
        <?php if(isset($error_message)) { ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php } ?>
    </div>
    <script>
        const inputs = document.querySelectorAll("input");
        const button = document.querySelector("button");

        inputs.forEach((input, index1) => {
            input.addEventListener("keyup", (e) => {
                const currentInput = input;
                const nextInput = input.nextElementSibling;
                const prevInput = input.previousElementSibling;

                if (currentInput.value.length > 1) {
                    currentInput.value = "";
                    return;
                }

                if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                    nextInput.removeAttribute("disabled");
                    nextInput.focus();
                }

                if (e.key === "Backspace") {
                    inputs.forEach((input, index2) => {
                        if (index1 <= index2 && prevInput) {
                            input.setAttribute("disabled", true);
                            input.value = "";
                            prevInput.focus();
                        }
                    });
                }

                if (!inputs[3].disabled && inputs[3].value !== "") {
                    button.classList.add("active");
                    return;
                }
                button.classList.remove("active");
            });
        });

        window.addEventListener("load", () => inputs[0].focus());
    </script>
</body>
</html>
