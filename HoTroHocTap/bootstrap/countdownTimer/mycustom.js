$(function(){
    // $(".ms_timer").countdowntimer({
    //         startDate : $('#tgbd').val(),
    //         dateAndTime : $('#tgkt').val(),
    //         timeUp : timeisUp,
    //         size : "lg"
    // });

    $(".ms_timer").countdowntimer({
        minutes : $("#time").attr("data-m"),
        seconds : $("#time").attr("data-s"),
        timeUp : timeisUp,
        size : "lg"
    });

    $(document).on('click','#nopbai',function (e) {
        window.onbeforeunload = null;
    });

    function timeisUp() {
        window.onbeforeunload = null;
        $('#nopbai').attr("onclick","");
        $('#nopbai').click();
    }
});

// $(function(){
//     $(".ms_timer_sm").countdowntimer({
//         startDate : $('#tgbd').val(),
//         dateAndTime : $('#tgkt').val(),
//         timeUp : timeisUp,
//         size : "sm"
//     });
//
//     $(document).on('click','#nopbai',function (e) {
//         window.onbeforeunload = null;
//     });
//
//     function timeisUp() {
//         window.onbeforeunload = null;
//         $('#nopbai').attr("onclick","");
//         $('#nopbai').click();
//     }
// });

$(document).ready(function () {
    $('#timeDiv').hide();
    $(document).scroll(function() {
        var y = $(this).scrollTop();
        if (y > 80) {
            $('#timeDiv').fadeIn();
        } else {

            $('#timeDiv').hide();
        }
    });
})