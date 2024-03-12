<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Candidate Registration</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS for uppercase text */
    .col-form-label {
      text-transform: uppercase; /* Convert text to uppercase */
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mb-5">
          <div class="card-header">
            <h4 class="text-center">Candidate Registration Form</h4>
          </div>
          <div class="card-body">
            <form>
              <div class="border rounded p-3 mb-3">
              <div class="mb-3 row align-items-center">
                  <label for="studiedHere" class="col-sm-4 col-form-label">Studied 10th Standard Here?</label>
                  <div class="col-sm-8">
                    <select class="form-select" id="studiedHere" required>
                      <option value="" selected disabled>Select</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row align-items-center">
                  <label for="registerNo" class="col-sm-4 col-form-label">Register No.</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="registerNo" required>
                  </div>
                </div>
                <div class="mb-3 row align-items-center">
                  <label for="monthPass" class="col-sm-4 col-form-label">Month pass</label>
                  <div class="col-sm-8">
                    <select class="form-select" id="monthPass" required>
                      <option value="" selected disabled>Select Month</option>
                      <option value="1">January</option>
                      <option value="2">February</option>
                      <option value="3">March</option>
                      <option value="4">April</option>
                      <option value="5">May</option>
                      <option value="6">June</option>
                      <option value="7">July</option>
                      <option value="8">August</option>
                      <option value="9">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row align-items-center">
                  <label for="yearPass" class="col-sm-4 col-form-label">Year pass</label>
                  <div class="col-sm-8">
                    <select class="form-select" id="yearPass" required>
                      <option value="" selected disabled>Select Year</option>
                      <?php
                        $currentYear = date("Y");
                        for ($i = $currentYear; $i >= $currentYear - 5; $i--) {
                          echo "<option value='$i'>$i</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row align-items-center">
                  <label for="dob" class="col-sm-4 col-form-label">Date of Birth (DD-MM-YYYY)</label>
                  <div class="col-sm-8">
                  <input type="date" class="form-control" id="dob" min="2005-01-01" max="2009-12-31" required>
                  </div>
                </div>
                <div class="mb-3 row align-items-center">
                  <label for="mobileNo" class="col-sm-4 col-form-label">Mobile No.</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="mobileNo" required>
                  </div>
                </div>
                <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary" style="width: 200px;">Register</button>
              </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
