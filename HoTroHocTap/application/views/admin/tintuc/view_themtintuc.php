<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Thêm tin tức</h1>
    </div>
                <!--End Page Header -->

</div>

<div class="row">
        <div class="col-md-6 ">
        	
        	<form id="themtin" action="<?php echo base_url().'admin/cdanhmuctintuc/them' ?>" method="POST">
        		 <div class="form-group">
        		 	<label for="monhoc">Môn học</label>
	        		 <select name="monhoc">
	        		  <?php foreach ($monHocs->result() as $monHoc):?>
					  <option value="<?php echo($monHoc->mamon); ?>"><?php echo($monHoc->tenmon); ?></option>
					  <?php endforeach; ?>
					</select> 
				</div>
                <div class="form-group">
                    <label for="tieude">Tiêu đề tin </label>
                    <input type="text" id="tieude" value="" class="form-control" name="tieude" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="noidung">Nội dung: </label>
                    <textarea class="form-control" rows="5" id="noidung" name="noidung" required></textarea>
               	
                </div>
                <div class="form-group">
                    <input type="file" name="userfile" size="20" />
                </div>
                <div class="form-group">
		            <input type="submit" class="btn btn-primary" name="submit" value="Ghi lại">
		        </div>

               <!--  <button type="submit" name="xacnhan" value="xacnhan" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i> Ghi lại</button> -->
            </form>
        </div>
</div>