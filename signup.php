<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style2.css" />
  <title>Predicteam</title>
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form method="post">
        <h1>Create Account</h1>
        <input type="text" placeholder="Name" id="username" name="username" required />
        <input type="email" placeholder="Email" id="email" name="email" required />
        <input type="tel" placeholder="Phone Number" id="phoneNumber" name="phoneNumber" required />
        <input type="password" placeholder="Password" id="signup_password" name="password" required />
        <input type="checkbox" onclick="showPassword('signup_password')" id="showPasswordCheckbox" />
        <label for="showPasswordCheckbox">Show Password</label>
        <input type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" required />
        <input type="checkbox" onclick="showPassword('confirmPassword')" id="showConfirmPasswordCheckbox" />
        <label for="showConfirmPasswordCheckbox">Show Password</label>
        <button name="signup" type="submit">Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form method="post">
        <h1>Login</h1>
        <input type="text" placeholder="User Name" id="username" name="username" />
        <input type="tel" placeholder="Email or Phone Number" id="emailOrPhone" name="emailOrPhone" />
        <input type="password" placeholder="Password" id="login_password" name="password" />
        <input type="checkbox" onclick="showPassword('login_password')" id="showPasswordCheckbox" />
        <label for="showPasswordCheckbox">Show Password</label>
        <button name="login" type="submit">Login</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome!</h1>
          <p>
            To keep connected with us please login with your personal info
          </p>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start journey with us</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
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
    document.addEventListener("DOMContentLoaded", function() {
      const signUpButton = document.getElementById("signUp");
      const signInButton = document.getElementById("signIn");
      const container = document.getElementById("container");

      signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
      });

      signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
      });
      const urlParams = new URLSearchParams(window.location.search);
      const type = urlParams.get("type");

      if (type === "signUp") {
        container.classList.add("right-panel-active");
      }
    });
  </script>
  <?php
  include './includes/database.php';
  session_start();
  function identifyString($input)
  {
    $emailPattern = '/^\S+@\S+\.\S+$/';
    $phonePattern = '/^[0-9\-\(\)\/\+\s]*$/';

    if (preg_match($emailPattern, $input)) {
      return "Email";
    } elseif (preg_match($phonePattern, $input)) {
      return "Phone Number";
    } else {
      return "Unknown";
    }
  }
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $emailOrPhone = $_POST['emailOrPhone'];
    $password = $_POST['password'];
    $role = 'user';
    $inputType = identifyString($emailOrPhone);

    if ($inputType == "Email") {
      $query = "SELECT * FROM user WHERE username = '$username' AND email = '$emailOrPhone' AND password = '$password' AND role = 'user'";
    } elseif ($inputType == "Phone Number") {
      $query = "SELECT * FROM user WHERE username = '$username' AND phonenumber = '$emailOrPhone' AND password = '$password'";
    } else {
      echo "Invalid input format. Please enter a valid email or phone number.";
      exit();
    }

    $result = mysqli_query($con, $query);
    ?>
    <?php
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        $_SESSION['user_id'] = $user_id;
        $_SESSION['admin_id'] = $user_id;
        $_SESSION['name'] = $row['username'];
  ?>
        <script>
          
          Swal.fire({
            title: "Congratulations!",
            text: "You have successfully logged in",
            icon: "success"
          }).then(() => {
            window.location.href = './User/dashboard.php';
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
      echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }

    mysqli_close($con);
  }
  if (isset($_POST['signup'])) {
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
  <?php
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO user (username, email, phonenumber, password, role)
              VALUES ('$username', '$email','$phonenumber', '$hashedPassword', '$role')";

if (mysqli_query($con, $sql)) {
  
  $user_id = mysqli_insert_id($con);
  
        $_SESSION['user_id'] = $user_id;
        $_SESSION['admin_id'] = $user_id;
        $_SESSION['name'] = $username;
  ?><script>
    Swal.fire({
      title: "Congratulations!",
      text: "You have successfully signed in",
      icon: "success"
    }).then(() => {
      window.location.href = './User/dashboard.php';
      
    });
  </script>
  <?php
} else {
  echo "Error: " . mysqli_error($con);
}
}
    mysqli_close($con);
  }
  ?>
</body>

</html>