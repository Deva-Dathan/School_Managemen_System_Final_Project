<?php
session_start();
include("../header.php");
include("../footer.php");

// echo $_SESSION['u_username'];
// echo "<br>";
// echo $_SESSION['u_role'];
?>

<?php
include("../include/db_connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $full_name = $first_name." ".$last_name;
  $gender = $_POST['gender'];
  $qualification = $_POST['qualification'];
  $mobile_number = $_POST['phone'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $district = $_POST['district'];
  $state = $_POST['state'];
  $zip = $_POST['zipcode'];

  $message = "New record created successfully";

  $sql = "INSERT INTO user_details (u_name, u_address, u_email, u_dob, u_qualification, u_mobile, u_city, u_district, u_state, u_zip, u_role) VALUES ('$full_name', '$address', '$email', '$dob', '$qualification', '$mobile_number', '$city', '$district', '$state', '$zip', 'PRINCIPAL')";
  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("' . $message . '");</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Dashboard | S N S M</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	--dark-blue: #0C5FCD;
	--red: #FC3B56;
  --dark-red: #FC1605
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
  font-size: 38px;
  font-weight: 500;
  color: #000;
  min-width: 60px;
  text-align: center
}
.sidebar .logo-details .logo_name{
  color: #000;
  font-size: 30px;
  font-weight: 500;
  font-weight: bold;
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
  width: 92%;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  margin-left: 5px;
}
.sidebar .nav-links li a.active{
  background: var(--blue);
  border-radius: 10px;
}
.sidebar .nav-links li a:hover{
  background: var(--light);
  border-radius: 10px;
  color:var(--dark);
}
.sidebar .nav-links li i{
  min-width: 60px;
  text-align: center;
  font-size: 18px;
  color: #000;
  font-weight: bold;
}
.sidebar .nav-links li a .links_name{
  color: #000;
  font-weight: bold;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
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
	transition: all .3s ease;
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
	top: -8px;
	right: 0px;
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
.overview-boxes .box-topic{
  font-size: 20px;
  font-weight: 500;
}
.home-content .box .number{
  display: inline-block;
  font-size: 35px;
  margin-top: -6px;
  font-weight: 500;
}
.home-content .box .indicator{
  display: flex;
  align-items: center;
}
.home-content .box .indicator i{
  height: 20px;
  width: 20px;
  background: #8FDACB;
  line-height: 20px;
  text-align: center;
  border-radius: 50%;
  color: #fff;
  font-size: 20px;
  margin-right: 5px;
}
.box .indicator i.down{
  background: #e87d88;
}
.home-content .box .indicator .text{
  font-size: 12px;
}
.home-content .box .cart{
  display: inline-block;
  font-size: 32px;
  height: 50px;
  width: 50px;
  background: #cce5ff;
  line-height: 50px;
  text-align: center;
  color: #66b0ff;
  border-radius: 12px;
  margin: -15px 0 0 6px;
}
.home-content .box .cart.two{
   color: #2BD47D;
   background: #C0F2D8;
 }
.home-content .box .cart.three{
   color: #ffc233;
   background: #ffe8b3;
 }
.home-content .box .cart.four{
   color: #e05260;
   background: #f7d4d7;
 }
.home-content .total-order{
  font-size: 20px;
  font-weight: 500;
}
.home-content .sales-boxes{
  display: flex;
  justify-content: space-between;
  /* padding: 0 20px; */
}
.required::after{
  content: " *";
  color: red;
  font-size: 18px;
}
/* left box */
.home-content .sales-boxes .recent-sales{
  width: 100%;
  max-width: 1200px;
  /* margin: 0 auto; */
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
textarea {
  width: 100%;
  box-sizing: border-box;
}
@media screen and (max-width: 600px) {
  .recent-sales {
    max-width: 100%;
  }
}
.home-content .sales-boxes .sales-details{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sales-boxes .box .title{
  font-size: 24px;
  font-weight: 500;
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
  width: 35%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px 0 0;
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
div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }
     </style>
   </head>
<body class="element" id="element">
	<?php include("../loader.php");?>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">S N S M</span>
    </div>
      <ul class="nav-links">
      <abbr title="DASHBOARD"><li>
          <a href="super_admin_dash.php">
            <i class='bx bxs-dashboard' style="font-weight:bold;"></i>
            <span class="links_name" style="font-weight:bold;">DASHBOARD</span>
          </a>
        </li></abbr>
        <abbr title="PRINCIPAL"><li>
          <a href="change_principal.php" class="active">
          <i class='bx bx-user' style="color:#fff; font-weight:bold;"></i>
            <span class="links_name" style="color:#fff; font-weight:bold;">PRINCIPAL</span>
          </a>
        </li></abbr>
        <abbr title="VICE PRINCIPAL"><li>
          <a href="change_vice_principal.php">
          <i class='bx bxs-user-circle' style="font-weight:bold;"></i>
            <span class="links_name" style="font-weight:bold;">VICE PRINCIPAL</span>
          </a>
        </li></abbr>
        <abbr title="TEACHERS"><li>
          <a href="add_teachers.php">
          <i class='bx bxs-user'></i>
            <span class="links_name" style="font-weight:bold;">TEACHERS</span>
          </a>
        </li></abbr>
        <abbr title="STUDENTS"><li>
          <a href="view_students.php">
            <i class='bx bx-user-circle' ></i>
            <span class="links_name" style="font-weight:bold;">STUDENTS</span>
          </a>
        </li></abbr>
        <abbr title="ALLOTMENT CELL"><li>
          <a href="add_office.php">
          <i class='bx bxs-user-plus'></i>
            <span class="links_name" style="font-weight:bold;">ALLOTMENT CELL</span>
          </a>
        </li></abbr>
        <abbr title="OFFICE STAFF"><li>
          <a href="add_office.php">
          <i class='bx bx-buildings'></i>
            <span class="links_name" style="font-weight:bold;">OFFICE STAFF</span>
          </a>
        </li></abbr>
        <abbr title="CLASSES"><li>
          <a href="add_class.php">
          <i class='bx bx-copyright'></i>
            <span class="links_name" style="font-weight:bold;">CLASSES</span>
          </a>
        </li></abbr>
        <abbr title="SUBJECTS"><li>
          <a href="add_subjects.php">
          <i class='bx bx-book-alt'></i>
            <span class="links_name" style="font-weight:bold;">SUBJECTS</span>
          </a>
        </li></abbr>
        <abbr title="FEES"><li>
          <a href="update_fees.php">
          <i class='bx bx-dollar'></i>
            <span class="links_name" style="font-weight:bold;">FEES</span>
          </a>
        </li></abbr>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">PRINCIPAL</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <button onclick="toggleFullScreen();" style="background:none; border:none;"><i class='bx bx-fullscreen'></i><i class='bx bx-exit-fullscreen' style="display:none;"></i></button>
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
					<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="#"><i class='bx bxs-cog' ></i> Settings</a></li>
					<li><a href="#"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
    </nav>
    <div class="home-content">
      <div class="sales-boxes">
        <div class="col-md-11 recent-sales box">
        <div class="form-row">
        <div class="col-12 col-md-6 title font-weight-bold">CHANGE PRINCIPAL</div>
        <div class="col-12 col-md-6 new-btn"><a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left:260px;"><i class='bx bx-plus'>&nbsp</i>NEW PRINCIPAL</a></div>
        </div><br>

        <!-- Display Teachers datas -->
        <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>SL No</th>
                <th>Full name</th>
                <th>E-mail</th>
                <th>Mobile Number</th>
                <th>Education Qualification</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>City</th>
                <th>District</th>
                <th>State</th>
                <th>Zip Code</th>
                <th>Current Role</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger</td>
                <td>Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
                <td>5421</td>
                <td>t.nixon@datatables.net</td>
                <td>Tiger</td>
                <td>Nixon</td>
                <td>System Architect</td>
            </tr>
            <tr>
                <td>Garrett</td>
                <td>Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
                <td>8422</td>
                <td>g.winters@datatables.net</td>
                <td>Tiger</td>
                <td>Nixon</td>
                <td>System Architect</td>
            </tr>
            <tr>
                <td>Ashton</td>
                <td>Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009-01-12</td>
                <td>$86,000</td>
                <td>1562</td>
                <td>a.cox@datatables.net</td>
                <td>Tiger</td>
                <td>Nixon</td>
                <td>System Architect</td>
            </tr>

        </tbody>
    </table>









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
        
      <form method="POST" class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label class="required" for="validationCustom01">First Name</label>
      <input type="text" name="first_name" class="form-control" id="validationCustom01" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label class="required" for="validationCustom02">Last Name</label>
      <input type="text" name="last_name" class="form-control" id="validationCustom02" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label class="required" for="validationCustom03">Gender</label>
      <select class="custom-select" name="gender" id="validationCustom03" required>
        <option selected disabled value="">Choose...</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid state.
      </div>
    </div>
</div>
<div class="form-row">
  <div class="col-md-3 mb-3">
      <label class="required" for="validationCustom04">Education Qualification</label>
      <input type="text" name="qualification" class="form-control" id="validationCustom04" required>
      <div class="invalid-feedback">
        Please provide a Education Qualification.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label class="required" for="validationCustom05">Mobile Number</label>
      <input type="number" name="phone" class="form-control" id="validationCustom05" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    
    <div class="col-md-3 mb-3">
      <label class="required" for="validationCustom06">Date-of-Birth</label>
      <input type="date" name="dob" class="form-control" id="validationCustom06" required>
      <div class="invalid-feedback">
        Please provide a valid Date-of-Birth.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label class="required" for="validationCustom07">E-mail</label>
      <input type="email" name="email" class="form-control" id="validationCustom07" required>
      <div class="invalid-feedback">
        Please provide a E-Mail.
      </div>
    </div>
  </div>
<div class="form-row">
    <div class="col-md-6 mb-3">
      <label class="required" for="validationCustom08">Address</label>
      <input type="text" name="address" class="form-control" id="validationCustom08" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label class="required" for="validationCustom09">City</label>
      <input type="text" name="city" class="form-control" id="validationCustom09" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label class="required" for="validationCustom10">District</label>
      <select class="custom-select" name="district" id="validationCustom10" required>
        <option selected disabled value="">Choose...</option>
        <option value="Alappuzha">Alappuzha</option>
        <option value="Ernakulam">Ernakulam</option>
        <option value="Idukki">Idukki</option>
        <option value="Kannur ">Kannur </option>
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
      <div class="invalid-feedback">
        Please select a valid state.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label class="required" for="validationCustom10">State</label>
      <select class="custom-select" name="state" id="validationCustom10" required>
        <option selected disabled value="">Choose...</option>
        <option value="Andhra Pradesh">Andhra Pradesh</option>
        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
        <option value="Assam">Assam</option>
        <option value="Bihar">Bihar</option>
        <option value="Chhattisgarh">Chhattisgarh</option>
        <option value="Goa">Goa</option>
        <option value="Gujarat">Gujarat</option>
        <option value="Haryana">Haryana</option>
        <option value="Himachal Pradesh">Himachal Pradesh</option>
        <option value="Jharkhand">Jharkhand</option>
        <option value="Karnataka">Karnataka</option>
        <option value="Kerala">Kerala</option>
        <option value="Madhya Pradesh">Madhya Pradesh</option>
        <option value="Maharashtra">Maharashtra</option>
        <option value="Manipur">Manipur</option>
        <option value="Meghalaya">Meghalaya</option>
        <option value="Mizoram">Mizoram</option>
        <option value="Nagaland">Nagaland</option>
        <option value="Odisha">Odisha</option>
        <option value="Punjab">Punjab</option>
        <option value="Rajasthan">Rajasthan</option>
        <option value="Sikkim">Sikkim</option>
        <option value="Tamil Nadu">Tamil Nadu</option>
        <option value="Telangana">Telangana</option>
        <option value="Tripura">Tripura</option>
        <option value="Uttar Pradesh">Uttar Pradesh</option>
        <option value="Uttarakhand">Uttarakhand</option>
        <option value="West Bengal">West Bengal</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid state.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label class="required" for="validationCustom11">Zip</label>
      <input type="number" name="zipcode" class="form-control" id="validationCustom11" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
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
        <button class="btn btn-primary" type="submit">ADD PRINCIPAL</button>
      </div>
      </form>
    </div>
  </div>
</div>
        </div>
        </div>
    </div>
  </section>

<script>
  new DataTable('#example', {
    scrollX: true
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
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}


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




</body>
</html>