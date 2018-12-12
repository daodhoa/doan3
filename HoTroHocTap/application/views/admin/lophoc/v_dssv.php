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
      <li class="active">Danh sách sinh viên</li>
    </ol>
  </section>
  <section class="content">
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
      </div>

        <div class="col-lg-12">
          <button class="btn btn-primary" id="show-add-btn">Import</button>
          <div class="row">&nbsp;</div>
         </div>
        <div class="content-wrapper" id="add-form">
          <!-- Main content -->
          <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-md-12">
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Import danh sách sinh viên</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <div class="row">
                      <form action="" method="POST"  enctype="multipart/form-data" class="form-inline">
                        <div class="col-md-12">
                          <div class="col-md-4">
                            <span><b>Chọn file excel *.xls/.xlsx</b></span>
                          </div>
                          <div class="col-md-4">
                            <input type="file" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="file_import">
                          </div>
                          <div class="col-md-4">
                            <button type="submit" name="import" value="import" class="btn btn-success btn-flat btn-sm">import<i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <br><br><br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="alert alert-success flat" role="alert">
                          Chú ý: File Excel phải có định dạng .xls và theo một định dạng sau.<br>
                          - Dữ liệu sẽ được đọc từ dòng số 2 trong file excel, vì vậy cần loại bỏ những trường không cần thiết trước khi import.<br>
                          - Thứ tự các cột: [A]-Mã sinh viên, [B]-Họ tên sinh viên.
                          <br><a style="color: #3366CC" target="_blank" href="<?php echo base_url();?>attachment/files/import_sinhvien_template.xlsx">Download file excel mẫu</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </section>
          <!-- /.content -->
        </div><!-- /.content-wrapper -->


        <!--Danh sách sinh viên-->
        <div class="col-md-12" style="background-color: white;
        border-top-width: 3px;
        border-top-style: solid;
        border-top-color: green; border-radius: 4px;">
            <div class="box box-success" >
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách sinh viên</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                        <table id="tbl-dssv" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center col-md-1">STT</th>
                                    <th class="text-center col-md-2">MSSV</th>
                                    <th>Họ tên</th>
                                    <th class="text-center">Thời gian</th>
                                    <th class="text-center col-md-3">Trạng thái</th>
                                    <th class="text-center col-md-2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt= 1;
                                foreach($dssv as $row): 
                                ?>
                                <tr>
                                  <td class="text-center col-md-1"><?php echo $stt; $stt++; ?></td>
                                  <td class="text-center col-md-2"><?php echo $row['masinhvien']; ?></td>
                                  <td><?php echo $row['hotensv']; ?></td>
                                  <td class="text-center"><?php echo $row['thoigian']; ?></td>
                                  <td class="text-center col-md-3">
                                    <?php if($row['trangthai'] == 't'){
                                      echo "Đã tham gia";
                                    }else{
                                      echo "Chưa tham gia";
                                    } ?>
                                  </td>
                                  <td class="text-center col-md-2">
                                    <a href="<?php echo base_url('admin/cdssinhvien/xoa/'.$id_lophoc.'?mssv='.$row['masinhvien']); ?>" onclick="return confirmAction();" class="btn btn-sm btn-danger">Xóa</a>
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

      $("#add-form").hide();

      $("#show-add-btn").click(function(){
        $("#add-form").toggle();
      });
      
        $('#tbl-dssv').DataTable(
        {   
            "bInfo" : false,
            "lengthMenu": [[10, 30, 50, -1], [10, 30, 50, "All"]],
            "language" :{
                "lengthMenu": "Hiển thị _MENU_ bản ghi/trang",
                "info": "Trang _PAGE_ trên _PAGES_",
                "search": "Tìm kiếm",
                "paginate": {
                  "previous": "Trang trước",
                  "next" : "Trang sau"
                }
            }
        }
        );
    });

</script>