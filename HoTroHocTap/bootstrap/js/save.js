$(document).ready(function () {
    var url = $('base').attr('href');
    $(document).on("click",".checkboxx",function () {
       if($(this).prop("checked")==true)
       {
           $(this).attr("checked","checked");
       }
       else
       {
           $(this).removeAttr("checked");
       }
    });

    // console.log($("div.dataget").html());

    $(document).on("click","#nopbai",function () {
        var html = JSON.stringify($("div.dataget").html());
        $.ajax({
            type:'POST',
            data:{'action':'savefile','html':html},
            url:url+"xulyjs",
            async:false,
            success: function(data){
                var array=JSON.parse(data);
            }
        });	//end ajax
    })
})
