<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý môn học</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="row" >
	<div class="col-lg-12">
        <form action="<?php echo base_url('admin/cdanhmucmonhoc/them'); ?>" method="POST">
            <input type="submit" name="btn_themmonhoc" value = "Thêm câu hỏi"/>
            <div class="row">&nbsp;</div>
        </form>
    </div>

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
                                <td>Ghi chú</td> 
                                <td>Thao tác</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records->result() as $row):?>
								<tr>
									<td><?php echo($row->mamon);?></td>
									<td><?php echo($row->tenmon); ?></td>
									<td><?php echo($row->ghichu); ?></td>
									<td><a href="<?php echo  base_url('admin/cdanhmucmonhoc/sua'); ?>"><span class="glyphicon glyphicon-remove">sua</span></a></td>
                            
									<td><a onclick="return confirmAction()" href="<?php echo  base_url('admin/cdanhmucmonhoc/xoa?mamon='.$row->mamon); ?>"><span class="glyphicon glyphicon-remove">xoa</span></a></td>
								</tr>
							<?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>

	</div>

<script type="text/javascript">
	$(document).ready(function () {
        $('#dataTables-example').DataTable();
    });
    $(document).ready(function (){
        $('#tbl-cauhoi').DataTable();
        $("#add-form").hide();
       
    });
    $("#show-add-btn").click(function(){
        $("#add-form").toggle();
    });
</script>


