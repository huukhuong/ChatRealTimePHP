<?php
require_once 'config.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$email = injection($email);
$password = injection($password);
$password = md5($password);

if (empty($email)) {
    echo 'Không được để trống địa chỉ email';
    die();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Email sai định dạng';
    die();
}
if (empty($password)) {
    echo 'Không được để trống mật khẩu';
    die();
}

$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) <= 0) {
    echo "Tài khoản không tồn tại";
    die();
}

$sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) <= 0) {
    echo "Mật khẩu không đúng";
    die();
}

$user = mysqli_fetch_assoc($query);
$sql = "UPDATE `users` SET `status` = 1 WHERE `email` = '$email'";
$query = mysqli_query($conn, $sql);
$_SESSION['login_user'] = $user;
echo 'ok';