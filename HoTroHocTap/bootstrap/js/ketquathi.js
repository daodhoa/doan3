$(document).ready(function(){
    var url = $('base').attr('href');
    $('.checkboxx').attr("disabled","disabled");
    $('label').css("color",'#333');

    var cauhoi = [];
    $(".checkboxx").each(function () {
        if(cauhoi.indexOf($(this).data('ques')) == -1)
        {
            cauhoi.insert(cauhoi.length,$(this).data('ques'));
        }
    });

    $.ajax({
        type:'POST',
        data:{'action':'getcaudung','mang':JSON.stringify(cauhoi)},
        url:url+"xulyjs",
        async:false,
        success: function(data){
            var array=JSON.parse(data);
            console.log(array);
            $(".checkboxx").each(function () {
            // console.log(jQuery.inArray($(this).val(),array));
                if(jQuery.inArray($(this).val(),array) != -1)
                {
                    $(this).next().css("background-color","#dff0d8");
                }
            });
        }
    });
})
