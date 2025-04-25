<?php
include '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $groupId = isset($_GET['group_id']) ? $_GET['group_id'] : '';

    if (!empty($groupId)) {
        $fetchQuery = "SELECT user.username, group_chat.message, group_chat.timestamp
                       FROM group_chat
                       INNER JOIN user ON group_chat.user_id = user.user_id
                       WHERE group_chat.group_id = '$groupId'
                       ORDER BY group_chat.timestamp ASC"; // Adjust limit as needed

        $fetchResult = mysqli_query($con, $fetchQuery);

        if ($fetchResult) {
            while ($row = mysqli_fetch_assoc($fetchResult)) {
                ?>
                <div style = "background-color:#d1d0d5"class="d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left overflow-auto">
                        <h6 class="mb-1"><?php echo $row['username'] ?></h6>
                        <p class="text-muted mb-0"><?php echo $row['message']?></p>
                      </div>
                    </div>
                    <?php
            }
        } else {
            echo "Error fetching messages: " . mysqli_error($con);
        }
    }
}
?>
