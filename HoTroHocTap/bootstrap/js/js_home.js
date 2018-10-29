$(document).ready(function(){

	
	var url = $('base').attr('href');
	var global_data = "";
	$('#thongbaoxl').hide();
	$('#login').validate({
		rules: {
			tentaikhoan: "required",
			matkhau: "required"
		},
		messages: {
			tentaikhoan: "Không được để trống tên tài khoản",
			matkhau: "Không được để trống mật khẩu"
		}
	}); 

	
	$('#btquenmatkhau').click(function() {
		var tentk = $('#tentaikhoan').val();
		var capcha = $('#g-recaptcha-response').val();
		if(tentk=="")
		{
			showMessage('Thất bại', 'Mời nhập tên tài khoản hoặc email...', 'error', 'glyphicon-ok-sign');
		}
		else
		{
			$('#thongbaoxl').show();
			$('#btquenmatkhau').hide();

			$.ajax({
				type:'POST',
				data:{ 'action':'quenmatkhau','userOrEmail':tentk,'g-recaptcha-response':capcha},
				url:url+"quenmatkhau",
				success : function(data){
					if(data == 0)
					{
						showMessage('Thất bại', 'Bạn cần xác nhận capcha!', 'error', 'glyphicon-ok-sign');
						$('#thongbaoxl').hide();
						$('#btquenmatkhau').show();
						return false;
					}
					global_data = data;
				}//end success
			});//end ajax
		}//end check required
	});//end event
	
	
	$(document).ajaxComplete(function(){
		var array = JSON.parse(global_data);
		// alert(array['code']);return false;
		switch(array['code'])
		{
			case 1: showMessage('Thất bại', array['message'], 'error', 'glyphicon-ok-sign');
			setTimeout(function(){
				location.href = url;
			},2000);
			break;
			case 0: showMessage('Thành công', array['message'], 'success', 'glyphicon-ok-sign');
			setTimeout(function(){
				location.href = url;
			},2000);
			break;
		}//end switch
	});//end ajaxComplete
});

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