$(document).ready(function(){
    init_select();
    init_datepicker();
    init_timepicker();
    initDropify();
    init_editor();
    project_tour();
    initTagsInput();
    initSummernote();
    initTooltip();

    $(document).on("click", "#setup-session-project", function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + '/get-projects',
            type: "POST",
            data: '',
            success: function (data) {
                var response = $.parseJSON(data);
                if (response.status == true) {
                    $("#defaultModal .modal-content").html(response.html);
                    $("#defaultModal").modal("show");
                    init_select();
                } else {
                    showMessage("error", response.message);
                }
            },
        });
    });
});

function init_datepicker() {
    if ($('.fc-datepicker').length > 0) {
        $(".fc-datepicker").bootstrapdatepicker({
            format: "dd/mm/yyyy",
            viewMode: "date",
            multidate: 0,
            todayHighlight: true,
            weekStart: 1
        })
        $('.fc-datepicker').on('changeDate', function(ev){
            $(this).bootstrapdatepicker('hide');
        });
    }
}

function max_min_datepicker(startSelector, dueSelector) {
    if ($(startSelector).length > 0 && $(dueSelector).length > 0) {
        $(startSelector).bootstrapdatepicker({
            format: "dd/mm/yyyy",
            todayHighlight: true,
            autoclose: true,
            weekStart: 1
        }).on("changeDate", function(e) {
            var startDate = e.date;
            $(dueSelector).bootstrapdatepicker('setStartDate', startDate);
        });

        $(dueSelector).bootstrapdatepicker({
            format: "dd/mm/yyyy",
            todayHighlight: true,
            autoclose: true,
            weekStart: 1
        }).on("changeDate", function(e) {
            var dueDate = e.date;
            $(startSelector).bootstrapdatepicker('setEndDate', dueDate);
        });
    }
}

function init_timepicker() {
    if ($('.time-picker').length > 0) {
        $('.time-picker').mask('00:00');
    }
}

function init_rangeslider(progressValue = 0) {
    if ($('.rangeslider2').length > 0) {
        $(".rangeslider2").ionRangeSlider({
            min: 0,
            max: 100,
            from: progressValue,
            step: 1,
        });
    }
}

function init_colorpicker(defaultColor = "#0061da") {
    if ($('#showAlpha').length > 0) {
        $("#showAlpha").spectrum({
            color: defaultColor,
            showAlpha: false,
            showInput: true,
            preferredFormat: "hex"
        });
    }
}

function init_select() {
    if ($('.select2').length > 0) {
        $(".select2").select2({
            minimumResultsForSearch: 1 / 0,
            width: "100%"
        })
    }
}

function initTagsInput() {
    if ($(".tags_input").length > 0) {
        $(".tags_input").tagsinput({
            confirmKeys: [13, 44]
        });
    }
}
function initSummernote() {
    if ($(".summernote").length > 0) {
        $(".summernote").summernote({
            placeholder: "",
            tabsize: 1,
            height: 120
        })
    }
}

function showMessage(type, message) {
    if (type != '' && message != '') {
        notif({
            msg: message,
            type: type,
            position: "right"
        });
    }
}

function showLoader(element){
    $(element).attr("disabled", true);
    $(element + ' i').removeClass('hide');
    $(element + ' i').addClass('show');
}

function hideLoader(element){
    $(element).attr("disabled", false);
    $(element + ' i').addClass('hide');
    $(element + ' i').removeClass('show');
}

function showCelebrateAnimation() {
    var end = Date.now() + (8 * 1000);
    var colors = ['#263871', '#f16126'];

    (function frame() {
    confetti({
        particleCount: 2,
        angle: 60,
        spread: 35,
        origin: { x: 0 },
        colors: colors
    });
    confetti({
        particleCount: 2,
        angle: 120,
        spread: 35,
        origin: { x: 1 },
        colors: colors
    });

    if (Date.now() < end) {
        requestAnimationFrame(frame);
    }
    }());
}

function initDropify() {
    if ($('.dropify').length > 0) {
        $(".dropify").dropify({messages:{default:"Drag and drop a file here or click",replace:"Drag and drop or click to replace",remove:"Remove",error:"Ooops, something wrong appended."},error:{fileSize:"The file size is too big (2M max)."}});
    }
}

function init_editor() {
    if ($('.content').length > 0) {
        $((function(t){$(".content").richText(),$(".content2").richText()}));
    }
}

function project_tour() {
    if($('.side-menu').attr('user-attempt') == 0) {
        setTimeout(() => {
            javascript:introJs().start();
        }, 500);

        $.ajax({
            type    : 'POST',
            url     :  base_url + '/login-attempt',
            data    : {},
            datatype: 'json',
            success : function(data){
                var response =  $.parseJSON(data);
            },
        });
    }
}

function initTooltip() {
    $('[data-toggle="tooltip"]').tooltip();
}
