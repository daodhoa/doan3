<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý môn học</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="row">
	<!-- <div class="col-md-5">
		<button type="button" class="btn btn-warning btn-sm" name = "btn_them" href="<?php echo  base_url()?>admin/Cdanhmucmonhoc/them" >Thêm môn học</button>
	</div> -->
    <form action="<?php echo base_url('admin/cdanhmucmonhoc/them'); ?>" method="POST">
            <input type="submit" class="btn btn-warning btn-sm" name="btn_themmonhoc" value = "Thêm môn học"/>
            <div class="row">&nbsp;</div>
    </form>
           
    <div class="col-md-7">

		<div class="panel panel-default">
            <div class="panel-heading">
                Danh sách môn học
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <td>Mã môn</td> 
                                <td>Tên môn</td>
                                <td>Mã học phần</td> 
                                <td>Thao tác</td>
                                <td>Danh sách lớp học</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records->result() as $row):?>
								<tr>
									<td><?php echo($row->mamon);?></td>
									<td><?php echo($row->tenmon); ?></td>
									<td><?php echo($row->mahocphan); ?></td>
									<td class="text-center">
                                        <div>
                                            <form action="<?php echo base_url('admin/cdanhmucmonhoc/sua?mamon='.$row->mamon); ?>" method="POST">
                                            
                                                <button class="btn btn-primary btn-flat btn-sm" name="btn_suamonhoc" value = "Sửa"/>Sửa</button>
                                            </form>
                                            <form action="<?php echo base_url('admin/cdanhmucmonhoc/xoa?mamon='.$row->mamon); ?>" method = "POST">
                                                <button name="xoa" onclick="return confirm('Bạn muốn xóa môn?');" class="btn btn-danger btn-flat btn-sm" name="btn_xoamonhoc" value="Xóa">Xóa</button>
                                            </form>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-flat btn-sm" name="btn_lop" value = "Sửa"/>Các lớp</button>
                                    </td>
          						</tr>

						   <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                </div>
                
            </div>
        </div>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
        $('#dataTables-example').DataTable();
    });
</script>


