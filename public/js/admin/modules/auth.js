$(document).ready(function(){
    init_login_validation();
    init_forgot_password_validation();
    init_reset_validation();
});
function init_login_validation() {
    if ($('#login-form').length > 0) {
        $('#login-form').validate({
            errorElement: 'span',
            errorClass: 'error',
            rules: {
                email : {
                    required: true,
                },
                password : {
                    required: true,
                    minlength: 6,
                }
            },
            messages: {
                email : {
                    required: "Please enter email",
                },
                password : {
                    required: "Please enter password",
                }
            },
        });
    }
}
function init_forgot_password_validation() {
    if ($('#forgot-form').length > 0) {
        $('#forgot-form').validate({
            errorElement: 'span',
            errorClass: 'error',
            rules: {
                email : {
                    required: true,
                }
            },
            messages: {
                email : {
                    required: "Please enter email",
                }
            }
        });
    }
}
function init_reset_validation() {
    if ($('#reset-form').length > 0) {
        $('#reset-form').validate({
            errorElement: 'span',
            errorClass: 'error',
            rules: {
                new_password : {
                    required: true,
                    minlength: 6,
                },
                confirm_password : {
                    required: true,
                    equalTo: "#new_password",
                    minlength: 6,
                }
            },
            messages: {
                new_password : {
                    required: "Please enter new password",
                },
                confirm_password : {
                    required: "Please enter confirm password",
                    equalTo : "The password and confirmation password do not match"
                }
            },
        });
    }
}