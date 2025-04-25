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
            include '../includes/database.php';
            // Start the session to access session variables 
            /*
            if(!isset($_SESSION)) 
                { 
                    echo "I'm in";
                    session_start(); 
                } 
            if (!isset($_SESSION)){
                session_start();
            }*/
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_group'])) {
                // Check if the form is submitted with group data
                if (isset($_POST['group_name']) && isset($_POST['tournament_id'])) {
                    // Sanitize input data
                    $groupName = mysqli_real_escape_string($con, $_POST['group_name']);
                    $tournamentId = mysqli_real_escape_string($con, $_POST['tournament_id']);
                    $adminId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
                    
                    // Insert group data into the database
                    $insertGroupQuery = "INSERT INTO groups (groupName, tournamentid, admin_id) VALUES ('$groupName', '$tournamentId', '$adminId')";
                    if (mysqli_query($con, $insertGroupQuery)) {
                        echo "Group added successfully!";
                        $group_id = mysqli_insert_id($con); // Assuming your group_id is auto-incremented
                        $addAdminToGroupQuery = "INSERT INTO user_group (user_id, group_id) VALUES ('$adminId', '$group_id')";    
                        if (mysqli_query($con, $addAdminToGroupQuery)) {    
                            echo "Admin added to the group successfully!";
                        } else {
                            echo "Error adding admin to the group: " . mysqli_error($con);
                        }
                        header('Location: rules.php?group_id=' . $group_id);
                    } else {
                        echo "Error adding group: " . mysqli_error($con);
                    }
                } else {
                    echo "Invalid request. Please provide valid group data.";
                }
            }
            // Check if admin_id is set in the session
            /*if (!isset($_SESSION['admin_id'])) {
                // Redirect to login page or handle unauthorized access
                header("Location: login.php");
                exit();
            }*/
            
            // Include the database connection file
            
            
            // Retrieve admin_id from the session
            
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper bg-transparent">
                <div class="row justify-content-center">
            
                <div class="col-md-6" style = "background-color: #1f1d47; border-radius: 20px">
                <h2 class="header mb-4">Add Group</h2>
                <form method="post">
                    <div class="mb-3">
                        <label for="group_name" class="form-label">Group Name</label>
                        <input type="text" style = "background-color: white;border-radius: 8px" class="form-control" id="group_name" name="group_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="tournament_id" class="form-label">Select Tournament</label>
                        <select class="form-select" id="tournament_id" name="tournament_id" required>
                            <?php
                            include 'database.php';

                            // Fetch tournaments from the database
                            $tournamentsQuery = "SELECT * FROM tournaments";
                            $tournamentsResult = mysqli_query($con, $tournamentsQuery);

                            // Check if there are any tournaments
                            if (mysqli_num_rows($tournamentsResult) > 0) {
                                // Output data of each row
                                while ($tournament = mysqli_fetch_assoc($tournamentsResult)) {
                                    echo "<option value='" . $tournament["tournamentid"] . "'>" . $tournament["tournamentName"] . "</option>";
                                }
                            } else {
                                echo "<option disabled>No tournaments available</option>";
                            }

                            // Close the database connection
                            mysqli_close($con);
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 text-center">
                    <button type="submit" name="add_group" class="btn btn-success btn-rounded btn-fw">Next</button>
                    </div>
                </form>
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