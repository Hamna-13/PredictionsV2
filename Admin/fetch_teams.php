<?php
// Include your database connection file
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tournamentid'])) {
    // Sanitize input data
    $tournamentId = mysqli_real_escape_string($con, $_POST['tournamentid']);

    // Fetch teams associated with the selected tournament
    $sql = "SELECT * FROM teams WHERE tournamentid = $tournamentId";
    $result = mysqli_query($con, $sql);

    $teamsArray = array();

    if ($result) {
        // Fetch teams and build the array
        while ($row = mysqli_fetch_assoc($result)) {
            $teamsArray[] = array(
                'teamid' => $row['teamid'],
                'teamName' => $row['teamName']
            );
        }
    }

    // Close the database connection
    mysqli_close($con);

    // Return teams data in JSON format
    echo json_encode($teamsArray);
} else {
    // Handle invalid requests
    echo "Invalid request.";
}
?>
