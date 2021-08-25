<?php
require_once './config.php';
$sender_id = $_POST['sender_id'];
$receiver_id = $_POST['receiver_id'];

$sql = "SELECT * FROM `messages` 
        WHERE (`sender_user_id`=$sender_id AND `receiver_user_id`=$receiver_id) 
            OR (`sender_user_id`=$receiver_id AND `receiver_user_id`=$sender_id)";

$query = mysqli_query($conn, $sql);

$result = "";

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $message = $row['message'];
        $sender = $row['sender_user_id'];
        $receiver = $row['receiver_user_id'];

        if ($sender == $sender_id) {
            $result .= '
            <li class="chat-item chat-item--client">
                <span class="message message--client">' . $message . '</span>
            </li>
            ';
        } else {
            $result .= '
            <li class="chat-item chat-item--server">
                <span class="message message--server">'.$message.'</span>
            </li>
            ';
        }
    }
}

echo $result;