<?php
require_once 'config.php';
session_start();
$id = $_SESSION['signup_id'];

if (move_uploaded_file($_FILES['file']['tmp_name'], '../assets/img/' . $_FILES['file']['name'])) {
    // Success
    $fileName = $_FILES['file']['name'];
    $sql = "UPDATE `users` SET `img` = '$fileName' WHERE `id` = '$id'";
    mysqli_query($conn, $sql);

    unset($_SESSION['signup_id']);

    $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
    $query = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($query);
    $sql = "UPDATE `users` SET `status` = 1 WHERE `id` = '$id'";
    $query = mysqli_query($conn, $sql);
    $_SESSION['login_user'] = $user;

    echo 'ok';
}
