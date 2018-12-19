<div class="container">
	<input action="action" class="button secondary" onclick="window.history.go(-1); return false;" type="button" value="Trở về" />
	<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h3 class="page-header">Thêm Câu Hỏi</h3>
    </div>
                <!--End Page Header -->

	</div>

	<div class="row" style="margin-bottom: 53px;">
        <div class="col-md-6 ">
        	
        	<form id="themtin" action="<?php echo base_url().'Ctintuc/themCauHoi' ?>" method="POST">
                <div class="form-group">
                    <label for="tieude">Tiêu đề </label>
                    <input type="text" id="tieude" value="" class="form-control" name="tieude" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="noidung">Nội dung: </label>
                    <textarea class="form-control" rows="5" id="noidung" name="noidung" required></textarea>
               	
                </div>
                <div class="form-group">
                    <input id="malop" type="hidden" value="<?php echo($malop); ?>" class="form-control" name="malop" required>
                </div>
                
                <!-- <div class="form-group">
                    <input type="file" name="userfile" size="20" />
                </div> -->
                <div class="form-group">
		            <input type="submit" class="btn btn-primary" name="submit" value="Ghi lại">
		        </div>

               <!--  <button type="submit" name="xacnhan" value="xacnhan" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i> Ghi lại</button> -->
            </form>
        </div>
	</div>
</div>