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
    
<?php
include("../include/allotment_db.php");

// Retrieving the student's SSLC mark
$sql = "SELECT * FROM candidate_mark WHERE app_no = {$_SESSION['app_no']}";
$result = $allot_conn->query($sql);
$row = $result->fetch_assoc();

// Fetching the second set of data from the database
$sql1 = "SELECT * FROM interested_tbl WHERE app_no = {$_SESSION['app_no']}";
$result1 = $allot_conn->query($sql1);
$row1 = $result1->fetch_assoc();
$interest = $row1['interested_in'];

// Fetching options based on the data fetched from the second SQL query
$sql2 = "SELECT * FROM option_tbl WHERE app_no = {$_SESSION['app_no']}";
$result2 = $allot_conn->query($sql2);
$row2 = $result2->fetch_assoc();
$option_1 = $row2['option_1'];
$option_2 = $row2['option_2'];
$option_3 = $row2['option_3'];
$option_4 = $row2['option_4'];

// Fetching the marks for different courses
$sql3 = "SELECT * FROM candidate_mark WHERE app_no = {$_SESSION['app_no']}";
$result3 = $allot_conn->query($sql3);
$row3 = $result3->fetch_assoc();

// Fetching the course marks limit data from the database
$sql4 = "SELECT * FROM allotment_limit_data";
$result4 = $allot_conn->query($sql4);
$row4 = $result4->fetch_assoc();

// Prepare the data to be sent to Flask server
$postData = json_encode([
    'interest' => $interest,
    'option_1' => $option_1,
    'option_2' => $option_2,
    'option_3' => $option_3,
    'option_4' => $option_4,
    'bio' => $row4['bio'],
    'cs' => $row4['cs'],
    'com' => $row4['com'],
    'hum' => $row4['hum']
]);

// Send POST request to Flask server
$flaskUrl = 'http://localhost:5000/recommend';
$options = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-type: application/json',
        'content' => $postData
    ]
];
$context = stream_context_create($options);
$result = file_get_contents($flaskUrl, false, $context);
if ($result === false) {
    // Error occurred while making the request
    echo "Error: Failed to connect to the Flask server.";
    // Get the last error message
    $error = error_get_last();
    if ($error !== null) {
        // Log the error
        error_log("Failed to connect to the Flask server: " . $error['message']);
    }
    exit; // Exit script to prevent further execution
}

$responseData = json_decode($result, true); // Decode JSON as associative arrays

// Print the recommended courses
if (isset($responseData['final_course'])) 
{
    $recommended_course = $responseData['final_course'];
    ?>
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
    <p style="display: inline; color:green;"><?php echo $recommended_course; ?></p>
</div>
<?php
} else {
?>
<div class="col-md-12 font-weight-bold text-center mt-5">
    <p style="display: inline; color:blue; font-size:20px;">Status of Allotment - </p>
    <p style="display: inline; color:red; font-size:20px;">Sorry !!! You're Not Eligible</p>
</div>
<div class="col-md-12 font-weight-bold text-center mt-4">
    <p style="display: inline;">Allotted School - </p>
    <p style="display: inline; color:red;">No School is Allotted</p>
</div>
<div class="col-md-12 font-weight-bold text-center">
    <p style="display: inline;">Allotted Course - </p>
    <p style="display: inline; color:red;">No Course is Allotted</p>
</div>
<?php
}
?>



</div>
</div>
</div>
<!-- Qualifying Examination Details code ends here -->

    </div>
  </div>


</body>
</html>
