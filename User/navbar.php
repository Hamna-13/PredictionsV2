<?php
include '../includes/database.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Predicteam</title>
   <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<style>
   .navbar {
    background: #1f1d47 !important;
}
</style>
<body>
   


<nav class="navbar p-0 fixed-top d-flex flex-row bg-body-tertiary" style="left: 0;">
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <a class="navbar-brand" href="../index.php">
              <img src="../images/donelogo.png" alt="Logo" width="50%" style="position: relative; bottom: 16vh" class="align-text-top">
              
            </a>
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
     
        </body>
</html>