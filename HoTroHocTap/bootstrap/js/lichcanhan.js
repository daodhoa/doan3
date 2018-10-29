$(document).ready(function() {
  var url = $('base').attr('href');
  $('#thoigianbatdau').datetimepicker({
    locale: 'vi',
    format: 'DD-MM-YYYY HH:mm:ss'
  });

  $('#thoigianketthuc').datetimepicker({
    locale: 'vi',
    format: 'DD-MM-YYYY HH:mm:ss'
  });
  

var date = new Date();
d = date.getDate(),
m = date.getMonth(),
y = date.getFullYear();
var output = "";
$('#calendar').fullCalendar({ 
  lang: 'vi',
  defaultView: 'agendaWeek',
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay'
  },
  buttonText: {
    today: 'Hôm nay',
    month: 'Tháng',
    week: 'Tuần',
    day: 'Ngày'
  },
  editable: true,
  selectable: true,
  select: function(start, end, allDay) {
	//xu ly su kien khi click event
    $('#submitButton').removeAttr('value');
    $('#mauchon').attr('value','#333');
    $('#noidungsukien').css('color','#333');
    $('#patientName').css('color','#333');
    $('#thoigianbatdau').css('color','#333');
    $('#thoigianketthuc').css('color','#333');

    $('#thoigianbatdau').attr('value',moment(start).format('DD-MM-YYYY HH:mm:ss'));
    $('#thoigianketthuc').attr('value',moment(end).format('DD-MM-YYYY HH:mm:ss'));
    $('#apptAllDay').attr('value',allDay);

    $('#patientName').val('');
    $('#noidungsukien').val('');
	$("#createAppointmentForm").data('validator').resetForm();
    $('#myModalLabel1').html("Thêm sự kiện");
    $('#deleteButton').hide();
    $('#createEventModal').modal('show');
    $("#patientName").focus();
  },
  events: function(start, end, timezone, callback) {
	//get lich ca nhan
    endtime = moment(end).format('YYYY-MM-DD HH:mm:ss');
    starttime = moment(start).format('YYYY-MM-DD HH:mm:ss');
    if($('#manhanvien').val() !="" || $('#emailnhanvien').val() !="")
    {
      $.ajax({
        url: url+"xulyjs",
        asycn: false,
        type: 'POST',
        data: {
          'action': 'getlichcanhan',
          'start': starttime,
          'end': endtime,
          'manhanvien': $('#manhanvien').val(),
          'emailnhanvien': $('#email_nhanvien').val()
        },
        success: function(doc) {
          if(doc.length != 0)
          {
            var res = JSON.parse(doc);
            var events = [];
            if(res.length !=0)
            {
              for(i=0;i<res.length;i++)
              {
                events.push({
                  id: res[i]['maLich_canhan'],
                  title: res[i]['tenLich'],
                  start: moment(res[i]['thoigian_batdau']).format('YYYY-MM-DD HH:mm:ss'),
                  end: moment(res[i]['thoigian_ketthuc']).format('YYYY-MM-DD HH:mm:ss'),
                  noidung: res[i]['noidung'],
                  backgroundColor: res[i]['maubackground'],
                  borderColor: res[i]['maubackground']
                });
              }
              callback(events);
            }
          }

        }
      });
	}
},
  eventClick: function(calEvent, jsEvent, view) {
  output = calEvent;
  $('#thoigianbatdau').attr('value',moment(calEvent.start).format('DD-MM-YYYY HH:mm:ss'));
  $('#thoigianketthuc').attr('value',moment(calEvent.end).format('DD-MM-YYYY HH:mm:ss'));
  $('#apptAllDay').attr('value',calEvent.allDay);
      //reset noi dung
      $('#submitButton').removeAttr('value');
      $('#deleteButton').removeAttr('value');
      $('#submitButton').attr('value',calEvent.id);
      $('#deleteButton').attr('value',calEvent.id);
      $('#patientName').val(calEvent.title);
      $('#noidungsukien').val(calEvent.noidung);

      $('#mauchon').attr('value',calEvent.backgroundColor);
      $('#noidungsukien').css('color',calEvent.backgroundColor);
      $('#patientName').css('color',calEvent.backgroundColor);
      $('#thoigianketthuc').css('color',calEvent.backgroundColor);
      $('#thoigianbatdau').css('color',calEvent.backgroundColor);
	  $("#createAppointmentForm").data('validator').resetForm();
      $('#myModalLabel1').html("Sửa sự kiện");
      $('#deleteButton').show();
      $('#createEventModal').modal('show');
      $("#patientName").focus();
    }
  });

$(document).on('click','#submitButton', function(e){
  var update = $(this).val();
  $("#createAppointmentForm").valid();
  if($('input[name="patientName"]').hasClass('error') || $('textarea[name="noidungsukien"]').hasClass('error') || $('input[name="thoigianbatdau"]').hasClass('error') || $('input[name="thoigianbatdau"]').hasClass('error'))
  {
	// khong nhap day du cac truong
    return false;
  }
  else
  {
		// nhap day du
		e.preventDefault();

		//xy ly bang tay chuyen tu DD-MM-YYYY sang YYYY-MM-DD HH:mm:ss
		var tgbd = $('#thoigianbatdau').val();
		tgbd = tgbd.substr(6,4)+"-"+tgbd.substr(3,2)+"-"+tgbd.substr(0,2)+" "+tgbd.substr(11,8);
		var tgkt = $('#thoigianketthuc').val();
		tgkt = tgkt.substr(6,4)+"-"+tgkt.substr(3,2)+"-"+tgkt.substr(0,2)+" "+tgkt.substr(11,8);
    
		var info = {
		  id: "",
		  title: $('#patientName').val(), 
		  start: tgbd,
		  end: tgkt,
		  allDay: ($('#apptAllDay').val() == "true"),
		  backgroundColor: $('#mauchon').val(),
		  borderColor: $('#mauchon').val(),
		  noidung: $('#noidungsukien').val(),
		  manhanvien: $('#manhanvien').val(),
		  emailnhanvien: $('#email_nhanvien').val(),
		  malichcanhan: update
		};

		if($('#manhanvien').val()=="")
		{
			showMessage('Thất bại', 'Không lấy được mã nhân viên', 'danger', 'glyphicon glyphicon-remove');return false;
		}
      
		else
		{
			//chen du lieu
		  $.ajax({
			type:'POST',
			asycn: false,
			url:url+"xulyjs",
			data:{ 'action':'themlichcanhan','info':info },
			success: function(data){
			  if(data.length != 0)
			  {
				res = JSON.parse(data);
				info.id = res['id'];
				switch(res['trangthai'])
				{
				  case 0: showMessage('Thất bại', 'Không tạo được sự kiện này', 'danger', 'glyphicon glyphicon-remove');break;
				  case 1: showMessage('Thành công', 'Tạo sự kiện thành công', 'success', 'glyphicon glyphicon-ok');break;
				  case 2: showMessage('Thất bại', 'Không cập nhật được sự kiện này', 'danger', 'glyphicon glyphicon-remove');break;
				  case 3: showMessage('Thành công', 'Cập nhật sự kiện thành công', 'success', 'glyphicon glyphicon-ok');break;
				  default: showMessage('Thất bại', 'Có lỗi xảy ra mời thử lại', 'danger', 'glyphicon glyphicon-remove');break;
				}
				if(update=="")
				{

				  $('#calendar').fullCalendar('addEventSource',[info]); 
				  $("#createEventModal").modal('hide');
				}
				else
				{
				  output.title = $('#patientName').val();
				  output.start = tgbd;
				  output.end = tgkt;
				  output.noidung = $('#noidungsukien').val();
				  output.allDay = ($('#apptAllDay').val() == "true");
				  output.backgroundColor = $('#mauchon').val();
				  output.borderColor = $('#mauchon').val();
				  output.manhanvien = $('#manhanvien').val();
				  output.emailnhanvien = $('#email_nhanvien').val();
				  output.malichcanhan = update;
				  $('#calendar').fullCalendar('updateEvent',output); 
				  $("#createEventModal").modal('hide');
				}
			  }
			}
		  });
		
		}
    
	}

});

$(document).on('click','#deleteButton',function(){
  var malich = $(this).val();
  check = confirm("Bạn muốn xóa sự kiện này ?");
  if(check==false)
  {
   $('#createEventModal').modal('hide');
   return false;
 }
 else
 {
  $.ajax({
    type:'POST',
    asycn: false,
    url:url+"xulyjs",
    data:{ 'action':'xoalichcanhan','malich': malich },
    success: function(data){
      if(data=="0")
      {
        showMessage('Thất bại', 'Không xóa được sự kiện này', 'danger', 'glyphicon glyphicon-remove');
      }
      else if(data=="1")
      {
        showMessage('Thành công', 'Xóa sự kiện thành công', 'success', 'glyphicon glyphicon-ok');
        $('#calendar').fullCalendar('removeEvents', malich );
      }
    }
  });
  $('#createEventModal').modal('hide');
}
});

$(document).on('click',".douutiensukien",function(e){
  $('#mauchon').attr('value',$(this).val());
  $('#noidungsukien').css('color',$(this).val());
  $('#patientName').css('color',$(this).val());
  $('#thoigianbatdau').css('color',$(this).val());
  $('#thoigianketthuc').css('color',$(this).val());
});

$.validator.addMethod("regex",
  function (value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  },"Mời bạn kiểm tra lại giá trị đã nhập.");

$('#createAppointmentForm').validate({
  rules: {
    patientName: "required",
    thoigianbatdau: "required",
    thoigianketthuc: "required",
    noidungsukien : "required"
  },
  messages: 
  {
    patientName: "Mời nhập tên cho sự kiện.",
    thoigianbatdau: "Mời chọn thời gian bắt đầu",
    thoigianketthuc: "Mời chọn thời gian kết thúc",
    noidungsukien : "Mời nhập nội dung cho sự kiện."
  }
});

});

function showMessage(title, text, type, icon) {
  var notice = new PNotify({
    title: title,
    text: text,
    type: type,
    icon: 'glyphicon ' + icon,
    addclass: 'snotify',
    pnotify_closer: true,
    pnotify_delay: 1000
  });
}