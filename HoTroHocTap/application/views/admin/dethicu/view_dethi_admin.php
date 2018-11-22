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
      <li><a href="<?php echo base_url('admin/cdanhmucmathi'); ?>"><i class="fa fa-dashboard"></i> Quản lý đề thi</a></li>
      <li class="active">Tạo đề thi </li>
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
                    <h3 class="box-title">Thêm đề thi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form method="post" id="themmathi">
                        <div class="form-group">
                            <label for="mathi">Mã đề thi</label>
                            <input type="hidden" id="thoigian" value="">
                            <input type="text" readonly id="mathi" value="<?php echo $mathimoi; ?>" class="form-control" name="mathi" placeholder="Mã thi" style="background-color: #FFFFCC">
                        </div>
                        <div class="form-group">
                            <label for="monhoc">Môn học</label>
                            <select class="form-control" name="monhoc" id="monhoc" required="required" style="background-color: #FFFFCC" >
                                <option value="">---chọn môn học---</option>
                                <?php foreach ($dsmonhoc as $row): ?>
                                    <option 
                                    <?php if($this->input->post('monhoc')==$row['mamon'] ): ?>
                                        selected = "true" <?php endif; ?>
                                    value="<?php echo $row['mamon'];?>"><?php echo $row['tenmon']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcauhoi">Số lượng câu hỏi</label>
                            <div class="row" id="slcauhoi">
                                <div class="col-md-6" >
                                    <div class="col-md-12">
                                        <input type="number" min="0" class="form-control" name="slcauhoi[de]" placeholder="Dễ" style="background-color: #FFFFCC" value="<?php echo $this->input->post('slcauhoi[de]'); ?>">
                                    </div>
                                    <div class="col-md-12 text-center">
                                        #
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <input type="number" min="0" class="form-control" name="slcauhoi[tb]" placeholder="Trung bình" style="background-color: #FFFFCC" value="<?php echo $this->input->post('slcauhoi[tb]'); ?>">
                                    </div>
                                    <div class="col-md-12 text-center">
                                        #
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <input type="number" min="0" class="form-control" name="slcauhoi[kho]" placeholder="Khó" style="background-color: #FFFFCC" value="<?php echo $this->input->post('slcauhoi[kho]'); ?>">
                                    </div>
                                    <div class="col-md-12 text-center">
                                        #
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <input type="number"  min="0" class="form-control" name="slcauhoi[khohn]" placeholder="Khó hơn" style="background-color: #FFFFCC" value="<?php echo $this->input->post('slcauhoi[khohn]'); ?>">
                                    </div>
                                    <div class="col-md-12 text-center">
                                        #
                                    </div>
                                </div>
                                <div class="col-md-12" style="color: red !important;">
                                    <p><?php echo form_error('slcauhoi'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="thoigianlambai">Thời gian làm bài(phút)</label>
                            <input type="number" min="1" class="form-control"  required="required" name="thoigianlambai" placeholder="Thời gian làm bài(phút)" style="background-color: #FFFFCC" value="<?php echo $this->input->post('thoigianlambai'); ?>">
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
                    <h3 class="box-title">Danh sách đề thi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center col-md-1">STT</th>
                                <th class="text-center col-md-1">Mã thi</th>
                                <th class="text-center col-md-3">Môn học</th>
                                <th class="text-center" >TG làm bài</th>
                                <th class="text-center col-md-4">TG tạo</th>
                                <th class="text-center">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; 
                                    foreach($dsdethi as $row):
                                ?>
                                
                                    <tr>
                                        <td class="text-center"><?php echo $stt; $stt++; ?></td>
                                        <td><?php echo $row['madethi']; ?></td>
                                        <td><?php echo $row['tenmon']; ?></td>
                                        <td><?php echo $row['thoigianlambai']; ?> phút</td>
                                        <td><?php echo $row['thoigiantao']; ?></td>
                                        <td class="text-center col-md-3">
                                            <a href="<?php echo base_url('admin/cdanhmucmathi/xemchitiet?madethi='.$row['madethi']); ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>

                                            <?php if($row['trangthai'] == 1): ?>
                                                <button class="btn btn-primary btn-flat btn-sm" title="đang hoạt động" onclick="changeStatus('<?php echo $row["madethi"]; ?>');" name="check" ><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <?php elseif($row['trangthai'] == 0): ?>
                                                <button  class="btn btn-danger btn-flat btn-sm" title="đã bị hủy" onclick="changeStatus('<?php echo $row["madethi"]; ?>');" name ="uncheck" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                            <?php endif; ?>
                                            <a href="<?php echo base_url('admin/cdanhmucmathi/xembailam/'.$row['madethi']); ?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-folder-open" aria-hidden="true"></i></a>
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

    function changeStatus(madethi){
        $.ajax({
            url: "<?php echo base_url('admin/cdanhmucmathi/changeStatus/'); ?>" + madethi ,
            type: 'POST',
            dataType : 'JSON',
        })
        .done(function(data) {
            alert('Đã cập nhật trạng thái');
        })
        
    }
</script>