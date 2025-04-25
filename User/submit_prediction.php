<?php
include '../includes/database.php';

// Assuming the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_prediction'])) {
    // Assuming you have the session started
    session_start();

    // Get user_id from the session
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Get other form data
    $group_id = isset($_POST['group_id']) ? $_POST['group_id'] : null;
    $match_id = isset($_POST['match_id']) ? $_POST['match_id'] : null;
    $predicted_team_id = isset($_POST['match_prediction']) ? $_POST['match_prediction'] : null;

    // Validate data (you may want to add more validation)
    if (empty($user_id) || empty($group_id) || empty($match_id) || empty($predicted_team_id)) {
        // Handle validation error, redirect or show an error message
        echo "Validation error: Missing required data.";
        exit();
    }

    // Insert prediction into the predictions table
    $insertPredictionQuery = "INSERT INTO prediction (user_id, group_id, match_id, predicted_team_id) 
                              VALUES ('$user_id', '$group_id', '$match_id', '$predicted_team_id')";
    echo $insertPredictionQuery;
    if (mysqli_query($con, $insertPredictionQuery)) {
        // Successfully inserted prediction
        echo "Prediction submitted successfully!";
        header("Location: group_details.php?group_id=" . $group_id . "&success=1");
    } else {
        // Handle database error
        echo "Error submitting prediction: " . mysqli_error($con);
        header("Location: group_details.php?group_id=" . $group_id . "&error=1");
    }
} else {
    // Invalid request, handle accordingly
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($con);
?>
