
$(document).ready(function(){
    init_select();
    init_editor();
    init_datepicker();
    init_timepicker();
    initDropify();
    initTagsInput();
    initSummernote();

});
// function init_datepicker() {
//     if ($('.fc-datepicker').length > 0) {
//         $(".fc-datepicker").datepicker({
//             showOtherMonths: true,
//             selectOtherMonths: true,
//             changeMonth: true,
//             changeYear: true,
//             showButtonPanel: true,
//             dateFormat: 'dd/mm/yy'
//         })
//     }
// }
function init_datepicker() {
    if ($('.fc-datepicker').length > 0) {
        $(".fc-datepicker").bootstrapdatepicker({
            format          : "dd/mm/yyyy",
            viewMode        : "date",
            multidate       : 0,
            todayHighlight  : true,
            // pickerPosition: "top-left",
            weekStart       : 1
        })
        $('.fc-datepicker').on('changeDate', function(ev){
            $(this).bootstrapdatepicker('hide');
        });
    }
}
function init_timepicker() {
    if ($('.time-picker').length > 0) {
        $('.time-picker').mask('00:00');
    }
}

function initTagsInput() {
    if ($(".tags_input").length > 0) {
        $(".tags_input").tagsinput({
            confirmKeys: [13, 44]
        });
    }
}

function initDropify() {
    if ($('.dropify').length > 0) {
        $(".dropify").dropify({messages:{default:"Drag and drop a file here or click",replace:"Drag and drop or click to replace",remove:"Remove",error:"Ooops, something wrong appended."},error:{fileSize:"The file size is too big (2M max)."}});
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
function init_editor() {
    if ($('.content').length > 0) {
        $((function(t){$(".content").richText(),$(".content2").richText()}));
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

function initSummernote() {
    if ($(".summernote").length > 0) {
        $(".summernote").summernote({
            placeholder: "",
            tabsize: 1,
            height: 300
        })
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
