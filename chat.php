<?php
include_once("./components/header.php");
require_once './services/config.php';

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}
if (!isset($_GET['id'])) {
    header("location: index.php");
}
$current_user = $_SESSION['login_user'];

$sql = "SELECT * FROM `users` WHERE `id` = '" . $_GET['id'] . "'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) <= 0) {
    header("location: index.php");
} else {
    $chat_user = mysqli_fetch_assoc($query);
}
?>

<head>
    <title>Trò chuyện với <?= $chat_user['full_name'] ?></title>
</head>

<div class="container">
    <div class="row wrapper justify-content-center align-items-center">
        <div class="box col-md-6 col-lg-5 col-12 p-0">
            <div class="info px-2 py-3 justify-content-start">
                <a href="./index.php" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div class="info-user">
                    <img src="./assets/img/<?= $chat_user['img'] ?>" alt="avatar" class="info-img">
                    <div class="info-user-text ml-3">
                        <h5 class="m-0"><?= $chat_user['full_name'] ?></h5>
                        <p id="user_chat_status"></p>
                    </div>
                </div>
            </div>

            <ul class="chat-view--list p-2" id="chatbox"></ul>

            <form class="chat-form mb-3 mx-3" id="messageForm">
                <div class="d-flex">
                    <input id="chat-input" type="text" class="form-control" autofocus>
                    <button id="btn-send" type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i></button>
                    <input type="hidden" id="chat_user_id" value="<?= $chat_user['id'] ?>">
                    <input type="hidden" id="current_user_id" value="<?= $current_user['id'] ?>">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once("./components/footer.php");
?>