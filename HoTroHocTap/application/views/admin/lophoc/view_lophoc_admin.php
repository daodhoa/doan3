<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý lớp học</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/cdanhmucmonhoc'); ?>"><i class="fa fa-dashboard"></i> Quản lý môn học</a></li>
      <li class="active">Danh sách lớp học - Môn học: <?php echo $monhoc['tenmon']; ?></li>
    </ol>
  </section>
  <!-- Main content-->
  <section class="content">
    <div class="row">
    <!-- Thông báo-->
        <div class="col-md-12">
            <div class="row" id="thongbao">
                <?php if(isset($message)): ?>
                    <?php if($message['kieu'] == 1): ?>
                    <div class="alert alert-info alert-dismissible">
                    <?php else: ?>
                    <div class="alert alert-warning alert-dismissible">
                    <?php endif; ?>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thông báo: </strong> <?php echo $message['noidung']; ?>
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
                    <h3 class="box-title">Thêm lớp học</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Mã lớp:</label>
                            <input type="text" value="" class="form-control" required name="malophoc" placeholder="Lớp học mới" style="background-color: #FFFFCC" 
                            value="<?php echo $this->input->post('malophoc');?>">
                            <p style="color: red !important;"><?php echo form_error('malophoc'); ?></p>
                        </div>
                        <div class="form-group">
                            <label>Học kỳ:</label>
                            <select class="form-control" name="hocky" required="required" style="background-color: #FFFFCC" >
                                
                            <?php foreach($kyhoc as $row): ?>
                                <option value="<?php echo $row['makyhoc'];?>"><?php echo $row['tenkyhoc']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <button name="them" value="luu" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i>Thêm</button>
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
                <div class="col-md-12">
                    <div class="col-md-6">
                        <h4 style="float: right;">Học kỳ:</h4>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id="kyhoc" onchange="window.location.href='<?php echo base_url('admin/cdanhmuclophoc/index/'.$monhoc['mamon']); ?>?makyhoc='+document.getElementById('kyhoc').value;">
                        <?php foreach($kyhoc as $row): ?>
                            <option <?php if($this->input->get('makyhoc') == $row['makyhoc']): ?>
                                            selected ="true"
                            <?php endif; ?> 
                            value="<?php echo $row['makyhoc'];?>"><?php echo $row['tenkyhoc']; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách lớp học</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                        <table id="tbl-lophoc" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th>Mã lớp</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Thao tác</th>
                                    <th>Danh sách sinh viên</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1;
                                foreach($records as $row):
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo($stt); $stt++; ?></td>
                                        <td><?php echo $row['malophoc']; ?></td>
                                        <td class="text-center">
                                            <?php if($row['trangthai']==1 ){
                                                echo "Mở";
                                            }else{ echo "Đóng"; } ?>
                                        </td>
                                        <td class="text-center">
                                            <a onclick="return confirmAction();" class="btn btn-danger btn-flat btn-sm" title="Xóa" href="<?php echo base_url('admin/cdanhmuclophoc/xoa?id='.$row['id_lophoc']); ?>" >Xóa</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('admin/cdssinhvien/index/'.$row['id_lophoc']); ?>" class="btn btn-primary btn-flat btn-sm">Danh sách sinh viên</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    <!--end of danh sách mã thi-->
  </section>
</div>
<script type="text/javascript">
    $(document).ready(function() {


        $('#tbl-lophoc').DataTable(
        {   
            "searching": false,
            "language" :{
                "lengthMenu": "Hiển thị _MENU_ bản ghi/trang",
                "info": "Trang _PAGE_ trên _PAGES_",
                "paginate": {
                  "previous": "Trang trước",
                  "next" : "Trang sau"
                }
            }
            
        }
        );
    });

</script>