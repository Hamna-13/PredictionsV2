<?php
include '../includes/database.php';

// Assuming group_id is passed as a query parameter
if (isset($_GET['tournament_id'])) {
    // Sanitize the input
    $tournamentId = $_GET['tournament_id'];
    // Fetch tournaments from the database
    $tournamentsQuery = "SELECT * FROM tournaments  WHERE tournamentid = $tournamentId";
    $tournamentsResult = mysqli_query($con, $tournamentsQuery);

    // Check if there are any tournaments
    if ($tournamentsResult) {
        $tournament = mysqli_fetch_assoc($tournamentsResult);
        

        // Fetch matches for the current tournament
        $tournamentId = $tournament['tournamentid'];
        $matchesQuery = "SELECT * FROM matches WHERE tournamentid = $tournamentId";
        $matchesResult = mysqli_query($con, $matchesQuery);
    }
        // Check if there are any matches for the tournament
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

<body class="main-layout">
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

        <?php
        include 'navbar.php';
        if (isset($_SESSION['user_id'])){
        ?>
        

            <!-- partial -->
            <div class="main-panel" style = "color:#1f1d47;  font-family: 'Poppins', sans-serif; font-weight: 900;">
                <div class="content-wrapper" >
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="card-title mb-1" style ="font-weight:1000"><?php echo $tournament["tournamentName"]; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card mx-auto">
                            <div class="card">
                                <div class="card-body" style = "background-color: white">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Matches</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="preview-list">
                                                <?php
                                            
                                                while ($match = mysqli_fetch_assoc($matchesResult)) {
                                                    $team1Id = $match['team1_id'];
                                                    $team2Id = $match['team2_id'];

                                                    $team1Query = "SELECT teamName FROM teams WHERE teamid = $team1Id";
                                                    $team2Query = "SELECT teamName FROM teams WHERE teamid = $team2Id";

                                                    $team1Result = mysqli_query($con, $team1Query);
                                                    $team2Result = mysqli_query($con, $team2Query);

                                                    $team1Name = ($team1Row = mysqli_fetch_assoc($team1Result)) ? $team1Row['teamName'] : 'Unknown Team';
                                                    $team2Name = ($team2Row = mysqli_fetch_assoc($team2Result)) ? $team2Row['teamName'] : 'Unknown Team';

                                                ?>
                                                    <div class="preview-item border-bottom">
                                                       
                                                        <div class="preview-item-content d-sm-flex flex-grow">
                                                            <div class="flex-grow">
                                                                <h6 class="preview-subject" style = "font-weight:700"><?php echo $team1Name . " VS " . $team2Name ?></h6>
                                                                <p class="text-muted mb-0"><?php echo $match['match_date'] . " | " . $match['match_time'] ?></p>
                                                                <p class="text-muted"><?php echo $match['match_type'] ?></p>
                                                                <p class="text-muted mb-0"><?php echo $match['venue'] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
               
                <!-- partial -->
            </div>
            <?php } 
            else { header('Location: ../signup.php');
                echo "Please login";
            }?>
            
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
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