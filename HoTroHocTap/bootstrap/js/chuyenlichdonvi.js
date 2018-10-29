$(document).ready(function(){
	var url = $('base').attr('href');
	
	$(document).on('click','#addEventUnit',function(){
		var mask = $('#hd_mask').val();
		$.ajax({
            type:'GET',
            data:{'action':'addlichdonvi','mask':mask},
            url:url+"xulyjs",
            success: function(data){
                if(data==0)
				{
					showMessage('Thất bại', 'Lịch đã được thêm vào lịch đơn vị', 'error', 'glyphicon-ok-sign');
				}
				else
				{
					showMessage('Thành công', 'Thêm lịch đơn vị thành công', 'success', 'glyphicon-ok-sign');
				}
            }
        });
	});
	
	$(document).on('click','.detail',function(){
		var mask = $(this).val();
		$.ajax({
            type:'GET',
            data:{'action':'get_tt_lich','mask':mask},
            url:url+"xulyjs",
            success: function(data){
                var array=JSON.parse(data);
				if(array[0]['thoigian']=='00:01')
				{
					$("#thoigian").val('Sáng');
				}
				else if(array[0]['thoigian']=='23:59')
				{
					$("#thoigian").val('Chiều');
				}
				else if(array[0]['thoigian']=='#')
				{
					$("#thoigian").val('Cả ngày');
				}
				else
				{
					$('#thoigian').val(array[0]['thoigian']);
				}
				
				$('#trangthai').val(array[0]['trangthai_dienra']);
				$('#noidung').val(array[0]['noidung']);
				$('#hd_mask').val(mask);
            }
        });
	})
		
	function showMessage(title, text, type, icon) {
	  var notice = new PNotify({
		title: title,
		text: text,
		type: type,
		icon: 'glyphicon ' + icon,
		addclass: 'snotify',
		closer: true,
		delay: 1000
	  });
	}
	
	function getUrlParameter(sParam) 
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
})