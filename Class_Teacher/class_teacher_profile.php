<?php
error_reporting(0);
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "school_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> G H S S </title>
    <link rel="icon" type="image/x-icon" href="../assets/images/school_logo.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* Googlefont Poppins CDN Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
:root {
	--grey: #f5f5f5;
	--dark-grey: #8D8D8D;
	--light:#ffffff;
	--dark: #000;
	--green: #81D43A;
	--light-green: #E3FFCB;
	--blue: #1775F1;
	--light-blue: #D0E4FF;
	--dark-blue: #081D45;
	--red: #FC3B56;
  --dark-red: #FC1605;
  --primary-blue: #007bff;
}
    /*** Spinner ***/
    #spinner {
    opacity: 0;
    visibility: hidden;
    transition: opacity .5s ease-out, visibility 0s linear .5s;
    z-index: 99999;
}

#spinner.show {
    transition: opacity .5s ease-out, visibility 0s linear 0s;
    visibility: visible;
    opacity: 1;
}
.sidebar{
  position: fixed;
  height: 100%;
  width: 240px;
  background: var(--grey);
  transition: all 0.5s ease;
}
.sidebar.active{
  width: 60px;
}
.sidebar .logo-details{
  height: 80px;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 28px;
  font-weight: 500;
  color: var(--dark);
  min-width: 60px;
  text-align: center
}
.sidebar .logo-details .logo_name{
  color: var(--grey);
  font-size: 40px;
  font-weight: 500;
  margin-left:10px;
  -webkit-text-stroke: 1px #000;
}
.sidebar .nav-links{
  margin-top: 10px;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  height: 50px;
}
.sidebar .nav-links li a{
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li a.active{
  background: var(--dark-blue);
  border-radius : 0px 30px 30px 0px;
  color : var(--light);
}
#sidebar #nav-links li a:hover{
  background: var(--dark-blue);
  border-radius : 0px 30px 30px 0px;
  color:var(--light) !important;
}
.sidebar .nav-links li i{
  min-width: 60px;
  text-align: center;
  font-size: 18px;
  color: var(--dark);
  font-weight:bold;
}
.sidebar .nav-links li a .links_name{
  color: var(--dark);
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  font-weight:bold;
}
.sidebar .nav-links .log_out{
  position: absolute;
  bottom: 0;
  width: 100%;
}
.home-section{
  position: relative;
  background: #f5f5f5;
  min-height: 100vh;
  width: calc(100% - 240px);
  left: 240px;
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section{
  width: calc(100% - 60px);
  left: 60px;
}
.home-section nav{
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: var(--grey);
  display: flex;
  align-items: center;
  position: fixed;
  width: calc(100% - 240px);
  left: 240px;
  z-index: 100;
  padding: 0 20px;
  /* box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1); */
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section nav{
  left: 60px;
  width: calc(100% - 60px);
}
.home-section nav .sidebar-button{
  display: flex;
  align-items: center;
  font-size: 24px;
  font-weight: 500;
}
nav .sidebar-button i{
  font-size: 35px;
  margin-right: 10px;
}
.home-section nav .search-box{
  position: relative;
  height: 50px;
  max-width: 550px;
  width: 100%;
  margin: 0 20px;
}
nav .search-box input{
  height: 100%;
  width: 100%;
  outline: none;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  font-size: 18px;
  padding: 0 15px;
}
nav .search-box .bx-search{
  position: absolute;
  height: 40px;
  width: 40px;
  background: #2697FF;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 4px;
  line-height: 40px;
  text-align: center;
  color: #fff;
  font-size: 22px;
  transition: all 0.4 ease;
}
nav .profile .profile-link a:hover {
	background: var(--grey);
  	text-decoration: none;
}
nav .nav-link {
	position: relative;
}
nav .nav-link .icon {
	font-size: 18px;
	color: var(--dark);
}
nav .nav-link .badge {
	position: absolute;
	top: -15px;
	right: -13px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	border: 2px solid var(--light);
	background: var(--red);
	display: flex;
	justify-content: center;
	align-items: center;
	color: var(--light);
	font-size: 10px;
	font-weight: 700;
}
abbr {
  border-bottom: none !important;
  cursor: inherit !important;
  text-decoration: none !important;
}
nav .divider {
	width: 1px;
	background: var(--grey);
	height: 12px;
	display: block;
}
nav .profile {
	position: relative;
}
nav .profile img {
	width: 36px;
	height: 36px;
	border-radius: 50%;
	object-fit: cover;
	cursor: pointer;
}
nav .profile .profile-link {
	position: absolute;
	top: calc(100% + 10px);
	right: 0;
	background: var(--light);
	padding: 10px 0;
	box-shadow: 4px 4px 16px rgba(0, 0, 0, .1);
	border-radius: 10px;
	width: 160px;
	opacity: 0;
	pointer-events: none;
	transition: all .3s ease;
  text-decoration: none;
  list-style: none;
}
nav .profile .profile-link.show {
	opacity: 1;
	pointer-events: visible;
	top: 100%;
}
nav .profile .profile-link a {
	padding: 10px 16px;
	display: flex;
	grid-gap: 10px;
	font-size: 14px;
	color: var(--dark);
	align-items: center;
  text-decoration:none;
  list-style:none;
	transition: all .3s ease;
}
nav .profile .profile-link a:hover {
	background: var(--grey);
  	text-decoration: none;
}
.home-section .home-content{
  position: relative;
  padding-top: 104px;
}
.home-content .overview-boxes{
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 0 20px;
  margin-bottom: 26px;
}
.overview-boxes .box{
  display: flex;
  align-items: center;
  justify-content: center;
  width: calc(100% / 4 - 15px);
  background: #fff;
  padding: 15px 14px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

.home-content .sales-boxes{
  display: flex;
  justify-content: space-between;
  /* padding: 0 20px; */
}

/* left box */
.home-content .sales-boxes .recent-sales{
  width: 65%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.home-content .sales-boxes .sales-details{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sales-boxes .box .title{
  font-size: 24px;
  font-weight: bold;
  /* margin-bottom: 10px; */
}
.sales-boxes .sales-details li.topic{
  font-size: 20px;
  font-weight: 500;
}
.sales-boxes .sales-details li{
  list-style: none;
  margin: 8px 0;
}
.sales-boxes .sales-details li a{
  font-size: 18px;
  color: #333;
  font-size: 400;
  text-decoration: none;
}
.sales-boxes .box .button{
  width: 100%;
  display: flex;
  justify-content: flex-end;
}
.sales-boxes .box .button a{
  color: #fff;
  background: #0A2558;
  padding: 4px 12px;
  font-size: 15px;
  font-weight: 400;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.3s ease;
}
.sales-boxes .box .button a:hover{
  background:  #0d3073;
}

/* Right box */
.home-content .sales-boxes .top-sales{
  width: 100%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.sales-boxes .top-sales li{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 10px 0;
}
.sales-boxes .top-sales li a img{
  height: 40px;
  width: 40px;
  object-fit: cover;
  border-radius: 12px;
  margin-right: 10px;
  background: #333;
}
.sales-boxes .top-sales li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sales-boxes .top-sales li .product,
.price{
  font-size: 17px;
  font-weight: 400;
  color: #333;
}
/* Responsive Media Query */
@media (max-width: 1240px) {
  .sidebar{
    width: 60px;
  }
  .sidebar.active{
    width: 220px;
  }
  .home-section{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section{
    /* width: calc(100% - 220px); */
    overflow: hidden;
    left: 220px;
  }
  .home-section nav{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section nav{
    width: calc(100% - 220px);
    left: 220px;
  }
}
@media (max-width: 1150px) {
  .home-content .sales-boxes{
    flex-direction: column;
  }
  .home-content .sales-boxes .box{
    width: 100%;
    overflow-x: scroll;
    margin-bottom: 30px;
  }
  .home-content .sales-boxes .top-sales{
    margin: 0;
  }
}
@media (max-width: 1000px) {
  .overview-boxes .box{
    width: calc(100% / 2 - 15px);
    margin-bottom: 15px;
  }
}
@media (max-width: 700px) {
  nav .sidebar-button .dashboard,
  nav .profile-details .admin_name,
  nav .profile-details i{
    display: none;
  }
  .home-section nav .profile-details{
    height: 50px;
    min-width: 40px;
  }
  .home-content .sales-boxes .sales-details{
    width: 560px;
  }
}
@media (max-width: 550px) {
  .overview-boxes .box{
    width: 100%;
    margin-bottom: 15px;
  }
  .sidebar.active ~ .home-section nav .profile-details{
    display: none;
  }
}
  @media (max-width: 400px) {
  .sidebar{
    width: 0;
  }
  .sidebar.active{
    width: 60px;
  }
  .home-section{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section{
    left: 60px;
    width: calc(100% - 60px);
  }
  .home-section nav{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section nav{
    left: 60px;
    width: calc(100% - 60px);
  }
}
/* CSS for the adding pricipal model */
.container {
	max-width: 400px;
	width: 100%;
	background: #fff;
	padding: 30px;
	border-radius: 30px;
  display:flex;
  justify-content:center;
  align-items:center;
}
.img-area-update {
	position: relative;
	width: 60%;
	height: 250px;
	background: var(--grey);
	margin-bottom: 30px;
  border : 1px solid #f5f5f5;
  border-radius:15px;
	overflow: hidden;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
  cursor: pointer;
  z-index:1;
}
.img-area-update .icon {
	font-size: 100px;
    color:var(--primary-blue);
}
.img-area-update h3 {
	font-size: 20px;
	font-weight: 500;
	margin-bottom: 6px;
}
.img-area-update p {
	color: #999;
    text-align:center;
    padding : 10px;
}
.img-area-update p span {
	font-weight: 600;
}
.img-area-update img {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
	object-position: center;
	z-index: 100;
}
.img-area-update::before {
	content: attr(data-img);
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, .5);
	color: #fff;
	font-weight: 500;
	text-align: center;
	display: flex;
	justify-content: center;
	align-items: center;
	pointer-events: none;
	opacity: 0;
	transition: all .3s ease;
	z-index: 200;
}
.img-area-update.active:hover::before {
	opacity: 1;
}
.required::after{
  content : " *";
  color: red;
  font-size:15px;
  font-weight:bold;
}
.error-message, .email_error-message {
      color: red;
    }

    </style>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body id="element">


  <div class="sidebar" id="sidebar">
    <div class="logo-details">
      <img src="../assets/images/school_logo.png" alt="School_Logo" width=60 height=60>
      <span class="logo_name">G H S S</span>
    </div>
    <ul class="nav-links" id="nav-links">
        <li>
          <a href="class_teacher_dash.php">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="add_students.php">
            <i class='bx bxs-user'></i>
            <span class="links_name">Student Status</span>
          </a>
        </li>
        <li>
          <a href="view_students.php">
            <i class='bx bx-user'></i>
            <span class="links_name">View Student</span>
          </a>
        </li>
        <li>
          <a href="class_activity.php">
          <i class='bx bxs-briefcase'></i>
            <span class="links_name">Class Activity</span>
          </a>
        </li>
        <li>
          <a href="upload_marks.php">
          <i class='bx bx-bookmarks'></i>
            <span class="links_name">Subject Marks</span>
          </a>
        </li>
        <li>
          <a href="subject_notes.php">
          <i class='bx bxs-notepad'></i>
            <span class="links_name">Subject Notes</span>
          </a>
        </li>
        <li>
          <a href="internal_marks.php">
          <i class='bx bxs-bookmarks'></i>
            <span class="links_name">Internal Marks</span>
          </a>
        </li>
        <li>
          <a href="add_office.php">
            <i class='bx bx-user-plus' ></i>
            <span class="links_name">Office Staff</span>
          </a>
        </li>
        <li>
          <a href="add_subjects.php">
            <i class='bx bx-book' ></i>
            <span class="links_name">Subjects</span>
          </a>
        </li>
        <li>
          <a href="update_fees.php">
            <i class='bx bx-dollar' ></i>
            <span class="links_name">Fees</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <button onclick="toggleFullScreen();" style="background:none; border:none;"><i class='bx bx-fullscreen' style="font-size:18px;"></i><i class='bx bx-exit-fullscreen' style="display:none;"></i></button>
			<a href="#" class="nav-link">
				<i class='bx bxs-bell icon' ></i>
				<span class="badge">5</span>
			</a>
			<a href="#" class="nav-link">
				<i class='bx bxs-message-square-dots icon' ></i>
				<span class="badge">8</span>
			</a>
      <span class="divider"></span>
			<div class="profile">
			<abbr title="<?php echo $_SESSION['u_name'];?>">
      <?php
$get_email = $_SESSION['u_email'];
$sql = "SELECT u_image FROM users WHERE u_email='$get_email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
  while($row = mysqli_fetch_assoc($result)) 
  {
?>
      <img src="../uploads/<?php echo $row['u_image'];?>" alt="">
      <?php
  }
}
      ?>
      </abbr>
				<ul class="profile-link">
					<li><a href="class_teacher_profile.php"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="class_teacher_settings.php"><i class='bx bxs-cog' ></i> Settings</a></li>
					<li><a href="../logout.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="top-sales box">
          <div class="row">
          <div class="col-md-6 col-12 title mb-5">UPDATE PROFILE</div>
          </div> <!--class row close div-->


  <?php
  if(isset($_POST['u_update_teacher']))
  {
    $get_email = $_SESSION['u_email'];

    $name = $_POST['fname']." ".$_POST['lname'];
    $gender = $_POST['gender'];
    $qualification = $_POST['qualification'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $email = $_POST['e-mail'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

        // Proceed with the updating
        $sql = "UPDATE users SET u_name = '$name', u_gender = '$gender', u_address = '$address', u_mobile = '$mobile', u_city = '$city', u_district = '$district', u_state = '$state', u_zip = '$zip' WHERE u_email = '$get_email'";
        if ($conn->query($sql) === TRUE) 
        {
          $sql1 = "UPDATE teachers_data SET u_name = '$name', u_dob = '$dob', u_qualification = '$qualification' WHERE u_email = '$get_email'";
            $conn->query($sql1);
            $sql2 = "UPDATE class_teacher SET teacher_name = '$name' WHERE u_email = '$get_email'";
            $conn->query($sql2);
            $_SESSION['update_msg'] = "PROFILE UPDATED SUCCESSFULLY";
            header("Location:class_teacher_profile.php");
        }
        else 
        {
          echo '<div class="alert alert-danger mt-3" role="alert">Error: '. $sql .'\\n' .$conn->error .' </div>';
        }
    }

  ?>

  <?php
  if(isset($_SESSION['update_msg']))
  {
    echo '<div class="alert alert-success" role="alert">'.$_SESSION['update_msg'].'</div>';
    unset($_SESSION['update_msg']);
  }
  ?>

  <?php
  if(isset($_POST['update_teacher_profile']))
  {
    $get_email = $_SESSION['u_email'];

    $update_image = rand(1000, 10000)."-".$_FILES["update-image"]["name"];
    $update_tname = $_FILES["update-image"]["tmp_name"];
    $update_target_dir = "../uploads/";
    move_uploaded_file($update_tname, $update_target_dir.'/'.$update_image);

    $sql = "UPDATE users SET u_image = '$update_image' WHERE u_email = '$get_email'";
    if ($conn->query($sql) === TRUE)
    {
      echo '<script>Swal.fire({
        title: "PROFILE PIC UPDATED.",
        text: "Process Successful",
        icon: "success"
      });</script>';
    }
    else{
      header("Location:add_teachers.php");
      echo '<script>Swal.fire({
        icon: "error",
        title: "Oops...PROFILE PIC UPDATING FAILED.",
        text: "Something went wrong!",
      });</script>';
    }
  }
  ?>


          <?php
$get_email = $_SESSION['u_email'];
$sql = "SELECT * FROM users INNER JOIN teachers_data ON users.u_email = teachers_data.u_email WHERE users.u_email='$get_email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
  while($row = mysqli_fetch_assoc($result)) 
  {
    $Name = explode(" ",$row['u_name']);
?>

          <form method="POST" class="needs-validation-update" enctype="multipart/form-data" novalidate>

<div class="row">
  <div class="col-md-4 mb-3">

    <div class="form-group">
      <label for="validationCustom01" class="required">First name</label>
      <input type="text" value="<?php echo $Name[0];?>" class="form-control" name="fname" id="validationCustom01" required>
      <div class="valid-feedback">Looks good!</div>
    </div> <!-- form-group close -->

    <div class="form-group">
      <label for="validationCustom03" class="required">Gender</label>
        <select class="custom-select" value="<?php echo $row['u_gender'];?>" name="gender" id="validationCustom03" required>
          <option disabled>Choose...</option>
          <option value="Male" <?php echo ($row['u_gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
          <option value="Female" <?php echo ($row['u_gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
          <option value="Other" <?php echo ($row['u_gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
        </select>
        <div class="invalid-feedback">Please select a valid gender.</div>
    </div> <!-- form-group close -->

    <div class="form-group">
      <label for="validationCustom05" class="required">Mobile Number</label>
      <input type="number" value="<?php echo $row['u_mobile'];?>" class="form-control" name="mobile" id="validationCustom05" required>
      <p class="error-message" id="error-message"></p>
      <div class="invalid-feedback">Please provide a valid mobile number.</div>
    </div> <!-- form-group close -->

    <div class="form-group">
      <label for="validationCustom07" class="required">E-mail</label>
      <input type="email" value="<?php echo $row['u_email'];?>" class="form-control" name="e-mail" id="validationCustom07" readonly>
      <div class="invalid-feedback">Please provide a valid E-Mail.</div>
      <span id="email_error-message" class="email_error-message"></span>
    </div> <!-- form-group close -->
    

  </div><!-- col-md-4 mb-3 close -->

  <div class="col-md-4 mb-3">

    <div class="form-group">
      <label for="validationCustom01" class="required">Last name</label>
      <input type="text" value="<?php echo $Name[1];?>" class="form-control" name="lname" id="validationCustom01" required>
      <div class="valid-feedback">Looks good!</div>
    </div> <!-- form-group close -->

    <div class="form-group">
      <label for="validationCustom04" class="required">Education Qualification</label>
      <input type="text" value="<?php echo $row['u_qualification'];?>" class="form-control" name="qualification" id="validationCustom04" required>
      <div class="invalid-feedback">Please provide a valid qualification.</div>
    </div> <!-- form-group close -->

    <div class="form-group">
      <label for="validationCustom06" class="required">Date-of-Birth</label>
      <input type="date" value="<?php echo $row['u_dob'];?>" class="form-control" name="dob" id="validationCustom06" required>
      <div class="invalid-feedback">Please provide a valid DOB.</div>
    </div> <!-- form-group close -->

    <div class="form-group">
    <label for="validationCustom08" class="required">Address</label>
      <input type="text" value="<?php echo $row['u_address'];?>" class="form-control" name="address" id="validationCustom08" required>
      <div class="invalid-feedback">Please provide a valid address.</div>
</div> <!-- form-group close -->

  </div><!-- col-md-4 mb-3 close -->


  <div class="col-md-4 mb-3">
<div class="form-group">
  <div class="container">
      <!-- Hidden input field to upload image -->
      <input type="file" id="file-update" value="<?php echo $row['u_image'];?>" name="update-image" accept="image/*" hidden required>
      
      <!-- Display area for uploaded image -->
      <div class="img-area-update" data-img="">
          <!-- If image exists in database, display it -->
          <?php if (!empty($row['u_image'])) : ?>
              <img src="<?php echo '../uploads/'.$row['u_image']; ?>" alt="Uploaded Image" class="uploaded-image">
          <?php else : ?>
              <!-- If no image exists, show upload image icon -->
              <img src="../assets/images/no_image.jpg" alt="Uploaded Image" class="uploaded-image">
              <i class='bx bxs-cloud-upload icon'></i>
          <?php endif; ?>
          <h3>Upload Image</h3>
          <p>Image size must be less than <span>2MB</span></p>
      </div>
  </div>
</div>
</div>


</div><!-- row close -->

<div class="row">

<div class="col-md-6 mb-3">
    <label for="validationCustom09" class="required">City</label>
    <input type="text" value="<?php echo $row['u_city'];?>" class="form-control" name="city" id="validationCustom09" required>
    <div class="invalid-feedback">Please provide a valid city.</div>
</div>

<div class="col-md-6 mb-3">
<label for="validationCustom10" class="required">District</label>
    <select class="custom-select" value="<?php echo $row['u_district'];?>" name="district" id="validationCustom10" required>
      <option disabled>Choose...</option>
      <option value="Alappuzha" <?php echo ($row['u_district'] == 'Alappuzha') ? 'selected' : ''; ?>>Alappuzha</option>
      <option value="Ernakulam" <?php echo ($row['u_district'] == 'Ernakulam') ? 'selected' : ''; ?>>Ernakulam</option>
      <option value="Idukki" <?php echo ($row['u_district'] == 'Idukki') ? 'selected' : ''; ?>>Idukki</option>
      <option value="Kannur" <?php echo ($row['u_district'] == 'Kannur') ? 'selected' : ''; ?>>Kannur</option>
      <option value="Kasaragod" <?php echo ($row['u_district'] == 'Kasaragod') ? 'selected' : ''; ?>>Kasaragod</option>
      <option value="Kollam" <?php echo ($row['u_district'] == 'Kollam') ? 'selected' : ''; ?>>Kollam</option>
      <option value="Kottayam" <?php echo ($row['u_district'] == 'Kottayam') ? 'selected' : ''; ?>>Kottayam</option>
      <option value="Kozhikode" <?php echo ($row['u_district'] == 'Kozhikode') ? 'selected' : ''; ?>>Kozhikode</option>
      <option value="Malappuram" <?php echo ($row['u_district'] == 'Malappuram') ? 'selected' : ''; ?>>Malappuram</option>
      <option value="Palakkad" <?php echo ($row['u_district'] == 'Palakkad') ? 'selected' : ''; ?>>Palakkad</option>
      <option value="Pathanamthitta" <?php echo ($row['u_district'] == 'Pathanamthitta') ? 'selected' : ''; ?>>Pathanamthitta</option>
      <option value="Thiruvananthapuram" <?php echo ($row['u_district'] == 'Thiruvananthapuram') ? 'selected' : ''; ?>>Thiruvananthapuram</option>
      <option value="Thrissur" <?php echo ($row['u_district'] == 'Thrissur') ? 'selected' : ''; ?>>Thrissur</option>
      <option value="Wayanad" <?php echo ($row['u_district'] == 'Wayanad') ? 'selected' : ''; ?>>Wayanad</option>
    </select>
    <div class="invalid-feedback">Please select a valid district.</div>
</div>
</div>

<div class="row">

<div class="col-md-6 mb-3">
<label for="validationCustom11" class="required">State</label>
<input type="text" value="<?php echo $row['u_state'];?>" class="form-control" name="state" id="validationCustom11" value="Kerala" required>
  <div class="invalid-feedback">Please select a valid State.</div>
</div>

<div class="col-md-6 mb-3">
  <label for="validationCustom12" class="required">Zip code</label>
  <input type="text" value="<?php echo $row['u_zip'];?>" class="form-control" name="zip" id="validationCustom12" required>
  <div class="invalid-feedback">Please provide a valid zip code.</div>
</div>
</div>
<div class="row  float-right">
  <div class="col-md-6"><input type="submit" name="u_update_teacher" class="btn btn-outline-primary" value="Update Data"></div>
  <div class="col-md-6"><input type="submit" name="update_teacher_profile" class="btn btn-dark float-right" value="Update Profile Pic"><div>
</div>
</div>

  </form>

<?php
  }
}
?>
        </div>
      </div>
    </div>
  </section>


<!-- JavaScript for display image form the database and display the new image choose for updating -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imgArea = document.querySelector('.img-area-update');
        const inputFile = document.querySelector('#file-update');

        // Trigger file input when the image area is clicked
        imgArea.addEventListener('click', function () {
            inputFile.click();
        });

        // Handle file input change
        inputFile.addEventListener('change', function () {
            const image = this.files[0];
            
            if (image.size < 2000000) {
                const reader = new FileReader();
                reader.onload = () => {
                    // Remove any existing image before adding the new one
                    const existingImg = imgArea.querySelector('u_image');
                    if (existingImg) {
                        existingImg.remove();
                    }

                    // Create a new image element with the uploaded image
                    const img = document.createElement('u_image');
                    img.src = reader.result;
                    img.alt = "Uploaded Image";
                    img.classList.add('uploaded-image');

                    // Replace the existing image with the new one
                    imgArea.appendChild(img);
                    imgArea.classList.add('active');
                    imgArea.dataset.img = image.name;
                };
                reader.readAsDataURL(image);
            } else {
                alert("Image size more than 2MB");
            }
        });
    });
</script>

  <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<script>
    // Get the input element
    var mobileNumberInput = document.getElementById('validationCustom05');
    
    // Attach an input event listener to the input field
    mobileNumberInput.addEventListener('input', function () {
      // Get the value entered by the user
      var enteredValue = mobileNumberInput.value;

      // Remove any non-numeric characters
      var numericValue = enteredValue.replace(/\D/g, '');

      // Check if the numeric value is between 10 and 10 characters
      if (numericValue.length === 10) {
        // Clear any previous error message
        document.getElementById('error-message').textContent = '';
      } else {
        // Display an error message
        document.getElementById('error-message').textContent = 'Mobile number must be 10 digits.';
      }
    });
  </script>

  <script>
  function toggleFullScreen() {
    var el = document.getElementById('element');
    var fullscreenIcon = document.querySelector('.bx-fullscreen');
    var exitFullscreenIcon = document.querySelector('.bx-exit-fullscreen');
    
    if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
      // Enter fullscreen mode
      if (el.requestFullscreen) {
        el.requestFullscreen();
      } else if (el.mozRequestFullScreen) {
        el.mozRequestFullScreen();
      } else if (el.webkitRequestFullscreen) {
        el.webkitRequestFullscreen();
      } else if (el.msRequestFullscreen) {
        el.msRequestFullscreen();
      }
      // Show exit-fullscreen icon and hide fullscreen icon
      fullscreenIcon.style.display = 'none';
      exitFullscreenIcon.style.display = 'inline-block';
    } else {
      // Exit fullscreen mode
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      }
      // Show fullscreen icon and hide exit-fullscreen icon
      fullscreenIcon.style.display = 'inline-block';
      exitFullscreenIcon.style.display = 'none';
    }
  }
</script>

  <script>
    // PROFILE DROPDOWN
const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');

imgProfile.addEventListener('click', function () {
	dropdownProfile.classList.toggle('show');
})
window.addEventListener('click', function (e) {
	if(e.target !== imgProfile) {
		if(e.target !== dropdownProfile) {
			if(dropdownProfile.classList.contains('show')) {
				dropdownProfile.classList.remove('show');
			}
		}
	}})
  </script>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

<script async src="https://cdn.ampproject.org/v0.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script async src="https://cdn.ampproject.org/v0.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</body>
</html>