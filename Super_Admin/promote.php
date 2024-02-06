<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include("../include/db_connection.php");

$update_email = $_GET['u_email'];
$sql = "UPDATE users SET u_role='VICE PRINCIPAL' WHERE u_email='$update_email'";
$conn->query($sql);
echo '<script>Swal.fire({title: "BACK RO TEACHER",text: "Demote Successfully",icon: "success"});</script>';
header("Location:change_vice_principal.php");


?>