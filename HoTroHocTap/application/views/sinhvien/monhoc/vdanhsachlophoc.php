<div class="fullwidth-block inner-content">
	<div class="container">
		<div class="fullwidth-content">
			<div class="row">
				<div class="col-md-6">
					<h3><span><?php echo $monhoc['tenmon']; ?> - </span><span><?php echo $monhoc['mahocphan']; ?></span></h3>
					
				</div>
				<div class="col-md-6" style="padding-top: 20px;">
					<form class="form-horizontal">
						<div class="form-group">
      						<label class="control-label col-md-4" for="email">Chọn kỳ học:</label>
      						<div class="col-md-6">
        						<select class="form-control" id="makyhoc" onchange="window.location.href='<?php echo base_url('cmonhoc/dslop/'.$monhoc['mamon']); ?>?makyhoc='+document.getElementById('makyhoc').value;" >
        							<option value="">--Chọn kỳ học--</option>
        							<?php foreach($dskyhoc as $row): ?>
        								<option 
        								<?php if($this->input->get('makyhoc')== $row['makyhoc']): ?>
        									selected ="true"
        								<?php endif; ?>

        								value="<?php echo $row['makyhoc']; ?>" ><?php echo $row['tenkyhoc']; ?></option>
        							<?php endforeach; ?>
      							</select>
      						</div>
    					</div>
					</form>
				</div>
			</div>
			<hr>
			<!--danh sách lớp-->
			<form action="" method="post">
			<div class="row">
			<?php if(!empty($dslop)): ?>
				<div class="col-md-12">
					<h2 class="section-title"><i class="icon-book"></i>Danh sách lớp</h2>
					<?php if(!empty($thongbao) ): ?>
						<div id="thongbao" class="button col-md-12" style="background-color: #6c7f60;color: white; font-size: 20px" ><?php echo $thongbao; ?></div>
					<?php endif; ?>
					<div class="clear"></div>
					<ul class="posts">
					<?php foreach($dslop as $row): ?>
						<li class="post">
							<h3 class="entry-title"><a href="" >Mã lớp: <?php echo $row['malophoc']; ?></a></h3>
							<span class="time" style="color: black"><i class="icon-clock"></i>Trạng thái: 
							<?php if($row['trangthai']== 1 ): ?>	
								<span style="color:#33CC33;">Đang mở</span>
								
								<?php if(!empty($row['masinhvien'][0])): ?>
									<?php if($row['masinhvien'][0] == "t"): ?>
										<a href="<?php echo base_url('clophoc/index/').$row['malophoc']; ?>" class="button">Đã tham gia</a>
									<?php else: ?>
										<input type="submit" value="Chưa tham gia" name="dangky" class="button"/>
										<input  class="hidden" value="<?php echo $row['id_lophoc']; ?>" name="malop"/>
									<?php endif; ?>	
								<?php else: ?><input type="submit" value="Chưa tham gia" class="button" onclick="return confirm('Bạn không thể tham gia lớp <?php echo $row['malophoc']; ?>');"/>
								<?php endif; ?>
								
							<?php else: ?>
								<span style="color:#FF3333;">Đóng</span>
							<?php endif; ?>
							</span>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
			</div><!--?row-->
			<input type="hidden" name="{$csrf_token_name}" value="{$csrf_token}" />
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">

    $(document).ready(function(){

        setTimeout(function(){ $('#thongbao').fadeOut(2000); },2000);
    });

</script>