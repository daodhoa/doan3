<div id="page-wrapper" style="background-color: white;">
	<div class="content-wrapper" style="padding-top: 1%">
		<section class="content-header">
		    <h1>
		      Danh sách bài giảng
		    </h1>
		    <ol class="breadcrumb">
		      <li><a href="{$url}admin/chome_admin"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
		      <li class="active">Danh sách bài giảng </li>
		    </ol>
		</section>
		<section class="content">
		    <div class="row">
		      <form  method="post" id="form" enctype="multipart/form-data">
		        <div class="col-md-12">
		        	
		            <div class="col-md-4" style="margin-top: 3%;margin-bottom: 3%">
		                <label style="font-size: 18px">Môn học</label>
		                <select name="monhoc" class="form-control" id="monhoc" onChange="window.location.href='{$url}dsbg?monhoc='+document.getElementById('monhoc').value;">
		                    <option value="">Chọn môn học</option>
		                    {foreach $dsmon as $val}
		                      <option value="{$val.mamon}">{$val.tenmon}</option>
		                    {/foreach}
		                </select>
		            </div>

		            <div class="col-md-12">
		                <div class="box box-success">
		                    <div class="box-body">
		                        <form action="" method="post">
		                            <table id="example1" class="table table-bordered table-hover">
		                                <thead>
		                                <tr>
		                                    <th class="text-center col-md-1">STT</th>
		                                    <th class="text-center col-md-6">Tiêu đề</th>
		                                    <th class="text-center col-md-3">Môn học</th>
		                                    <th class="text-center col-md-2">Chức năng</th>
		                                </tr>
		                                </thead>
		                                <tbody>
		                                    {$stt = 1}
		                                    {foreach $dsbaigiang as $bg}
		                                    <tr>
		                                        <td class="text-center">{$stt++}</td>
		                                        <td>{$bg.tieude}</td>
		                                        <td>{$bg.tenmon}</td>
		                                        <td class="text-center">
		                                            <a class="btn btn-primary btn-flat btn-sm" href="{$url}thembg?bg={$bg.mabg}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
		                                            <button type="submit"  onclick="return confirm('Bạn muốn xóa bài giảng?');" class="btn btn-danger btn-flat btn-sm" name="xoa" value="{$bg.mabg}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
		                                        </td>
		                                    </tr>
		                                    {/foreach}
		                                </tbody>
		                            </table>
		                        </form>
		                    </div>
		                </div>
		            </div>

		        </div>
		       </form>
		    </div>
		</section>
	</div>
</div>
<!-- end page-wrapper -->
</div>
<!-- end wrapper -->
</body>

</html>