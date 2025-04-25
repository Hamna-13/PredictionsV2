<?php
include 'database.php';


// Assuming the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_winners'])) {
    // Assuming you have the session started
    session_start();


    // Get other form data
    $matchId = isset($_POST['match_id']) ? $_POST['match_id'] : null;
    $winnerId = isset($_POST['match_winner']) ? $_POST['match_winner'] : null;
    $tournamentId = isset($_POST['tournament_id']) ? $_POST['tournament_id'] : null;
    echo $matchId.'\n';
    echo $tournamentId.'\n';
    echo $winnerId.'\n';
    // Validate data (you may want to add more validation)
    if (empty($tournamentId) || empty($matchId) || empty($winnerId)) {
        // Handle validation error, redirect or show an error message
        echo "Validation error: Missing required data.";
        exit();
    }
    
    $updateQuery = "UPDATE matches SET result = $winnerId WHERE match_id = $matchId";
        $updateResult = mysqli_query($con, $updateQuery);

        if ($updateResult) {
            // Compute points for users based on predictions
            $updatePointsQuery = "UPDATE  user_group
            INNER JOIN prediction ON user_group.group_id = prediction.group_id
            INNER JOIN matches ON prediction.match_id = matches.match_id
            INNER JOIN groups ON user_group.group_id = groups.group_id
            INNER JOIN rules ON groups.rules_id = rules.rules_id
    SET points = points +
        (
            CASE when rules.fav_team_include =1 and user_group.fav_team_id = team1_id or user_group.fav_team_id = team2_id then
            case when matches.match_type = 'simple' then 
                case when user_group.fav_team_id = predicted_team_id then
                    case when result = predicted_team_id then 
                        rules.fav_team_win
                       ELSE 
                           rules.fav_team_lose END
                   ELSE
                       case when result = predicted_team_id then 
                        rules.other_team_win 
                    ELSE 
                        rules.other_team_lose END
                end
            
               when matches.match_type = 'playoff' THEN
                case when user_group.fav_team_id = predicted_team_id then
                    case when result = predicted_team_id then 
                        rules.fav_playoff_win 
                       ELSE 
                           rules.fav_playoff_lose END
                   ELSE
                       case when result = predicted_team_id then 
                        rules.other_playoff_win 
                    ELSE 
                        rules.other_playoff_lose END
                END
            when matches.match_type = 'final' THEN
                case when user_group.fav_team_id = predicted_team_id then
                    case when result = predicted_team_id then 
                        rules.fav_final_win 
                       ELSE 
                           rules.fav_final_lose END
                   ELSE
                       case when result = predicted_team_id then 
                        rules.other_final_win 
                    ELSE 
                        rules.other_final_lose END
                END
            END
        ELSE
            case when matches.match_type = 'simple' then 
                case when result = predicted_team_id then 
                       rules.simple_team_win 
                   ELSE 
                       rules.simple_team_lose END
            when matches.match_type = 'playoff' then 
                case when result = predicted_team_id then 
                       rules.playoff_match_win 
                   ELSE 
                       rules.playoff_match_lose END
            when matches.match_type = 'final' then 
                case when result = predicted_team_id then 
                       rules.final_match_win 
                   ELSE 
                       rules.final_match_lose END
            end
            END
            )
            WHERE
                prediction.match_id = $matchId
                AND user_group.user_id = prediction.user_id;";
            $pointsQueryResult = mysqli_query($con, $updatePointsQuery);

            // Redirect back to the matches page with a success message
            header("Location: matches.php?tournament_id=" . $_POST['tournament_id'] . "&success=1");
            exit();
        } else {
            // Redirect back to the matches page with an error message
            header("Location: matches.php?tournament_id=" . $_POST['tournament_id'] . "&error=1");
            exit();
        }
    }

?>
