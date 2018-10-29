$(document).ready(function() {
    var url = $('base').attr('href');
	alldonvi = $('#them_donvi').html();
	allchucvu = $('#them_chucvu').html();
    $('#sua_donvi').hide();
    $('#sua_nhanvien').hide();
	$('#search_dv').select2({});

	
	//$('#pagi>.select2-container').style('border','2px soild','important');


	var pagi_select_dsnhanvien = "";
	for($i=1;$i<=$('#pages').val();$i++)
	{
		$a=$i-1;
		pagi_select_dsnhanvien+='<option value="'+$a+'">'+$i+'</option>';
	}

	$('#pagi_select_dsnhanvien').html(pagi_select_dsnhanvien);
	$('#pagi_select_danhbanhanvien').html(pagi_select_dsnhanvien);


	$(document).on('change','#pagi_select_dsnhanvien',function(){
		var page = parseInt($(this).val())+1;
		var Pages=document.getElementById('pages').value;
	      var options = {
	        currentPage: page,
	        totalPages: Pages,
	      }
      	$('#page_dscanbo').bootstrapPaginator(options);
		search_data_dscanbo(page-1);
	});
	
	
			
	$(document).on('change','#pagi_select_danhbanhanvien',function(){
		var page = parseInt($(this).val())+1;
		var Pages=document.getElementById('pages').value;
	      var options = {
	        currentPage: page,
	        totalPages: Pages,
	      }
      	$('#page').bootstrapPaginator(options);
		search_data(page-1);
	});




	$(document).on('focus','.select2-container',function(){
		$(this).addClass('select2-container--open');
	});
	
	/*
	$(document).on('keydown', '#websitedonvi', function(e) { 
	  var keyCode = e.keyCode || e.which; 

	  if (keyCode == 9) { 
		e.preventDefault(); 
		$('ul[class = select2-selection__rendered]:eq(0)').click();
	  } 
	});
	
	$(document).on('keydown', '#dienthoainharieng', function(e) { 
	  var keyCode = e.keyCode || e.which; 

	  if (keyCode == 9) { 
		e.preventDefault(); 
		$('ul[class = select2-selection__rendered]:last').click();
	  } 
	});
	
	$(document).on('keydown', '#dtcq', function(e) { 
	  var keyCode = e.keyCode || e.which; 

	  if (keyCode == 9) { 
		e.preventDefault(); 
		$('ul[class = select2-selection__rendered]:first').click();
	  } 
	});
	*/
	
	$(document).on('click','#them_nhanvien',function(){
		var donvi = $('#them_donvi').val();
		var phongban = $('#them_phongban').val();
		var hoten = $('#hovaten').val();
		var dienthoainharieng = $('#dienthoainharieng').val();
		var diachi = $('#diachi').val();
		var chucvu = $('#them_chucvu').val();
		var dienthoaicoquan = $('#dtcq').val();
		var dienthoai = $('#dienthoai').val();
		var email = $('#email').val();

		var trimhoten = hoten.split(" ").join("");
		// alert(trimhoten+"aa");return false;
		if(donvi=='')
		{
			showMessage('Thất bại', 'Đơn vị không được để trống', 'warning', 'brighttheme-icon-notice');
		}
		else if(hoten=='')
		{
			showMessage('Thất bại', 'Họ tên không được để trống', 'warning', 'brighttheme-icon-notice');
		}
		else if(chucvu=='')
		{
			showMessage('Thất bại', 'Chức vụ không được để trống', 'warning', 'brighttheme-icon-notice');
		}
		else
		{
			$.ajax({
				type:'GET',
				data:{'action':'insert_nhanvien','maDonvi':donvi,'maPhongban':phongban,'hoten':hoten,'dienthoainharieng':dienthoainharieng,'diachi':diachi,'chucvu':chucvu,'dienthoaicoquan': dienthoaicoquan,'dienthoai':dienthoai,'email':email},
				url:url+"xulyjs",
				success: function(data){
					var array=JSON.parse(data);
					if(array=='1')
					{
						
						$('#hovaten').val('');
						$('#dienthoainharieng').val('');
						$('#diachi').val('');
						$('#them_chucvu').val('');
						$('#dtcq').val('');
						$('#dienthoai').val('');
						$('#email').val('');
						$('#them_donvi').select2({
							})
							$('#them_chucvu').select2({
							})
							$('#them_phongban').select2({
							})
						  $(".email").select2({
							tags: true
						  })
						  $(".dienthoai").select2({
							tags: true
						  })
						  showMessage('Thành công', 'Thêm nhân viên '+hoten+' thành công', 'info', 'brighttheme-icon-success');
					}
				}
			});	//end ajax
		}
	})
	
	$(document).on('click','#reset',function(){
		
		var donvi = $('#them_donvi').val();
		var phongban = $('#them_phongban').val();
		var hoten = $('#hovaten').val();
		var dienthoainharieng = $('#dienthoainharieng').val();
		var diachi = $('#diachi').val();
		var chucvu = $('#them_chucvu').val();
		var dienthoaicoquan = $('#dtcq').val();
		var dienthoai = $('#dienthoai').val();
		var email = $('#email').val();

		var trimhoten = hoten.split(" ").join("");
		// alert(trimhoten+"aa");return false;
		if(hoten=='' && chucvu=='')
		{
			var get_dv = getUrlParameter('dv');
			if(get_dv!=undefined)
			{
				window.location.href = url+"danhsachcanbo?dv="+get_dv;
			}
			else
			{
				window.location.href = url+"danhsachcanbo";
			}
		}
		else if(donvi=='')
		{
			showMessage('Thất bại', 'Đơn vị không được để trống', 'warning', 'brighttheme-icon-notice');
		}
		else if(hoten=='')
		{
			showMessage('Thất bại', 'Họ tên không được để trống', 'warning', 'brighttheme-icon-notice');
		}
		else if(chucvu=='')
		{
			showMessage('Thất bại', 'Chức vụ không được để trống', 'warning', 'brighttheme-icon-notice');
		}
		else
		{
			$.ajax({
				type:'GET',
				data:{'action':'insert_nhanvien','maDonvi':donvi,'maPhongban':phongban,'hoten':hoten,'dienthoainharieng':dienthoainharieng,'diachi':diachi,'chucvu':chucvu,'dienthoaicoquan': dienthoaicoquan,'dienthoai':dienthoai,'email':email},
				url:url+"xulyjs",
				success: function(data){
					var array=JSON.parse(data);
					if(array=='1')
					{
						
						$('#hovaten').val('');
						$('#dienthoainharieng').val('');
						$('#diachi').val('');
						$('#them_chucvu').val('');
						$('#dtcq').val('');
						$('#dienthoai').val('');
						$('#email').val('');
						$('#them_donvi').select2({
							})
							$('#them_chucvu').select2({
							})
							$('#them_phongban').select2({
							})
						  $(".email").select2({
							tags: true
						  })
						  $(".dienthoai").select2({
							tags: true
						  })
						  showMessage('Thành công', 'Thêm nhân viên '+hoten+' thành công', 'info', 'brighttheme-icon-success');
						var get_dv = getUrlParameter('dv');
						if(get_dv!=undefined)
						{
							window.location.href = url+"danhsachcanbo?dv="+get_dv;
						}
						else
						{
							window.location.href = url+"danhsachcanbo";
						}
					}
				}
			});	//end ajax
		}

	})
	
    $(document).on('click','.xemthongtin',function(){
        var mapb=$(this).val();
        $.ajax({
            type:'GET',
            data:{'action':'get_tt_pb','mapb':mapb},
            url:url+"xulyjs",
            success: function(data){
                var array=JSON.parse(data);
                $('#dienthoai_pb').val('');
                $('#fax_pb').val('');
                $('#dienthoai_pb').val(array['sdt']);
                $('#fax_pb').val(array['fax']);
				
				$('#tenphongban').val(array['donvi'][0]['tenPhongban']);
				$('#tendonvi').val(array['donvi'][0]['tendonvi']);
				$('#sophong').val(array['donvi'][0]['sophong']);
				$('#ghichu').val(array['donvi'][0]['ghichu']);
            }
        });
    });

    

    $('#hoten_search').keyup(function(){
        search_data(0);
		$('#pagi_select_danhbanhanvien').select2({});
    });
	
	$('#search_dv').change(function(){
		search_data(0);
		$('#pagi_select_danhbanhanvien').select2({});
    });
    
    $('#page').click(function(){

        var page = parseInt($("#page .active a").text())-1;
		
        $('#pagi_select_danhbanhanvien').val(page);
		$('#pagi_select_danhbanhanvien').select2({});
        search_data(page);
    });

    $('#hoten_search_dsnv').keyup(function(){

        search_data_dscanbo(0);
		$('#pagi_select_dsnhanvien').select2({});
    });

	
    $('#page_dscanbo').click(function(){
        var page = parseInt($("#page_dscanbo .active a").text())-1;

        $('#pagi_select_dsnhanvien').val(page);
		$('#pagi_select_dsnhanvien').select2({});
        search_data_dscanbo(page);
    });
	

    $(document).on('click','.xemthemthongtin_canhan',function(){
        var manv=$(this).val();
        $.ajax({
            type:'GET',
            data:{'action':'get_tt_nhanvien','manv':manv},
            url:url+"xulyjs",
            success: function(data){
                var array=JSON.parse(data);
                $('#dienthoainv').val(array['sdt']);
                $('#emailnv').val(array['email']);
				$('#hoten').val(array['tennhanvien']);
                $('#dtnharieng').val(array['dtnharieng']);
				$('#diachi').val(array['diachi']);
                $('#title_modal').html("Thông tin chi tiết của cán bộ");
				
				
				$('#dtcoquan').val(array['dtcoquan']);
				$('#donvi_hd').val(array['donvi'][0]['tendonvi']);
				$('#phongban_hd').val(array['donvi'][0]['tenphongban']);
				$('#chucvu_hd').val(array['donvi'][0]['tenchucvu']);
				// var dv="";
				// if(array['donvi'].length>0)
				// {
					// for($i=0;$i<array['donvi'].length;$i++){
						// dv+='<tr><td>'+array['donvi'][$i]['tendonvi']+'</td><td>'+array['donvi'][$i]['tenphongban']+'</td><td>'+array['donvi'][$i]['tenchucvu']+'</td></tr>';
					// }
				// }
				// else
				// {
					// dv+='<td colspan="3">Không có dữ liệu</td>';
				// }
				
				// $('#table_dvpbcv').html(dv);
                var src=url+'attachment/avatar/'+array['avatar'];
                $("#avatar_nv").attr("src",src);
            }
        });
    })
	
	$('#them_donvi').change(function(){
        var madv = $("option:selected:last",this).val();
		var select='';
        $.ajax({
            type:'GET',
            data:{'action':'get_tt_phongban','madv':madv},
            url:url+"xulyjs",
            success: function(data){
                var array=JSON.parse(data);
                if(array.length!=0)
				{
					$("#them_phongban").prop('disabled', false);
					 select='<option value="">---Chọn phòng ban---</option>';
					for($i=0;$i<array.length;$i++){
						select+='<option value="'+array[$i]['maPhongban']+'">'+array[$i]['tenPhongban']+'</option>';
					}
					$('#them_phongban').html(select);
					$("#them_phongban").val('');
					$("#them_phongban").select2({});
				}
				else
				{
					$("#them_phongban").val('');
					$("#them_phongban").prop('disabled', true);
					$("#them_phongban").select2({});
				}
            }
        });
		
        
    });
	$('#page_themnv').click(function(){
        var page = parseInt($("#page_themnv .active a").text())-1;
        search_themnhanvien(page);
    });
	
	$(document).on('click','#them_nv',function(){
		
		$('#dtcq').val('');
		var src=url+'attachment/avatar/default.png';
		$("#anh").attr("src",src);
		$('#reset').show();
		$('#title_modal').html('Thêm cán bộ');
        $('#them_nhanvien').show();
        $('#sua_nhanvien').hide();
        $('#hovaten').val('');
        $('#dienthoainharieng').val('');
        $('#diachi').val('');
        $('#email').html('');
        $('#dienthoai').html('');
        $(".dienthoai").select2({ tags: true });
        $(".email").select2({ tags: true });
		var html='<option value="">---Chọn phòng ban---</option>';
		$('#them_phongban').html(html);
		$('#them_phongban').val('');
		
		var get_dv = getUrlParameter('dv');
		// alert(get_dv);
		if(get_dv!=undefined)
		{
			$("#them_donvi").val(get_dv);
			$.ajax({
				type:'POST',
				data:{'action':'get_tt_pb_dv','madv':get_dv},
				url:url+"xulyjs",
				success: function(data){
					var array=JSON.parse(data);
					var html='<option value="">---Chọn phòng ban---</option>'
					var len=array.length;
					for($i=0;$i<len;$i++){
						html+='<option value="'+array[$i]['maPhongban']+'">'+array[$i]['tenPhongban']+'</option>';
					}
					$('#them_phongban').html(html);
				}
			});
		}
		else
		{
			$('#them_donvi').val('');
		}
		$('#them_chucvu').val('');
		$('#them_donvi').select2({});
		$('#them_phongban').select2({});
		$('#them_chucvu').select2({});
    });
	
	$(document).on('click','.suathongtin',function(){
		$('#reset').hide();
		$('#them_nhanvien').hide();
		$('#sua_nhanvien').show();
		$('#title_modal').html('Sửa cán bộ');
        var manv=$(this).val();
        $('#hd_manv').val(manv);
        $.ajax({
            type:'GET',
            data:{'action':'get_tt_sua_nhanvien','manv':manv},
            url:url+"xulyjs",
            success: function(data){
                var array=JSON.parse(data);
				
				$('#dtcq').val(array['thongtin'][0]['dienthoai_cq']);
                $('#hovaten').val(array['thongtin'][0]['hoten']);
                $('#dienthoainharieng').val(array['thongtin'][0]['dienthoai_nharieng']);
                $('#diachi').val(array['thongtin'][0]['diachi']);
                var dienthoai='';
                for($i=0;$i<array['dienthoai'].length;$i++){
                    dienthoai+='<option value="'+array['dienthoai'][$i]['sodienthoai']+'" selected="selected">'+array['dienthoai'][$i]['sodienthoai']+'</option>';
                }
                $('#dienthoai').html(dienthoai);
                $(".dienthoai").select2({ tags: true });
				
                var email='';
                for($i=0;$i<array['email'].length;$i++){
                    email+='<option value="'+array['email'][$i]['email']+'" selected="selected">'+array['email'][$i]['email']+'</option>';
                }

				var phongban='<option value="">---Chọn phòng ban---</option>';
				
				for($i=0;$i<array['dspb'].length;$i++){
                    phongban+='<option value="'+array['dspb'][$i]['maPhongban']+'" selected="selected">'+array['dspb'][$i]['tenPhongban']+'</option>';
                }
				
				$("#them_phongban").html(phongban);
				var maphongban='';
				if(array['thongtin'][0]['maPhongban']!=null)
				{
					maphongban=array['thongtin'][0]['maPhongban'];
				}
				
                $('#email').html(email);
                $(".email").select2({ tags: true });
				
				$('#them_donvi').val(array['thongtin'][0]['maDonvi']);
                $("#them_donvi").select2({});
				
				$('#them_phongban').val(array['thongtin'][0]['maPhongban']);
                $("#them_phongban").select2({});
				
				$('#them_chucvu').val(array['thongtin'][0]['maDmChucvu']);
                $("#them_chucvu").select2({});
				
                // if(array['dvcvpb']!='')
                // {
					// var chucvu='';
					// var donvi = '';
					// var phongban = '';
					// for(i=0;i<array['dvcvpb'].length;i++)
					// {
						// if(array['dvcvpb'][i]['maDonvi']!=null)
						// donvi += '<option value="'+array['dvcvpb'][i]['maDonvi']+'" selected="selected">'+array['dvcvpb'][i]['tenDonvi']+'</option>';
						// if(array['dvcvpb'][i]['maDmChucvu']!=null)
						// chucvu += '<option value="'+array['dvcvpb'][i]['maDmChucvu']+'" selected="selected">'+array['dvcvpb'][i]['tenChucvu']+'</option>';
						// if(array['dvcvpb'][i]['maPhongban']!=null)
						// phongban += '<option value="'+array['dvcvpb'][i]['maPhongban']+'" selected="selected">'+array['dvcvpb'][i]['tenPhongban']+'</option>';
					// }

					// if(donvi!="")
					// {
						// $('#them_donvi').empty();
						// $('#them_donvi').append(alldonvi);
						// $('#them_donvi').append(donvi);
						// $('#them_donvi').select2({ tags: true });
					// }
					// if(chucvu!="")
					// {
						// $('#them_chucvu').empty();
						// $('#them_chucvu').append(allchucvu);
						// $('#them_chucvu').append(chucvu);
						// $('#them_chucvu').select2({ tags: true });  
					// }
					// if(phongban!="")
					// {
						// $('#them_phongban').empty();
						// $('#them_phongban').append(phongban);
						// $('#them_phongban').select2({ tags: true});
					// }
					
					
                // }
                var src=url+'attachment/avatar/'+array['thongtin'][0]['link_avatar'];
                $("#anh").attr("src",src);
            }
        });
    })
	
	function search_themnhanvien(page){
        var hoten = $('#hoten_search').val();
        $.ajax({
            type:'GET',
            url:url+"xulyjs",
            data:{'action':'pt','hoten':hoten,'page':page},
            success:function(data){
                var dulieu = JSON.parse(data);
                var array= dulieu['dulieu'];
                var table="";
                    table+='<tr>';
                    table+='<th class="text-center">STT</th>';
                    table+='<th class="text-center">Họ và tên</th>';
                    table+='<th class="text-center">Địa chỉ</th>';
                    table+='<th class="text-center">Điện thoại nhà riêng</th>';
                    table+='<th class="text-center">Chức năng</th>';
                    table+='</tr>';

                    if(array!='')
                    {
                        dong=page*10;
                        for($i=0;$i<array.length;$i++){
                            dong++;
                            table+='<tr>';
                            table+='    <td class="text-center">'+dong+'</td>';
                            table+='    <td>'+array[$i]['hoten']+'</td>';
                            table+='    <td class="text-center">'+array[$i]['diachi']+'</td>';
                            table+='    <td class="text-center">'+array[$i]['dienthoai_nharieng']+'</td>';
                            table+='    <td class="text-center"><button type="button" title="Chỉnh sửa thông tin" class="btn btn-primary btn-flat btn-sm suathongtin" value="'+array[$i]['maNhanvien']+'"data-toggle="modal" data-target="#mdthemcanbo" ><i class="fa fa-pencil"></i></button></td>';
                            table+='</tr>';
                        }
                    }
                    else
                    {
                        table+='<tr><td colspan="5">Không có dữ liệu</td></tr>'; 
                    }
                $('#table_ds_nv').html(table);

                var now = page+1;
                var sltrang = dulieu['trang'];
                if(sltrang==0){
                    sltrang=1;
                }
                var options = {
                        currentPage: now,
                        totalPages: sltrang,
                    }
                $('#page').bootstrapPaginator(options);
            }
        });
    }
	
	var req1=null;
	
    function search_data_dscanbo(page){
        var hoten = $('#hoten_search_dsnv').val();
		var madonvi = $('#donvi').val();
		var maphongban = $('#filterPhongban').val();
		
		if(req1!=null)//hủy request trước
		{
			req1.abort();
		}
		
        req1=$.ajax({
            type:'GET',
            url:url+"xulyjs",
            data:{'action':'pt','hoten1':hoten,'madonvi':madonvi,'page':page,'maphongban':maphongban},
            success:function(data){
                var dulieu = JSON.parse(data);
                var array= dulieu['dulieu'];
                var table="";
                table+='<tr>';
                table+='<th class="text-center">STT</th>';
                table+='<th class="text-center">Họ và tên</th>';
                table+='<th class="text-center" style="width: 100px">Chức vụ</th>';
                table+='<th class="text-center">Sđt cơ quan</th>';
                table+='<th class="text-center">Sđt di động</th> ';
                table+='<th class="text-center">Sđt nhà riêng</th>';
                table+='<th class="text-center">Email</th>';
                table+='<th class="text-center">Chức năng</th>';
                table+='</tr>';

                if(array!='')
                {
                    dong=page*10;
                    for($i=0;$i<array.length;$i++){
                        dong++;
                        table+='<tr>';
                        table+='    <td class="text-center">'+dong+'</td>';
                        table+='    <td>'+array[$i]['hoten']+'</td>';
						
						if(array[$i]['chucvu']==null)
						{
							table+='    <td class="text-center"></td>';
						}
						else
						{
							table+='    <td class="text-center">'+array[$i]['chucvu']+'</td>';
						}
						
						if(array[$i]['dienthoai_cq']==null)
						{
							table+='    <td class="text-center"></td>';
						}
						else
						{
							table+='    <td class="text-center">'+array[$i]['dienthoai_cq']+'</td>';
						}
						
						if(array[$i]['dienthoaidd']==null)
						{
							table+='    <td class="text-center"></td>';
						}
						else
						{
							table+='    <td class="text-center">'+array[$i]['dienthoaidd']+'</td>';
						}
						
						
						if(array[$i]['dienthoai_nharieng']==null)
						{
							table+='    <td class="text-center"></td>';
						}
						else
						{
							table+='    <td class="text-center">'+array[$i]['dienthoai_nharieng']+'</td>';
						}
						
						if(array[$i]['email']==null)
						{
							table+='    <td class="text-center"></td>';
						}
						else
						{
							table+='    <td class="text-center">'+array[$i]['email']+'</td>';
						}
                        table+='    <td><button type="button" title="Chỉnh sửa thông tin" class="btn btn-success btn-flat btn-sm suathongtin" value="'+array[$i]['maNhanvien']+'" data-toggle="modal" data-target="#mdthemcanbo" ><i class="fa fa-pencil"></i></button>';
                      	table+='    <button type="submit" title="Xóa nhân viên này" class="btn btn-danger btn-flat btn-sm" onclick="return confirm('+"'"+'Bạn có muốn xóa nhân viên này?'+"'"+');" name="xoanhanvien" value="'+array[$i]['maNhanvien']+'"><i class="fa fa-trash"></i></button></td>';
                        table+='</tr>';
                    }
                }
                else
                {
                    table+='<tr><td colspan="8">Không có dữ liệu</td></tr>'; 
                }
                
                $('#table_nv').html(table);

                var now = page+1;
                var sltrang = dulieu['trang'];
                if(sltrang==0){
                    sltrang=1;
                }

                $('#pages').val(sltrang);

                var pagi_select_dsnhanvien = "";
				for($i=1;$i<=sltrang;$i++)
				{
					$a=$i-1;
					pagi_select_dsnhanvien+='<option value="'+$a+'">'+$i+'</option>';
				}
				$('#pagi_select_dsnhanvien').html(pagi_select_dsnhanvien);
				$('#pagi_select_dsnhanvien').val(page);
                var options = {
                    currentPage: now,
                    totalPages: sltrang,
                }
                $('#page_dscanbo').bootstrapPaginator(options);
            }
        });
	}
	
	var req=null;

    function search_data(page){
        var hoten = $('#hoten_search').val();
		var madonvi = $('#search_dv').val();
		// req.abort();
		// var maphongban = '';
		
		
		if(req!=null)//hủy request trước
		{
			req.abort();
		}
		
        req=$.ajax({
            type:'GET',
            url:url+"xulyjs",
            data:{'action':'pt','hoten1':hoten,'madonvi':madonvi,'page':page,'maphongban':''},
            success:function(data){
                var dulieu = JSON.parse(data);
                var array= dulieu['dulieu'];
                var table="";
                table+='<tr>';
                table+='<th class="text-center">STT</th>';
                table+='<th class="text-center">Họ và tên</th>';
                table+='<th class="text-center" style="width: 100px">Chức vụ</th>';
                table+='<th class="text-center">Sđt cơ quan</th>';
                table+='<th class="text-center">Sđt di động</th> ';
                table+='<th class="text-center">Sđt nhà riêng</th>';
                table+='<th class="text-center">Email</th>';
                table+='<th class="text-center">Chức năng</th>';
                table+='</tr>';

                if(array!='')
                {
                    dong=page*10;
                    for($i=0;$i<array.length;$i++){
                        dong++;
                        table+='<tr>';
                        table+='    <td class="text-center">'+dong+'</td>';
                        table+='    <td>'+array[$i]['hoten']+'</td>';
						
						if(array[$i]['chucvu']==null)
						{
							table+='    <td class="text-center"></td>';
						}
						else
						{
							table+='    <td class="text-center">'+array[$i]['chucvu']+'</td>';
						}
						
						if(array[$i]['dienthoai_cq']==null)
						{
							table+='    <td class="text-center"></td>';
						}
						else
						{
							table+='    <td class="text-center">'+array[$i]['dienthoai_cq']+'</td>';
						}
						
						if(array[$i]['dienthoaidd']==null)
						{
							table+='    <td class="text-center"></td>';
						}
						else
						{
							table+='    <td class="text-center">'+array[$i]['dienthoaidd']+'</td>';
						}
						
						
						if(array[$i]['dienthoai_nharieng']==null)
						{
							table+='    <td class="text-center"></td>';
						}
						else
						{
							table+='    <td class="text-center">'+array[$i]['dienthoai_nharieng']+'</td>';
						}
						
						if(array[$i]['email']==null)
						{
							table+='    <td class="text-center"></td>';
						}
						else
						{
							table+='    <td class="text-center">'+array[$i]['email']+'</td>';
						}
                        table+='    <td class="text-center"><button type="button" title="Xem thêm thông tin cá nhân" class="btn btn-primary btn-flat btn-sm xemthemthongtin_canhan" value="'+array[$i]['maNhanvien']+'" data-toggle="modal" data-target="#mdchitiet" ><i class="fa fa-eye"></i></button></td>';
                        table+='</tr>';
                    }
                }
                else
                {
                    table+='<tr><td colspan="5">Không có dữ liệu</td></tr>'; 
                }
                
                $('#table_nv').html(table);

                var now = page+1;
                var sltrang = dulieu['trang'];
                if(sltrang==0){
                    sltrang=1;
                }
                var options = {
                    currentPage: now,
                    totalPages: sltrang,
                }
                $('#page').bootstrapPaginator(options);
				
				var pagi_select_dsnhanvien = "";
				for($i=1;$i<=sltrang;$i++)
				{
					$a=$i-1;
					pagi_select_dsnhanvien+='<option value="'+$a+'">'+$i+'</option>';
				}
				$('#pagi_select_danhbanhanvien').html(pagi_select_dsnhanvien);
				$('#pagi_select_dsnhanvien').val(page);
				var options = {
                    currentPage: now,
                    totalPages: sltrang,
                }
                $('#page').bootstrapPaginator(options);
            }
        });
		
		// alert(req);
		// req.abort();
}

$(document).on('click','#themdonvi',function(){
	$('.modal-title').html('Thêm đơn vị');
    $('#sua_donvi').hide();
    $('#them_donvi').show();
    $('#nhomdonvi').val('');
    $('#tendonvi').val('');
    $('#emaildonvi').val('');
    $('#diachi_donvi').val('');
    $('#websitedonvi').val('');
    $('#douutien').val('');
    $('#ghichu_donvi').val('');
    $('#fax_donvi').val('');
	$('#email_donvi').val('');
    $('#sdt_donvi').val('');
	$("#email_donvi").select2({
		tags: true
	})
	$("#fax_donvi").select2({
		tags: true
	})
	$("#sdt_donvi").select2({
		tags: true
	})
	
})

$(document).on('click','.suadonvi',function(){
	$('.modal-title').html('Sửa đơn vị');
    $('#sua_donvi').show();
    $('#them_donvi').hide();
    var madv=$(this).val();
    $('#hd_madv').val(madv);
    $.ajax({
        type:'GET',
        data:{'action':'get_tt_dv','madv':madv},
        url:url+"xulyjs",
        success: function(data){
            var array=JSON.parse(data);
            $('#nhomdonvi').val(array[0]['maNhom']);
            $('#tendonvi').val(array[0]['tenDonvi']);
            $('#emaildonvi').val(array[0]['email']);
            $('#diachi_donvi').val(array[0]['diachi']);
            $('#websitedonvi').val(array[0]['website']);
            $('#douutien').val(array[0]['douutien']);
            $('#ghichu_donvi').val(array[0]['ghichu']);
            $('#fax_donvi').html(array['fax']);
            $('#sdt_donvi').html(array['sdt']);
			$('#email_donvi').html(array['email']);
			$("#email_donvi").select2({
                tags: true
            })
            $("#fax_donvi").select2({
                tags: true
            })
            $("#sdt_donvi").select2({
                tags: true
            })
        }
      });//end ajax
})

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



});