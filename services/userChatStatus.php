<?php
require_once './config.php';

$sql = "SELECT * FROM `users` WHERE `id` = '" . $_GET['chat_user_id'] . "'";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    $chat_user = mysqli_fetch_assoc($query);
}

$current_time = strtotime(date("Y-m-d H:i:s").'-2 second');
$current_time = date("Y-m-d H:i:s", $current_time);

if ($chat_user['last_activity'] > $current_time) {
   echo '<i class="fas fa-circle active-icon"></i>
    <span>Đang hoạt động</span>';
} else {
    echo '<i class="fas fa-circle active-icon disable"></i>
    <span>Không hoạt động</span>';
} 