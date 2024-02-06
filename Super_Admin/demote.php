<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include("../include/db_connection.php");

$demote_email = $_GET['u_email'];
$sql = "UPDATE users SET u_role='TEACHER' WHERE u_email='$demote_email'";
$conn->query($sql);
echo '<script>Swal.fire({title: "PROMOTTED AS VICE PRINCIPAL",text: "Promotted Successfully",icon: "success"});</script>';
header("Location:change_vice_principal.php");
?>