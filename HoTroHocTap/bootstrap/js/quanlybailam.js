
Array.prototype.insert = function (index, item) {//phương thức insert vào mảng
    this.splice(index, 0, item);
};

Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};

Array.prototype.equals = function (array) {
    // if the other array is a falsy value, return
    if (!array)
        return false;

    // compare lengths - can save a lot of time
    if (this.length != array.length)
        return false;

    for (var i = 0, l=this.length; i < l; i++) {
        // Check if we have nested arrays
        if (this[i] instanceof Array && array[i] instanceof Array) {
            // recurse into the nested arrays
            if (!this[i].equals(array[i]))
                return false;
        }
        else if (this[i] != array[i]) {
            // Warning - two different object instances will never be equal: {x:20} != {x:20}
            return false;
        }
    }
    return true;
}

Object.defineProperty(Array.prototype, "equals", {enumerable: false});

$(document).ready(function () {
    var url = $('base').attr('href');
    $(document).on('click','.detail',function () {
        $('.modal-title').html('Chi tiết bài thi của <u>'+$(this).data('hoten')+'</u> mã sinh viên <u>'+$(this).data('masinhvien')+'</u>');
        var mabaithi = $(this).val();
        $('#circularG').show();
        $.ajax({
            type:'GET',
            data:{'action':'gethtmlbaithi','mabaithi':mabaithi},
            url:url+"xulyjs",
            success: function(data){
                var array=JSON.parse(data);
                $('#circularG').hide();
                if(array == "false")
                {
                    $('#bailam').html("<b style='color: red'>File log lưu bài làm đã bị xóa!</b>");
                }
                else
                {
                    $('#bailam').html(array);
                    var cauhoi = [];
                    $('.checkboxx').attr("disabled","disabled");
                    $('label').css("color",'#333');
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
                            $(".checkboxx").each(function () {
                                // console.log(jQuery.inArray($(this).val(),array));
                                if(jQuery.inArray($(this).val(),array) != -1)
                                {
                                    $(this).next().css("background-color","#dff0d8");
                                }
                            });
                        }
                    });//end ajax 1
                }//end if
            }//end success
        });//end ajax 0
    })


    $('#xoatatca').on('click',function () {
        var accept = prompt("Để xóa tất cả vui lòng nhập 'accept'");
        if(accept == 'accept')
        {
            return true;
        }
        else
        {
            return false;
        }
    })
})

