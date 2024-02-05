<?php
session_start();
include("../include/db_connection.php");
include("../header.php");
include("../footer.php");

// if(!isset($_SESSION['u_email']))
// {
//   header("Location: ../login_page.php");
// }

// echo $_SESSION['u_username'];
// echo "<br>";
// echo $_SESSION['u_role'];
?>

<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> G H S S </title>
    <link rel="icon" type="image/x-icon" href="../assets/images/school_logo.png">
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
.img-area {
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
}
.img-area .icon {
	font-size: 100px;
    color:var(--primary-blue);
}
.img-area h3 {
	font-size: 20px;
	font-weight: 500;
	margin-bottom: 6px;
}
.img-area p {
	color: #999;
    text-align:center;
    padding : 10px;
}
.img-area p span {
	font-weight: 600;
}
.img-area img {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
	object-position: center;
	z-index: 100;
}
.img-area::before {
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
.img-area.active:hover::before {
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
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body id="element">
  <?php include("../loader.php");?>
  <div class="sidebar" id="sidebar">
    <div class="logo-details">
      <img src="../assets/images/school_logo.png" alt="School_Logo" width=60 height=60>
      <span class="logo_name">G H S S</span>
    </div>
      <ul class="nav-links" id="nav-links">
        <li>
          <a href="admin_dash.php">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="change_principal.php" class="active">
            <i class='bx bxs-user' style="color:var(--light);"></i>
            <span class="links_name" style="color:var(--light);">Principal</span>
          </a>
        </li>
        <li>
          <a href="change_vice_principal.php">
            <i class='bx bx-user-circle' ></i>
            <span class="links_name">Vice Principal</span>
          </a>
        </li>
        <li>
          <a href="add_teachers.php">
            <i class='bx bxs-user-plus' ></i>
            <span class="links_name">Teachers</span>
          </a>
        </li>
        <li>
          <a href="view_students.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Students</span>
          </a>
        </li>
        <li>
          <a href="add_allotement.php">
            <i class='bx bxs-user-circle' ></i>
            <span class="links_name">Allotment Cell</span>
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
			<abbr title="<?php echo $_SESSION['u_name'];?>"><img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt=""></abbr>
				<ul class="profile-link">
					<li><a href="admin_profile.php"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="admin_settings.php"><i class='bx bxs-cog' ></i> Settings</a></li>
					<li><a href="../logout.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="top-sales box">
          <div class="row">
          <div class="col-md-6 col-12 title">CHANGE PRINCIPAL</div>
          <div class="col-md-6 col-12" style="display:flex; justify-content:right; align-items:right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class='bx bx-plus'></i>&nbspNew Principal</button></div>
          </div> <!--class row close div-->

          <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD NEW PRINCIPAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <!-- inserting data into the table -->
      <?php
      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
        $uid = time();
        $fullname = $_POST['fname']." ".$_POST['lname'];
        $gender = $_POST['gender'];
        $qualification = $_POST['qualification'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];
        $email = $_POST['e-mail'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        $image = rand(1000, 10000)."-".$_FILES["image"]["name"];
        $tname = $_FILES["image"]["tmp_name"];
        $target_dir = "../uploads/";
        move_uploaded_file($tname, $target_dir.'/'.$image);

        $sel_sql = "SELECT u_email FROM users WHERE u_email = '$email'";
        $result = $conn->query($sel_sql);
        
        if ($result->num_rows > 0) {
            // Email already exists, show an error message or handle it accordingly
            echo '<script>Swal.fire({icon: "error",title: "Oops...",text: "E-mail Already Exist!"});</script>';
        } else {
            // Email does not exist, proceed with the insertion
            $sql = "INSERT INTO users (id, u_name, u_gender, u_email, u_pass, u_role, u_address, u_mobile, u_city, u_district, u_state, u_zip, u_image) VALUES ('$uid', '$fullname', '$gender', '$email', '$password', 'PRINCIPAL', '$address', '$mobile', '$city', '$district', '$state', '$zip', '$image')";
        
            if ($conn->query($sql) === TRUE) {
                $sql1 = "INSERT INTO principal_data(u_name, u_email, u_dob, u_qualification) VALUES ('$fullname', '$email', '$dob', '$qualification')";
                $conn->query($sql1);
                echo '<script>Swal.fire({title: "NEW PRINCIPAL APPOINTED",text: "Inserted Successfully",icon: "success"});</script>';
            } else {
                echo '<script>alert("Error: ' . $sql . '\\n' . $conn->error . '");</script>';
            }
        }
        
      }
      ?>

      <form method="POST" class="needs-validation" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" novalidate>

      <div class="row">
        <div class="col-md-4 mb-3">

          <div class="form-group">
            <label for="validationCustom01" class="required">First name</label>
            <input type="text" class="form-control" name="fname" id="validationCustom01" required>
            <div class="valid-feedback">Looks good!</div>
          </div> <!-- form-group close -->

          <div class="form-group">
            <label for="validationCustom03" class="required">Gender</label>
              <select class="custom-select" name="gender" id="validationCustom03" required>
                <option selected disabled>Choose...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
              <div class="invalid-feedback">Please select a valid gender.</div>
          </div> <!-- form-group close -->

          <div class="form-group">
            <label for="validationCustom05" class="required">Mobile Number</label>
            <input type="number" class="form-control" name="mobile" id="validationCustom05" required>
            <p class="error-message" id="error-message"></p>
            <div class="invalid-feedback">Please provide a valid mobile number.</div>
          </div> <!-- form-group close -->

          <div class="form-group">
            <label for="validationCustom07" class="required">E-mail</label>
            <input type="email" class="form-control" name="e-mail" id="validationCustom07" required>
            <div class="invalid-feedback">Please provide a valid E-Mail.</div>
            <span id="email_error-message" class="email_error-message"></span>
          </div> <!-- form-group close -->
          

        </div><!-- col-md-4 mb-3 close -->

        <div class="col-md-4 mb-3">

          <div class="form-group">
            <label for="validationCustom01" class="required">Last name</label>
            <input type="text" class="form-control" name="lname" id="validationCustom01" required>
            <div class="valid-feedback">Looks good!</div>
          </div> <!-- form-group close -->

          <div class="form-group">
            <label for="validationCustom04" class="required">Education Qualification</label>
            <input type="text" class="form-control" name="qualification" id="validationCustom04" required>
            <div class="invalid-feedback">Please provide a valid qualification.</div>
          </div> <!-- form-group close -->

          <div class="form-group">
            <label for="validationCustom06" class="required">Date-of-Birth</label>
            <input type="date" class="form-control" name="dob" id="validationCustom06" required>
            <div class="invalid-feedback">Please provide a valid DOB.</div>
          </div> <!-- form-group close -->

          <div class="form-group">
            <label for="validationCustom01" class="required">Password</label>
            <input type="password" class="form-control" name="password" id="validationCustom01" value="<?php echo md5('password');?>" required>
            <div class="valid-feedback">Looks good!</div>
          </div> <!-- form-group close -->

        </div><!-- col-md-4 mb-3 close -->


      <div class="col-md-4 mb-3">
        <div class="form-group">

          <div class="container">
		        <input type="file" id="file" name="image" accept="image/*" hidden required>
		        <div class="img-area" data-img="">
			        <i class='bx bxs-cloud-upload icon'></i>
			        <h3>Upload Image</h3>
			        <p>Image size must be less than <span>2MB</span></p>
		        </div>
	        </div>

        </div>
      </div>


      </div><!-- row close -->

      <div class="row">
      <div class="col-md-6 mb-3">
          <label for="validationCustom08" class="required">Address</label>
            <input type="text" class="form-control" name="address" id="validationCustom08" required>
            <div class="invalid-feedback">Please provide a valid address.</div>
      </div>

      <div class="col-md-6 mb-3">
          <label for="validationCustom09" class="required">City</label>
          <input type="text" class="form-control" name="city" id="validationCustom09" required>
          <div class="invalid-feedback">Please provide a valid city.</div>
      </div>
      </div>

      <div class="row">
      <div class="col-md-4 mb-3">
      <label for="validationCustom10" class="required">District</label>
          <select class="custom-select" name="district" id="validationCustom10" required>
            <option selected disabled>Choose...</option>
            <option value="Alappuzha">Alappuzha</option>
            <option value="Ernakulam">Ernakulam</option>
            <option value="Idukki">Idukki</option>
            <option value="Kannur">Kannur</option>
            <option value="Kasaragod">Kasaragod</option>
            <option value="Kollam">Kollam</option>
            <option value="Kottayam">Kottayam</option>
            <option value="Kozhikode">Kozhikode</option>
            <option value="Malappuram">Malappuram</option>
            <option value="Palakkad">Palakkad</option>
            <option value="Pathanamthitta">Pathanamthitta</option>
            <option value="Thiruvananthapuram">Thiruvananthapuram</option>
            <option value="Thrissur">Thrissur</option>
            <option value="Wayanad">Wayanad</option>
          </select>
          <div class="invalid-feedback">Please select a valid district.</div>
      </div>

      <div class="col-md-4 mb-3">
      <label for="validationCustom11" class="required">State</label>
      <input type="text" class="form-control" name="state" id="validationCustom11" value="Kerala" required>
        <div class="invalid-feedback">Please select a valid State.</div>
      </div>

      <div class="col-md-4 mb-3">
        <label for="validationCustom12" class="required">Zip code</label>
        <input type="text" class="form-control" name="zip" id="validationCustom12" required>
        <div class="invalid-feedback">Please provide a valid zip code.</div>
      </div>
      </div>
      <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="u_add_principal" class="btn btn-primary">Add Principal</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- display the facult deatils -->
<br><br>

<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead align=center>
            <tr>
              <th>SL.No</th>
              <th>Full Name</th>
              <th>Mobile Number</th>
              <th>E-Mail</th>
              <th>Education Qualification</th>
              <th colspan=3>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $i=1;
$sql = "SELECT * FROM users INNER JOIN principal_data ON users.u_email = principal_data.u_email";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
  while($row = mysqli_fetch_assoc($result)) 
  {
?>

            <tr align=center>
              <td><?php echo $i++;?></td>
              <td><?php echo $row['u_name'];?></td>
              <td><?php echo $row['u_mobile'];?></td>
              <td><?php echo $row['u_email'];?></td>
              <td><?php echo $row['u_qualification'];?></td>
              <td>
              <button data-id='<?php echo $row['id']; ?>' class="view-details btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class='bx bx-expand'></i></button>
              </td>
              <td></td>
              <td></td>
            </tr>
<?php
  }
} 
else 
{
  echo "0 results";
}
?>
        </tbody>
    </table> 

<script type='text/javascript'>
            $(document).ready(function(){
                $('.view-details').click(function(){
                    var id = $(this).data('id');
                    $.ajax({
                        url: 'ajax_folder/ajaxfile.php',
                        type: 'post',
                        data: {id: id},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#exampleModalCenter').modal('show'); 
                        }
                    });
                });
            });
            </script>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><span id="modal-name">User Info</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div> 

        </div>
      </div>
    </div>
  </section>



  <script>
        const imgArea = document.querySelector('.img-area');
        const inputFile = document.querySelector('#file');

        imgArea.addEventListener('click', function () {
            inputFile.click();
        });

        inputFile.addEventListener('change', function () {
            const image = this.files[0];
            
            if (image.size < 2000000) {
                const reader = new FileReader();
                reader.onload = () => {
                    const allImg = imgArea.querySelectorAll('img');
                    allImg.forEach(item => item.remove());
                    const imgUrl = reader.result;
                    const img = document.createElement('img');
                    img.src = imgUrl;
                    imgArea.appendChild(img);
                    imgArea.classList.add('active');
                    imgArea.dataset.img = image.name;
                };
                reader.readAsDataURL(image);
            } else {
                alert("Image size more than 2MB");
            }
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

</body>
</html>