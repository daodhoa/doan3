
<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý tin tức</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="row" >
	<div class="col-md-8">

		<?php if(isset($tinTucs)==false): ?>

            <h4> Lựa chọn môn học và kỳ học để xem danh sách tin</h4>
        <?php else: ?>
            <div class="panel panel-default">
                <?php foreach ($lopHocs->result() as $lopHoc):?>
                    <div class="panel-heading">
                             <strong><big>Mã lớp học: <?php echo($lopHoc->malophoc); ?></big></strong>

                    </div>
                    <div class="panel-body">

                            <div class="table-responsive">
                                <h4> Danh sách thông báo: </h4>
                                 <table class="table table-striped table-bordered table-hover" id="datatTables-ThongBao">
                                    <thead>
                                        <tr>
                                            <td>Ngày đăng</td> 
                                            <td>Tiêu đề</td>
                                            <td>Thao tác</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tinTucs->result() as $tinTuc):?>
                                            <?php if($tinTuc->malophoc==$lopHoc->malophoc): ?>
                                                <?php if($tinTuc->theloai=='thongbao'): ?>
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
                                                <?php endif; ?> 
                                            <?php endif; ?>                                           
                                        <?php endforeach; ?>

                                    </tbody>
                                 </table>
                            </div>
                            <hr>
                            <hr>

                            <div class="table-responsive">
                                <h4> Danh sách câu hỏi của sinh viên: </h4>
                                 <table class="table table-striped table-bordered table-hover" id="datatTables-HoiDap">
                                    <thead>
                                        <tr>
                                            <td>Ngày đăng</td> 
                                            <td>Tiêu đề</td>
                                            <td>Tên Sinh viên</td>
                                            <td>Thao tác</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tinTucs->result() as $tinTuc):?>
                                            <?php if($tinTuc->malophoc==$lopHoc->malophoc): ?> 
                                                <?php if($tinTuc->theloai=='hoidap'): ?>
                                                    <tr>
                                                        <td><?php echo($tinTuc->ngaydang);?></td>
                                                        <td><?php echo($tinTuc->tieude); ?></td>
                                                        <td><?php echo($tinTuc->tensinhvien); ?></td>
                                                        <td>
                                                        <a href="<?php echo base_url().'admin/cdanhmuctintuc/xoa/'.$tinTuc->matintuc ;?>"
                                                            type="button" class="btn btn-danger btn-sm" 
                                                            onclick="return confirm('Bạn chắc muốn xóa tin này chứ?');" >
                                                        Xóa
                                                        </a>
                                                        
                                                        <a href="<?php echo base_url().'admin/cdanhmuctintuc/showViewChiTiettintuc/'.$tinTuc->matintuc ;?>" type="button" class="btn btn-info btn-sm">Xem chi tiết</a>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?> 
                                            <?php endif; ?>                                           
                                        <?php endforeach; ?>

                                    </tbody>
                                 </table>
                            </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
       

	</div>
    <div class="col-md-4">
        <form id="themtin" action="<?php echo base_url().'admin/cdanhmuctintuc/getDanhSachTin' ?>" method="GET">
                 <div class="form-group">
                    <label for="monhoc">Môn học</label>
                     <select name="monhoc">
                      <?php foreach ($monHocs->result() as $monHoc):?>
                      <?php if($monHoc->mamon==$mamonSelected): ?> 
                      <option value="<?php echo($monHoc->mamon); ?>" selected="selected" ><?php echo($monHoc->tenmon); ?></option>
                      <?php else: ?>
                       <option value="<?php echo($monHoc->mamon); ?>" ><?php echo($monHoc->tenmon); ?></option> 
                      <?php endif; ?>  
                      <?php endforeach; ?>
                    </select> 
                </div>
                <div class="form-group">
                    <label for="tieude">Kỳ học </label>
                    <select name="kyhoc">
                    <?php foreach ($kyHocs->result() as $kyHoc):?>
                        <?php if($kyHoc->tenkyhoc==$kyhocSelected): ?>
                        <option value="<?php echo($kyHoc->tenkyhoc); ?>" selected="selected" ><?php echo($kyHoc->tenkyhoc); ?></option>
                        <?php else: ?>
                        <option value="<?php echo($kyHoc->tenkyhoc); ?>"><?php echo($kyHoc->tenkyhoc); ?></option>
                        <?php endif; ?>  
                      <?php endforeach; ?>
                      </select> 
                </div>
                
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Xem danh sách tin">
                </div>

               <!--  <button type="submit" name="xacnhan" value="xacnhan" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i> Ghi lại</button> -->
            </form>
    </div>

</div>

<?php if(isset($tinTucs)): ?>
    <?php if(isset($lopHocs)): ?>
        <?php if(empty($lopHocs->result())): ?> 
            <div class="col-md-12">
                <h4>Chưa có lớp học nào</h4>
            </div>
        <?php else: ?>
        <div class="row">
            <div class="col-md-12">
             <a href="<?php echo base_url().'admin/cdanhmuctintuc/showViewThemtintuc/'.$mamonSelected.'/'.$kyhocSelected ;?>" type="button" class="btn btn-info btn-lg"> Thêm thông báo</a>
             </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>

<?php endif; ?>

<script type="text/javascript">
	$(document).ready(function () {
            $('#datatTables-ThongBao').dataTable();
            $('#datatTables-HoiDap').dataTable();
    });
</script>

<script src="../bootstrap/assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="../bootstrap/assets/plugins/dataTables/dataTables.bootstrap.js"></script>