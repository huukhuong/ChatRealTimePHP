<?php
    require_once './config.php';

    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];

    $message = injection($message);

    $sql = "INSERT INTO `messages`(`sender_user_id`, `receiver_user_id`, `message`) 
            VALUES ('$sender_id','$receiver_id','$message')";
    $query = mysqli_query($conn, $sql);

?>