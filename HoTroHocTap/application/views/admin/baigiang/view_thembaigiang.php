<script src="<?php echo base_url(); ?>/bootstrap/ckeditor/test.js"></script>
<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Thêm Bài Giảng</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="content-wrapper" style="padding-top: 1%">
	<section class="content-header">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url('admin/cdsbaigiang'); ?>"><i class="fa fa-dashboard"></i>Danh sách bài giảng</a></li>
		  <li class="active">Thêm bài giảng </li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
		  <form  method="post" id="form" enctype="multipart/form-data">
		    <div class="col-md-12">
		    	<!-- Thông báo-->
		        <div class="col-md-12" id="thongbao">
		          <div class="row" id="thongbao" style="background-color: #04B173">
	            	<?php if($mes['sobanghi']>0):?>
		            <div class="col-md-12" style="color: white">
		                    <div class="box box-<?php echo $mes['mau'];?> box-solid" >
	                    <div class="box-header with-border" >
		                        <h3 class="box-title">Thông báo</h3>
		                            <?php echo $mes['thongbao']; ?>
		                        </div><!-- /.box-header -->
		                    </div><!-- /.box -->
		                </div>
		            <?php endif; ?>
		              </div>
		            </div>
		            <!-- /Thông báo-->
		        	<div class="col-md-12">
		                <div class="box box-success">
		                    <div class="col-md-6" style="margin-top: 3%">
		                        <label>Tiêu đề</label>
		                        <input name="tieude" value="<?php if(isset($bg)): ?><?php echo $bg['tieude']; ?> <?php endif; ?>" class="form-control" placeholder="&nbsp Nhập tiêu đề bài viết" required="" autocomplete="off"/>
		                    </div>
		                    <div class="col-md-6" style="margin-top: 3%">
		                        <label>Môn học</label>
		                        <select name="monhoc" class="form-control" required>
		                            <option value="">Chọn môn học</option>
		                            <?php foreach($dsmon as $val):?>
		                              <option  <?php if(isset($bg) && ($val['mamon']== $bg['mamon'] ) ): ?> selected= "true" <?php endif; ?>  value="<?php echo $val['mamon']; ?>"><?php echo $val['tenmon']; ?></option>
		                            <?php endforeach; ?>
		                        </select>
		                    </div>

		                    <div class="col-md-12" style="margin-top: 3%">
		                        <label>Nội dung</label>
		                        <textarea id="txt_content"  name="noidung" style="width:100%; height:250px !important;">
		                        <?php if(isset($bg)){
		                        	echo $bg['noidung'];
		                        }
		                        ?>
		                        </textarea>
		                    </div>
		                    <div class="col-md-12" style="margin-top: 2%">
		                        <input type="submit" name="<?php if(isset($bg)){ echo 'sua';}else{echo 'luu';}?>" value="Lưu bài"  class="btn btn-success btn-sm btn-flat">
		                        
		                        <button type="reset" class="btn btn-minw btn-sm btn-square btn-warning"><i class="fa fa-times push-5-r"></i>Hủy</button>
		                    </div>
		                </div>
		            </div>
		        </div>
		       </form>
		    </div>
	</section>
</div>
