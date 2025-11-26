$(document).ready(function(){
    init_profile_validation();
    init_password_validation();
    load_datatable();
    if ($('.dropify').length > 0) {
        $('.dropify').dropify().on('dropify.beforeClear', function(event, element) {
            var name        = event.target.name;
            var employee_id = $('.employee_id').val();
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
                        url:  base_url+'/profile/avatar-remove',
                        data: {id: employee_id, name: name,},
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

    $('#copy-button').click(function() {
        var textToCopy = $('#referral-link').text().trim();

        var tempInput = $('<input>');
        $('body').append(tempInput);
        tempInput.val(textToCopy).select();
        document.execCommand('copy');
        tempInput.remove();

        var message = 'Referral link copied to clipboard!';
        showMessage('success',message);
    });

});

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
                    equalTo : "The password and confirmation password did't match"
                }
            }
        });
        $("#password-form").on('submit', function () {
			if ($(this).valid()) {
                $('.loader').show();
                // $('.profile').addClass('btn-loading');
                setTimeout(function(){
                    $('#profile-form').submit();
                },3000);
                return true;
			} else {
				return false;
			}
		});
    }
}
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
                        url: base_url+'/profile/checkEmail',
                        type: "post",
                        data: {
                            email: function() {
                                return $(".email").val();
                            },
                            employee_id: $(".employee_id").val(),
                        }
                    }
                },
                phone: {
                    required: true,
                },
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
                    email : "Please enter valid email",
                    remote : "Email already used, please use different email"
                },
                phone : {
                    required: "Please enter phone",
                },
            }
        });
        $.validator.addMethod("alpha", function(value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
        },"Please enter alphabet only");
        $("#profile-form").on('submit', function () {
			if ($(this).valid()) {
                $('.loader').show();
                setTimeout(function(){
                    $('#profile-form').submit();
                },3000);
                return true;
			} else {
				return false;
			}
		});
    }
}
function load_datatable() {
    if($('#agent-student-datatable').length > 0) {
        $('#agent-student-datatable').DataTable({
            "destroy"    : true,
            "processing" : true,
            "serverSide" : true,
            'pageLength' : 10,
            'order'      : [[5, 'desc']],
            "ajax": {
                "url"   : base_url+'/dashboard',
                "type"  : "POST",
                data: {
                    "_token"    : csrf_token,
                },
            },
            "columns": [
                { "data"    : "id"},
                { "data"    : "name"},
                { "data"    : "email"},
                { "data"    : "citizenship"},
                { "data"    : "country_id"},
                { "data"    : "course"},
                { "data"    : "program_level_id"},
                { "data"    : "action"},
            ],
            "columnDefs": [
                {
                    'targets': 5,
                    'createdCell':  function (td, cellData, rowData, row, col) {
                       $(td).attr('nowrap', '');
                    }
                }
            ]
        });
    }
}
