$(document).ready(function(){
    $('#form-suanhom').hide();
    $(document).on('click','#suanhom',function(){
        $('#form-themnhom').hide();
        $('#form-suanhom').show();
        $('button[name="themnhomnguoinhan"]').val('luunhomnguoinhan');
    });
    var url = $('base').attr('href');
	
    $('#chonnhomdonvi').validate({
        rules: {
            tennhom: "required"
        },
        messages: {
            tennhom: "Mời nhập tên nhóm người nhận"
        }
    }); 

	$('#guimaillich').validate({
        rules: {
            subject: "required",
            content: "required"
        },
        messages: {
            subject: "Mời nhập tiêu đề thư",
            content: "Mời nhập nội dung thư"
        }
    }); 	
	
	$(document).on('click','button[name="themnhomnguoinhan"]',function(){
		$('#chonnhomdonvi').valid();
		
	});

    $(document).on('click','input[name="checkall"]',function() {
        $('input[name="nguoinhan[]"]').not(this).prop('checked',this.checked);
    });

    $(document).on('click','input[name="checkallfinal"]',function() {
        $('input[name="final[]"]').not(this).prop('checked',this.checked);
    });

    $('select[name="chondonvi"]').select2();

    $(document).on('change','select[name="chondonvi"]',function(){
        if($(this).val()!="")
        {
            $('#soluongemail').html('(0)');
            $('#soluongemailfinal').html('(0)');
            $('input[name="checkall"]').prop('checked', false);
            $('input[name="checkallfinal"]').prop('checked', false);
            $('.table-left tbody').empty();
			$('.table-left tbody').append('<tr class="no-result"><td colspan="2">Không tìm thấy kết quả...</td></tr>');
            $.ajax({
                type:'POST',
                url:url+"xulyjs",
                data:{ 'action':'getdsmailnhanvien','ma_dv':$(this).val() },
                success: function(data){
                    var result = JSON.parse(data);
                    var dong="";
                    for(i=0;i<result.length;i++)
                    {
                        dong += "<tr><td class='col-md-1 text-center'><input type='checkbox' name='nguoinhan[]' value='"+result[i]['maEmail_nhanvien']+"'></td>";
                        dong += '<td>'+result[i]['hoten']+' ('+result[i]['tenChucvu']+') '+' - '+result[i]['email']+'</td></tr>';
                    }
                    $('.table-left>tbody').append(dong);

                }
            });
        }

    });

    //xu ly dem
    $(document).on('change',"input[type='checkbox']",function() {
        count();
    });
	
	function count()
	{
		var demtrai= 0;
        var demphai = 0;
        //dem trai
        $('input[name="nguoinhan[]"]').each(function(index, el) {
            if(this.checked)
                demtrai++;
        });
        //dem phai
        $('input[name="final[]"]').each(function(index, el) {
            if(this.checked)
                demphai++;
        });
        $('#soluongemail').html('('+demtrai+')');
        $('#soluongemailfinal').html('('+demphai+')');
	}

    $(document).on('click','#chuyensangphai',function(){
        var out = "";
        var demf = 0;
        $('input[name="nguoinhan[]"]').each(function(index, el) {
            if(this.checked)
            {
				$(this).attr('checked', true);
                out += "<tr>"+$(this).parent().parent().html()+"</tr>";
				$(this).parent().parent().remove();
            }
        });
        var re = new RegExp('nguoinhan', 'g');
        out = out.replace(re, "final");
        $('.table-right>tbody').append(out);
		$('input[name="checkall"]').prop('checked', false);
		count();
		
    });

	$(document).on('click','#chuyensangtrai',function(){
		$('input[name="final[]"]').each(function(index, el) {
            if(this.checked)
				$(this).parent().parent().remove();
        });
		count();
	});

	$(document).on('keyup','#search-trai',function(){
		var searchTerm = $("#search-trai").val();
		var listItem = $('.table-left tbody').children('tr');
		var searchSplit = searchTerm.replace(/ /g, "'):containsi('");
		
		$.extend($.expr[':'], {'containsi': function(elem, i, match, array){
				return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
			}
		});
		$(".table-left tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
			$(this).attr('visible','false');
		});

		  $(".table-left tbody tr:containsi('" + searchSplit + "')").each(function(e){
			$(this).attr('visible','true');
		  });

		  var jobCount = $('.table-left tbody tr[visible="true"]').length;

		  if(jobCount == '0') {$('.no-result').show();}
			else {$('.no-result').hide();}
	});
	
	$(document).on('keyup','#search-phai',function(){
		var searchTerm = $("#search-phai").val();
		var listItem = $('.table-right tbody').children('tr');
		var searchSplit = searchTerm.replace(/ /g, "'):containsi('");
		
		$.extend($.expr[':'], {'containsi': function(elem, i, match, array){
				return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
			}
		});
		$(".table-right tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
			$(this).attr('visible','false');
		});

		  $(".table-right tbody tr:containsi('" + searchSplit + "')").each(function(e){
			$(this).attr('visible','true');
		  });

		  var jobCount = $('.table-right tbody tr[visible="true"]').length;

		  if(jobCount == '0') {$('.no-result-right').show();}
			else {$('.no-result-right').hide();}
	});
	
	$(document).on('change','select[name="nhomnguoinhan"]',function(){
		$('.table-right>tbody').empty();
		$('.table-right>tbody').append('<tr class="no-result-right"><td colspan="2">Không tìm thấy kết quả...</td></tr>');
		$('.table-mail>tbody').empty(); //dung chung ben tao lich lanh dao
		$.ajax({
			type:'POST',
			url:url+"xulyjs",
			data:{ 'action':'getdsmailnhanvienfinal','ma_nhom':$(this).val() },
			success: function(data){
				var result = JSON.parse(data);
				var dong="";
				var optiona="";
				var dodai = result.length;
				for(i=0;i<dodai;i++)
				{
					optiona +="<option value='"+result[i]['email']+"' selected>"+result[i]['email']+"</option>";
					dong += "<tr><td class='col-md-1 text-center'><input type='checkbox' name='final[]' value='"+result[i]['maEmail_nhanvien']+"' checked></td>";
					dong += '<td>'+result[i]['hoten']+' ('+result[i]['tenChucvu']+') '+' - '+result[i]['email']+'</td></tr>';
				}
				$('select[name="to[]"]').append(optiona);$('select[name="to[]"]').select2();
				
				$('select[name="to[]"]').style('height', '100px', 'important');
				$('.table-right>tbody').append(dong);
				$('.table-mail>tbody').append(dong);
				$('input[name="checkallfinal"]').prop('checked', true);
				$('#soluongemailfinal').html('('+dodai+')');
			}
		});
	});
});