<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý Giảng viên</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/cgiangvien'); ?>"><i class="fa fa-dashboard"></i> Quản lý giảng viên</a></li>
      <li class="active">Danh sách giảng viên</li>
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
                    <h3 class="box-title">Danh sách giảng viên</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                        <table id="dsgv" class="table table-bordered table-striped table-responsive table-hover">
                            <thead>
                            <tr>
                                <th class="text-center col-md-1" >STT</th>
                                <th class="text-center">Tên tài khoản</th>
                                <th class="text-center">Họ Tên</th>
                                <th class="text-center col-md-2">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; 
                                foreach($listGV as $row):
                                ?>
                                
                                    <tr>
                                        <td class="text-center col-md-1"><?php echo $stt; $stt++; ?></td>
                                        <td class="text-center" ><?php echo $row['tentaikhoan'] ?></td>
                                        <td class="text-center" ><?php echo $row['hoten'] ?></td>
                                        <td class="text-center col-md-2" id="trangthai-<?php echo $row['maquantri'];?>">
                                            <?php if($row['trangthai'] == 1): ?>
                                                <button class="btn btn-success btn-flat btn-sm" title="đang hoạt động" onclick="changestt('<?php echo $row['maquantri'];?>')" name="check"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <?php else: ?>
                                                <button class="btn btn-danger btn-flat btn-sm" title="Đang bị khóa" onclick="changestt('<?php echo $row['maquantri'];?>')" name="uncheck"><i class="fa fa-times" aria-hidden="true"></i></button>
                                            <?php endif; ?>
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

    $('#dsgv').DataTable(
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
    
    function changestt(maquantri){
        $.ajax({
            url: "<?php echo base_url('admin/cgiangvien/changeStatus/'); ?>" + maquantri ,
            type: 'POST',
            dataType : 'JSON',
        })
        .done(function(data) {
            str = '';
            if(data == 1){
                str += '<button class="btn btn-success btn-flat btn-sm" title="đang hoạt động" onclick="changestt('+maquantri+')" name="check"><i class="fa fa-check" aria-hidden="true"></i></button>';
            }else{
                str += '<button class="btn btn-danger btn-flat btn-sm" title="Đang bị khóa" onclick="changestt('+maquantri+' )" name="uncheck"><i class="fa fa-times" aria-hidden="true"></i></button>';
            }
            $('#trangthai-'+maquantri).html(str);
        })
    }   
</script>