$(document).ready(function(){
    init_profile_validation();
    init_password_validation();
    $(document).on("click", ".profile-submit", function (e) {
        e.preventDefault();
        if ($("#profile-form").valid()) {
            $(".profile-submit").attr("disabled", true);
            $('.profile-submit i').removeClass('hide');
            setTimeout(function() {
                $('#profile-form').submit();
            },1000);
        } else {
            return false;
        }
    });
    
    if ($(".dropify").length > 0) {
        $('.dropify').dropify().on('dropify.beforeClear', function(event, element) {
            var name        = event.target.name;
    
            var admin_id = $('.user_id').val();
            if (name != "") {
             swal({
                title: "ARE YOU SURE WANT TO REMOVE?",
                icon: "error",
                buttons: !0,
                dangerMode: !0
            }).then((function(t) {
                if(t) {
                    $.ajax({
                        type: 'POST',
                        url:  admin_url+'/profile/avatar-remove',
                        data: {
                                id      : admin_id,
                                name    : name,
                                _token  : csrf_token
                            },
                        datatype: 'json',
                        success     : function(data){
                            var response =  $.parseJSON(data);
                            if(response.status == true) {
                                window.location.reload(true);
                                showMessage('success',response.message);
                            } else {
                                showMessage('error',response.message);
                            }
                        }
                    });
                }
            }))
                return false;
            }
        });
    }

    $(document).on("click", ".password-submit", function (e) {
        e.preventDefault();
        if ($("#password-form").valid()) {
            $(".password-submit").attr("disabled", true);
            $('.password-submit i').removeClass('hide');
            setTimeout(function() {
                $('#password-form').submit();
            },1000);
        } else {
            return false;
        }
    });
});

function init_profile_validation() {
    if ($("#profile-form").length > 0) {
        $('#profile-form').validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                email : {
                    required: true,
                    email : true,
                    remote      : {
                        url: admin_url+'/profile/checkEmail',
                        type: "post",
                        data: {
                            email: function() {
                                return $(".email").val();
                            },
                            admin_id: $(".user_id").val(),
                            _token  : csrf_token,
                        }
                    }
                },
                phone: {
                    required: true,
                    digits:   true,
                    minlength :10,
                    maxlength :10
                }
            },
            messages: {
                firstname: {
                    required : "Please enter firstname"
                },
                lastname: {
                    required : "Please enter lastname"
                },
                email : {
                    required: "Please enter email",
                    email   : "Please enter valid email",
                    remote  : "Email already used please use different email"
                },
                phone : {
                    required: "Please enter phone",
                    digits : "Please enter only digit",
                    minlength : "Please enter min 10 digit",
                    maxlength : "Please enter max 10 digit"
                }
            }
        });
        $("#profile-form").on('submit', function () {
            if ($(this).valid()) {
                return true;
            } else {
                return false;
            }
        });
    }
}
function init_password_validation() {
    if ($("#password-form").length > 0) {
        $('#password-form').validate({
            rules: {
                old_password: {
                    required: true
                },
                new_password: {
                    required: true
                },
                confirm_password: {
                    required: true,
                    equalTo: "#new_password"
                }
            },
            messages: {
                old_password: {
                    required : "Please enter current password"
                },
                new_password: {
                    required : "Please enter new password"
                },
                confirm_password : {
                    required: "Please enter confirm password",
                    equalTo: "The password and confirmation password do not match"
                }
            }
        });
        $("#password-form").on('submit', function () {
            if ($(this).valid()) {
                return true;
            } else {
                return false;
            }
        });
    }
}