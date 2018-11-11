<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý bài giảng</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="content-wrapper" >
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php ?>"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
      <li class="active">Danh sách bài giảng </li>
    </ol>
  </section>
  <section class="content" style="background-color: white;">
        <div class="row">
          <form  method="post" id="form" enctype="multipart/form-data">
            <div class="col-md-12">
              
                <div class="col-md-4" style="margin-top: 3%;margin-bottom: 3%">
                    <label style="font-size: 18px">Môn học</label>
                    <select name="monhoc" class="form-control" id="monhoc" onChange="window.location.href='<?php echo base_url('admin/cdsbaigiang/index') ?>?monhoc='+document.getElementById('monhoc').value;">
                        <option value="">Chọn môn học</option>
                        <?php foreach($dsmon as $row): ?>
                        	<option value="<?php echo $row['mamon'] ?>"><?php echo $row['tenmon']; ?></option>
                        <?php endforeach; ?>
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
                                        <?php $stt = 1; ?>
		                                    <?php foreach($dsbaigiang as $bg):?>
		                                    <tr>
		                                        <td class="text-center"><?php echo $stt; $stt++; ?></td>
		                                        <td><?php echo $bg['tieude']; ?></td>
		                                        <td><?php echo $bg['tenmon']; ?></td>
		                                        <td class="text-center">
		                                            <a class="btn btn-primary btn-flat btn-sm" href="<?php echo base_url('admin/Cthembaigiang/index?bg='.$bg["mabg"]); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
		                                            <button type="submit"  onclick="return confirm('Bạn muốn xóa bài giảng?');" class="btn btn-danger btn-flat btn-sm" name="xoa" value="<?php echo $bg['mabg']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
		                                        </td>
		                                    </tr>
		                                    <?php endforeach; ?>
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

<script type="text/javascript">
	$(document).ready(function(){
		$('#example1').dataTable();
	});
</script>