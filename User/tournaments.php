<?php

// groups.php



// Check if admin_id is set in the session
/*if (!isset($_SESSION['admin_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}*/

// Include the database connection file
include '../includes/database.php';

// Retrieve admin_id from the session
if (isset($_POST['deleteTournament'])) {
    // Get the tournament ID from the form
    $tournamentId = $_POST['tournament_id'];

    // Prepare and execute the SQL query to delete the tournament
    $deleteQuery = "DELETE FROM tournaments WHERE tournamentid = $tournamentId";
    $result = mysqli_query($con, $deleteQuery);
}

// Fetch tournaments from the database
$sql = "SELECT * FROM tournaments";
$result = mysqli_query($con, $sql);

// Check if there are any tournaments



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

<body class="main-layout" style="font-family: 'Poppins', sans-serif;font-weight:600 ;color:#1f1d47">
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php
            include 'navbar.php';
            if (isset($_SESSION['user_id'])){
            ?>
            <!-- partial:partials/_navbar.html -->

            <!-- partial -->
            <div class="main-panel" style="font-family: 'Poppins', sans-serif">
                <div class="content-wrapper bg-transparent">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card bg-transparent">
                            <div class="card shadow" style="border-radius: 20px;">
                                <div class="card-body bg-white">
                                    <div class="card-header pt-4 bg-purple mb-4" style="border-radius: 14px;">
    
                                        <div class="d-flex flex-row justify-content-between">
                                            <h4 class="text-white mb-1">Tournaments</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="preview-list">
                                                <?php
                                                // Check if there are any groups
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Output data of each row
                                                    while ($tournament = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <div class="col-sm-12 grid-margin">
                                                            <div class="card shadow bg-purple" style="border-radius: 20px; cursor: pointer;" onclick="redirectToTournamentDetails('<?php echo $tournament["tournamentid"]; ?>')">
                                                                <div class="card-body py-3">
                                                                    <!-- <h5>Groups</h5> -->
                                                                    <div class="row">
                                                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                                                            <div style="color:white" class="d-flex d-sm-block d-md-flex align-items-center">
                                                                                <h2 class="mb-0"><?php echo $tournament['tournamentName'] ?></h2>
                                                                            </div>
                                                                            <h6 class="text-muted font-weight-normal"><br>Start Date: <?php echo $tournament['startDate'] ?><br>End Date: <?php echo $tournament['endDate'] ?></h6>
                                                                        </div>
                                                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                                                        <img style = "width:100px"src="../images/realtrophy.png" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                <?php
                                                    }
                                                } else {
                                                    echo '<p>No groups available for this admin.</p>';
                                                }

                                                // Close the database connection
                                                mysqli_close($con);
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

            </div>
            
            <?php } 
            else { header('Location: ../signup.php');
                echo "Please login";
            }?>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- plugins:js -->
    <script>
        function redirectToTournamentDetails(tournamentid) {
            // Redirect to group_details.php with group_id as a parameter
            window.location.href = 'matches.php?tournament_id=' + encodeURIComponent(tournamentid);
        }
    </script>
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