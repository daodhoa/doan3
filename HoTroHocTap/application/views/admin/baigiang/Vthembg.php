<script src="{$url}bootstrap/ckeditor/test.js"></script>
<!--  page-wrapper -->
<div id="page-wrapper" style="background-color: white;">
	<div class="content-wrapper" style="padding-top: 1%">
		<section class="content-header">
		    <h1>
		      Thêm bài giảng
		    </h1>
		    <ol class="breadcrumb">
		      <li><a href="{$url}admin/chome_admin"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
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
		                {if $mes['sobanghi']>0}
		                <div class="col-md-12" style="color: white">
		                    <div class="box box-{$mes['mau']} box-solid" >
		                        <div class="box-header with-border" >
		                            <h3 class="box-title">Thông báo</h3>
		                            {$mes['thongbao']}
		                        </div><!-- /.box-header -->
		                    </div><!-- /.box -->
		                </div>
		                {/if}
		              </div>
		            </div>
		            <!-- /Thông báo-->
		        	<div class="col-md-12">
		                <div class="box box-success">
		                    <div class="col-md-6" style="margin-top: 3%">
		                        <label>Tiêu đề</label>
		                        <input name="tieude" value="{if isset($bg)}{$bg.tieude}{/if}" class="form-control" placeholder="&nbsp Nhập tiêu đề bài viết" required="" autocomplete="off"/>
		                    </div>
		                    <div class="col-md-6" style="margin-top: 3%">
		                        <label>Môn học</label>
		                        <select name="monhoc" class="form-control" required>
		                            <option value="">Chọn môn học</option>
		                            {foreach $dsmon as $val}
		                              <option  {if isset($bg)} selected="true"{/if}  value="{$val.mamon}">{$val.tenmon}</option>
		                            {/foreach}
		                        </select>
		                    </div>

		                    <div class="col-md-12" style="margin-top: 3%">
		                        <label>Nội dung</label>
		                        <textarea id="txt_content"  name="noidung" style="width:100%; height:250px !important;">
		                         {if isset($bg)}{$bg.noidung}{/if}
		                        </textarea>
		                    </div>
		                    <div class="col-md-12" style="margin-top: 2%">
		                        <button type="submit" name="{if isset($bg)}sua{else}luu{/if}" value="luu"  class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i>Lưu bài</button>
		                        
		                        <a class="btn btn-minw btn-square btn-warning"><i class="fa fa-times push-5-r"></i>Hủy</a>
		                    </div>
		                </div>
		            </div>
		        </div>
		       </form>
		    </div>
		</section>
</div>
<!-- end page-wrapper -->
</div>
<!-- end wrapper -->
</body>

</html>