$(document).ready(function() {
    init_validation();
    load_scholarship();
    load_aboutus();
    initDropZone();
    load_university_logo();

    $(document).on('click', '.delete-logo', function () {
		var logo_id = $(this).data('image-id');
		var $this   = $(this);
		if(logo_id != '') {
			swal({
				title: 'Are you sure you want to delete?',
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
                        url         : admin_url + '/setting/university-logo-delete/' + logo_id,
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

    $(document).on('click','.scholarship-delete',function(e){
        e.preventDefault();
        var scholarship_id = $(this).data('id');
        swal({
            title: "ARE YOU SURE WANT TO DELETE?",
            icon: "error",
            buttons: !0,
            dangerMode: !0
        }).then((function(t) {
            if(t) {
                $.ajax({
                    type: 'POST',
                    url:  admin_url+'/setting/delete-scholarship',
                    data: {
                            id      : scholarship_id,
                            _token  : csrf_token
                        },
                    datatype: 'json',
                    success     : function(data){
                        var response =  $.parseJSON(data);
                        if(response.status == true) {
                            load_scholarship();
                            showMessage('success',response.message);
                        } else {
                            showMessage('error',response.message);
                        }
                    }
                });
            }
        }))
    });

    $(document).on("submit", "#notice-form", function (e) {
        e.preventDefault();
        var $this = $(this);
        var formData = new FormData(this);
        var description = $('.summernote').summernote('code');
        formData.append('description', description);
        if ($this.valid()) {
            showLoader('.submit-btn');
            $.ajax({
                url: admin_url + '/setting/commit-notice',
                type: "post",
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var response = $.parseJSON(data);
                    if (response.status == true) {
                        showMessage("success", response.message);
                        hideLoader('.submit-btn');
                        setTimeout(function() {
                            window.location.reload();
                        },1000);
                    } else {
                        showMessage("error", response.message);
                    }
                },
            });
        }
    });
    $(document).on("submit", "#scholarship-form", function (e) {
        e.preventDefault();
        var $this = $(this);
        var formData = new FormData(this);
        var overview = $('.summernote').eq(0).summernote('code');
        var paragraph_1 = $('.summernote').eq(1).summernote('code');
        var paragraph_2 = $('.summernote').eq(2).summernote('code');
    
        formData.append('overview', overview);
        formData.append('paragraph_1', paragraph_1);
        formData.append('paragraph_2', paragraph_2);
        if ($this.valid()) {
            showLoader('.submit-btn');
            $.ajax({
                url: admin_url + '/setting/commit-scholarship',
                type: "post",
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var response = $.parseJSON(data);
                    if (response.status == true) {
                        showMessage("success", response.message);
                        hideLoader('.submit-btn');
                        setTimeout(function() {
                            window.location.href = admin_url + '/setting/scholarship';
                        },1000);
                    } else {
                        showMessage("error", response.message);
                    }
                },
            });
        }
    });

    $(document).on('click','.aboutus-delete',function(e){
        e.preventDefault();
        var aboutus_id = $(this).data('id');
        swal({
            title: "ARE YOU SURE WANT TO DELETE?",
            icon: "error",
            buttons: !0,
            dangerMode: !0
        }).then((function(t) {
            if(t) {
                $.ajax({
                    type: 'POST',
                    url:  admin_url+'/setting/delete-about-us',
                    data: {
                            id      : aboutus_id,
                            _token  : csrf_token
                        },
                    datatype: 'json',
                    success     : function(data){
                        var response =  $.parseJSON(data);
                        if(response.status == true) {
                            load_aboutus();
                            showMessage('success',response.message);
                        } else {
                            showMessage('error',response.message);
                        }
                    }
                });
            }
        }))
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
                paramName       : "university_logos",
                uploadMultiple  : false,
                maxFilesize     : 10,
                acceptedFiles: ".jpeg,.jpg,.png",
                url             : ajax_submit_url,
                success: function(response) {
                    response    = $.parseJSON(response.xhr.response);
                    if (response.status == true) {
                        initDropZone();
                        load_university_logo();
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

function load_university_logo() {
    if ($(".dropzone_container").length > 0) {
        $.ajax({
            url         : admin_url + '/setting/university-logo-preview',
            type        : "post",
            data        : {_token: csrf_token},
            success     : function(data){
                var response =  $.parseJSON(data);
                if(response.status == true) {
                    $('.gallery_container').html(response.html);
                }
            }
        });
    }
};

function init_validation() {
    if ($("#social-form").length > 0) {
        $('#social-form').validate({
            rules: {
                facebook: {
                    url: true
                },
                instagram: {
                    url: true
                },
                twitter: {
                    url: true,
                },
                whatsapp: {
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                email: {
                    email: true,
                },
                map: {
                    url: true,
                },
            },
            messages: {
                facebook: {
                    url: 'PLease enter link'
                },
                instagram: {
                    url: 'PLease enter link'
                },
                twitter: {
                    url: 'PLease enter link'
                },
                whatsapp: {
                    number: "Please enter a valid whatsapp number",
                    minlength: "Phone number must be exactly 10 digits",
                    maxlength: "Phone number must be exactly 10 digits"
                },
                email: {
                    email: 'Please enter email',
                },
                map: {
                    url: 'PLease enter link'
                },
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

function load_scholarship() {
    if($('#scholarship-datatables').length > 0) {
        $('#scholarship-datatables').DataTable({
            "destroy"    : true,
            "processing" : true,
            "serverSide" : true,
            'pageLength' : 10,
            'order'      : [[0, 'desc']],
            "ajax": {
                "url"   : admin_url + '/setting/scholarship',
                "type"  : "POST",
                data: {
                    "_token"    : csrf_token,
                },
            },
            "columns": [
                { "data"    : "id"},
                { "data"    : "title"},
                { "data"    : "is_visible", "orderable": false , "searchable": false },
                { "data"    : "action", "orderable": false , "searchable": false },
            ],
            "columnDefs": [
                {
                    'targets': 2,
                    'createdCell':  function (td, cellData, rowData, row, col) {
                       $(td).attr('nowrap', '');
                    }
                }
            ]
        });
    }
}
function load_aboutus() {
    if($('#aboutus-datatables').length > 0) {
        $('#aboutus-datatables').DataTable({
            "destroy"    : true,
            "processing" : true,
            "serverSide" : true,
            'pageLength' : 10,
            'order'      : [[0, 'desc']],
            "ajax": {
                "url"   : admin_url + '/setting/about-us',
                "type"  : "POST",
                data: {
                    "_token"    : csrf_token,
                },
            },
            "columns": [
                { "data"    : "id"},
                { "data"    : "name"},
                { "data"    : "title"},
                { "data"    : "action", "orderable": false , "searchable": false },
            ],
            "columnDefs": [
                {
                    'targets': 2,
                    'createdCell':  function (td, cellData, rowData, row, col) {
                       $(td).attr('nowrap', '');
                    }
                }
            ]
        });
    }
}