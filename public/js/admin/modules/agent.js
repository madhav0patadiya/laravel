$(document).ready(function(){
    load_agent_list();
    load_datatable();
    init_agent_validation();

    $(document).on("submit", ".search_agent_list", function (e) {
        e.preventDefault();
        load_agent_list(null, true);
    });

    $(document).on('click', '.agent-list .pagination .page-item', function (e) {
        e.preventDefault();
        var page_number = $(this).find('.page-link').attr('href').split('page=')[1];
        var search = $('input[name="search"]').val();

        load_agent_list(`?page=${page_number}&search=${search}`);
    });

    $(document).on('click','.agent-delete',function(e){
        e.preventDefault();
        var company_id = $(this).data('id');

        swal({
            title: "ARE YOU SURE WANT TO DELETE?",
            icon: "error",
            buttons: !0,
            dangerMode: !0
        }).then((function(t) {
            if(t) {
                $.ajax({
                    type: 'POST',
                    url:  admin_url+'/agent/delete',
                    data: {
                            id      : company_id,
                            _token  : csrf_token
                        },
                    datatype: 'json',
                    success     : function(data){
                        var response =  $.parseJSON(data);
                        if(response.status == true) {
                            load_agent_list();
                            showMessage('success',response.message);
                        } else {
                            showMessage('error',response.message);
                        }
                    }
                });
            }
        }))
    });

    $(document).on("submit", ".agent-submit", function (e) {
        e.preventDefault();
        var $this = $(this);
        var formData = new FormData(this);
        if ($this.valid()) {
            $(".agent-submit").attr("disabled", true);
            $('.agent-submit i').removeClass('hide');
            setTimeout(function() {
                $('#agent-form').submit();
            },1000);
        } else {
            return false;
        }
    });    
});

function load_agent_list(custom_url = null, resetPage = false) {
    if ($('.agent-list').length > 0) {
        var form_data = new FormData($('.search_agent_list')[0]);
        form_data.append('_token', csrf_token);

        var fetch_url = custom_url ? admin_url + '/agent' + custom_url : window.location.href;
        if (resetPage) {
            fetch_url = admin_url + '/agent?page=1';
        }

        $.ajax({
            url         :  fetch_url,
            type        : "post",
            contentType: false,
            processData: false,
            data        : form_data,
            success     : function(data){
                if (data.status === true) {
                    $('.agent-list').html(data.html);
                } else {
                    showMessage('error',response.message);
                }
            }
        });
        return false;
    }
}

function init_agent_validation() {
    if ($("#agent-form").length > 0) {
        let agent_id = $('.agent_id').val();	

        $('#agent-form').validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                phone: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 6
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: admin_url + '/agent/check-email',
                        type: "post",
                        data: {
                            email: function() {
                                return $("#checkemail").val();
                            },
                            agent_id: function() {
								return agent_id;
							},
                            _token: csrf_token
                        }
                    }

                },
            },
            messages: {
                firstname: {
                    required: "Please enter firstname"
                },
                lastname: {
                    required: "Please enter lastname"
                },
                phone: {
                    required: "Please enter phone",
                },
                password: {
                    required: "Please enter password",
                    minlength: "Password must be at least 6 characters long"
                },
                email: {
                    required: "Please enter email address",
                    email: "Please enter valid email",
                    remote: "Email already exists, please use another email"
                },
            }
        });
        $("#agent-form").on('submit', function () {
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
