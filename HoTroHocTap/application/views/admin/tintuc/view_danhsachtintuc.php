<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý tin tức</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="row" >
	<div class="col-md-12">
		
		<div class="panel panel-default">
			<?php foreach ($monHocs->result() as $monHoc):?>
                        <div class="panel-heading">
                             Môn học: <?php echo($monHoc->tenmon); ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <td>Ngày đăng</td> 
                                            <td>Tiêu đề</td>
                                            <td>Thao tác</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tinTucs->result() as $tinTuc):?>
                                        	<?php if (!strcmp($tinTuc->mamonhoc,$monHoc->mamon)):?>
											<tr>
												<td><?php echo($tinTuc->ngaydang);?></td>
												<td><?php echo($tinTuc->tieude); ?></td>
												<td>
                                                <a href="<?php echo base_url().'admin/cdanhmuctintuc/xoa/'.$tinTuc->matintuc ;?>"
                                                    type="button" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Bạn chắc muốn xóa tin này chứ?');" >
                                                Xóa
                                                </a>
												<a href="<?php echo base_url().'admin/cdanhmuctintuc/showViewSuatintuc/'.$tinTuc->matintuc ;?>" type="button" class="btn btn-warning btn-sm">Sửa</a>
												<a href="<?php echo base_url().'admin/cdanhmuctintuc/showViewChiTiettintuc/'.$tinTuc->matintuc ;?>" type="button" class="btn btn-info btn-sm">Xem chi tiết</a>
												</td>
											</tr>
											<?php endif?>
										<?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
        	<?php endforeach; ?>
        </div>

	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo base_url().'admin/cdanhmuctintuc/showViewThemtintuc' ;?>" type="button" class="btn btn-info btn-lg"> Thêm tin tức</a>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
            $('#dataTables-example').dataTable();
    });
</script>

<script src="../bootstrap/assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="../bootstrap/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
