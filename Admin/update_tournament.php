<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted with tournament data
    if (isset($_POST['tournament_id']) && isset($_POST['tournamentName']) && isset($_POST['startDate']) && isset($_POST['endDate'])) {
        // Sanitize input data
        $tournamentId = mysqli_real_escape_string($con, $_POST['tournament_id']);
        $tournamentName = mysqli_real_escape_string($con, $_POST['tournamentName']);
        $startDate = mysqli_real_escape_string($con, $_POST['startDate']);
        $endDate = mysqli_real_escape_string($con, $_POST['endDate']);

        // Update tournament in the database
        $updateQuery = "UPDATE tournaments SET tournamentName='$tournamentName', startDate='$startDate', endDate='$endDate' WHERE tournamentid=$tournamentId";

        if (mysqli_query($con, $updateQuery)) {
            // Fetch teams for the tournament
            $teamsQuery = "SELECT teams.teamid FROM tournament_teams
                            JOIN teams ON tournament_teams.teamid = teams.teamid
                            WHERE tournament_teams.tournamentid = $tournamentId";
            $teamsResult = mysqli_query($con, $teamsQuery);

            // Get the selected teams from the form
            $selectedTeams = isset($_POST['selectedTeams']) ? $_POST['selectedTeams'] : [];

            // Delete existing team entries for the tournament
            $deleteTeamsQuery = "DELETE FROM tournament_teams WHERE tournamentid=$tournamentId";
            mysqli_query($con, $deleteTeamsQuery);

            // Insert the updated list of teams for the tournament
            foreach ($selectedTeams as $teamId) {
                $insertTeamQuery = "INSERT INTO tournament_teams (tournamentid, teamid) VALUES ('$tournamentId', '$teamId')";
                mysqli_query($con, $insertTeamQuery);
            }

            // Display selected teams
            echo "Selected Teams:<ul>";
            foreach ($selectedTeams as $teamId) {
                $teamNameQuery = "SELECT teamName FROM teams WHERE teamid=$teamId";
                $teamNameResult = mysqli_query($con, $teamNameQuery);
                $teamNameRow = mysqli_fetch_assoc($teamNameResult);
                echo "<li>" . $teamNameRow['teamName'] . "</li>";
            }
            echo "</ul>";

            // Redirect to the tournaments page
            header("Location: tournaments.php");
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            echo "Error updating tournament: " . mysqli_error($con);
        }
    } else {
        echo "Invalid request. Please provide valid tournament data.";
    }
} else {
    echo "Invalid request method.";
}
// Close the database connection
mysqli_close($con);
?>