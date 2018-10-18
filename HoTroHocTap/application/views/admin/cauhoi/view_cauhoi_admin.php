<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý câu hỏi</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="row" >
	<div class="col-md-5">
		<h3>Thêm câu hỏi</h3>
	</div>
	<div class="col-md-7">
		<div class="panel panel-default">
                        <div class="panel-heading">
                             Danh sách câu hỏi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tbl-cauhoi">
                                    <thead>
                                        <tr>
                                            <td>Mã</td> 
                                            <td>Môn học</td>
                                            <td>Độ khó</td>
                                            <td>Nội dung</td>
                                            <td>Thao tác</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($records->result() as $row):?>
											<tr>
												<td><?php echo($row->macauhoi);?></td>
												<td><?php echo($row->tenmon); ?></td>
												<td><?php echo($row->chuthich); ?></td>
												<td><?php echo($row->noidung); ?></td>
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
        $('#tbl-cauhoi').DataTable();
    });
</script>


