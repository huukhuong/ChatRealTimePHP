<?php
include_once("./components/header.php");

if(!isset($_SESSION['signup_id'])) {
    header("location: index.php");
}
?>

<head>
    <title>Đăng ký</title>
</head>

<div class="container">
    <div class="row wrapper justify-content-center align-items-center">
        <div class="box col-lg-5 col-sm-8 col-12">
            <h2 class="text-center">Tải lên ảnh đại diện</h2>
            <hr>
            <form id="uploadForm" enctype="multipart/form-data">
                <div class="alert alert-danger" id="error-message"></div>
                <div class="form-group">
                    <label for="file">Chọn ảnh</label>
                    <input id="file" type="file" name="sortpic" required class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 mt-2">
                    <h5 class="m-0">Hoàn tất</h5>
                </button>
            </form>
        </div>
    </div>
</div>

<?php
include_once("./components/footer.php");
?>