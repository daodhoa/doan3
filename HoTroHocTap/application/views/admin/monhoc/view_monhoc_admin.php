<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý môn học</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/cdanhmucmonhoc'); ?>"><i class="fa fa-dashboard"></i> Quản lý môn học</a></li>
      <li class="active">Danh sách môn học</li>
    </ol>
  </section>
  <!-- Main content-->
  <section class="content">
  	<div class="row">
    <!--Them mã thi-->
    	<div class="col-md-5" style="background-color: white;border-radius: 4px;padding-bottom: 20px;
		border-right-width: 10px;
		border-right-style: solid;
		border-right-color: #EEEEEE;
		border-top-width: 3px;
		border-top-style: solid;
		border-top-color: green;">
            <div class="box box-success" >
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm môn học</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="<?php echo base_url('admin/cdanhmucdethi/them'); ?>" method="post" id="themmathi">
                        <div class="form-group">
                            <label for="monhoc">Tên Môn học</label>
                            <input type="text" class="form-control" name="monhoc" required style="background-color: #FFFFCC;" >
                        </div>
                        <div class="form-group">
                            <label for="">Mã môn</label>
                            <input type="text" class="form-control" name="ghichu" required style="background-color: #FFFFCC;">
                        </div>
                        <button type="submit" name="luu" value="luu" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i> Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    <!--end of thêm mã thi-->
    <!--Danh sách mã thi-->
    	<div class="col-md-7" style="background-color: white;
    	border-top-width: 3px;
		border-top-style: solid;
		border-top-color: green; border-radius: 4px;">
            <div class="box box-success" >
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách môn học</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center col-md-4">Tên môn học</th>
                                <th class="text-center">Mã môn</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; 
                                    foreach($records as $row):
                                ?>
                                
                                    <tr>
                                        <td class="text-center"><?php echo $stt; $stt++; ?></td>
                                        <td><?php echo $row['tenmon'] ?></td>
                                        <td class="text-center"><?php echo $row['ghichu'] ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('cdanhmucmonhoc/sua?mamon='.$row['mamon']); ?>" title="Sửa môn học" class="btn btn-warning btn-flat btn-sm"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url('cdanhmucmonhoc/xemdslop?mamon='.$row['mamon']); ?>" title="xem danh sách lớp học" class="btn btn-success btn-flat btn-sm"><i class="glyphicon glyphicon-list" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    <!--end of danh sách mã thi-->
  </section>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example1').DataTable();
    });
</script>

  