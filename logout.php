<?php
session_start();
require_once './services/config.php';

$sql = "UPDATE `users` SET `status` = 0 WHERE `id` = '" . $_SESSION['login_user']['id'] ."'";
$query = mysqli_query($conn, $sql);

session_destroy();
header("location: login.php");