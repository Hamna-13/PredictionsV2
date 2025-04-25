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
// Assuming you have a database connection established in database.php
include 'database.php';

// Check if the deleteTournament button is pressed
if (isset($_POST['deleteTournament'])) {
    // Get the tournament ID from the form
    $tournamentId = $_POST['tournament_id'];

    // Prepare and execute the SQL query to delete the tournament
    $deleteQuery = "DELETE FROM tournaments WHERE tournamentid = $tournamentId";
    $result = mysqli_query($con, $deleteQuery);
}
/*if (isset($_POST['updateTournament'])) {
    // Get the tournament ID and updated values from the form
    $tournamentId = $_POST['tournament_id'];
    $updatedName = $_POST['updated_tournament_name'];
    $updatedStartDate = $_POST['updated_start_date'];
    $updatedEndDate = $_POST['updated_end_date'];

    // Prepare and execute the SQL query to update the tournament
    $updateQuery = "UPDATE tournaments SET tournamentName = '$updatedName', startDate = '$updatedStartDate', endDate = '$updatedEndDate' WHERE id = $tournamentId";

    $result = mysqli_query($con, $updateQuery);
    if ($result) {
        echo "Tournament updated successfully!";
    } else {
        echo "Error updating tournament: " . mysqli_error($con);
    }
}*/

// Fetch tournaments from the database
$sql = "SELECT * FROM tournaments";
$result = mysqli_query($con, $sql);

// Check if there are any tournaments
if (mysqli_num_rows($result) > 0) {
?>
    <h1>Tournaments</h1>
    
    <div>
            <a href="add_tournament.php"type = "button" class = "btn btn-success btn-rounded btn-fw">Add Tournament</a>
            <a href="add_teams.php"type = "button" class = "btn btn-success btn-rounded btn-fw">Add Teams</a>
            <a href="rules.php"type = "button" class = "btn btn-success btn-rounded btn-fw">Set Rules</a>
           </div>
          
                            
    <form method="post" action="">
        <table class='table'>
            <thead>
                <tr>
                    <th>Tournament Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                    <th>Teams</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {

                ?>
                    <tr>
                        <td><?php echo $row["tournamentName"]; ?></td>
                        <td><?php echo $row["startDate"]; ?></td>
                        <td><?php echo $row["endDate"]; ?></td>
                        <td>
                            <form method='post' action="edit_tournament.php">
                                <input type="hidden" name="tournament_id" value="<?php echo $row['tournamentid'] ?>">
                                <button type="submit" name="editTournament" class="btn btn-primary">Edit</button>
                            </form>


                            <form method="post" action="">
                                <input type="hidden" name="tournament_id" value="<?php echo $row["tournamentid"] ?>">
                                <button type="submit" name="deleteTournament" class="btn btn-danger">Delete</button>
                            </form>
                        
                            <form method='post' action='add_matches.php'>
                                <input type='hidden' name='tournament_id' value="<?php echo $row['tournamentid'] ?>">
                                <button type='submit' name="addMatch" class='btn btn-success'>Add Matches</button>
                            </form>

                               
                                <a href="matches.php?tournament_id=<?php echo $row['tournamentid']?>" class='btn btn-success'>View Matches</button>
                            
                        </td>
                        <td>
                            <?php
                            // Fetch teams for the current tournament
                            $tournamentId = $row["tournamentid"];
                            $teamsQuery = "SELECT teams.teamName FROM tournament_teams
                                JOIN teams ON tournament_teams.teamid = teams.teamid
                                WHERE tournament_teams.tournamentid = $tournamentId";
                            $teamsResult = mysqli_query($con, $teamsQuery);

                            // Check if there are any teams for the tournament
                            if (mysqli_num_rows($teamsResult) > 0) {
                                echo "<ul>";
                                while ($teamRow = mysqli_fetch_assoc($teamsResult)) {
                                    echo "<li>" . $teamRow["teamName"] . "</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "No teams assigned";
                            }
                            ?>
                        </td>
                    </tr>

            <?php
                }
                echo "</tbody></table>";
            } else {
                echo "No tournaments registered.";
            }
            ?>
            <form action="add_tournament.php">
                <input type="hidden" name="tournament_id" value="<?php echo $row["tournamentid"] ?>">
                <button type="submit">Add New Tournament</button>
            </form>
            <?php

            // Close the database connection
            mysqli_close($con);
            ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
</html>