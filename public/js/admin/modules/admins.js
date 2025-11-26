$(document).ready(function(){
    load_datatable();
    init_profile_validation();
    $(document).on('click','.admin-delete',function(e){
        e.preventDefault();
        var holiday_id = $(this).data('id');

        swal({
            title: "ARE YOU SURE WANT TO DELETE?",
            // text: "ARE YOU SURE WANT TO DELETE",
            icon: "error",
            buttons: !0,
            dangerMode: !0
        }).then((function(t) {
            if(t) {
                $.ajax({
                    type: 'POST',
                    url:  admin_url+'/admin/delete',
                    data: {
                            id      : holiday_id,
                            _token  : csrf_token
                        },
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
    $(document).on("click", ".admin-submit", function (e) {
        e.preventDefault();
        if ($("#admin-form").valid()) {
            $(".admin-submit").attr("disabled", true);
            $('.admin-submit i').removeClass('hide');
            setTimeout(function() {
                $('#admin-form').submit();
            },1000);
        } else {
            return false;
        }
    });
});

function init_profile_validation() {
    if ($("#admin-form").length > 0) {
        jQuery.validator.addMethod("requiredPassword", function(value, element) {
            return $(".admin_id").val().length > 0;
        }, "Please enter password");

        $('#admin-form').validate({
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
                            admin_id: $(".admin_id").val(),
                            _token  : csrf_token,
                        }
                    }
                },
                phone: {
                    required: true,
                    digits:   true,
                    minlength :10,
                    maxlength :10
                },
                password: {
                    required: $(".admin_id").val() ? false : true,
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
                },
                password : {
                    required: "Please enter password",
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
function load_datatable() {
    if($('#datatables-ajax').length > 0) {

        $('#datatables-ajax').DataTable({
            "destroy"    : true,
            "processing" : true,
            "serverSide" : true,
            'pageLength' : 25,
            'order'      : [[0, 'desc']],
            "ajax": {
                "url"   : admin_url+'/admins',
                "type"  : "POST",
                data: {
                    "_token"    : csrf_token,
                },
            },
            "columns": [
                { "data"    : "id"},
                { "data"    : "name"},
                { "data"    : "email"},
                { "data"    : "status"},
                { "data"    : "action", "orderable": false , "searchable": false },
            ],
            "columnDefs": [
                {
                    'targets': 3,
                    'createdCell':  function (td, cellData, rowData, row, col) {
                       $(td).attr('nowrap', '');
                    }
                }
            ]
        });
    }
}
