<?php
include("../include/db_connection.php");
$update_email = $_GET['u_email'];
$sql = "UPDATE users SET u_role='VICE PRINCIPAL' WHERE u_email='$update_email'";
$conn->query($sql);

header("Location:change_vice_principal.php");


?>