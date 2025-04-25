<?php
session_start();
if (isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])) {
    $_SESSION = array();
    session_destroy();  
    header("Location: signup.php?signIn");
    exit();
} else {
    header("Location: signup.php?signIn");
    exit();
}
?>
