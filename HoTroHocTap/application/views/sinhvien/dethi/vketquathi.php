<div class="container">
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
					<p>Số câu đúng: <?php echo $socaudung."/".$slc; ?></p>
					<p>Điểm: <?php echo $sodiem; ?></p>
				</div>				
			</div>
			<div style="margin-top: 20px;" class="col-md-12 text-center">
				
				<a href="<?php echo base_url('cbailam/index/'.$dethi['madethi']); ?>" class="button primary">
					Xem lại bài
				</a>
			</div>
		</div>
	</div>