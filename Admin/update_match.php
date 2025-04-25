<?php
include 'database.php';

if (isset($_POST['update_match'])) {
    $tournamentId = $_POST['tournamentid'];
    $matchId = $_POST['match_id'];
    $matchDate = $_POST['match_date'];
    $matchTime = $_POST['match_time'];
    $match_type = $_POST['match_type'];
    $venue = $_POST['venue'];
    $team1Id = $_POST['team1_id'];
    $team2Id = $_POST['team2_id'];
    //echo $tournamentId;
    // Add other fields as needed
    // Sanitize input to prevent SQL injection
    $matchId = mysqli_real_escape_string($con, $matchId);
    $matchDate = mysqli_real_escape_string($con, $matchDate);
    $matchTime = mysqli_real_escape_string($con, $matchTime);
    $match_type = mysqli_real_escape_string($con, $match_type);
    $venue = mysqli_real_escape_string($con, $venue);
    $team1Id = mysqli_real_escape_string($con, $team1Id);
    $team2Id = mysqli_real_escape_string($con, $team2Id);
    // Update the match details
    $updateMatchQuery = "UPDATE matches SET match_date = '$matchDate', match_time = '$matchTime', venue = '$venue', match_type = '$match_type' WHERE match_id = $matchId";
    $result = mysqli_query($con, $updateMatchQuery);

    $updateTeamQuery1 = "UPDATE matches SET team1_id = '$team1Id' WHERE match_id = $matchId";
    $updateTeamQuery2 = "UPDATE matches SET team2_id = '$team2Id' WHERE match_id = $matchId";
    $resultTeam1 = mysqli_query($con, $updateTeamQuery1);
    $resultTeam2 = mysqli_query($con, $updateTeamQuery2);

    if ($result && $resultTeam1 && $resultTeam2) {
        echo "Match details and teams updated successfully!";
        header('Location: matches.php?tournament_id=' . $tournamentId);
    } else {
        echo "Error updating match details or teams: " . mysqli_error($con);
    }

}
// Close the database connection
mysqli_close($con);
?>