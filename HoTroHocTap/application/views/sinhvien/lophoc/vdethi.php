
	<div class="container">
		<input action="action" class="button secondary" onclick="window.history.go(-1); return false;" type="button" value="Trở về" />
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Làm Bài Kiểm Tra</h1>
				<br>
				<h4>
					MÔN HỌC: <?php echo $dethi['tenmon']; ?><br>
					<?php echo $dethi['mahocphan']; ?>
				</h4>
				<p>Mã đề: <?php echo $dethi['madethi'] ?></p>				
			</div>
			<div style="margin-top: 20px;" class="col-md-12 text-center">
				<p style="color: #006666">Thời gian làm bài: <?php echo $dethi['thoigianlambai']; ?> phút</p>
				<a href="<?php echo base_url('clamdethi/index/'.$dethi['madethi']); ?>" class="button primary" onclick="return confirm('Xác nhận làm bài?');">
					BẮT ĐẦU LÀM BÀI
				</a>
			</div>
		</div>
	</div>