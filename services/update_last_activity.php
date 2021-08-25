<?php
require_once 'config.php';
session_start();

$sql = "UPDATE `users` SET `last_activity` = now() WHERE `id`=".$_SESSION['login_user']['id'];
mysqli_query($conn, $sql);