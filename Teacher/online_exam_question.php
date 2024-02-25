<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Kolkata');
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
.img-area, .img-area-update {
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
.img-area .icon, .img-area-update .icon {
	font-size: 100px;
    color:var(--primary-blue);
}
.img-area h3, .img-area-update h3 {
	font-size: 20px;
	font-weight: 500;
	margin-bottom: 6px;
}
.img-area p, .img-area-update p {
	color: #999;
    text-align:center;
    padding : 10px;
}
.img-area p span, .img-area-update p span {
	font-weight: 600;
}
.img-area img, .img-area-update img {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
	object-position: center;
	z-index: 100;
}
.img-area::before, .img-area-update::before {
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
.img-area.active:hover::before, .img-area-update.active:hover::before {
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
    .hidden {
    display: none;
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
          <a href="teacher_dash.php">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="view_classes.php">
            <i class='bx bxs-user' ></i>
            <span class="links_name">Allotted Classes</span>
          </a>
        </li>
        <li>
          <a href="view_students.php">
            <i class='bx bx-user' ></i>
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
          <a href="predict_marks.php">
          <i class='bx bxs-award'></i>
            <span class="links_name">Predict Marks</span>
          </a>
        </li>
        <li>
          <a href="subject_notes.php">
          <i class='bx bxs-notepad'></i>
            <span class="links_name">Subject Notes</span>
          </a>
        </li>
        <li>
          <a href="create_online_exam.php" class="active">
          <i class='bx bx-bookmarks' style="color:var(--light);"></i>
            <span class="links_name" style="color:var(--light);">Online Exam</span>
          </a>
        </li>
        <li>
          <a href="internal_marks.php">
          <i class='bx bxs-bookmarks'></i>
            <span class="links_name">Internal Marks</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"><?php echo $_SESSION['u_name'];?></span>
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
					<li><a href="teacher_profile.php"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="teacher_settings.php"><i class='bx bxs-cog' ></i> Settings</a></li>
					<li><a href="../logout.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="top-sales box">
          <div class="row">
          <div class="col-md-6 col-12 title">ONLINE EXAM</div>
          </div> <!--class row close div-->
          <br>
          <?php
          if(isset($_SESSION['success_msg']))
          {
            ?>
          <div class="alert alert-success mt-3" role="alert"><?php echo $_SESSION['success_msg'];?></div>
          <?php
            unset($_SESSION['success_msg']);
          }
          ?>


<?php
if(isset($_POST['create_exam'])) {
    include("../include/db_connection.php");

    // Assuming the following variables are correctly obtained from the form submission or session
    $standard = $_POST['standard'];
    $subject = $_POST['subject'];
    $no_qn = $_POST['no_qn'];
    $question_by = $_SESSION['u_email']; // Assuming 'u_email' is available in session
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $time = $_POST['exam_duration'];
    $last_date = $_POST['due_date']; 
    $exam_id = $standard . "_" . $subject . "_" . rand(1000, 9999);

    // Get current date and time
    $current_date = date('Y-m-d H:i:s');

    // Initialize the query
    $insert_query = "INSERT INTO exam_questions (online_exam_id, question_id, question, option_a, option_b, option_c, option_d, crt_option, standard, subject, question_by, date, start_time, end_time, exam_duration, due_date) VALUES ";

    // Loop through each set of question data
    for ($i = 0; $i < $no_qn; $i++) {
        // Increment question_id for the next iteration
        $question_id = $i + 1;

        $question = mysqli_real_escape_string($conn, $_POST['question'][$i]);
        $option_a = mysqli_real_escape_string($conn, $_POST['option_a'][$i]);
        $option_b = mysqli_real_escape_string($conn, $_POST['option_b'][$i]);
        $option_c = mysqli_real_escape_string($conn, $_POST['option_c'][$i]);
        $option_d = mysqli_real_escape_string($conn, $_POST['option_d'][$i]);
        $crt_option = mysqli_real_escape_string($conn, $_POST['crt_option'][$i]);

        // Append values to the insert query
        $insert_query .= "('$exam_id', $question_id, '$question', '$option_a', '$option_b', '$option_c', '$option_d', '$crt_option', '$standard', '$subject', '$question_by', '$current_date', '$start_time', '$end_time', '$time', '$last_date')";

        // Add a comma if it's not the last iteration
        if ($i < $no_qn - 1) {
            $insert_query .= ",";
        }
    }

    // Print out the constructed insert query for debugging
    echo "Insert Query: " . $insert_query . "<br>";

    // Execute the insert query
    if ($conn->query($insert_query) === TRUE) {
      $_SESSION['created_success'] = "EXAM CREATED SUCCESSFULLY";
      ob_end_clean();
      header("Location:create_online_exam.php");
    } else {
      $_SESSION['created_fail'] = "ERROR IN CREATING EXAM" . $conn->error;
      ob_end_clean();
      header("Location:create_online_exam.php");
    }

    // Close the database connection
    $conn->close();
}
?>



                    <form method="POST" class="needs-validation" novalidate>
<?php
$j=1;
if(isset($_POST['no_qn'])) 
{
?>

<!-- Variable calling form the previous file -->

<div class="row">
  <div class="col-md-4 mb-3">
  <label for="validationCustom01" class="required">Standard</label>
              <select class="custom-select" name="standard" id="validationCustom01" readonly>
                <option value="<?php echo $_POST['standard'];?>"><?php echo $_POST['standard'];?></option>
              </select>
  </div> <!-- col-md-6 mb-3 close -->

  <div class="col-md-4 mb-3">
    <label for="validationCustom04" class="required">Subject</label>
    <select class="custom-select" name="subject" id="validationCustom04" readonly>
          <option value="<?php echo $_POST['subject'];?>"><?php echo $_POST['subject'];?></option>
    </select>
</div>

<div class="col-md-4 mb-3">
  <input type="hidden" class="form-control" value="<?php echo $_POST['no_qn'];?>" name="no_qn" id="validationCustom03" required>
  </div> <!-- col-md-6 mb-3 close -->

  <div class="col-md-3 mb-3">
    <input type="hidden" class="form-control" value="<?php echo $_POST['start_time'] ?>" name="start_time" id="start_time" required>
</div>

<div class="col-md-3 mb-3">
    <input type="hidden" class="form-control" value="<?php echo $_POST['end_time']; ?>" name="end_time" id="end_time" required>
</div>

<div class="col-md-3 mb-3">
    <input type="hidden" class="form-control" value="00:00" name="exam_duration" id="exam_duration" required>
</div>

<script>
    // Function to calculate duration and update "Exam Duration" field
    function updateDuration() {
        // Get start and end time values
        var startTime = document.getElementById("start_time").value;
        var endTime = document.getElementById("end_time").value;

        // Convert start and end time strings to Date objects
        var startDate = new Date(startTime);
        var endDate = new Date(endTime);

        // Calculate duration in milliseconds
        var durationMs = endDate - startDate;

        // Convert duration from milliseconds to HH:MM format
        var durationHours = Math.floor(durationMs / (1000 * 60 * 60));
        var durationMinutes = Math.floor((durationMs % (1000 * 60 * 60)) / (1000 * 60));

        // Format duration as HH:MM
        var formattedDuration = (durationHours < 10 ? "0" : "") + durationHours + ":" + (durationMinutes < 10 ? "0" : "") + durationMinutes;

        // Update "Exam Duration" field
        document.getElementById("exam_duration").value = formattedDuration;
    }

    // Call updateDuration function when start or end time changes
    document.getElementById("start_time").addEventListener("change", updateDuration);
    document.getElementById("end_time").addEventListener("change", updateDuration);

    // Initial call to updateDuration to set initial duration
    updateDuration();
</script>


<div class="col-md-3 mb-3">
    <input type="hidden" class="form-control" value="<?php echo $_POST['due_date'];?>" name="due_date" id="validationCustom06" required>
</div>

</div><!-- row close -->


<?php

    $no_of_questions = $_POST['no_qn'];
    for($i=1 ; $i<=$no_of_questions ; $i++)
    {
        ?>
<hr>


  <!-- Step 2: Enter exam details -->
    <div class="row">
      <!-- Number of questions -->
      <div class="col-md-9 mb-3">
        <label for="validationCustom03" class="required font-weight-bold">Questions <?php echo $j++;?></label>
        <textarea class="form-control" name="question[]" id="validationCustom03" rows="1" required></textarea>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationCustom05" class="required">Option A</label>
        <input type="text" class="form-control" name="option_a[]" id="validationCustom05" required>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <!-- Time duration -->
    </div>

    <div class="row">
      <!-- Number of questions -->
      <div class="col-md-3 mb-3">
        <label for="validationCustom06" class="required">Option B</label>
        <input type="text" class="form-control" name="option_b[]" id="validationCustom06" required>
        <div class="valid-feedback">Looks good!</div>
      </div>

      <div class="col-md-3 mb-3">
        <label for="validationCustom03" class="required">Option C</label>
        <input type="text" class="form-control" name="option_c[]" id="validationCustom03" required>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <!-- Time duration -->
      <div class="col-md-3 mb-3">
        <label for="validationCustom05" class="required">Option D</label>
        <input type="text" class="form-control" name="option_d[]" id="validationCustom05" required>
        <div class="valid-feedback">Looks good!</div>
      </div>
      <!-- Due date -->
      <div class="col-md-3 mb-3">
        <label for="validationCustom06" class="required">Correct Option</label>
        <input type="text" class="form-control" name="crt_option[]" id="validationCustom06" required>
        <div class="valid-feedback">Looks good!</div>
      </div>
    </div>
    <?php
    }
}
?>
<br>
    <button type="button" class="btn btn-primary" onclick="nextStep(1)">Previous</button>
    <input type="submit" name="create_exam" class="btn btn-primary" value="Submit">
      </form>

        </div>
      </div>
    </div>
  </section>

  <script>
    function nextStep(step) {
        // Get the current step number from the URL or any other source
        var currentStep = 1; // Assuming current step is 1

        // Calculate the previous step number
        var previousStep = currentStep + step;

        // Redirect or perform any other action based on the previous step number
        // For example, redirecting to a different page
        if (previousStep >= 1) {
            window.location.href = "create_online_exam.php?step=" + previousStep;
        } else {
            alert("You are already at the first step.");
        }
    }
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