<?php

// groups.php
include '../includes/database.php';
// Start the session to access session variables

$group_id = isset($_GET['group_id']) ? $_GET['group_id'] : null;

// Search users by name
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_user'])) {
    $searchKeyword = mysqli_real_escape_string($con, $_POST['search_keyword']);

    $searchUserQuery = "SELECT * FROM user WHERE username LIKE '%$searchKeyword%'";
    $searchUserResult = mysqli_query($con, $searchUserQuery);
}

// Add user to group
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user']) && isset($_POST['selected_user'])) {
    $selectedUser = mysqli_real_escape_string($con, $_POST['selected_user']);
    echo $selectedUser;
    echo $group_id;
    // Add user to user_group table
    $addUserToGroupQuery = "INSERT INTO user_group (user_id, group_id) VALUES ('$selectedUser', '$group_id')";

    if (mysqli_query($con, $addUserToGroupQuery)) {
        echo "User added to the group successfully!";
    } else {
        echo "Error adding user to the group: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>

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
            <!-- partial:partials/_navbar.html -->
            <?php
            include 'navbar.php';
            if (isset($_SESSION['user_id'])){
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper bg-transparent">
                <div class="row justify-content-center">
            <div class="col-md-6" style = "background-color: #1f1d47; border-radius: 20px">
                <h2 class="mb-4">Add User to Group</h2>

                <!-- Search User Form -->
                <form method="post">
                    <div class="mb-3">
                        <label for="search_keyword" class="form-label">Search by Name</label>
                        <input style = "background-color: white;border-radius: 8px"type="text" class="form-control" id="search_keyword" name="search_keyword" required>
                    </div>
                    <div class="container mx-5">
                    <button class="btn btn-success btn-rounded btn-fw"type="submit" name="search_user">Search User</button>
                <?php
                $admin_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : null;
                ?>
                <a href="groups.php?admin_id=<?php echo $admin_id; ?>" class="btn btn-success btn-rounded btn-fw">Done</a>
                </div>
                </form>
                <!-- Display Search Results -->
                <?php
                if (isset($searchUserResult) && mysqli_num_rows($searchUserResult) > 0) {
                    echo '<h3 class="mt-4">Search Results</h3>';
                    echo '<ul>';
                    while ($user = mysqli_fetch_assoc($searchUserResult)) {
                        echo '<li>';
                        echo $user['username'];
                        echo '<form method="post" style="display:inline;">';
                        echo '<input type="hidden" name="selected_user" value="' . $user['user_id'] . '">';
                        echo '<button type="submit" name="add_user" class="btn btn-success">Add User</button>';
                        echo '</form>';
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                ?>
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