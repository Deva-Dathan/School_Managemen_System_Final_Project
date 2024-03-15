<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/images/school_logo.png" type="image/x-icon">
  <title>Allotment Result Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    /* Style the navigation bar */
    *{
        margin:0;
        top:0;
        left:0;
        font-family: Arial, sans-serif;
    }
    .topnav {
      overflow: hidden;
      background-color: #004e8e; /* Background color */
    }

    /* Style the links inside the navigation bar */
    .topnav a {
      float: right; /* Align content to the right */
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    /* Add a color to the active/current link */
    .active {
      background-color: #fff;
      border-bottom:1px solid #000;
      font-weight:bold;
    }

    /* Custom CSS for uppercase text */
    .col-form-label {
      text-transform: uppercase; /* Convert text to uppercase */
      font-weight: bold;
    }
  </style>
</head>
<body>
<?php include("../loader.php");?>
<!-- Top Navbar code starts here -->
<div class="topnav">
<img src="../assets/images/school_logo.png" alt="Your Logo" style="height: 50px; margin-left: 20px;">
<a href="allot_registration.php" class="font-weight-bold"><?php echo $_SESSION['app_no'];?></a>
<a href="allot_logout.php">Logout</a>
<a class="active" href="#home" style="color:black;">Home</a> 
</div>
<!-- Top Navbar code end here -->

<!-- Top heading code starts here -->
<h5 class="text-center mt-2" style="color:#706953; font-weight:bold; font-family: Arial, sans-serif;">Candidate Login (2024 - 2026)</h5>
<!-- Top heading code end here -->

<form method="post" class="needs-validation" novalidate>
<!-- SSLC School Details code starts here -->
<div class="container mt-5">
    <div class="row justify-content-center">


<!-- Candidate Details code starts here -->
      <div class="col-md-12">
            <div class="card mb-5" style="height:350px;"    >
                <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
                <h6 class="text-center font-weight-bold">ALLOTMENT RESULT</h6>
                </div>
                <div class="card-body">


                <div class="col-md-12 text-center" style="border: 2px solid #c3c3c3;">
    <div class="row head-row" style="padding-top:20px;">
        <div class="col-md-4">
            <p class="font-weight-bold" style="display: inline;">Application Number :</p>
            <p style="display: inline;"> <?php echo $_SESSION['app_no'];?></p>
        </div>

        <div class="col-md-4">
            <p class="font-weight-bold" style="display: inline;">Mobile Number :</p>
            <p style="display: inline;">
            <?php
            include("../include/allotment_db.php");
            $sql = "SELECT * FROM candidate_data WHERE app_no = {$_SESSION['app_no']}";
            $result = mysqli_query($allot_conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo $row['mobile'];
            ?>
            </p>
        </div>

        <div class="col-md-4">
            <p class="font-weight-bold" style="display: inline;">E-Mail ID :</p>
            <p style="display: inline;">
            <?php
            include("../include/allotment_db.php");
            $sql = "SELECT * FROM register_tbl WHERE app_no = {$_SESSION['app_no']}";
            $result = mysqli_query($allot_conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo $row['email_id'];
            ?>
            </p>
        </div>
    </div>
    <div class="row mt-3" style="padding-bottom:20px;">
    <div class="col-md-4">
            <p class="font-weight-bold" style="display: inline;">Name : </p>
            <p style="display: inline;">
            <?php
                include("../include/allotment_db.php");
                $sql = "SELECT * FROM candidate_data WHERE app_no = {$_SESSION['app_no']}";
                $result = mysqli_query($allot_conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['name'];
                ?>
            </p>
        </div>

        <div class="col-md-4">
            <p class="font-weight-bold" style="display: inline;">SSLC Register Number : </p>
            <p style="display: inline;">
            <?php
                include("../include/allotment_db.php");
                $sql = "SELECT * FROM register_tbl WHERE app_no = {$_SESSION['app_no']}";
                $result = mysqli_query($allot_conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['reg_no'];
                ?>
            </p>
        </div>

        <div class="col-md-4">
            <p class="font-weight-bold" style="display: inline;">Scheme : </p>
            <p style="display: inline;">SSLC (2022-2024)</p>
        </div>
    </div>
</div>



<!-- ALLOTMENT RESULT PRINTING RESULT -->
<div class="col-md-12 font-weight-bold text-center mt-5">
        <p style="display: inline; color:blue; font-size:20px;">Status of Allotment - </p>
        <p style="display: inline; color:green; font-size:20px;">Congratulations !!! You have got Allotment</p>
</div>

<div class="col-md-12 font-weight-bold text-center mt-4">
        <p style="display: inline;">Allotted School - </p>
        <p style="display: inline; color:green;">G H S S Autonomous School (1234)</p>
    </div>

    <div class="col-md-12 font-weight-bold text-center">
        <p style="display: inline;">Allotted Course - </p>
        <p style="display: inline; color:green;">
    
        <?php
include("../include/allotment_db.php");
// Retrived the student's SSLC mark
$sql = "SELECT * FROM candidate_mark WHERE app_no = {$_SESSION['app_no']}";
$result = $allot_conn->query($sql);
$row = $result->fetch_assoc();

// $marks = $row['mal1'] + $row['mal2'] + $row['english'] + $row['hindi'] + $row['maths'] + $row['ss'] + $row['physics'] + $row['chemistry'] + $row['biology'] + $row['IT'];








// Function to recommend courses based on student interest
function recommend_course_ml($student_interest) {
    $interests = ['Engineering', 'Medicine', 'Teaching', 'Business', 'Law', 'Information Technology'];
    $recommendations = [
        'Engineering' => ['Physics', 'Chemistry', 'Biology', 'Mathematics'],
        'Medicine' => ['Physics', 'Chemistry', 'Biology', 'Mathematics'],
        'Teaching' => [['Physics', 'Chemistry', 'Biology', 'Mathematics'], 
                       ['Physics', 'Chemistry', 'Mathematics', 'Computer Science'],
                       ['Business Studies', 'Accountancy', 'Economics', 'Computer Application'],
                       ['History', 'Economics', 'Political Studies', 'Social Work']],
        'Business' => [['Business Studies', 'Accountancy', 'Economics', 'Computer Application'],
                       ['History', 'Economics', 'Political Studies', 'Social Work']],
        'Law' => ['History', 'Economics', 'Political Studies', 'Social Work'],
        'Information Technology' => [['Physics', 'Chemistry', 'Mathematics', 'Computer Science'],
                                      ['Business Studies', 'Accountancy', 'Economics', 'Computer Application']]
    ];
    
    $recommended_courses = $recommendations[$student_interest];
    return $recommended_courses;
}

// Simple router for handling GET requests
$request_method = $_SERVER["REQUEST_METHOD"];
if ($request_method === "GET") {
    $path = $_SERVER["REQUEST_URI"];
    if ($path === "/recommend_courses") {
        $student_interest = $_GET["interest"];
        $recommended_courses = recommend_course_ml($student_interest);
        $groups = array_chunk($recommended_courses, 4);
        $response = [];
        foreach ($groups as $index => $group) {
            $response["Group " . ($index + 1)] = $group;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Return a message for paths other than "/recommend_courses"
        echo "Invalid path.";
    }
} else {
    // Return a message for request methods other than GET
    echo "Method not allowed.";
}






















// Retrived the student's interest
// $sql1 = "SELECT * FROM interested_tbl WHERE app_no = {$_SESSION['app_no']}";
// $result1 = $allot_conn->query($sql1);
// $row1 = $result1->fetch_assoc();
?>

        </p>
    </div>

</div>
</div>
</div>
<!-- Qualifying Examination Details code ends here -->

    </div>
  </div>


</body>
</html>
