<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Match to Tournament</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php
    include 'database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_match'])) {
        // Check if the form is submitted with match data
        if (
            isset($_POST['tournamentid']) &&
            isset($_POST['team1_id']) &&
            isset($_POST['team2_id']) &&
            isset($_POST['match_date']) &&
            isset($_POST['match_time']) &&
            isset($_POST['venue'])
        ) {
            // Sanitize input data
            $tournamentId = mysqli_real_escape_string($con, $_POST['tournamentid']);
            $team1Id = mysqli_real_escape_string($con, $_POST['team1_id']);
            $team2Id = mysqli_real_escape_string($con, $_POST['team2_id']);
            $matchDate = mysqli_real_escape_string($con, $_POST['match_date']);
            $matchTime = mysqli_real_escape_string($con, $_POST['match_time']);
            $match_type = mysqli_real_escape_string($con, $_POST['match_type']);
            $venue = mysqli_real_escape_string($con, $_POST['venue']);

            // Insert match data into the database
            $insertMatchQuery = "INSERT INTO matches (tournamentid, team1_id, team2_id, match_date, match_time, match_type, venue) 
                             VALUES ('$tournamentId', '$team1Id', '$team2Id', '$matchDate', '$matchTime','$match_type', '$venue')";

            if (mysqli_query($con, $insertMatchQuery)) {
                echo "Match added successfully!";
                header("Location: matches.php?tournament_id=$tournamentId");
            } else {
                echo "Error adding match: " . mysqli_error($con);
            }
        } else {
            echo "Invalid request. Please provide valid match data.";
        }
    }

    // Close the database connection
    mysqli_close($con);
    ?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Add Match to Tournament</h2>
                <form method="post" action="add_matches.php">
                    <!-- Remove the 'Select Tournament' dropdown as it is pre-selected -->
                    <input type="hidden" name="tournamentid" value="<?php echo $_POST['tournament_id']; ?>">
                    <?php
                    $tournamentId = $_POST['tournament_id'];
                    ?>
                    <div class="mb-3">
                        <label for="team1_id" class="form-label">Select Team 1</label>
                        <!-- Include code to fetch and display teams here -->
                        <select class="form-select" id="team1_id" name="team1_id" required>
                            <?php
                            // Include your database connection file
                            include 'database.php';

                            // Fetch teams from the database
                            $sql ="SELECT teams.teamid, teams.teamName 
                            FROM tournament_teams 
                            JOIN teams ON tournament_teams.teamid = teams.teamid
                            WHERE tournament_teams.tournamentid = $tournamentId";
                            $result = mysqli_query($con, $sql);

                            // Check if there are any teams
                            if (mysqli_num_rows($result) > 0) {
                                // Output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row["teamid"] . "'>" . $row["teamName"] . "</option>";
                                }
                            } else {
                                echo "<option disabled>No teams available</option>";
                            }

                            // Close the database connection
                            mysqli_close($con);
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="team2_id" class="form-label">Select Team 2</label>
                        <!-- Include code to fetch and display teams here -->
                        <select class="form-select" id="team2_id" name="team2_id" required>
                            <?php
                            // Include your database connection file
                            include 'database.php';

                            // Fetch teams from the database
                            $sql = "SELECT teams.teamid, teams.teamName 
                            FROM tournament_teams 
                            JOIN teams ON tournament_teams.teamid = teams.teamid
                            WHERE tournament_teams.tournamentid = $tournamentId";
                            $result = mysqli_query($con, $sql);

                            // Check if there are any teams
                            if (mysqli_num_rows($result) > 0) {
                                // Output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row["teamid"] . "'>" . $row["teamName"] . "</option>";
                                }
                            } else {
                                echo "<option disabled>No teams available</option>";
                            }

                            // Close the database connection
                            mysqli_close($con);
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="match_date" class="form-label">Match Date</label>
                        <input type="date" class="form-control" id="match_date" name="match_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="match_time" class="form-label">Match Time</label>
                        <input type="time" class="form-control" id="match_time" name="match_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="venue" class="form-label">Venue</label>
                        <input type="text" class="form-control" id="venue" name="venue" required>
                    </div>
                    <div class="mb-3">
                        <label for="match_type" class="form-label">Match Type</label>
                        <input type="text" class="form-control" id="match_type" name="match_type" required>
                    </div>
                    <button type="submit" name="add_match" class="btn btn-primary">Add Match</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
