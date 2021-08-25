<?php
include_once("./components/header.php");
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}
$current_user = $_SESSION['login_user'];
?>

<head>
    <title>Trang chủ</title>
</head>

<div class="container">
    <div class="row wrapper justify-content-center align-items-center">
        <div class="box col-md-8 col-lg-6 col-12">
            <div class="info">
                <div class="info-user">
                    <img src="./assets/img/<?=$current_user['img']?>" alt="avatar" class="info-img">
                    <div class="info-user-text">
                        <h5 class="m-0"><?=$current_user['full_name']?></h5>
                        <p>
                            <i class="fas fa-circle active-icon"></i>
                            <span>Đang hoạt động</span>
                        </p>
                    </div>
                </div>
                <a href="./logout.php" class="btn btn-primary">Đăng xuất</a>
                </d>
            </div>
            <hr>

            <ul class="list-chat" id="list-chat">
                
            </ul>
        </div>
    </div>
</div>

<?php
include_once("./components/footer.php");
?>