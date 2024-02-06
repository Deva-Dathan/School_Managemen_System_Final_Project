<?php
include("../include/db_connection.php");
$demote_email = $_GET['u_email'];
$sql = "UPDATE users SET u_role='TEACHER' WHERE u_email='$demote_email'";
$conn->query($sql);

header("Location:change_vice_principal.php");
?>