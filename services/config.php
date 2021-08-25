<?php

$conn = mysqli_connect("localhost", "root", "", "chat");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}
date_default_timezone_set("Asia/Ho_Chi_Minh");
mysqli_set_charset($conn,"utf8");

function injection($str) {
    $str = strip_tags($str);
    $str = addslashes($str);
    return $str;
}