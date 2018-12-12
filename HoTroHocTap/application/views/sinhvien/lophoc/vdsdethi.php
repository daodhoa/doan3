<div class="container">
	<input action="action" class="button secondary" onclick="window.history.go(-1); return false;" type="button" value="Trở về" />
	<div class="row">

		<div class="col-md-8">
			<h2 class="section-title"><i class="icon-book"></i>Danh sách bài kiểm tra</h2>
			<ul class="posts">
				<?php foreach ($dsdethi as $row): ?>
				<li class="post">
					<h3 class="entry-title"><a <?php if($row['trangthai'] ==1): ?>
										href="<?php echo base_url('clophoc/dethi/'.$row['madethi'] ); ?>"
										<?php else: ?>
											 onclick="return alert('Đề thi đã bị khóa');"
										<?php endif; ?> >Mã đề: <?php echo $row['madethi']; ?></a></h3>
					<span class="time"><i class="icon-clock"></i>Thời gian làm bài:
						<?php echo $row['thoigianlambai']; ?> phút
					</span>
					<?php if ($row['trangthai']==1 ): ?>
						<span style="color: #42B123">Trạng thái: Đang mở</span>
					<?php else: ?>
						<span style="color: #DD0B12">Trạng thái: Đóng</span>
					<?php endif ?>
					
				</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
	
</div>