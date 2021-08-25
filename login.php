<?php
include_once("./components/header.php");
?>

<head>
    <title>Đăng nhập</title>
</head>

<div class="container">
    <div class="row wrapper justify-content-center align-items-center">
        <div class="box col-md-6 col-lg-4 col-12">
            <h2 class="text-center">Đăng nhập</h2>
            <hr>
            <form id="loginForm">
                <div class="alert alert-danger" id="error-message"></div>
                <div class="form-group">
                    <label for="email">Địa chỉ email</label>
                    <input type="email" class="form-control" id="email" autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 mt-2">
                    <h5 class="m-0">Bắt đầu trò chuyện</h5>
                </button>
                <p class="text-center mt-4 mb-0">Chưa có tài khoản? <b><a href="./signup.php">Đăng ký ngay</a></b></p>
            </form>
        </div>
    </div>
</div>

<?php
include_once("./components/footer.php");
?>