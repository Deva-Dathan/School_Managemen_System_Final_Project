<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:login_page.php"); //to redirect back to "login_page.php" after logging out
exit();
?>