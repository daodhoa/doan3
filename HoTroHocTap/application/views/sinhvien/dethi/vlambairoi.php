<div class="container">
	<input action="action" class="button secondary" onclick="window.history.go(-1); return false;" type="button" value="Trở về" />
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>KẾT QUẢ LÀM BÀI</h1>
				<br>
				<h4>
					MÔN HỌC: <?php echo $dethi['tenmon']; ?><br>
					<?php echo $dethi['mahocphan']; ?>
				</h4>
				<p style="font-size: 18px;">Mã đề: <?php echo $dethi['madethi']; ?></p>
				<div style="font-size: 16px; color: red;">
					<p>Số câu đúng: <?php echo $bailam['socaudung']; ?></p>
					<span>Điểm: <?php echo $bailam['sodiem']; ?>/10</span>
				</div>				
			</div>
			<div style="margin-top: 20px;" class="col-md-12 text-center">
				
				<a href="<?php echo base_url('cbailam/index/'.$dethi['madethi']); ?>" class="button primary">
					Xem lại bài
				</a>
			</div>
		</div>
	</div>