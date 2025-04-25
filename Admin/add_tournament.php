<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Tournament</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Add Tournament</h2>
                <form method="post">
                    <div class="mb-3">
                        <label for="tournamentName" class="form-label">Tournament Name</label>
                        <input type="text" class="form-control" id="tournamentName" name="tournamentName" required>
                    </div>
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Select Teams</label>
                            <?php
                            // Include your database connection file
                            include 'database.php';

                            // Fetch teams from the database
                            $sql = "SELECT * FROM teams";
                            $result = mysqli_query($con, $sql);

                            // Check if there are any teams
                            if (mysqli_num_rows($result) > 0) {
                               // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='checkbox' name='teamid[]' value='" . $row["teamid"] . "'>";
                                echo "<label class='form-check-label'>" . $row["teamName"] . "</label>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No teams available</p>";
                        }
                            // Close the database connection
                            mysqli_close($con);
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="addtournament" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    include 'database.php';


    if (isset($_POST['addtournament'])) {
        $tournamentName = $_POST['tournamentName'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $teamIds = isset($_POST['teamid']) ? $_POST['teamid'] : [];

        $sql = "INSERT INTO tournaments (tournamentName, startDate, endDate) VALUES ('$tournamentName', '$startDate', '$endDate')";
        if (mysqli_query($con, $sql)) {
            $tournamentId = mysqli_insert_id($con);
            foreach ($teamIds as $teamId) {
                $insert_team = "INSERT into tournament_teams (tournamentid, teamid) values ('$tournamentId', '$teamId')";
                mysqli_query($con, $insert_team);
            }
            echo "Tournament added successfully!";
            header('Location: tournaments.php');
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
    }
    ?>


</body>

</html>