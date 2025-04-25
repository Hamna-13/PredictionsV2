

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Sign Up</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="mb-4">Sign Up</h2>
        <form method="post">
          <div class="row g-3">
            <div class="col">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" />
            </div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required />
          </div>
          <div class="mb-3">
            <label for="phoneNumber" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="password" required />
              <div class="input-group-append">
                <div class="input-group-text">
                  <input type="checkbox" onclick="showPassword('password')" id="showPasswordCheckbox">
                  <label for="showPasswordCheckbox">Show Password</label>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required />
              <div class="input-group-append">
                <div class="input-group-text">
                  <input type="checkbox" onclick="showPassword('confirmPassword')" id="showConfirmPasswordCheckbox">
                  <label for="showConfirmPasswordCheckbox">Show Password</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
  <script>
    function showPassword(inputId) {
      var passwordInput = document.getElementById(inputId);
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    }
  </script>
</body>

</html>
<?php
session_start();
  include 'database.php';
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $confirmPassword = $_POST["confirmPassword"];
    $role = 'user';
    if ($password !== $confirmPassword) {
  ?>
      <script>
        Swal.fire({
          title: "Error",
          text: "Password Does not match",
          icon: "error"
        })
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire({
          title: "Congratulations!",
          text: "You have successfully signed in",
          icon: "success"
        }).then(() => {
          // Redirect to dashboard.php after displaying the success message
          window.location.href = 'add_group.php';
        });
      </script>
  <?php
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO user (username, email, phonenumber, password, role)
              VALUES ('$username', '$email','$phonenumber', '$hashedPassword', '$role')";

      if (mysqli_query($con, $sql)) {
        $userId = mysqli_insert_id($con);
        // Store the user ID in the session
        $_SESSION['user_id'] = $userId;

      } else {
        echo "Error: " . mysqli_error($con);
      }
    }
    mysqli_close($con);
  }
  ?>