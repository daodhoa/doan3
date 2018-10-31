<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý đề thi</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/cdanhmucdethi'); ?>"><i class="fa fa-dashboard"></i> Quản lý đề thi</a></li>
      <li class="active">In đề thi</li>
    </ol>
  </section>
  <!-- Main content-->
  <section class="content">
  	<div class="row">
	<!-- Thông báo-->
        <div class="col-md-12">
            <div class="row" id="thongbao">
                <?php if($this->session->flashdata('thongbao')!= ''): ?>
                    <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thành công!</strong> <?php echo $this->session->flashdata('thongbao'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <!--End of thông báo-->
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
                    <h3 class="box-title">Thêm nhóm đề thi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="<?php echo base_url('admin/cdanhmucdethi/them'); ?>" method="post" id="themmathi">
                        <div class="form-group">
                            <label for="monhoc">Môn học</label>
                            <select class="form-control" name="monhoc" id="monhoc" required="required" style="background-color: #FFFFCC">
                                <option value="">---chọn môn học---</option>
                                <?php foreach ($monhoc as $row): ?>
                                    <option value="<?php echo $row->mamon; ?>"><?php echo $row->tenmon; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcauhoi">Số lượng câu hỏi</label>
                            <div class="row" id="slcauhoi">
                                <div class="col-md-6" >
                                    <div class="col-md-12">
                                        <input type="number" min="0" class="form-control" name="slcauhoi[de]" placeholder="Dễ" style="background-color: #FFFFCC">
                                    </div>
                                    <div class="col-md-12 text-center">
                                        #
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <input type="number" min="0" class="form-control" name="slcauhoi[tbinh]" placeholder="Bình thường" style="background-color: #FFFFCC">
                                    </div>
                                    <div class="col-md-12 text-center">
                                        #
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <input type="number" min="0" class="form-control" name="slcauhoi[kho]" placeholder="Khó" style="background-color: #FFFFCC">
                                    </div>
                                    <div class="col-md-12 text-center">
                                        #
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <input type="number"  min="0" class="form-control" name="slcauhoi[khohn]" placeholder="Khó hơn" style="background-color: #FFFFCC">
                                    </div>
                                    <div class="col-md-12 text-center">
                                        #
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="soluongde">Số lượng đề</label>
                            <input type="number" min="1" class="form-control"  required="required" name="soluongde" placeholder="Số lượng đề (cái)" style="background-color: #FFFFCC">
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
                    <h3 class="box-title">Danh sách nhóm đề thi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center col-md-4">Môn học</th>
                                <th class="text-center">SL Đề</th>
                                <th class="text-center">SL Câu</th>
                                <th class="text-center col-md-4">TG tạo</th>
                                <th class="text-center">Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; 
                                    foreach($dsnhomdethi as $row):
                                ?>
                                
                                    <tr>
                                        <td class="text-center"><?php echo $stt; $stt++; ?></td>
                                        <td><?php echo $row['tenmon'] ?></td>
                                        <td class="text-center"><?php echo $row['soluongde']; ?></td>
                                        <td class="text-center"><?php echo $row['slc']; ?></td>
                                        <td><?php echo $row['thoigiantao']; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('admin/cdanhmucdethi/taoDeThi'); ?>?type=0&md=<?php echo $row['manhomde']; ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>
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