<?php
session_start();
require_once 'config.php';

$result = '';
$current_id = $_SESSION['login_user']['id'];

$sql = "SELECT * FROM `users` WHERE NOT `id` = '" . $current_id . "'";
$query = mysqli_query($conn, $sql);

$current_time = strtotime(date("Y-m-d H:i:s").'-2 second');
$current_time = date("Y-m-d H:i:s", $current_time);

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {

        $last_chat = "Chưa có tin nhắn nào";
        $sql2 = "SELECT * FROM `messages` 
                WHERE (`sender_user_id`=" . $current_id . " AND `receiver_user_id`=" . $row['id'] . ") 
                OR (`sender_user_id`=" . $row['id'] . " AND `receiver_user_id`=" . $current_id . ") ORDER BY `id` DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($query2) > 0) {
            $row2 = mysqli_fetch_assoc($query2);
            $sender_name = explode(' ', $row['full_name']);
            $name = $row2['sender_user_id'] == $current_id ? 'Bạn: ' :  $sender_name[count($sender_name) - 1] . ": ";
            $last_chat = $name . $row2['message'];
        }

        $active = $current_time < $row['last_activity'] ? '<i class="fas fa-circle active-icon"></i>' : '<i class="fas fa-circle active-icon disable"></i>';
        $result .=
            '
                <li class="list-chat--item">
                    <a href="./chat.php?id=' . $row['id'] . '" class="list-chat--link">
                        <img src="./assets/img/' . $row['img'] . '" class="info-img">
                        <div class="detail-chat">
                            <h5 class="detail-chat--name">' . $row['full_name'] . '</h5>
                            <span class="detail-chat--inbox">' . $last_chat . '</span>
                        </div>
                        ' . $active . '
                    </a>
                </li>
        ';
    }
}
echo $result;
