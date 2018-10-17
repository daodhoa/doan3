<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý môn học</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="row" >
	<div class="col-md-6">
		<h3>Thêm môn học</h3>
	</div>
	<div class="col-md-6">
		
		<!--<h3>Danh sách môn học</h3>
		<div class="form-group">
            <input type="text" class="form-control" id="search" placeholder="Search">
        </div>
		<table class="table table-striped table-bordered table-hover" id="tbl-mon">
			<thead>
				<tr>
					<td>Mã môn</td> <td>Tên môn</td> <td>Ghi chú</td> <td>Thao tác</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($records->result() as $row):?>
					<tr>
						<td><?php echo($row->mamon);?></td>
						<td><?php echo($row->tenmon); ?></td>
						<td><?php echo($row->ghichu); ?></td>
						<td><button type="button" class="btn btn-danger btn-sm">Xóa</button>
							<button type="button" class="btn btn-warning btn-sm">Sửa</button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table> -->

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
												<td><button type="button" class="btn btn-danger btn-sm">Xóa</button>
												<button type="button" class="btn btn-warning btn-sm">Sửa</button>
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
            $('#dataTables-example').dataTable();
    });
</script>

<script src="../bootstrap/assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="../bootstrap/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
