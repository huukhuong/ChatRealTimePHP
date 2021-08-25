$(document).ready(function () {
    var errorMessage = $('#error-message');
    var loginForm = $('#loginForm');
    var signupForm = $('#signupForm');
    var uploadForm = $('#uploadForm');

    var listUserChat = $('#list-chat');
    var user_chat_status = $('#user_chat_status');
    var chatBox = $('#chatbox');
    var messageForm = $('#messageForm');
    var chatInput = $('#chat-input');

    loginForm.submit(function (e) {
        e.preventDefault();
        errorMessage.css('display', 'none');
        $.ajax({
            url: './services/login.php',
            method: 'post',
            data: {
                email: $('#email').val(),
                password: $('#password').val()
            },
            success: function (data) {
                if (data !== 'ok') {
                    errorMessage.text(data);
                    errorMessage.css('display', 'block');
                } else {
                    console.log(data);
                    window.location = "index.php";
                }
            }
        });
    });

    signupForm.submit(function (e) {
        e.preventDefault();
        errorMessage.css('display', 'none');

        let fName = $('#first-name').val();
        let lName = $('#last-name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let re_password = $('#re-password').val();

        if ((fName + lName).trim().length == 0) {
            errorMessage.text("Không được để trống họ tên");
            errorMessage.css('display', 'block');
            return;
        }
        if (email.trim().length == 0) {
            errorMessage.text("Không được để trống email");
            errorMessage.css('display', 'block');
            return;
        }
        if (password.length == 0) {
            errorMessage.text("Không được để trống mật khẩu");
            errorMessage.css('display', 'block');
            return;
        }
        if (re_password != password) {
            errorMessage.text("Mật khẩu xác nhận không khớp");
            errorMessage.css('display', 'block');
            return;
        }

        $.ajax({
            url: './services/signup.php',
            method: 'post',
            data: {
                full_name: fName.trim() + lName.trim(),
                email: email.trim(),
                password: password
            },
            success: function (data) {
                if (data !== 'ok') {
                    errorMessage.text(data);
                    errorMessage.css('display', 'block');
                } else {
                    console.log(data);
                    window.location = "uploadAvatar.php";
                }
            }
        });
    });

    uploadForm.submit(function (e) {
        e.preventDefault();

        let file_data = $('#file').prop('files')[0];
        let type = file_data.type;
        let match = ['image/gif', 'image/jpeg', 'image/png'];
        if (!match.includes(type)) {
            errorMessage.text("Vui lòng chọn ảnh đúng định dạng");
            errorMessage.css('display', 'block');
            $('#file').val('');
            return;
        }

        var form_data = new FormData();
        form_data.append('file', file_data);
        //sử dụng ajax post
        $.ajax({
            url: './services/upload.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                if (data !== 'ok') {
                    errorMessage.text(data);
                    errorMessage.css('display', 'block');
                }
                else {
                    window.location = 'index.php';
                }
            }
        });

    });

    setInterval(() => {
        // UPDATE LIST USER
        $.ajax({
            url: './services/listUserChat.php',
            success: function (data) {
                listUserChat.html(data);
            }
        });

        // UPDATE STATUS IN CHAT
        $.ajax({
            url: './services/userChatStatus.php',
            data: {
                chat_user_id: $('#chat_user_id').val(),
            },
            success: function (data) {
                user_chat_status.html(data);
            }
        });

        // UPDATE LAST ACTIVITY
        $.ajax({
            url: './services/update_last_activity.php',
            success: function (data) {
            }
        });
        
    }, 1000);

    // CHAT ACTION
    setInterval(() => {
        $.ajax({
            url: './services/updateChat.php',
            method: 'post',
            data: {
                receiver_id: $('#chat_user_id').val(),
                sender_id: $('#current_user_id').val()
            },
            success: function (data) {
                chatBox.html(data);
            }
        });
    }, 100);

    messageForm.submit((e) => {
        e.preventDefault();
        let message = chatInput.val();
        if (chatInput.val().length == 0) {
            return;
        }
        $.ajax({
            url: './services/sendMessage.php',
            method: 'post',
            data: {
                receiver_id: $('#chat_user_id').val(),
                sender_id: $('#current_user_id').val(),
                message: message.trim()
            },
            success: function (data) {
                chatInput.val("");
                chatInput.focus();
            }
        });
    })

});