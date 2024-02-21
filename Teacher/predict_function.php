<?php
session_start();
include("../include/db_connection.php");
require '../vendor/autoload.php';

use Phpml\Regression\LeastSquares;

$email = $_GET['email'];
$std = $_GET['std'];
$subject = $_GET['subject'];

$sql = "SELECT mark1, mark2, mark3 FROM subject_mark WHERE u_email='$email' AND standard='$std' AND subject='$subject'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
    if($row['mark1'] == 0)
    {
        $exam1 = $row['mark2'];
        $exam2 = $row['mark3'];

        // Your training data
$trainData = [
    [70, 75],
    [85, 80],
    [60, 65],
    [90, 95],
    [75, 70],
];

// Corresponding labels
$trainLabels = [82, 88, 75, 92, 78];

// Train the linear regression model
$model = new LeastSquares();
$model->train($trainData, $trainLabels);

// Make predictions on the test set
$predictions = $model->predict([0,100]);

// Calculate Mean Squared Error
// $mse = MeanSquaredError::score($testLabels, $predictions);
// echo "Mean Squared Error: $mse\n";

// Example new data
$newData = [
    [$exam1, $exam2],
];

// Make predictions on the new data
$newPredictions = $model->predict($newData);

$final = round($newPredictions[0],1);
// echo "<p style='text-align:center; font-weight:bold;'>Predicted Exam 1 score: {$final}</p>";

$predict_sql = "UPDATE subject_mark SET mark1='$final' WHERE u_email='$email' AND standard='$std' AND subject='$subject'";

if ($conn->query($predict_sql) === TRUE) {
  $_SESSION['predict_success'] = "I TERM EXAM SCORE PREDICTED SUCCESSFULLY";
  header("Location:predict_marks.php");
} else {
  $_SESSION['predict_error'] = "ERROR IN PREDICTION: " . $conn->error;
  header("Location:predict_marks.php");
}
    }
    elseif($row['mark2'] == 0)
    {
        $exam1 = $row['mark1'];
        $exam2 = $row['mark3'];

        // Your training data
$trainData = [
    [70, 75],
    [85, 80],
    [60, 65],
    [90, 95],
    [75, 70],
];

// Corresponding labels
$trainLabels = [82, 88, 75, 92, 78];

// Train the linear regression model
$model = new LeastSquares();
$model->train($trainData, $trainLabels);

// Make predictions on the test set
$predictions = $model->predict([0,100]);

// Calculate Mean Squared Error
// $mse = MeanSquaredError::score($testLabels, $predictions);
// echo "Mean Squared Error: $mse\n";

// Example new data
$newData = [
    [$exam1, $exam2],
];

// Make predictions on the new data
$newPredictions = $model->predict($newData);

$final = round($newPredictions[0],1);
// echo "<p style='text-align:center; font-weight:bold;'>Predicted Exam 2 score: {$final}</p>";

$predict_sql = "UPDATE subject_mark SET mark2='$final' WHERE u_email='$email' AND standard='$std' AND subject='$subject'";

if ($conn->query($predict_sql) === TRUE) {
  $_SESSION['predict_success'] = "II TERM EXAM SCORE PREDICTED SUCCESSFULLY";
  header("Location:predict_marks.php");
} else {
    $_SESSION['predict_error'] = "ERROR IN PREDICTION: " . $conn->error;
    header("Location:predict_marks.php");
}

    }
    elseif($row['mark3'] == 0)
    {
        $exam1 = $row['mark1'];
        $exam2 = $row['mark2'];

        // Your training data
$trainData = [
    [70, 75],
    [85, 80],
    [60, 65],
    [90, 95],
    [75, 70],
];

// Corresponding labels
$trainLabels = [82, 88, 75, 92, 78];

// Train the linear regression model
$model = new LeastSquares();
$model->train($trainData, $trainLabels);

// Make predictions on the test set
$predictions = $model->predict([0,100]);

// Calculate Mean Squared Error
// $mse = MeanSquaredError::score($testLabels, $predictions);
// echo "Mean Squared Error: $mse\n";

// Example new data
$newData = [
    [$exam1, $exam2],
];

// Make predictions on the new data
$newPredictions = $model->predict($newData);

$final = round($newPredictions[0],1);
echo "<p style='text-align:center; font-weight:bold;'>Predicted Exam 3 score: {$final}</p>";

$predict_sql = "UPDATE subject_mark SET mark3 = $final WHERE u_email='$email'";

if ($conn->query($predict_sql) === TRUE) 
{
  $_SESSION['predict_success'] = "FINAL EXAM SCORE PREDICTED SUCCESSFULLY";
  header("Location:predict_marks.php");
} else 
{
    $_SESSION['predict_error'] = "ERROR IN PREDICTION: " . $conn->error;
    header("Location:predict_marks.php");
}


    }
  }
}
?>