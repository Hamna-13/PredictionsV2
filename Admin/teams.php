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
// Include your database connection file
include 'database.php';

// Fetch teams from the database
$sql = "SELECT * FROM teams";
$result = mysqli_query($con, $sql);

// Check if there are any teams
if (mysqli_num_rows($result) > 0) {
    echo "<h1>Teams</h1>";
    echo "<ul>";
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row["teamName"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No teams added yet.";
}
?>
<form action="add_teams.php">
                <input type="hidden" name="tournament_id" value="<?php echo $row["tournamentid"] ?>">
                <button type="submit">Add New Team</button>
            </form>
<?php
// Close the database connection
mysqli_close($con);
?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
