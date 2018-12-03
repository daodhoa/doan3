<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý học kỳ</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/chocky'); ?>"><i class="fa fa-dashboard"></i> Quản lý học kỳ</a></li>
      <li class="active">Học kỳ mới </li>
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
                    <h3 class="box-title">Thêm học kỳ</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="tenhocky">Học kỳ mới</label>
                            <input type="text" value="" class="form-control" name="tenhocky" placeholder="Học kỳ mới" style="background-color: #FFFFCC">
                        </div>
                        <p style="color: red !important;"><?php echo form_error('tenhocky'); ?></p>
                        <button name="them" value="luu" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i>Thêm</button>
                    </form>
                </div>
            </div>
            <div id="suahocky" class="box box-success" style="
                margin-top: 10%;
                border-top-width: 3px;
                border-top-style: solid;
                border-top-color: green;" >
                <div class="box-header with-border">
                    <h3 class="box-title">Sửa tên học kỳ</h3>
                </div><!-- /.box-header -->
                <div class="box-body" >
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="makyhoc" id="makyhoc" style="background-color: #FFFFCC">
                            <label for="tenhocky">Tên học kỳ mới</label>
                            <input type="text" required class="form-control" name="tenhocky" id="hockymoi" placeholder="Học kỳ mới" style="background-color: #FFFFCC">
                        </div>
                        <p style="color: red !important;"><?php echo form_error('tenhocky'); ?></p>
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
                    <h3 class="box-title">Danh sách học kỳ</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center col-md-2">STT</th>
                                <th class="text-center col-md-7">Học kỳ</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; 
                                foreach($records as $row):
                                ?>
                                
                                    <tr>
                                        <td class="text-center"><?php echo $stt; $stt++; ?></td>
                                        <td class="text-center"><?php echo $row['tenkyhoc'] ?></td>
                                        <td class="text-center col-md-3">
                                            <button class="btn btn-primary btn-flat btn-sm" title="Sửa" name="check" onclick="suahocky('<?php echo $row['makyhoc']; ?>')" >Sửa</button>
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

        $('#suahocky').hide();

        $('#huy').click(function(){
            $('#suahocky').hide();
        });

		$('#example1').DataTable(
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

    function suahocky(ma){
        $('#suahocky').show();

        $.ajax({
            url : "<?php echo base_url('admin/chocky/chitiet/'); ?>" + ma,
            type: "GET",
            dataType: "json",
            success: function(data){
                $("#makyhoc").val(data.makyhoc);
                $("#hockymoi").val(data.tenkyhoc);
            }
        });
        return false;
    }
</script>