<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Match</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include 'database.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editMatch'])) {
        // Check if the form is submitted with match data
        if (isset($_POST['match_id'])) {
            // Sanitize input data
            $matchId = mysqli_real_escape_string($con, $_POST['match_id']);

            // Fetch match details from the database
            $selectMatchQuery = "SELECT * FROM matches WHERE match_id = $matchId";
            $matchResult = mysqli_query($con, $selectMatchQuery);

            if ($matchResult && mysqli_num_rows($matchResult) > 0) {
                $matchData = mysqli_fetch_assoc($matchResult);
                $tournamentId = $matchData["tournamentid"];
    ?>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h2 class="mb-4">Edit Match</h2>
                            <form method="post" action="update_match.php">
                                <input type="hidden" name="match_id" value="<?php echo $matchData['match_id']; ?>">
                                <div class="mb-3">
                                    <label for="team1_id" class="form-label">Select Team 1</label>
                                    <select class="form-select" id="team1_id" name="team1_id" required>
                                        <?php
                                        // Fetch teams from the database
                                        $team1Id = $matchData['team1_id'];
                                        $sql = "SELECT teams.teamid, teams.teamName 
                                            FROM tournament_teams 
                                            JOIN teams ON tournament_teams.teamid = teams.teamid
                                            WHERE tournament_teams.tournamentid = $tournamentId";
                                        $result = mysqli_query($con, $sql);

                                        // Check if there are any teams
                                        if (mysqli_num_rows($result) > 0) {
                                            // Output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = ($row["teamid"] == $team1Id) ? 'selected' : '';
                                                echo "<option value='" . $row["teamid"] . "' $selected>" . $row["teamName"] . "</option>";
                                            }
                                        } else {
                                            echo "<option disabled>No teams available</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="team2_id" class="form-label">Select Team 2</label>
                                    <select class="form-select" id="team2_id" name="team2_id" required>
                                        <?php
                                        // Fetch teams from the database
                                        $team2Id = $matchData['team2_id'];
                                        $sql = "SELECT teams.teamid, teams.teamName 
                                            FROM tournament_teams 
                                            JOIN teams ON tournament_teams.teamid = teams.teamid
                                            WHERE tournament_teams.tournamentid = $tournamentId";
                                        $result = mysqli_query($con, $sql);

                                        // Check if there are any teams
                                        if (mysqli_num_rows($result) > 0) {
                                            // Output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = ($row["teamid"] == $team2Id) ? 'selected' : '';
                                                echo "<option value='" . $row["teamid"] . "' $selected>" . $row["teamName"] . "</option>";
                                            }
                                        } else {
                                            echo "<option disabled>No teams available</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="match_date" class="form-label">Match Date</label>
                                    <input type="date" class="form-control" id="match_date" name="match_date" value="<?php echo $matchData['match_date']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="match_time" class="form-label">Match Time</label>
                                    <input type="time" class="form-control" id="match_time" name="match_time" value="<?php echo $matchData['match_time']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="venue" class="form-label">Venue</label>
                                    <input type="text" class="form-control" id="venue" name="venue" value="<?php echo $matchData['venue']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="match_type" class="form-label">Match Type</label>
                                    <input type="text" class="form-control" id="match_type" name="match_type" value="<?php echo $matchData['match_type']; ?>" required>
                                </div>
                                <!-- Add other input fields as needed -->
                                <!--<a href='update_match.php?tournamentid='+<?php //echo $tournamentId; ?>>Update Match</a>-->
                                <input type='hidden' name='tournamentid' value="<?php echo $tournamentId ?>">
                                <button type="submit" name="update_match" class="btn btn-primary">Update Match</button>
                            </form>
                        </div>
                    </div>
                </div>
    <?php
            } else {
                echo "<p>No match found for editing.</p>";
            }
        } else {
            echo "Invalid request. Please provide a valid match ID.";
        }
    }

    // Close the database connection
    mysqli_close($con);
    ?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
