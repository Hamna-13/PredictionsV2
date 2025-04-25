<?php

    include '../includes/database.php';
    session_start();
    if (isset($_SESSION['user_id'])){
    // Assuming group_id is passed as a query parameter
    $group_id = isset($_GET['group_id']) ? $_GET['group_id'] : null;


    // Check if the group_id is set and not empty
    if ($group_id === null) {
        // Handle the case where group_id is not provided
        echo "Invalid request. Please provide a valid group ID.";
        exit;
    }
    $groupQuery = "SELECT groups.groupName, groups.rules_id, tournaments.tournamentName
                   FROM groups
                   INNER JOIN tournaments ON groups.tournamentid = tournaments.tournamentid
                   WHERE groups.group_id = '$group_id'";
   
   
    $result = mysqli_query($con, $groupQuery);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $groupData = mysqli_fetch_assoc($result);
        $rules_id = $groupData['rules_id'];
        $groupName = $groupData['groupName'];
        $tournamentName = $groupData["tournamentName"];
        // Fetch rules data based on rules_id
        $rulesQuery = "SELECT * FROM rules WHERE rules_id = '$rules_id'";
        $rulesResult = mysqli_query($con, $rulesQuery);
    
        if ($rulesResult && mysqli_num_rows($rulesResult) > 0) {
            $rulesData = mysqli_fetch_assoc($rulesResult);
        }
    }
    mysqli_free_result($result);
mysqli_free_result($rulesResult);
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
  <body style = "font-family: 'Poppins', sans-serif;font-weight:600 ;color:#1f1d47">
  
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" style = "background-color: #1f1d47">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top" style = "background-color: #1f1d47">
          <a  href="dashboard.php"><img class="ml-3"width="80%" src="../images/donelogo.png" alt="logo" /></a>
         
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                <div class= "menu-icon">
                <i class="mdi mdi-account"></i>
                </div>
                </div>
                <div class="profile-name" style = "color: white !important;">
                  <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['name']?></h5>
                  
                </div>
              </div>
              
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
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
        <nav class="navbar p-0 fixed-top d-flex flex-row" style = "background-color: #1f1d47">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center" style = "background-color: #1f1d47">
            <a class="navbar-brand brand-logo-mini" href="../index.php"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
           
            <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                  <span><i class = "img-xs rounded-circle mdi mdi-account"></i></span>
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['name']?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item"  href="../logout.php">
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
          <div class="content-wrapper" style = "background-color:#dfebf7">
           <div class="d-flex justify-content-between">
            <div>

                <h3 class="card-title mb-1" style = "font-weight:1000"><?php echo $groupName; ?></h4>
                <p class="text-muted mb-1"><?php echo $tournamentName; ?></p>
            </div>
            <p class="text-muted mb-1">Points:  <?php echo $_SESSION['points']?></p>

           </div>
            <div class="row">
            <div class="col-md-8 grid-margin">
                <div class="card shadow">
                    <div class="card-body"  style = "background-color:white">
                        <div class = "card-header bg-purple rounded-lg"><h4 class = "text-white">Rules</h4></div>
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            
                            <th><h4> Matches </h4></th>
                            <th><h4> Points </h4></th>
                           
                          </tr>
                        </thead>


                     


                        <tbody>
                        <?php if ($rulesData['fav_team_include'] == 1): ?>
                          <tr>
                          
                            <td>
                             
                              <span class="pl-2">Favorite team win</span>
                            </td>
                            
                            <td> <?php echo ($rulesData['fav_team_win'])?> </td>
                       
                          </tr>

                         

                          <tr>
                          
                          <td>
                           
                            <span class="pl-2">Favorite team lose</span>
                          </td>
                          
                          <td> <?php echo ($rulesData['fav_team_lose'])?> </td>
                     
                        </tr>

                          <tr>
                            
                            <td>
                            
                              <span class="pl-2">Favorite team Playoff win</span>
                            </td>
                            
                            <td> <?php echo ($rulesData['fav_playoff_win'])?> </td>
                          
                        
                          </tr>

                          <tr>
                            
                            <td>
                             
                              <span class="pl-2">Favorite team Playoff lose</span>
                            </td>
                            
                            <td> <?php echo ($rulesData['fav_playoff_lose'])?> </td>
                          
                        
                          </tr>
                         
                          <tr>
                            
                            <td>
                             
                              <span class="pl-2">Favorite team Final win</span>
                            </td>
                         
                            <td> <?php echo ($rulesData['fav_final_win'])?> </td>
                           
                       
                          </tr>

                          <tr>
                            
                            <td>
                             
                              <span class="pl-2">Favorite team Final lose</span>
                            </td>
                         
                            <td> <?php echo ($rulesData['fav_final_lose'])?> </td>
                           
                       
                          </tr>

                          <tr>
                          
                          <td>
                           
                            <span class="pl-2">Other team win</span>
                          </td>
                          
                          <td> <?php echo ($rulesData['other_team_win'])?> </td>
                     
                        </tr>

                       

                        <tr>
                        
                        <td>
                         
                          <span class="pl-2">Other team lose</span>
                        </td>
                        
                        <td> <?php echo ($rulesData['other_team_lose'])?> </td>
                   
                      </tr>

                        <tr>
                          
                          <td>
                          
                            <span class="pl-2">Other team Playoff win</span>
                          </td>
                          
                          <td> <?php echo ($rulesData['other_playoff_win'])?> </td>
                        
                      
                        </tr>

                        <tr>
                          
                          <td>
                           
                            <span class="pl-2">Other team Playoff lose</span>
                          </td>
                          
                          <td> <?php echo ($rulesData['other_playoff_lose'])?> </td>
                        
                      
                        </tr>
                       
                        <tr>
                          
                          <td>
                           
                            <span class="pl-2">Other team Final win</span>
                          </td>
                       
                          <td> <?php echo ($rulesData['other_final_win'])?> </td>
                         
                     
                        </tr>

                        <tr>
                          
                          <td>
                           
                            <span class="pl-2">Other team Final lose</span>
                          </td>
                       
                          <td> <?php echo ($rulesData['other_final_lose'])?> </td>
                         
                     
                        </tr>
                          <?php endif; ?>
                          <tr>
                            
                            <td>
                             
                              <span class="pl-2">Match win</span>
                            </td>
                          
                            <td> <?php echo ($rulesData['simple_team_win'])?> </td>
                          
                         
                          </tr>
                          <tr>
                            
                            <td>
                             
                              <span class="pl-2">Match lose</span>
                            </td>
                          
                            <td> <?php echo ($rulesData['simple_team_lose'])?> </td>
                         
                          
                          </tr>
                          <tr>
                            
                            <td>
                            
                              <span class="pl-2">Playoff win</span>
                            </td>
                          
                            <td> <?php echo ($rulesData['playoff_match_win'])?> </td>
                         
                          
                          </tr>
                          <tr>
                            
                            <td>
                             
                              <span class="pl-2">Playoff lose</span>
                            </td>
                          
                            <td> <?php echo ($rulesData['playoff_match_lose'])?> </td>
                         
                          
                          </tr>
                          <tr>
                            
                            <td>
                             
                              <span class="pl-2">Final win</span>
                            </td>
                          
                            <td> <?php echo ($rulesData['final_match_win'])?> </td>
                         
                          
                          </tr>
                          <tr>
                            
                            <td>
                              
                              <span class="pl-2">Final lose</span>
                            </td>
                          
                            <td> <?php echo ($rulesData['final_match_lose'])?> </td>
                         
                          
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            
              <div class="col-md-4 grid-margin">
                <div class="card position-sticky sticky-top overflow-auto">
                    <div class="card-body overflow-auto" style = "background-color:white; height: 356px">
                        <div class="card-header bg-purple rounded-lg position-sticky sticky-top"><h4 class = "text-white">Group Chat</h4></div>
                    
                    <div id="chatSection">
                    <div id="chatMessages"></div>
                  <input type="text" id="messageInput" placeholder="Type your message...">
                  <button onclick="sendMessage()">Send</button>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>

          <script>
        function sendMessage() {
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

<?php } 
            else { header('Location: ../signup.php');
                echo "Please login";
            }?>