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
                    <h3 class="box-title">Thêm môn học</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="tenhocky">Tên môn:</label>
                            <input type="text" value="" class="form-control" required name="tenmon" placeholder="Môn học mới" style="background-color: #FFFFCC" 
                            value="<?php echo $this->input->post('tenmon');?>">
                        </div>
                        <div class="form-group">
                            <label for="tenhocky">Mã học phần:</label>
                            <input type="text" value="" class="form-control" name="mahocphan" placeholder="Mã học phần" value="<?php echo $this->input->post('mahocphan');?>"  
                            style="background-color: #FFFFCC">
                            <p style="color: red !important;"><?php echo form_error('mahocphan'); ?></p>
                        </div>
                        
                        <button name="them" value="luu" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i>Thêm</button>
                    </form>
                </div>
            </div>
            <div id="suamonhoc" class="box box-success" style="
                margin-top: 10%;
                border-top-width: 3px;
                border-top-style: solid;
                border-top-color: green;" >
                <div class="box-header with-border">
                    <h3 class="box-title">Sửa môn học</h3>
                </div><!-- /.box-header -->
                <div class="box-body" >
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="mamon" id="mamon" style="background-color: #FFFFCC">
                            <label>Tên môn học: </label>
                            <input type="text" required class="form-control" name="tenmon" id="tenmonmoi" style="background-color: #FFFFCC"> 
                        </div>
                        <div class="form-group">
                            <label>Mã học phần: </label>
                            <input type="text" required class="form-control" name="mahocphan" 
                            id="mahocphanmoi"  style="background-color: #FFFFCC">
                            <p style="color: red !important;"><?php echo form_error('mahocphan'); ?></p>
                        </div>
                        
                        <button name="sua" value="luu" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-check"></i>Cập nhật</button>
                        <button type="reset" id="huy" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-check"></i>Hủy</button>
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
                        <table id="tbl-monhoc" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Mã môn</th>
                                    <th>Tên môn</th>
                                    <th>Mã học phần</th>
                                    <th class="text-center">Thao tác</th>
                                    <th>Danh sách lớp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($records as $row):
                                ?>
                                    <tr>
                                        <td><?php echo $row['mamon']; ?></td>
                                        <td><?php echo $row['tenmon']; ?></td>
                                        <td><?php echo $row['mahocphan']; ?></td>
                                        <td class="text-center col-md-3">
                                            <button class="btn btn-primary btn-flat btn-sm" title="Sửa" onclick="suamonhoc('<?php echo $row['mamon']; ?>')" >Sửa</button>
                                            <a onclick="return confirmAction();" class="btn btn-danger btn-flat btn-sm" title="Xóa" href="<?php echo base_url('admin/cdanhmucmonhoc/xoa?mamon='.$row['mamon']); ?>" >Xóa</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('admin/cdanhmuclophoc/index/'.$row['mamon']); ?>" class="btn btn-primary btn-flat btn-sm">Danh sách lớp</a>
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

        $('#suamonhoc').hide();

        $('#huy').click(function(){
            $('#suamonhoc').hide();
        });

        $('#tbl-monhoc').DataTable(
        {
            "language" :{
                "lengthMenu": "Hiển thị _MENU_ bản ghi/trang",
                "info": "Trang _PAGE_ trên _PAGES_",
                "search" : "Tìm kiếm",
                "paginate": {
                  "previous": "Trang trước",
                  "next" : "Trang sau"
                }
            }
            
        }
        );
    });

    function suamonhoc(ma){
        $('#suamonhoc').show();

        $.ajax({
            url : "<?php echo base_url('admin/cdanhmucmonhoc/chitiet/'); ?>" + ma,
            type: "GET",
            dataType: "json",
            success: function(data){
                $("#mamon").val(data.mamon);
                $("#tenmonmoi").val(data.tenmon);
                $("#mahocphanmoi").val(data.mahocphan);
            }
        });
        return false;
    }
</script>