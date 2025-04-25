<?php

include '../includes/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $groupId = isset($_POST['group_id']) ? $_POST['group_id'] : '';
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

    if (!empty($message) && !empty($groupId) && !empty($userId)) {
        $insertQuery = "INSERT INTO group_chat (group_id, user_id, message) VALUES ('$groupId', '$userId', '$message')";
        $insertResult = mysqli_query($con, $insertQuery);

        if (!$insertResult) {
            echo "Error saving message: " . mysqli_error($con);
        }
    }
}
?>
