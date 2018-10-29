$(document).ready(function(){
  var url = $('base').attr('href');


    $('#danhmucmon').validate({
        rules: {
            tenmon: "required",
            viettat: "required"
        },
        messages: {
            tenmon: "Tên môn không được để trống",
            viettat: "Tên viết tắt không được để trống"
        }
    });

    $('#doimatkhau').validate({
        rules: {
            matkhaucu: "required",
            matkhaumoi: "required",
            matkhaumoi2: "required"
        },
        messages: {
            matkhaucu: "Mật khẩu cũ không được để trống",
            matkhaumoi: "Mật khẩu mới không được để trống",
            matkhaumoi2: "Nhập lại mật khẩu mới không được để trống"
        }
    });

    $('#themmathi').validate({
        rules: {
            mathi: "required",
            monhoc: "required",
            "slcauhoi[de]": "required",
            "slcauhoi[tbinh]": "required",
            "slcauhoi[kho]": "required",
            thoigianlambai: "number"
        },
        messages: {
            mathi: "Mã thi không được để trống",
            monhoc: "Môn thi không được để trống",
            "slcauhoi[de]": "Số lượng câu hỏi không được để trống",
            "slcauhoi[tbinh]": "Số lượng câu hỏi không được để trống",
            "slcauhoi[kho]": "Số lượng câu hỏi không được để trống",
            thoigianlambai: "Thời gian làm bài phải ở kiểu số và không được để trống"
        }
    });


    $('#themdethi').validate({
        rules: {
            monhoc: "required",
            "slcauhoi[de]": "required",
            "slcauhoi[tbinh]": "required",
            "slcauhoi[kho]": "required",
            "slcauhoi[khohn]": "required",
            soluongde: "number"
        },
        messages: {
            monhoc: "Môn thi không được để trống",
            "slcauhoi[de]": "Số lượng câu hỏi không được để trống",
            "slcauhoi[tbinh]": "Số lượng câu hỏi không được để trống",
            "slcauhoi[kho]": "Số lượng câu hỏi không được để trống",
            "slcauhoi[khohn]": "Số lượng câu hỏi không được để trống",
            soluongde: "Thời gian làm bài phải ở kiểu số và không được để trống"
        }
    });

  var table=$("#example1").DataTable({
    "aLengthMenu": [[5, 10, 20,40, -1], [5, 10, 20,40, "All"]],
    "iDisplayLength": 5,
	// "pagingType": "full_numbers",
    "language": {
      "lengthMenu": "Hiển thị _MENU_ dòng mỗi trang",
      "zeroRecords": "Không tìm thấy",
      "info": "Trang _PAGE_/_PAGES_",
      "infoEmpty": "Không có dữ liệu",
      "infoFiltered": "(lọc trong tổng số _MAX_)",
      "sSearch":       "Tìm kiếm: ",
      "oPaginate": {
        "sFirst":    "Đầu",
        "sPrevious": "Trước",
        "sNext":     "Tiếp",
        "sLast":     "Cuối"
      }
    }
  });
  
  var html='<label>Số trang</label>   <select id="pagi_select" class="form-control"></select>';
  $(".col-sm-3").html(html);
  var max_pagi = $('ul.pagination>li:nth-last-child(2)>a').text();
  var pagi_html="";
	for($i=1;$i<=max_pagi;$i++)
	{
		pagi_html+='<option val="'+$i+'">'+$i+'</option>';
	}
	$('#pagi_select').html(pagi_html);
	
  $(document).on('change','select[name="example1_length"]',function(){
	var max_pagi = $('ul.pagination>li:nth-last-child(2)>a').text();
	pagi_html="";
	for($i=1;$i<=max_pagi;$i++)
	{
		pagi_html+='<option val="'+$i+'">'+$i+'</option>';
	}
	$('#pagi_select').html(pagi_html);
	table.page(0).draw(false);
  })
  
  $(document).on('change','#pagi_select',function(){
	var valu=parseInt($(this).val())-1;
	table.page(valu).draw(false);
  })
  
  $(document).on('click','ul.pagination>li>a',function(){
	$('#pagi_select').val($(this).text());
  })

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

function removeElements(text, selector) {
  var wrapped = $("<div>" + text + "</div>");
  wrapped.find(selector).remove();
  return wrapped.html();
}
