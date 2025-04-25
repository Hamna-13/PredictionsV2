<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Matches</title>
    <style>
    .popup-form {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #fff;
        z-index: 1000;
    }
</style>

</head>

<body>
    <?php
    include 'database.php';
    
    if (isset($_POST['deleteMatch'])) {
        // Get the match ID from the form
        $matchId = $_POST['match_id'];

        // Prepare and execute the SQL query to delete the match
        $deleteQuery = "DELETE FROM matches WHERE match_id = $matchId";
        $result = mysqli_query($con, $deleteQuery);
    }
    

    if (isset($_GET['tournament_id'])) {
        // Sanitize the input
        $tournamentId = $_GET['tournament_id'];
        // Fetch tournaments from the database
        $tournamentsQuery = "SELECT * FROM tournaments  WHERE tournamentid = $tournamentId";
        $tournamentsResult = mysqli_query($con, $tournamentsQuery);

        // Check if there are any tournaments
        if ($tournamentsResult) {
            $tournament = mysqli_fetch_assoc($tournamentsResult);
            echo "<h2>{$tournament['tournamentName']}</h2>";

            // Fetch matches for the current tournament
            $tournamentId = $tournament['tournamentid'];
            $matchesQuery = "SELECT matches.*, team1.teamName AS team1Name, team2.teamName AS team2Name
            FROM matches
            INNER JOIN teams AS team1 ON matches.team1_id = team1.teamid
            INNER JOIN teams AS team2 ON matches.team2_id = team2.teamid
            WHERE matches.tournamentid = $tournamentId;";
            $matchesResult = mysqli_query($con, $matchesQuery);

            // Check if there are any matches for the tournament
            if (mysqli_num_rows($matchesResult) > 0) {
    ?>
                <form method='post'>
                    <ul>
                        <?php
                        $team1Id = $team2Id = $team1Name = $team2Name = "";
                        while ($match = mysqli_fetch_assoc($matchesResult)) {
                            // Fetch team names for Team 1 and Team 2
                            $team1Id = $match['team1_id'];
                            $team2Id = $match['team2_id'];

                            

                            // Display match information with team names
                            echo "<li><h4>{$match['team1Name']} vs {$match['team2Name']}</h4> ";
                            echo "Date: {$match['match_date']} <br> Time: {$match['match_time']} <br> Venue: {$match['venue']} <br> Match Type: {$match['match_type']} <br>";
                            ?><form method="post" action="">
                                <input type="hidden" name="match_id" value="<?php echo $match['match_id'] ?>">
                                <button type="submit" name="deleteMatch" class="btn btn-danger">Delete</button>
                            </form>
                            <form method="post" action="edit_match.php">
                                <input type="hidden" name="match_id" value="<?php echo $match['match_id'] ?>">
                                <button type="submit" name="editMatch" class="btn btn-success">Edit</button>
                            </form>
                            <?php
                            if ($match['result'] ==null){
                        ?>
                            <button type="button" onclick='openUpdateWinnerForm(<?= json_encode($match) ?>);'>Update Winner</button>
                        <?php
                            }
                            else{
                                $winnerTeamQuery = 'SELECT teamName from teams where teamid = '.$match["result"];
                                $winnerResult = mysqli_query($con, $winnerTeamQuery);
                                $winner = mysqli_fetch_assoc($winnerResult);
                                echo "Winner: {$winner['teamName']} <br>" ;
                            }

                        }
                        ?>
                    </ul>
                </form>
    <?php

            } else {
                echo "<p>No matches for this tournament.</p>";
            }
        } else {
            echo "<p>No tournaments available.</p>";
        }
    }
    ?>
    <!-- Update Winner Form Popup -->
    <div class="popup-form" id="updateWinnerForm">
    <h4>Update Winner</h4>
    <form method="post" action='update_winner.php'>
        <?php
        ?>
            <label>
            <input type='checkbox' name='match_winner' id='team1Winner'>
            <p id='label1'><?php $match['team1Name']?></p></label>

            <label>
            <input type='checkbox' name='match_winner' id='team2Winner'>
            <p id='label2'><?php $match['team2Name']?></p></label>

            <input type='hidden' name='match_id' id='updateWinnerMatchId'>
            <input type='hidden' name='tournament_id' value='<?php echo $tournamentId ?>' id='updateWinnerTournamentId'>
            <br><br>
            <button type='submit' name='update_winners' class='btn btn-primary'>Update Winner</button>
        
        
    </form>
    <button onclick="closeUpdateWinnerForm()">Close</button>
    </div>
    <script>
        function openUpdateWinnerForm(match) {
            console.log(match)
            document.getElementById('updateWinnerMatchId').value = match.match_id;
            document.getElementById('label1').innerHTML = match.team1Name;
            document.getElementById('label2').innerHTML = match.team2Name;
            document.getElementById('team1Winner').value = match.team1_id;
            document.getElementById('team2Winner').value = match.team2_id;
            document.getElementById('updateWinnerForm').style.display = 'block';
        }
        
        function closeUpdateWinnerForm() {
            document.getElementById('updateWinnerForm').style.display = 'none';
        }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <?php
        // Close the database connection
        mysqli_close($con);
        ?>
        
        </body>
        
        </html>