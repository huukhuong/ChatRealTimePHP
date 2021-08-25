<?php
require_once 'config.php';
session_start();


$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$full_name = injection($full_name);
$email = injection($email);
$password = injection($password);
$password = md5($password);

// Kiểm tra mail tồn tại hay chưa
$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    echo "Tài khoản đã tồn tại";
    die();
}
$sql = "INSERT INTO `users`(`full_name`, `email`, `password`, `img`, `status`) 
        VALUES ('$full_name','$email','$password','','1')";
if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    $_SESSION['signup_id'] = $last_id;
    echo 'ok';
}