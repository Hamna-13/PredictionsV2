<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Login</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="mb-4">Login</h2>
        <form method="post">
          <div class="row g-3">
            <div class="col">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" />
            </div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email or Phone Number</label>
            <input type="text" class="form-control" id="email" name="email" required />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <input type="checkbox" onclick="showPassword('password')" id="showPasswordCheckbox">
                <label for="showPasswordCheckbox">Show Password</label>
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
  <?php
  include 'database.php';
  function identifyString($input)
  {
    // Regular expression for email
    $emailPattern = '/^\S+@\S+\.\S+$/';
    // Regular expression for phone number (basic validation)
    $phonePattern = '/^[0-9\-\(\)\/\+\s]*$/';

    if (preg_match($emailPattern, $input)) {
      return "Email";
    } elseif (preg_match($phonePattern, $input)) {
      return "Phone Number";
    } else {
      return "Unknown";
    }
  }
  if (isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $inputType = identifyString($email);

    
    if ($inputType == "Email") {
      $query = "SELECT * FROM user WHERE username = '$username' AND email = '$email' AND password = '$password' AND role = 'admin'";
    } else {
      echo "Invalid input format. Please enter a valid email or phone number.";
      exit();
    }

    $result = mysqli_query($con, $query);

    
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role'] = 'admin';
        $_SESSION['name'] = $row['username'];
        echo $_SESSION['role'];
  ?>
        <script>
          Swal.fire({
            title: "Congratulations!",
            text: "You have successfully logged in",
            icon: "success"
          }).then(() => {
            // Redirect to dashboard.php after displaying the success message
            window.location.href = 'tournaments.php';
          });
        </script>
      <?php
      } else {
      ?>
        <script>
          Swal.fire({
            title: "Error",
            text: "Invalid credentials. Please try again!",
            icon: "error"
          })
        </script>
  <?php
      }
    } else {
      // Query error
      echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }

    mysqli_close($con);
  }
  ?>

</body>

</html>