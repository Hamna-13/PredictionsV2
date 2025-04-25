<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>Add Team</title>
</head>

<body>

  <div class="container mt-5">
    <h1>Add Team</h1>
    <form method="post" action=""> <!-- Replace 'process_add_team.php' with your actual processing script -->
      <div class="mb-3">
        <label for="teamName" class="form-label">Team Name</label>
        <input type="text" class="form-control" id="teamName" name="teamName" required>
      </div>
      <button type="submit" name = "addteam" class="btn btn-primary">Add Team</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <?php
// Include your database connection file (replace 'database.php' with your actual file)
include 'database.php';

// Check if the form is submitted
if (isset($_POST['addteam'])) {
    // Sanitize and retrieve team name from the form
    $teamName = $_POST['teamName'];

    // Insert the team into the 'teams' table
    $sql = "INSERT INTO teams (teamName) VALUES ('$teamName')";

    if (mysqli_query($con, $sql)) {
        echo "Team added successfully!";
        header('Location: teams.php');
    } else {
        echo "Error adding team: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>

</body>

</html>
