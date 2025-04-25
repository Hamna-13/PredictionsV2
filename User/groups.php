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
            <!-- partial:partials/_navbar.html -->
            <?php
            include 'navbar.php';
            if (isset($_SESSION['user_id'])){
            ?>
<?php
// groups.php





// Include the database connection file
include '../includes/database.php';

// Retrieve admin_id from the session
$user_id = $_SESSION['user_id'];

// Fetch groups and corresponding tournament names belonging to the specific admin_id
$groupsQuery = "SELECT groups.group_id, groups.groupName, tournaments.tournamentName
               FROM groups
               INNER JOIN tournaments ON groups.tournamentid = tournaments.tournamentid
               INNER JOIN user_group ON groups.group_id = user_group.group_id
               WHERE user_group.user_id = '$user_id'";
$groupsResult = mysqli_query($con, $groupsQuery);


?>



            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper bg-transparent">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card bg-transparent">
                            <div class="card shadow" style="border-radius: 20px;">

                            <div class="card-body bg-white">
                                    <div class="card-header pt-4 bg-purple mb-4" style="border-radius: 14px;">
                                        <div class="d-flex flex-row justify-content-between">
                                            <h4 class="text-white mb-1">Groups</h4>
                                            <a href="create_group.php" style="background-color: #26cc35; margin-left: 10px;" type="button" class="btn btn-success btn-rounded btn-fw">Create Group</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="preview-list">
                                                <?php
                                                // Check if there are any groups
                                                if (mysqli_num_rows($groupsResult) > 0) {
                                                    // Output data of each row
                                                    while ($group = mysqli_fetch_assoc($groupsResult)) {
                                                ?>
                                                        <div class="col-sm-12 grid-margin">
                                                            <div class="card shadow bg-purple" style="border-radius: 20px; cursor: pointer;" onclick="redirectToGroupDetails('<?php echo $group["group_id"]; ?>')">
                                                                <div class="card-body py-3">
                                                                    <!-- <h5>Groups</h5> -->
                                                                    <div class="row">
                                                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                                                <h2 class="mb-0"><?php echo $group['groupName'] ?></h2>
                                                                            </div>
                                                                            <h6 class="text-muted font-weight-normal"><?php echo $group['tournamentName'] ?></h6>
                                                                        </div>
                                                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                                                        <img style = "width:75px; margin-right:100px;"src="../images/yesgroup.png" alt="">
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
                                                ?>


                                                <?php
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
    <script>
        function redirectToGroupDetails(group_id) {
            // Redirect to group_details.php with group_id as a parameter
            window.location.href = 'group_details.php?group_id=' + encodeURIComponent(group_id);
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