$(document).ready(function () {
    var url = $('base').attr('href');
    $(document).on('change','#monhoc',function () {
        var mamonhoc = $(this).val();
        if(mamonhoc != "")
        {
            $.ajax({
                type:'GET',
                data:{ 'action':'getslcauhoi','monhoc':mamonhoc},
                url:url+"xulyjs",
                success : function(data){
                    var result = JSON.parse(data);
                    var array = result[0];
                    var html = "";
                    if(array.length > 0)
                    {
                        for ($i = 0; $i < array.length; $i++) {
                            html += '<div class="col-md-6">';
                            html += '<div class="col-md-12">';
                            html += '<input type="number" min="0" max="' + array[$i]['SL'] + '" class="form-control" name="slcauhoi[' + array[$i]['manhom'] + ']" placeholder="' + array[$i]['ghichu'] + '">';
                            html += '</div>';
                            html += '<div class="col-md-12 text-center">';
                            html += array[$i]['SL'];
                            html += '</div>';
                            html += '</div>';
                        }
                        $('#slcauhoi').html(html);
                    }
                    else
                    {
                        html = '';
                        html += '<div class="col-md-6" ><div class="col-md-12"><input readonly type="number" min="0" max="0" class="form-control" name="slcauhoi[de]" placeholder="Dễ"></div><div class="col-md-12 text-center">#</div></div><div class="col-md-6"><div class="col-md-12"><input readonly type="number" min="0" max="0" class="form-control" name="slcauhoi[tbinh]" placeholder="Bình thường"></div><div class="col-md-12 text-center">#</div></div><div class="col-md-6"><div class="col-md-12"><input type="number" readonly min="0" max="0" class="form-control" name="slcauhoi[kho]" placeholder="Khó"></div><div class="col-md-12 text-center">#</div></div><div class="col-md-6"><div class="col-md-12"><input type="number" readonly min="0" max="0" class="form-control" name="slcauhoi[khohn]" placeholder="Khó hơn"></div><div class="col-md-12 text-center">#</div></div>';
                        $('#slcauhoi').html(html);
                    }

                    var tvt = result[1]['ghichu'];
                    var thoigian = $('#thoigian').val();
                    $('#mathi').val(tvt+thoigian);
                }//end success
            });//end ajax
        }
        else
        {
            html = '';
            html += '<div class="col-md-6" ><div class="col-md-12"><input readonly type="number" min="0" max="0" class="form-control" name="slcauhoi[de]" placeholder="Dễ"></div><div class="col-md-12 text-center">#</div></div><div class="col-md-6"><div class="col-md-12"><input readonly type="number" min="0" max="0" class="form-control" name="slcauhoi[tbinh]" placeholder="Bình thường"></div><div class="col-md-12 text-center">#</div></div><div class="col-md-6"><div class="col-md-12"><input type="number" readonly min="0" max="0" class="form-control" name="slcauhoi[kho]" placeholder="Khó"></div><div class="col-md-12 text-center">#</div></div><div class="col-md-6"><div class="col-md-12"><input type="number" readonly min="0" max="0" class="form-control" name="slcauhoi[khohn]" placeholder="Khó hơn"></div><div class="col-md-12 text-center">#</div></div>';
            $('#slcauhoi').html(html);

            var thoigian = $('#thoigian').val();
            $('#mathi').val(thoigian);
        }
    })

});//end ready