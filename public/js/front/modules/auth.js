$(document).ready(function(){
    init_register_validation();
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

function init_register_validation() {
    if ($('#register-form').length > 0) {
        $('#register-form').validate({
            errorElement: 'span',
            errorClass: 'error',
            rules: {
                firstname : {
                    required: true,
                },
                lastname : {
                    required: true,
                },
                email : {
                    required: true,
                    email : true,
                    remote: {
                        url: base_url + '/agent/checkEmail',
                        type: "post",
                        data: {
                            _token: csrf_token,
                            email: function() {
                                return $(".checkemail").val();
                            },
                        }
                    }
                },
            },
            messages: {
                firstname : {
                    required: "Please enter first name",
                },
                lastname : {
                    required: "Please enter last name",
                },
                email : {
                    required: "Please enter email",
                    email : "Please enter valid email",
                    remote : "Email already register, please use different email"
                },
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
