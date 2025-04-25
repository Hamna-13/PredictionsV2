<?php

include '../includes/database.php';
session_start();
if (isset($_SESSION['user_id'])) {
  // Assuming group_id is passed as a query parameter
  $group_id = isset($_GET['group_id']) ? $_GET['group_id'] : null;


  // Check if the group_id is set and not empty
  if (!empty($group_id)) {
    // Fetch group details including tournament information
    $groupQuery = "SELECT groups.groupName, tournaments.tournamentName, tournaments.tournamentid
                   FROM groups
                   INNER JOIN tournaments ON groups.tournamentid = tournaments.tournamentid
                   WHERE groups.group_id = '$group_id'";
    $groupResult = mysqli_query($con, $groupQuery);

    if ($groupResult && mysqli_num_rows($groupResult) > 0) {
      $groupData = mysqli_fetch_assoc($groupResult);
      $groupName = $groupData['groupName'];
      $tournamentId = $groupData['tournamentid'];
      $tournamentName = $groupData['tournamentName'];


      // Fetch matches for the specific tournament
      $matchesQuery = "SELECT matches.*, team1.teamName AS team1Name, team2.teamName AS team2Name
            FROM matches
            INNER JOIN teams AS team1 ON matches.team1_id = team1.teamid
            INNER JOIN teams AS team2 ON matches.team2_id = team2.teamid
            WHERE matches.tournamentid = $tournamentId;";
      $matchesResult = mysqli_query($con, $matchesQuery);

      $participantsQuery = "SELECT user.username
        FROM user
        INNER JOIN user_group ON user.user_id = user_group.user_id
        WHERE user_group.group_id = '$group_id'";
      $participantsResult = mysqli_query($con, $participantsQuery);
      $rulesQuery = "SELECT fav_team_include FROM rules WHERE rules_id = (SELECT rules_id FROM groups WHERE group_id = '$group_id')";
      $rulesResult = mysqli_query($con, $rulesQuery);

      if ($rulesResult && mysqli_num_rows($rulesResult) > 0) {
        $rulesData = mysqli_fetch_assoc($rulesResult);
        $favTeamInclude = $rulesData['fav_team_include'];
      }
    }
  }
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Predicteam</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>

  <body style="font-family: 'Poppins', sans-serif;font-weight:600 ;color:#1f1d47">

    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" style="background-color: #1f1d47" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top" style="background-color: #1f1d47">
          <a href="dashboard.php"><img class="ml-3" width="80%" src="../images/donelogo.png" alt="logo" /></a>

        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <div class="menu-icon">
                    <i class="mdi mdi-account"></i>
                  </div>
                </div>
              </div>
              <div class="profile-name" style="color: white !important;">
                <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['name'] ?></h5>

              </div>

            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="group_details.php?group_id=<?php echo $group_id; ?>">
              <span class="menu-icon">
                <i class="mdi mdi-account-multiple-plus"></i>
              </span>
              <span class="menu-title">Group</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="participants.php?group_id=<?php echo $group_id; ?>">

              <span class="menu-icon">
                <i class="mdi mdi-account-check"></i>
              </span>
              <span class="menu-title">Participants</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="rules_display.php?group_id=<?php echo $group_id; ?>">
              <span class="menu-icon">
                <i class="mdi mdi-checkbox-marked"></i>
              </span>
              <span class="menu-title">Rules</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="leaderboard.php?group_id=<?php echo $group_id; ?>">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Leaderboard</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../index.php"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch" style="background-color: #1f1d47">

            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <span><i class="img-xs rounded-circle mdi mdi-account"></i></span>
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['name'] ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="../logout.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>

                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper" style="background-color:#dfebf7">
            <div class="d-flex justify-content-between">
              <div>

                <h3 class="card-title mb-1" style="font-weight:1000"><?php echo $groupName; ?></h4>
                  <p class="text-muted mb-1"><?php echo $tournamentName; ?></p>
              </div>
              <?php
              $fetchPoints = "SELECT points from user_group where group_id = $group_id and user_id = " . $_SESSION['user_id'];
              $pointsResult = mysqli_query($con, $fetchPoints);


              if ($pointsResult && mysqli_num_rows($pointsResult) > 0) {
                $pointsData = mysqli_fetch_assoc($pointsResult);
                $points = $pointsData['points'];
                $_SESSION['points'] = $points;
              }
              ?>
              <p class="text-muted mb-1">Points: <?php echo $points; ?></p>
            </div>

            <div>
              <?php
              if ($favTeamInclude == 1) {
                // Check if the favorite team is already selected for the user in this group
                $fetchFavoriteTeamQuery = "SELECT teams.teamName
                                FROM user_group
                                INNER JOIN teams ON user_group.fav_team_id = teams.teamid
                                WHERE user_group.group_id = '$group_id' AND user_group.user_id = '{$_SESSION['user_id']}'";
                $fetchFavoriteTeamResult = mysqli_query($con, $fetchFavoriteTeamQuery);

                if ($fetchFavoriteTeamResult && mysqli_num_rows($fetchFavoriteTeamResult) > 0) {
                  // Favorite team is already selected, display its name
                  $favoriteTeamData = mysqli_fetch_assoc($fetchFavoriteTeamResult);
                  $favoriteTeamName = $favoriteTeamData['teamName'];
                  echo "Favorite Team: $favoriteTeamName";
                } else {
              ?>
                  <button class="btn btn-success btn-rounded btn-fw my-2" onclick="openFavoriteTeamPopup()">Select Favorite Team</button>
              <?php
                }
              }
              ?>


            </div>
            <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card shadow">
                  <div class="card-body" style="background-color:white">
                    <div class="card-header bg-purple rounded-lg" style="font-family: 'Poppins',sans-serif;">
                      <h4 class="text-white">Matches</h4>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <?php
                        while ($match = mysqli_fetch_assoc($matchesResult)) {
                          $team1Id = $match['team1_id'];
                          $team2Id = $match['team2_id'];
                          $matchId = $match['match_id'];
                          $userId = $_SESSION['user_id'];
                          $prediction = "SELECT teams.teamName from prediction 
  inner join teams on prediction.predicted_team_id=teams.teamId 
  where group_id = $group_id and match_id = $matchId and
  user_id = $userId";
                          $predictionResult = mysqli_query($con, $prediction);

                          $team1Query = "SELECT teamName FROM teams WHERE teamid = $team1Id";
                          $team2Query = "SELECT teamName FROM teams WHERE teamid = $team2Id";

                          $team1Result = mysqli_query($con, $team1Query);
                          $team2Result = mysqli_query($con, $team2Query);

                          $team1Name = ($team1Row = mysqli_fetch_assoc($team1Result)) ? $team1Row['teamName'] : 'Unknown Team';
                          $team2Name = ($team2Row = mysqli_fetch_assoc($team2Result)) ? $team2Row['teamName'] : 'Unknown Team';

                        ?>



                          <div class="preview-list">
                            <div class="preview-item border-bottom">
                              <div class="preview-thumbnail">
                                <div class="preview-icon bg-primary">
                                  <i class="mdi mdi-file-document"></i>
                                </div>
                              </div>
                              <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="flex-grow">
                                  <h6 class="preview-subject" style="font-weight:700"><?php echo $team1Name . " VS " . $team2Name ?></h6>
                                  <p class="text-muted mb-0"><?php echo $match['match_date'] . " | " . $match['match_time'] ?></p>
                                  <p class="text-muted"><?php echo $match['match_type'] ?></p>
                                  <p class="text-muted mb-0"><?php echo $match['venue'] ?></p>
                                </div>
                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                  <?php
                                  //date_default_timezone_set('Pakistan/Karachi');
                                  // Current date and time
                                  $datetime = date("Y-m-d H:i:s");

                                  // Convert datetime to Unix timestamp
                                  $timestamp = strtotime($datetime);

                                  // Subtract time from datetime
                                  $time = $timestamp - (30 * 60);

                                  // Date and time after subtraction
                                  $date = date("Y-m-d", $time);
                                  $time = date("H:i:s", $time);
                                  if ($predictionResult && mysqli_num_rows($predictionResult) > 0) {
                                    $predictionData = mysqli_fetch_assoc($predictionResult);

                                    echo "Prediction: {$predictionData['teamName']} <br>";
                                  } else if (
                                    $match["match_date"] < $date ||
                                    ($match['match_date'] == $date && $match['match_time'] <= $time)
                                  ) {
                                    echo "Prediction Time is Over <br>";
                                  } else {

                                  ?>
                                    <button class="btn btn-success btn-rounded btn-fw" onclick='openPredictionForm(<?= json_encode($match) ?>)'>Predict</button>
                                    <input type='hidden' name="match_id" value="<?php echo $match['match_id'] ?>">
                                <?php
                                  }
                                  echo '</div></div></div>';
                                }

                                ?>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>

                  </div>
                  

                  <?php
                  if ($matchesResult && mysqli_num_rows($matchesResult) > 0) {
                    echo "<ul>";
                    while ($match = mysqli_fetch_assoc($matchesResult)) {
                      $team1Id = $match['team1_id'];
                      $team2Id = $match['team2_id'];
                      $matchId = $match['match_id'];
                      $userId = $_SESSION['user_id'];
                      $prediction = "SELECT teams.teamName from prediction 
                    inner join teams on prediction.predicted_team_id=teams.teamId 
                    where group_id = $group_id and match_id = $matchId and
                    user_id = $userId";
                      echo $prediction;
                      $predictionResult = mysqli_query($con, $prediction);
                      print_r($predictionResult);
                      if ($predictionResult && mysqli_num_rows($predictionResult) > 0) {
                        $predictionData = mysqli_fetch_assoc($predictionResult);

                        echo "Prediction: {$predictionData['teamName']} <br>";
                      } else {

                  ?>
                        <button onclick='openPredictionForm(<?= json_encode($match) ?>)'>Predict</button>
                        <input type='hidden' name="match_id" value="<?php echo $match['match_id'] ?>">
                  <?php
                      }
                    }
                  }


                  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_favorite_team'])) {
                    // Get the selected favorite team id from the form
                    $selectedTeamId = isset($_POST['favorite_team']) ? $_POST['favorite_team'] : null;
                    $group_id = isset($_POST['group_id']) ? $_POST['group_id'] : null;
                    $user_id = $_SESSION['user_id'];

                    // Check if user is logged in and user_id is set in the session
                    if (!empty($selectedTeamId) && !empty($group_id)) {

                      // Update the fav_team_id in the user_group table for the specific user_id
                      $updateQuery = "UPDATE user_group SET fav_team_id = '$selectedTeamId' WHERE group_id = '$group_id' AND user_id = '$user_id'";
                      $updateResult = mysqli_query($con, $updateQuery);

                      if ($updateResult) {
                        echo "Favorite team updated successfully!";
                      } else {
                        echo "Error updating favorite team: " . mysqli_error($con);
                      }
                    } else {
                      echo "Invalid data received or user not logged in.";
                    }
                  }
                  ?>
                  <!-- Prediction Form Popup -->
                  <div class="modal fade modal-sm" style="top:50%; left:50%; transform:translate(-50%,-50%);" id="predictionForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="background-color:white">
                      <div class="modal-content bg-white">
                        <div class="modal-header bg-purple">
                          <h4 class="modal-title" id="exampleModalLabel">Predict Team</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="submit_prediction.php">

                            <label style="display:flex; flex-direction:column; flex-wrap:wrap; align-content:center">
                              <input type='radio' name='match_prediction' id='team1Prediction'>
                              <p id='label1'><?php echo $team1Name ?></p>
                            </label>

                            <label style="display:flex; flex-direction:column; flex-wrap:wrap; align-content:center">
                              <input type='radio' name='match_prediction' id='team2Prediction'>
                              <p id='label2'><?php echo $team2Name ?></p>
                            </label>

                            <input type='hidden' name='match_id' id='matchIdInput'>
                            <input type='hidden' name='group_id' value='<?php echo $group_id ?>' id='groupId'>
                            <br><br>
                            <button class="btn btn-success btn-rounded btn-fw" type='submit' name='submit_prediction' class='btn btn-primary'>Predict</button>

                          </form>
                        </div>
                        <div class="modal-footer bg-purple">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick='closePredictionForm()'>Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-4 grid-margin overflow-auto">
                    <div class="card position-sticky sticky-top">
                      <div class="card-body overflow-auto" style="background-color:white; height: 356px">
                        <div class="card-header bg-purple rounded-lg position-sticky sticky-top">
                          <h4 class="text-white">Group Chat</h4>
                        </div>

                        <div id="chatSection">
                          <div id="chatMessages"></div>
                          <input type="text" id="messageInput" placeholder="Type your message...">
                          <button type="button" onclick="sendMessage()">Send</button>
                        </div>

                      </div>
                    </div>
                  </div>
              </div>

              <script>
                function sendMessage() {
                  console.log("message");
                  var message = document.getElementById('messageInput').value;
                  var groupId = <?php echo $group_id; ?>; // Assuming $group_id is available in your PHP

                  if (message.trim() !== '') {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                      if (xhr.readyState === 4 && xhr.status === 200) {
                        document.getElementById('messageInput').value = '';
                        fetchMessages(); // Refresh messages after sending
                      }
                    };
                    xhr.open('POST', 'save_message.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send('message=' + encodeURIComponent(message) + '&group_id=' + encodeURIComponent(groupId));
                  }
                }

                function fetchMessages() {
                  var groupId = <?php echo $group_id; ?>; // Assuming $group_id is available in your PHP

                  var xhr = new XMLHttpRequest();
                  xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                      document.getElementById('chatMessages').innerHTML = xhr.responseText;
                    }
                  };
                  xhr.open('GET', 'fetch_messages.php?group_id=' + encodeURIComponent(groupId), true);
                  xhr.send();
                }

                // Fetch messages when the page loads
                window.onload = function() {
                  fetchMessages();
                  setInterval(fetchMessages, 5000); // Refresh every 5 seconds (adjust as needed)
                };
              </script>

              <!-- content-wrapper ends -->
              <!-- partial:partials/_footer.html -->

              <!-- partial -->
            </div>
            <!-- main-panel ends -->
          </div>
          <!-- page-body-wrapper ends -->
        </div>
        <script>
          function openPredictionForm(match) {
            console.log(match);
            document.getElementById('matchIdInput').value = match.match_id;
            document.getElementById('label1').innerHTML = match.team1Name;
            document.getElementById('label2').innerHTML = match.team2Name;
            document.getElementById('team1Prediction').value = match.team1_id;
            document.getElementById('team2Prediction').value = match.team2_id;
            document.getElementById('predictionForm').style.display = 'block';
            var myModal = new bootstrap.Modal(document.getElementById('predictionForm'));
            myModal.show();
          }

          function closePredictionForm() {
            var myModal = new bootstrap.Modal(document.getElementById('predictionForm'));
            myModal.hide();
          }

          function openFavoriteTeamPopup() {
            var myModal = new bootstrap.Modal(document.getElementById('favoriteTeamForm'));
            myModal.show();
          }

          function closeFavoriteTeamPopup() {
            document.getElementById('favoriteTeamForm').style.display = 'none';

            document.getElementById('favoriteTeamForm').classList.remove("Fade");
          }
        </script>
        <!-- Favorite Team Popup -->
        <div class="modal fade" id="favoriteTeamForm" tabindex="-1" aria-labelledby="favoriteTeamFormLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content bg-white">
              <div class="modal-header bg-purple">
                <h5 class="modal-title" id="favoriteTeamFormLabel">Select Favorite Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick='closeFavoriteTeamPopup()'></button>
              </div>
              <div class="modal-body">
                <!-- Display the list of teams for the user to choose as their favorite team -->
                <?php
                // Fetch tournament id for the group
                $tournamentIdQuery = "SELECT tournamentid FROM groups WHERE group_id = '$group_id'";
                $tournamentIdResult = mysqli_query($con, $tournamentIdQuery);

                if ($tournamentIdResult && mysqli_num_rows($tournamentIdResult) > 0) {
                  $tournamentIdData = mysqli_fetch_assoc($tournamentIdResult);
                  $tournamentId = $tournamentIdData['tournamentid'];
                  // Fetch teams based on the tournament id
                  $teamsQuery = "SELECT * FROM tournament_teams 
                                INNER JOIN teams on tournament_teams.teamid = teams.teamid
                                WHERE tournamentid = '$tournamentId' ";
                  $teamsResult = mysqli_query($con, $teamsQuery);

                  if ($teamsResult && mysqli_num_rows($teamsResult) > 0) { ?>
                    <form method="post">
                      <label for="favoriteTeamSelect">Select Team:</label>
                      <select name="favorite_team" id="favoriteTeamSelect" class="form-select">
                        <?php while ($team = mysqli_fetch_assoc($teamsResult)) : ?>
                          <option value="<?php echo $team['teamid']; ?>"><?php echo $team['teamName']; ?></option>
                        <?php endwhile; ?>
                      </select>
                      <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
                      <br><br>
                      <button class="btn btn-success btn-rounded btn-fw" type="submit" name="submit_favorite_team" class="">Submit</button>
                    </form>
                <?php }
                } else {
                  echo "<p>Error fetching tournament id for the group.</p>";
                }

                ?>
              </div>
              <div class="modal-footer bg-purple">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick='closeFavoriteTeamPopup()'>Close</button>
              </div>
            </div>
          </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="../assets/vendors/chart.js/Chart.min.js"></script>
        <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="../assets/js/off-canvas.js"></script>
        <script src="../assets/js/hoverable-collapse.js"></script>
        <script src="../assets/js/misc.js"></script>
        <script src="../assets/js/settings.js"></script>
        <script src="../assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="../assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->
  </body>

  </html>

<?php } else {
  header('Location: ../signup.php');
  echo "Please login";
} ?>