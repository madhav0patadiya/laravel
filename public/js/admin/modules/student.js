$(document).ready(function() {
    init_validation();
    load_datatable();
    initDropZone();
    load_document();

    $(document).on("click", ".student-submit", function (e) {
        e.preventDefault();
        if ($("#student-form").valid()) {
            $(".student-submit").attr("disabled", true);
            $('.student-submit i').removeClass('hide');
            setTimeout(function() {
                $('#student-form').submit();
            },1000);
        } else {
            return false;
        }
    });

    $(document).on('click','.student-delete',function(e){
        e.preventDefault();
        var student_id = $(this).data('id');
        swal({
            title: "ARE YOU SURE WANT TO DELETE?",
            icon: "error",
            buttons: !0,
            dangerMode: !0
        }).then((function(t) {
            if(t) {
                $.ajax({
                    type: 'POST',
                    url:  admin_url+'/students/delete',
                    data: {id: student_id,_token: csrf_token},
                    datatype: 'json',
                    success     : function(data){
                        var response =  $.parseJSON(data);
                        if(response.status == true) {
                            load_datatable();
                            showMessage('success',response.message);
                        } else {
                            showMessage('error',response.message);
                        }
                    }
                });
            }
        }))
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
                        url         : admin_url + '/students/document-delete/' + document_id,
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
                url         : admin_url + '/students/document-preview',
                type        : "post",
                data        : { id: student_id, _token: csrf_token},
                success     : function(data){
                    var response =  $.parseJSON(data);
                    if(response.status == true) {
                        // showMessage('sucess',response.message);
                        $('.gallery_container').html(response.html);
                    }
                }
            });
        }
    }
};


function init_validation() {
    if ($("#student-form").length > 0) {
        $('#student-form').validate({
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
                        url: admin_url + '/students/checkEmail',
                        type: "post",
                        data: {
                            email: function() {
                                return $(".email").val();
                            },
                            student_id: $(".student_id").val(),
                            _token: csrf_token,
                        }
                    }
                },
                password: {
                    required: $(".student_id").val() ? false : true,
                },
                citizenship: {
                    required: true
                },
                course: {
                    required: true
                },
                country_id: {
                    required: true
                },
                program_level_id: {
                    required: true
                },
                lastname: {
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
                email : {
                    required: "Please enter email",
                    email   : "Please enter valid email",
                    remote  : "Email already used please use different email"
                },
                password : {
                    required: "Please enter password",
                },
                citizenship: {
                    required : "Please enter citizenship"
                },
                course: {
                    required : "Please enter course"
                },
                country_id: {
                    required : "Please enter country"
                },
                program_level_id: {
                    required : "Please enter program level"
                },

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

function load_datatable() {
    if($('#student-datatable').length > 0) {
        $('#student-datatable').DataTable({
            "destroy"    : true,
            "processing" : true,
            "serverSide" : true,
            'pageLength' : 10,
            'order'      : [[4, 'desc']],
            "ajax": {
                "url"   : admin_url+'/students',
                "type"  : "POST",
                data: {
                    "_token"    : csrf_token,
                },
            },
            "columns": [
                { "data"    : "id"},
                { "data"    : "name"},
                { "data"    : "email"},
                { "data"    : "agent_code"},
                { "data"    : "status"},
                { "data"    : "action", "orderable": false , "searchable": false },
            ],
            "columnDefs": [
                {
                    'targets': 4,
                    'createdCell':  function (td, cellData, rowData, row, col) {
                       $(td).attr('nowrap', '');
                    }
                }
            ]
        });
    }
}
