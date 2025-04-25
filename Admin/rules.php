<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Rules</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Rules</h2>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Add favorite team?</label>
                        <div class="btn-group" role="group" aria-label="Add favorite team">
                            <input type="hidden" id="fav_team_include" name="fav_team_include" value="0">
                            <button type="button" class="btn btn-primary" onclick="showOptions()">Yes</button>
                            <button type="button" class="btn btn-secondary" onclick="hideOptions()">No</button>
                        </div>
                    </div>

                    <div class="mb-3" id="fav_team_options" style="display: none;">
                        <label for="fav_team_win" class="form-label">Favorite team win points</label>
                        <input type="number" class="form-control" id="fav_team_win" name="fav_team_win" min="0">
                    </div>

                    

                    <div class="mb-3" id="fav_team_lose_options" style="display: none;">
                        <label for="fav_team_lose" class="form-label">Favorite team lose points</label>
                        <input type="number" class="form-control" id="fav_team_lose" name="fav_team_lose" min="0">
                    </div>

                    <div class="mb-3" id="fav_playoff_win_options" style="display: none;">
                        <label for="fav_playoff_win" class="form-label">Favorite team wins Playoff</label>
                        <input type="number" class="form-control" id="fav_playoff_win" name="fav_playoff_win" min="0">
                    </div>

                    

                    <div class="mb-3" id="fav_playoff_lose_options" style="display: none;">
                        <label for="fav_playoff_lose" class="form-label">Favorite team loses Playoff</label>
                        <input type="number" class="form-control" id="fav_playoff_lose" name="fav_playoff_lose" min="0">
                    </div>

                    <div class="mb-3" id="fav_final_win_options" style="display: none;">
                        <label for="fav_final_win" class="form-label">Favorite team wins Final</label>
                        <input type="number" class="form-control" id="fav_final_win" name="fav_final_win" min="0">
                    </div>

                   

                    <div class="mb-3" id="fav_final_lose_options" style="display: none;">
                        <label for="fav_final_lose" class="form-label">Favorite team loses Final</label>
                        <input type="number" class="form-control" id="fav_final_lose" name="fav_final_lose" min="0">
                    </div>





                    <div class="mb-3" id="other_team_options" style="display: none;">
                        <label for="other_team_win" class="form-label">Other team win points</label>
                        <input type="number" class="form-control" id="other_team_win" name="other_team_win" min="0">
                    </div>

                    

                    <div class="mb-3" id="other_team_lose_options" style="display: none;">
                        <label for="other_team_lose" class="form-label">Other team lose points</label>
                        <input type="number" class="form-control" id="other_team_lose" name="other_team_lose" min="0">
                    </div>

                    <div class="mb-3" id="other_playoff_win_options" style="display: none;">
                        <label for="other_playoff_win" class="form-label">Other team wins Playoff</label>
                        <input type="number" class="form-control" id="other_playoff_win" name="other_playoff_win" min="0">
                    </div>

                    

                    <div class="mb-3" id="other_playoff_lose_options" style="display: none;">
                        <label for="other_playoff_lose" class="form-label">Other team loses Playoff</label>
                        <input type="number" class="form-control" id="other_playoff_lose" name="other_playoff_lose" min="0">
                    </div>

                    <div class="mb-3" id="other_final_win_options" style="display: none;">
                        <label for="other_final_win" class="form-label">Other team wins Final</label>
                        <input type="number" class="form-control" id="other_final_win" name="other_final_win" min="0">
                    </div>

                   

                    <div class="mb-3" id="other_final_lose_options" style="display: none;">
                        <label for="other_final_lose" class="form-label">Other team loses Final</label>
                        <input type="number" class="form-control" id="other_final_lose" name="other_final_lose" min="0">
                    </div>






                    <div class="mb-3">
                        <label class="form-label">Match Rules</label>
                        <div class="mb-3">
                            <label for="simple_team_win" class="form-label">Match win points</label>
                            <input type="number" class="form-control" id="simple_team_win" name="simple_team_win" min="0" required>
                        </div>
                        

                        <div class="mb-3">
                            <label for="simple_team_lose" class="form-label">Match lose points</label>
                            <input type="number" class="form-control" id="simple_team_lose" name="simple_team_lose" min="0" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Playoff Rules</label>
                        <div class="mb-3">
                            <label for="playoff_match_win" class="form-label">Playoff win points</label>
                            <input type="number" class="form-control" id="playoff_match_win" name="playoff_match_win" min="0" required>
                        </div>
                       

                        <div class="mb-3">
                            <label for="playoff_match_lose" class="form-label">Playoff lose points</label>
                            <input type="number" class="form-control" id="playoff_match_lose" name="playoff_match_lose" min="0" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Final Rules</label>
                        <div class="mb-3">
                            <label for="final_match_win" class="form-label">Final win points</label>
                            <input type="number" class="form-control" id="final_match_win" name="final_match_win" min="0" required>
                        </div>
                        

                        <div class="mb-3">
                            <label for="final_match_lose" class="form-label">Final lose points</label>
                            <input type="number" class="form-control" id="final_match_lose" name="final_match_lose" min="0" required>
                        </div>
                    </div>

                    <button type="submit" name="submit_rules" class="btn btn-primary">Submit Rules</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showOptions() {
            document.getElementById('fav_team_include').value = 1;
            document.getElementById('fav_team_options').style.display = 'block';
           
            document.getElementById('fav_team_lose_options').style.display = 'block';
            document.getElementById('fav_playoff_win_options').style.display = 'block';
           
            document.getElementById('fav_playoff_lose_options').style.display = 'block';
            document.getElementById('fav_final_win_options').style.display = 'block';
           
            document.getElementById('fav_final_lose_options').style.display = 'block';



            document.getElementById('other_team_options').style.display = 'block';
           
            document.getElementById('other_team_lose_options').style.display = 'block';
            document.getElementById('other_playoff_win_options').style.display = 'block';
           
            document.getElementById('other_playoff_lose_options').style.display = 'block';
            document.getElementById('other_final_win_options').style.display = 'block';
           
            document.getElementById('other_final_lose_options').style.display = 'block';
        }
        function hideOptions() {
            document.getElementById('fav_team_include').value = 0;
            document.getElementById('fav_team_options').style.display = 'none';
          
            document.getElementById('fav_team_lose_options').style.display = 'none';
            document.getElementById('fav_playoff_win_options').style.display = 'none';
            
            document.getElementById('fav_playoff_lose_options').style.display = 'none';
            document.getElementById('fav_final_win_options').style.display = 'none';
            
            document.getElementById('fav_final_lose_options').style.display = 'none';


            document.getElementById('other_team_options').style.display = 'none';
          
            document.getElementById('other_team_lose_options').style.display = 'none';
            document.getElementById('other_playoff_win_options').style.display = 'none';
            
            document.getElementById('other_playoff_lose_options').style.display = 'none';
            document.getElementById('other_final_win_options').style.display = 'none';
            
            document.getElementById('other_final_lose_options').style.display = 'none';
        }
    </script>

<?php
include 'database.php';

// Initialize variables
$fav_team_include = $fav_team_win  = $fav_team_lose = $fav_playoff_win  = $fav_playoff_lose = $fav_final_win  = $fav_final_lose = $simple_team_win = $simple_team_lose = $final_match_win = $final_match_lose = $playoff_match_win  = $playoff_match_lose = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_rules'])) {
    // Process the form data
    $fav_team_include = isset($_POST['fav_team_include']) ? $_POST['fav_team_include'] : 0;

    // Check if the keys are set before accessing them to avoid warnings
    $fav_team_win = isset($_POST['fav_team_win']) ? $_POST['fav_team_win'] : 0;
   
    $fav_team_lose = isset($_POST['fav_team_lose']) ? $_POST['fav_team_lose'] : 0;
    $fav_playoff_win = isset($_POST['fav_playoff_win']) ? $_POST['fav_playoff_win'] : 0;
   
    $fav_playoff_lose = isset($_POST['fav_playoff_lose']) ? $_POST['fav_playoff_lose'] : 0;
    $fav_final_win = isset($_POST['fav_final_win']) ? $_POST['fav_final_win'] : 0;
   
    $fav_final_lose = isset($_POST['fav_final_lose']) ? $_POST['fav_final_lose'] : 0;

    $simple_team_win = isset($_POST['simple_team_win']) ? $_POST['simple_team_win'] : 0;
    
    $simple_team_lose = isset($_POST['simple_team_lose']) ? $_POST['simple_team_lose'] : 0;

    $final_match_win = isset($_POST['final_match_win']) ? $_POST['final_match_win'] : 0;
    
    $final_match_lose = isset($_POST['final_match_lose']) ? $_POST['final_match_lose'] : 0;

    $playoff_match_win = isset($_POST['playoff_match_win']) ? $_POST['playoff_match_win'] : 0;
   
    $playoff_match_lose = isset($_POST['playoff_match_lose']) ? $_POST['playoff_match_lose'] : 0;

    // Check if the values already exist for the first rules_id
    $query = "SELECT * FROM rules WHERE rules_id = 1";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Update the existing values
            $updateQuery = "UPDATE rules SET fav_team_include = '$fav_team_include',
                fav_team_win = '$fav_team_win',
               
                fav_team_lose = '$fav_team_lose',
                fav_playoff_win = '$fav_playoff_win',
               
                fav_playoff_lose = '$fav_playoff_lose',
                fav_final_win = '$fav_final_win',
             
                fav_final_lose = '$fav_final_lose',
                other_team_win = '$other_team_win',
               
                other_team_lose = '$other_team_lose',
                other_playoff_win = '$other_playoff_win',
               
                other_playoff_lose = '$other_playoff_lose',
                other_final_win = '$other_final_win',
             
                other_final_lose = '$other_final_lose',

                simple_team_win = '$simple_team_win',
                
                simple_team_lose = '$simple_team_lose',
                final_match_win = '$final_match_win',
              
                final_match_lose = '$final_match_lose',
                playoff_match_win = '$playoff_match_win',
              
                playoff_match_lose = '$playoff_match_lose'
                WHERE rules_id = 1";

            if (mysqli_query($con, $updateQuery)) {
                echo "Values updated successfully!";
            } else {
                echo "Error updating values: " . mysqli_error($con);
            }
        } else {
            // Insert new values for the first rules_id
            $insertQuery = "INSERT INTO rules (rules_id, fav_team_include, fav_team_win, fav_team_lose, fav_playoff_win, fav_playoff_lose, fav_final_win, fav_final_lose, other_team_win, other_team_lose, other_playoff_win, other_playoff_lose, other_final_win, other_final_lose, simple_team_win, simple_team_lose,
                final_match_win, final_match_lose,
                playoff_match_win, playoff_match_lose)
                VALUES (1, '$fav_team_include', '$fav_team_win',  '$fav_team_lose', '$fav_playoff_win', '$fav_playoff_lose', '$fav_final_win',  '$fav_final_lose', '$other_team_win', '$other_team_lose', '$other_playoff_win','$other_playoff_lose','$other_final_lose','$other_final_lose', '$simple_team_win', '$simple_team_lose',
                '$final_match_win',  '$final_match_lose',
                '$playoff_match_win', '$playoff_match_lose')";

            if (mysqli_query($con, $insertQuery)) {
                echo "Values inserted successfully!";
            } else {
                echo "Error inserting values: " . mysqli_error($con);
            }
        }

        mysqli_free_result($result);
    } else {
        echo "Error checking existing values: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>

</body>

</html>


</body>

</html>



