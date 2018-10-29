$(document).ready(function(){
	var url = $('base').attr('href');
	
	$(document).on('change','#donvi1',function(){
		var madonvi = $(this).val();

		$.ajax({
			type:'GET',
			data:{'action':'get_douutien','madonvi':madonvi},
			url:url+"xulyjs",
			success: function(data){
				var array=JSON.parse(data);
				var dut = parseInt(array[0]['dem'])+1;
				$('#douutien_pb').val(dut);

			}
		});
	})


	$(document).on('change','#douutien_pb_table',function(){
		var douutien = $(this).val();
		var maphongban = $(this).data('mpb');
			$.ajax({
				type:'GET',
				data:{'action':'update_douutien','douutien':douutien,'maphongban':maphongban},
				url:url+"xulyjs",
				success: function(data){
					var array=JSON.parse(data);
					if(array=="1")
					{
						showMessage('Thành công', 'Thay đổi độ ưu tiên thành công', 'info', 'brighttheme-icon-success');
						location.reload();
					}
					else
					{
						showMessage('Thất bại', 'Có lỗi xảy ra', 'warning', 'brighttheme-icon-notice');
					}
				}
			});
	})
	
	
	// $('.sorting').attr("class","text-center");
	// $('.sorting_asc').attr("class","text-center");
	
	// $(document).on('click','.sorting_asc',function(){
		// $('.sorting').attr("class","text-center");
		// $('.sorting_asc').attr("class","text-center");
		// $('.sorting_desc').attr("class","text-center");
	// })
	
	// $(document).on('click','.sorting',function(){
		// $('.sorting').attr("class","text-center");
		// $('.sorting_asc').attr("class","text-center");
		// $('.sorting_desc').attr("class","text-center");
	// })
	
	// $(document).on('click','.sorting_desc',function(){
		// $('.sorting').attr("class","text-center");
		// $('.sorting_asc').attr("class","text-center");
		// $('.sorting_desc').attr("class","text-center");
	// })
	
	
	var html='<div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Đơn vị: <select id="donvi" class="form input-sm" style="box-shadow: none;border-color:#d2d6de;border-radius:0px; width:150px" id="search_dv" name=""><option value="">---Chọn đơn vị---</option>';
	html+='</select></label></div></div>';
	$("div#example1_wrapper>div.row:first>div.col-sm-6:first").html(html);
	// var html='<div id="example1_filter" class="dataTables_filter"><label><b>Đơn vị: </b><select class="form input-sm" id="search_dv" style="border-radius:0px; width:150px" name=""><option value="">---Chọn đơn vị---</option></select></label>';
	// var html='<div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Hiển thị <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="15">15</option><option value="25">25</option><option value="50">50</option><option value="-1">All</option></select> dòng mỗi trang</label></div></div>';
	$.ajax({
		type:'GET',
		data:{'action':'get_dsdv'},
		url:url+"xulyjs",
		success: function(data){
			var array=JSON.parse(data);
			var html='<div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Đơn vị: <select id="donvi" class="form input-sm" style="box-shadow: none;border-color:#d2d6de;border-radius:0px; width:150px" id="search_dv" name=""><option value="">---Chọn đơn vị---</option>';
			for($i=0;$i<array.length;$i++){
				html+='<option value="'+array[$i]['maDonvi']+'">'+array[$i]['tenDonvi']+'</option>';
			}
			html+='</select></label></div></div>';
			$("div#example1_wrapper>div.row:first>div.col-sm-6:first").html(html);
			$("#donvi").val($('#hd_madv').val());
			$("#donvi").select2({});
		}
	});
	// html+='<div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Tìm kiếm: <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div>';
	// $('#example1_length').html(html);
	
	$(document).on('change','#donvi',function(){
		var madv=$(this).val();
		window.location.href = url+"danhmucphongban?dv="+madv;
	})
	
	var getUrlParameter = function getUrlParameter(sParam) 
	{
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};
	
	function showMessage(title, text, type, icon) {
		var notice = new PNotify({
			title: title,
			text: text,
			type: type,
			icon: 'glyphicon ' + icon,
			addclass: 'snotify',
			pnotify_closer: true,
			pnotify_delay: 150
		});
	}
})