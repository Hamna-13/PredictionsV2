<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Edit Tournament</title>
</head>

<body>
    <?php
      
    include 'database.php';

    // Check if the editTournament button is pressed
    if (isset($_POST['editTournament'])) {
        // Get the tournament ID from the form
        $tournamentId = $_POST['tournament_id'];

        // Fetch tournament details from the database
        $fetchQuery = "SELECT * FROM tournaments WHERE tournamentid = $tournamentId";
        $result = mysqli_query($con, $fetchQuery);
        $tournament = mysqli_fetch_assoc($result);

        $teamsQuery = "SELECT * FROM teams";
        $teamsResult = mysqli_query($con, $teamsQuery);

        // Fetch already selected teams for the tournament
        $selectedTeamsQuery = "SELECT teamid FROM tournament_teams WHERE tournamentid = $tournamentId";
        $selectedTeamsResult = mysqli_query($con, $selectedTeamsQuery);
        $selectedTeamIds = [];
        while ($selectedTeam = mysqli_fetch_assoc($selectedTeamsResult)) {
            $selectedTeamIds[] = $selectedTeam['teamid'];
        }
        // Close the database connection
        mysqli_close($con);

        // Stop further execution to avoid showing the tournament list
        //exit();
    }

    // Assuming you have a database connection established in database.php
    ?>

    <div class="container mt-5">
        <h1>Edit Tournament</h1>
        <form method="post" action='update_tournament.php'>
            <div class="mb-3">
                <label for="tournamentName" class="form-label">Tournament Name</label>
                <input type="text" class="form-control" id="tournamentName" name="tournamentName" value="<?php echo $tournament['tournamentName']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="startDate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo $tournament['startDate']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="endDate" class="form-label">End Date</label>
                <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo $tournament['endDate']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Select Teams</label>
                <?php
                // Output data of each team
                while ($team = mysqli_fetch_assoc($teamsResult)) {
                    $checked = in_array($team['teamid'], $selectedTeamIds) ? 'checked' : '';
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='checkbox' value='{$team['teamid']}' name='selectedTeams[]' $checked>";
                    echo "<label class='form-check-label'>{$team['teamName']}</label>";
                    echo "</div>";
                }
                ?>
            </div>
            <input type="hidden" name="tournament_id" value="<?php echo $tournamentId; ?>">
            <button type="submit" class="btn btn-primary">Update Tournament</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>