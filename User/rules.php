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


// Inside the 'rules.php' file
$group_id = isset($_GET['group_id']) ? $_GET['group_id'] : null;

if ($group_id === null) {
    // Handle the case where group_id is not provided
    echo "Invalid request. Please provide a valid group ID.";
    exit;
}

$query = "SELECT * FROM rules WHERE rules_id = 1";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $defaultValues = mysqli_fetch_assoc($result);
    echo $defaultValues['fav_final_lose'];
}
mysqli_free_result($result);

?>
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


    $other_team_win = isset($_POST['other_team_win']) ? $_POST['other_team_win'] : 0;

    $other_team_lose = isset($_POST['other_team_lose']) ? $_POST['other_team_lose'] : 0;
    $other_playoff_win = isset($_POST['other_playoff_win']) ? $_POST['other_playoff_win'] : 0;

    $other_playoff_lose = isset($_POST['other_playoff_lose']) ? $_POST['other_playoff_lose'] : 0;
    $other_final_win = isset($_POST['other_final_win']) ? $_POST['other_final_win'] : 0;

    $other_final_lose = isset($_POST['other_final_lose']) ? $_POST['other_final_lose'] : 0;




    $simple_team_win = isset($_POST['simple_team_win']) ? $_POST['simple_team_win'] : 0;

    $simple_team_lose = isset($_POST['simple_team_lose']) ? $_POST['simple_team_lose'] : 0;

    $final_match_win = isset($_POST['final_match_win']) ? $_POST['final_match_win'] : 0;

    $final_match_lose = isset($_POST['final_match_lose']) ? $_POST['final_match_lose'] : 0;

    $playoff_match_win = isset($_POST['playoff_match_win']) ? $_POST['playoff_match_win'] : 0;

    $playoff_match_lose = isset($_POST['playoff_match_lose']) ? $_POST['playoff_match_lose'] : 0;




    // Sanitize and validate the data (you should perform more thorough validation)
    $fav_team_include = mysqli_real_escape_string($con, $fav_team_include);
    $fav_team_win = mysqli_real_escape_string($con, $fav_team_win);

    $fav_team_lose = mysqli_real_escape_string($con, $fav_team_lose);
    $fav_playoff_win = mysqli_real_escape_string($con, $fav_playoff_win);

    $fav_playoff_lose = mysqli_real_escape_string($con, $fav_playoff_lose);
    $fav_final_win = mysqli_real_escape_string($con, $fav_final_win);

    $fav_final_lose = mysqli_real_escape_string($con, $fav_final_lose);



    $other_team_win = mysqli_real_escape_string($con, $other_team_win);

    $other_team_lose = mysqli_real_escape_string($con, $other_team_lose);
    $other_playoff_win = mysqli_real_escape_string($con, $other_playoff_win);

    $other_playoff_lose = mysqli_real_escape_string($con, $other_playoff_lose);
    $other_final_win = mysqli_real_escape_string($con, $other_final_win);

    $other_final_lose = mysqli_real_escape_string($con, $other_final_lose);






    $simple_team_win = mysqli_real_escape_string($con, $simple_team_win);

    $simple_team_lose = mysqli_real_escape_string($con, $simple_team_lose);

    $final_match_win = mysqli_real_escape_string($con, $final_match_win);

    $final_match_lose = mysqli_real_escape_string($con, $final_match_lose);

    $playoff_match_win = mysqli_real_escape_string($con, $playoff_match_win);

    $playoff_match_lose = mysqli_real_escape_string($con, $playoff_match_lose);


    // Your SQL query to insert into the database
    $insertQuery = "INSERT INTO rules (fav_team_include, fav_team_win, fav_team_lose, fav_playoff_win, fav_playoff_lose, fav_final_win, fav_final_lose, other_team_win, other_team_lose, other_playoff_win, other_playoff_lose, other_final_win, other_final_lose, simple_team_win,simple_team_lose,
    final_match_win, final_match_lose,
    playoff_match_win,playoff_match_lose)
                    VALUES ('$fav_team_include', '$fav_team_win', '$fav_team_lose', '$fav_playoff_win', '$fav_playoff_lose', '$fav_final_win', '$fav_final_lose','$other_team_win', '$other_team_lose', '$other_playoff_win', '$other_playoff_lose', '$other_final_win', '$other_final_lose', '$simple_team_win', '$simple_team_lose',
                            '$final_match_win', '$final_match_lose',
                            '$playoff_match_win', '$playoff_match_lose')";

    // Perform the query
    if (mysqli_query($con, $insertQuery)) {
        $rules_id = mysqli_insert_id($con);
        echo "Values inserted successfully!";
        $updateGroupQuery = "UPDATE groups SET rules_id = '$rules_id' WHERE group_id = '$group_id'";
        mysqli_query($con, $updateGroupQuery);


        header('Location: add_users.php?group_id=' . $group_id);
        // Redirect to add_users.php with the appropriate group_id

    } else {
        echo "Error inserting values: " . mysqli_error($con);
    }

    // Close the database connection
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
            <!-- partial:partials/_navbar.html -->
            <?php
            include 'navbar.php';

            if (isset($_SESSION['user_id'])) {
            ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper bg-transparent">
                        <div class="row justify-content-center">
                            <div class="col-md-6" style="background-color: #1f1d47; border-radius: 20px">
                                <h2 class="mb-4">Rules</h2>
                                <form method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Add favorite team?</label>
                                        <div class="btn-group" role="group" aria-label="Add favorite team">
                                            <input type="hidden" id="fav_team_include" name="fav_team_include" value=<?php echo $defaultValues['fav_team_include']; ?>>
                                            <button type="button" class="btn btn-primary" onclick="showOptions()">Yes</button>
                                            <button type="button" class="btn btn-secondary" onclick="hideOptions()">No</button>
                                        </div>
                                    </div>

                                    <div class="mb-3" id="fav_team_options" style="display: none;">
                                        <label for="fav_team_win" class="form-label" value=<?php echo $defaultValues['fav_team_win']; ?>>Favorite team win points</label>
                                        <input type="number" style="background-color:white;color:black !important;border-radius: 8px" class="form-control" id="fav_team_win" name="fav_team_win" min="0">
                                    </div>



                                    <div class="mb-3" id="fav_team_lose_options" style="display: none;">
                                        <label for="fav_team_lose" class="form-label" value=<?php echo $defaultValues['fav_team_lose']; ?>>Favorite team lose points</label>
                                        <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="fav_team_lose" name="fav_team_lose" min="0">
                                    </div>

                                    <div class="mb-3" id="fav_playoff_win_options" style="display: none;">
                                        <label for="fav_playoff_win" class="form-label" value=<?php echo $defaultValues['fav_playoff_win']; ?>>Favorite team wins Playoff</label>
                                        <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="fav_playoff_win" name="fav_playoff_win" min="0">
                                    </div>



                                    <div class="mb-3" id="fav_playoff_lose_options" style="display: none;">
                                        <label for="fav_playoff_lose" class="form-label" value=<?php echo $defaultValues['fav_playoff_lose']; ?>>Favorite team loses Playoff</label>
                                        <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="fav_playoff_lose" name="fav_playoff_lose" min="0">
                                    </div>

                                    <div class="mb-3" id="fav_final_win_options" style="display: none;">
                                        <label for="fav_final_win" class="form-label" value=<?php echo $defaultValues['fav_final_win']; ?>>Favorite team wins Final</label>
                                        <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="fav_final_win" name="fav_final_win" min="0">
                                    </div>



                                    <div class="mb-3" id="fav_final_lose_options" style="display: none;">
                                        <label for="fav_final_lose" class="form-label" value=<?php echo $defaultValues['fav_final_lose']; ?>>Favorite team loses Final</label>
                                        <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="fav_final_lose" name="fav_final_lose" min="0">
                                    </div>



                                    <div class="mb-3" id="other_team_options" style="display: none;">
                                        <label for="other_team_win" class="form-label" value=<?php echo $defaultValues['other_team_win']; ?>>Other team win points</label>
                                        <input type="number" style="background-color:white;color:black !important;border-radius: 8px" class="form-control" id="other_team_win" name="other_team_win" min="0">
                                    </div>



                                    <div class="mb-3" id="other_team_lose_options" style="display: none;">
                                        <label for="other_team_lose" class="form-label" value=<?php echo $defaultValues['other_team_lose']; ?>>Other team lose points</label>
                                        <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="other_team_lose" name="other_team_lose" min="0">
                                    </div>

                                    <div class="mb-3" id="other_playoff_win_options" style="display: none;">
                                        <label for="other_playoff_win" class="form-label" value=<?php echo $defaultValues['other_playoff_win']; ?>>Other team wins Playoff</label>
                                        <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="other_playoff_win" name="other_playoff_win" min="0">
                                    </div>



                                    <div class="mb-3" id="other_playoff_lose_options" style="display: none;">
                                        <label for="other_playoff_lose" class="form-label" value=<?php echo $defaultValues['other_playoff_lose']; ?>>Other team loses Playoff</label>
                                        <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="other_playoff_lose" name="other_playoff_lose" min="0">
                                    </div>

                                    <div class="mb-3" id="other_final_win_options" style="display: none;">
                                        <label for="other_final_win" class="form-label" value=<?php echo $defaultValues['other_final_win']; ?>>Other team wins Final</label>
                                        <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="other_final_win" name="other_final_win" min="0">
                                    </div>



                                    <div class="mb-3" id="other_final_lose_options" style="display: none;">
                                        <label for="other_final_lose" class="form-label" value=<?php echo $defaultValues['other_final_lose']; ?>>Other team loses Final</label>
                                        <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="other_final_lose" name="other_final_lose" min="0">
                                    </div>




                                    <div class="mb-3">
                                        <label class="form-label">Match Rules</label>
                                        <div class="mb-3">
                                            <label for="simple_team_win" value=<?php echo $defaultValues['simple_team_win']; ?> class="form-label">Match win points</label>
                                            <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="simple_team_win" name="simple_team_win" min="0" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="simple_team_lose" class="form-label" value=<?php echo $defaultValues['simple_team_lose']; ?>>Match lose points</label>
                                            <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="simple_team_lose" name="simple_team_lose" min="0" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Playoff Rules</label>
                                        <div class="mb-3">
                                            <label for="playoff_match_win" class="form-label" value=<?php echo $defaultValues['playoff_match_win']; ?>>Playoff win points</label>
                                            <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="playoff_match_win" name="playoff_match_win" min="0" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="playoff_match_lose" class="form-label">Playoff lose points</label>
                                            <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" value=<?php echo $defaultValues['playoff_match_lose'] ?> id="playoff_match_lose" name="playoff_match_lose" min="0" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Final Rules</label>
                                        <div class="mb-3">
                                            <label for="final_match_win" class="form-label" value=<?php echo $defaultValues['final_match_win']; ?>>Final win points</label>
                                            <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="final_match_win" name="final_match_win" min="0" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="final_match_lose" class="form-label" value=<?php echo $defaultValues['final_match_lose']; ?>>Final lose points</label>
                                            <input type="number" style="background-color: white;color:black !important;border-radius: 8px" class="form-control" id="final_match_lose" name="final_match_lose" min="0" required>
                                        </div>
                                    </div>

                                    <button type="submit" name="submit_rules" class="btn btn-success btn-rounded btn-fw">Next</button>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->

                    <!-- partial -->
                </div>

            <?php } else {
                header('Location: ../signup.php');
                echo "Please login";
            } ?>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script>
        document.getElementById('fav_team_include').value = <?php echo $defaultValues['fav_team_include']; ?>;
        document.getElementById('fav_team_win').value = <?php echo $defaultValues['fav_team_win']; ?>;

        document.getElementById('fav_team_lose').value = <?php echo $defaultValues['fav_team_lose']; ?>;
        document.getElementById('fav_playoff_win').value = <?php echo $defaultValues['fav_playoff_win']; ?>;

        document.getElementById('fav_playoff_lose').value = <?php echo $defaultValues['fav_playoff_lose']; ?>;
        document.getElementById('fav_final_win').value = <?php echo $defaultValues['fav_final_win']; ?>;

        document.getElementById('fav_final_lose').value = <?php echo $defaultValues['fav_final_lose']; ?>;

        document.getElementById('other_team_win').value = <?php echo $defaultValues['other_team_win']; ?>;

        document.getElementById('other_team_lose').value = <?php echo $defaultValues['other_team_lose']; ?>;
        document.getElementById('other_playoff_win').value = <?php echo $defaultValues['other_playoff_win']; ?>;

        document.getElementById('other_playoff_lose').value = <?php echo $defaultValues['other_playoff_lose']; ?>;
        document.getElementById('other_final_win').value = <?php echo $defaultValues['other_final_win']; ?>;

        document.getElementById('other_final_lose').value = <?php echo $defaultValues['other_final_lose']; ?>;



        document.getElementById('simple_team_win').value = <?php echo $defaultValues['simple_team_win']; ?>;

        document.getElementById('simple_team_lose').value = <?php echo $defaultValues['simple_team_lose']; ?>;
        document.getElementById('final_match_win').value = <?php echo $defaultValues['final_match_win']; ?>;

        document.getElementById('final_match_lose').value = <?php echo $defaultValues['final_match_lose']; ?>;
        document.getElementById('playoff_match_win').value = <?php echo $defaultValues['playoff_match_win']; ?>;

        document.getElementById('playoff_match_lose').value = <?php echo $defaultValues['playoff_match_lose']; ?>;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
    <?php
    mysqli_close($con);
    ?>
</body>

</html>