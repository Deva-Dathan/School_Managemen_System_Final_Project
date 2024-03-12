<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Candidate Login (2024 - 2026)</title>
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

<!-- Top Navbar code starts here -->
<div class="topnav">
<img src="../assets/images/school_logo.png" alt="Your Logo" style="height: 50px; margin-left: 20px;">
<a href="#display">Display Application Number</a>
<a href="#logout">Logout</a>
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
      <div class="col-md-12"> <!-- Adjusted to col-md-12 -->
        <div class="card mb-5">
          <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
            <h6 class="font-weight-bold">SSLC School Details</h6>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td class="text-uppercase font-weight-bold w-25">Application Number</td>
                  <td class="text-center font-weight-bold" style="color:green;">ABC123456</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
<!-- SSLC School Details code ends here -->


<!-- Qualifying Examination Details code starts here -->
      <div class="col-md-6">
            <div class="card mb-5" style="height:400px;"    >
                <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
                    <h6 class="font-weight-bold">Qualifying Examination Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">Qualifying Exam</td>
                                <td>1-SSLC (2020-2021)</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Register No</td>
                                <td>22MCAR0057</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Month pass</td>
                                <td>MARCH</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Year pass</td>
                                <td>2024</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Passed in Board exam</td>
                                <td>YES</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Chance No</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<!-- Qualifying Examination Details code ends here -->

        
<!-- Qualifying Examination Details code starts here -->
<div class="col-md-6">
            <div class="card mb-5" style="height:400px;">
                <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
                    <h6 class="font-weight-bold">Personal Details</h6>
                </div>
                <div class="card-body">
                <table class="table table-bordered" style="height:100px;">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold" style="border-bottom: 1px solid #fff;">Name</td>
                                <td style="border-bottom: 1px solid #fff;"><input type="text" class="form-control" style="height:30px;" id="name" required></td>
                            </tr>
                            <tr>
    <td class="font-weight-bold">Gender</td>
    <td>
        <select class="form-control" id="gender" style="height:30px;">
            <option disabled selected>Choose....</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </td>
</tr>
                            <tr>
                                <td class="font-weight-bold">Date of Birth</td>
                                <td><input type="date" class="form-control" style="height:30px;" id="dob" required></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Father's Name</td>
                                <td><input type="text" class="form-control" style="height:30px;" id="fatherName" required></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Mother's Name</td>
                                <td><input type="text" class="form-control" style="height:30px;" id="motherName" required></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Mobile Number</td>
                                <td><input type="text" class="form-control" style="height:30px;" id="mobileNumber" required></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<!-- Qualifying Examination Details code ends here -->

<!-- Permanent Address Details code starts here -->
<div class="col-md-6">
            <div class="card mb-5">
                <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
                    <h6 class="font-weight-bold">Permanent Address</h6>
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                        <tbody>
                        <tr>
    <td class="font-weight-bold">House No/ House Name</td>
    <td><input type="text" class="form-control" style="height:30px;" id="houseNoPerm" required></td>
</tr>
<tr>
    <td class="font-weight-bold">Locality</td>
    <td><input type="text" class="form-control" style="height:30px;" id="localityPerm" required></td>
</tr>
<tr>
    <td class="font-weight-bold">Post office</td>
    <td><input type="text" class="form-control" style="height:30px;" id="postOfficePerm" required></td>
</tr>
<tr>
    <td class="font-weight-bold">Village</td>
    <td><input type="text" class="form-control" style="height:30px;" id="villagePerm" required></td>
</tr>
<tr>
    <td class="font-weight-bold">City</td>
    <td><input type="text" class="form-control" style="height:30px;" id="cityPerm" required></td>
</tr>
<tr>
    <td class="font-weight-bold">District</td>
    <td><input type="text" class="form-control" style="height:30px;" id="districtPerm" required></td>
</tr>
<tr>
    <td class="font-weight-bold">State</td>
    <td><input type="text" class="form-control" style="height:30px;" id="statePerm" required></td>
</tr>
<tr>
    <td class="font-weight-bold">Pin code</td>
    <td><input type="text" class="form-control" style="height:30px;" id="pinCodePerm" required></td>
</tr>

                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
<!-- Permanent Address Details code ends here -->


<!-- Communication Address Details code starts here -->
<div class="col-md-6">
            <div class="card mb-5">
            <div class="card-header" style="font-family: Arial, sans-serif; height:40px; background-color: #004e95; color: #fff;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h6 class="font-weight-bold">Communication Address</h6>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="copyAddressCheckbox" style="margin-left:5px;">
                    <label class="form-check-label" for="copyAddressCheckbox" style="color: #fff; padding-left: 5px;">
                        Same As Permanent Address
                    </label>
                </div>
            </div>
        </div>
    </div>


        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="font-weight-bold">House No/ House Name</td>
                        <td><input type="text" class="form-control" style="height:30px;" id="houseNoComm" required></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Locality</td>
                        <td><input type="text" class="form-control" style="height:30px;" id="localityComm" required></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Post office</td>
                        <td><input type="text" class="form-control" style="height:30px;" id="postOfficeComm" required></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Village</td>
                        <td><input type="text" class="form-control" style="height:30px;" id="villageComm" required></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">City</td>
                        <td><input type="text" class="form-control" style="height:30px;" id="cityComm" required></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">District</td>
                        <td><input type="text" class="form-control" style="height:30px;" id="districtComm" required></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">State</td>
                        <td><input type="text" class="form-control" style="height:30px;" id="stateComm" required></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Pin code</td>
                        <td><input type="text" class="form-control" style="height:30px;" id="pinCodeComm" required></td>
                    </tr>
                </tbody>
            </table>
                    </div>
            </div>
        </div>
<!-- Communication Address Details code ends here -->
<script>
    // Add an event listener to the checkbox
    document.getElementById('copyAddressCheckbox').addEventListener('change', function() {
        // Check if the checkbox is checked
        if (this.checked) {
            // Copy values from permanent address to communication address fields
            document.getElementById('houseNoComm').value = document.getElementById('houseNoPerm').value;
            document.getElementById('localityComm').value = document.getElementById('localityPerm').value;
            document.getElementById('postOfficeComm').value = document.getElementById('postOfficePerm').value;
            document.getElementById('villageComm').value = document.getElementById('villagePerm').value;
            document.getElementById('cityComm').value = document.getElementById('cityPerm').value;
            document.getElementById('districtComm').value = document.getElementById('districtPerm').value;
            document.getElementById('stateComm').value = document.getElementById('statePerm').value;
            document.getElementById('pinCodeComm').value = document.getElementById('pinCodePerm').value;
        } else {
            // Clear communication address fields if checkbox is unchecked
            document.getElementById('houseNoComm').value = '';
            document.getElementById('localityComm').value = '';
            document.getElementById('postOfficeComm').value = '';
            document.getElementById('villageComm').value = '';
            document.getElementById('cityComm').value = '';
            document.getElementById('districtComm').value = '';
            document.getElementById('stateComm').value = '';
            document.getElementById('pinCodeComm').value = '';
        }
    });
</script>


<div>
    <div class="form-group" style="margin-right: 820px;">
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
  
    <button class="btn btn-primary" type="submit" style="background-color:#004e95">Submit Details</button>
</form>

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
</script
    </div>
  </div>


</body>
</html>
