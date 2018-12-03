<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý sinh viên</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/csinhvien'); ?>"><i class="fa fa-dashboard"></i> Quản lý sinh viên</a></li>
      <li class="active">Danh sách sinh viên</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
       <!--Danh sách mã thi-->
      <div class="col-md-12" style="background-color: white;
      border-top-width: 3px;
    border-top-style: solid;
    border-top-color: green; border-radius: 4px;">
            <div class="box box-success" >
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách sinh viên</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                        <table id="dssv" class="table table-bordered table-striped table-responsive table-hover">
                            <thead>
                            <tr>
                                <th class="text-center col-md-1" >STT</th>
                                <th class="text-center">MSSV</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Họ Tên</th>
                                <th class="text-center">Ngày sinh</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; 
                                foreach($listSV as $row):
                                ?>
                                
                                    <tr>
                                        <td class="text-center col-md-1"><?php echo $stt; $stt++; ?></td>
                                        <td><?php echo $row['masinhvien'] ?></td>
                                        <td ><?php echo $row['email'] ?></td>
                                        <td ><?php echo $row['hoten'] ?></td>
                                        <td class="text-center"><?php echo $row['ngaysinh'] ?></td>
                                        <td class="text-center"><?php if($row['gioitinh'] == 'nam'){
                                          echo "Nam";
                                        }else{
                                          echo "Nữ";
                                        } ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-success btn-flat btn-sm" title="đang hoạt động" name="check" ><i class="fa fa-check" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    <!--end of danh sách mã thi-->
    </div>
  </section>

</div>
<script type="text/javascript">
$(document).ready(function() {

    $('#dssv').DataTable(
        {
            "language" :{
                "lengthMenu": "Hiển thị _MENU_ bản ghi/trang",
                "info": "Trang _PAGE_ trên _PAGES_",
                "search" : "Tìm kiếm",
                "paginate": {
                  "previous": "Trang trước",
                  "next" : "Trang sau"
                }
            },
            "pageLength": 5,
            "lengthMenu": [ [5, 10, 20, -1], [5, 10, 20, "All"] ]
        }
        );
  });

</script>