$(document).ready(function(){
    init_profile_validation();
    init_password_validation();
    initDropZone();
    load_document();
    if ($('.dropify').length > 0) {

        $('.dropify').dropify().on('dropify.beforeClear', function(event, element) {
            var name        = event.target.name;

            var student_id = $('.student_id').val();
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
                        url:  base_url + '/profile/avatar-remove',
                        data: {
                                id      : student_id,
                                name    : name,
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

    $(document).on('click', '.delete-document', function () {
		var document_id = $(this).data('image-id');
		var $this       = $(this);
		if(document_id != '') {
			swal({
				title: 'Are you sure you want to delete?',
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
                        url         : base_url + '/document-delete/' + document_id,
                        type        : "get",
                        processData : false,
                        contentType : false,
                        cache       : false,
                        async       : false,
                        success     : function(data){
                            var response =  $.parseJSON(data);
                            if (response.status == true) {
                                showMessage('success',response.message);
                                $this.parents('.image_box').remove();
                            } else {
                                showMessage('error',response.message);
                            }
                        }
                    });
				}
			});
		}
	});

});
function initDropZone() {
    if ($(".dropzone_container").length > 0) {
        var ajax_submit_url = $(".dropzone_container").data('url');
        if (ajax_submit_url != '') {
            $(".dropzone_container").html('<div class="dropzone dz-clickable" id="dropzone-upload"></div>');
            $("#dropzone-upload").dropzone({
                sending: function(file, xhr, formData) {
                    formData.append("_token", csrf_token);
                },
                paramName       : "document_images",
                uploadMultiple  : false,
                maxFilesize     : 10,
                acceptedFiles: ".jpeg,.jpg,.png,.pdf",
                url             : ajax_submit_url,
                success: function(response) {
                    response    = $.parseJSON(response.xhr.response);
                    if (response.status == true) {
                        initDropZone();
                        load_document();
                    } else {
                        if (typeof response.message != 'undefined') {
                            showMessage('error', response.message);
                        } else {
                            showMessage('error', 'Something went wrong');
                        }
                    }
                }
            });
        }
    }
};

function load_document() {
    if ($(".dropzone_container").length > 0) {
        var student_id  = $(".student_id").val();
        if (student_id != '') {
            $.ajax({
                url         : base_url + '/document-preview',
                type        : "post",
                data        : { id: student_id, _token: csrf_token},
                success     : function(data){
                    var response =  $.parseJSON(data);
                    if(response.status == true) {
                        $('.gallery_container').html(response.html);
                    }
                }
            });
        }
    }
};

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
                phone: {
                    required: true
                },
                email : {
                    required: true,
                    email : true,
                    remote      : {
                        url: base_url + '/profile/checkEmail',
                        type: "post",
                        data: {
                            email: function() {
                                return $(".email").val();
                            },
                            student_id: $(".student_id").val(),
                        }
                    }
                },
                citizenship: {
                    required: true
                },
                country_id: {
                    required: true
                },
                program_level_id: {
                    required: true
                },
                course: {
                    required: true
                },
                address: {
                    required: true
                },
            },
            messages: {
                firstname: {
                    required : "Please enter firstname"
                },
                lastname: {
                    required : "Please enter lastname"
                },
                phone: {
                    required : "Please enter phone"
                },
                email : {
                    required: "Please enter email",
                    email : "Please enter valid email",
                    remote : "Email already used, please use different email"
                },
                citizenship: {
                    required : "Please enter citizenship"
                },
                country_id: {
                    required : "Please select country"
                },
                program_level_id: {
                    required : "Please select program level"
                },
                course: {
                    required : "Please enter course"
                },
                address: {
                    required : "Please enter address"
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
