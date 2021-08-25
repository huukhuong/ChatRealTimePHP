<?php
include_once("./components/header.php");
?>

<head>
    <title>Đăng ký</title>
</head>

<div class="container">
    <div class="row wrapper justify-content-center align-items-center">
        <div class="box col-lg-5 col-sm-8 col-12">
            <h2 class="text-center">Đăng ký tài khoản</h2>
            <hr>
            <form id="signupForm">
                <div class="alert alert-danger" id="error-message"></div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="first-name">Họ</label>
                            <input type="text" class="form-control" id="first-name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="last-name">Tên</label>
                            <input type="text" class="form-control" id="last-name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Địa chỉ email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="re-password">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="re-password">
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 mt-2">
                    <h5 class="m-0">Đăng ký</h5>
                </button>
                <p class="text-center mt-4 mb-0">Đã là thành viên? <b><a href="./login.php">Đăng nhập ngay</a></b></p>
            </form>
        </div>
    </div>
</div>

<?php
include_once("./components/footer.php");
?>