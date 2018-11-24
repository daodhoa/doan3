<div class="fullwidth-block inner-content">
	<div class="container">
		<div class="fullwidth-content">
			<h2 class="section-title">Thông báo</h2>
			<?php if(empty($ds3ThongBaos)==true): ?>
							
            	<h4> Hiện chưa có thông báo nào</h4>
        					
        	<?php else: ?>
			<?php foreach ($ds3ThongBaos as $row): ?>
			<div class="accordion">
				<div class="accordion-toggle">
					<h3><a href="<?php echo base_url('Ctintuc/chiTietThongBao/'.$row['matintuc'] ); ?>"><?php echo $row['tieude']; ?></a></h3>
					<span class="date"><i class="icon-calendar"></i> <?php echo $row['ngaydang']; ?> </span>
					<span class="location"><i class="icon-user"></i><?php echo $row['hoten']; ?>
				</div>
				<div class="accordion-content">
					<p><?php echo $row['noidung']; ?></p>
				</div>
			</div>
			<?php endforeach ?>

			<p>
				<a href="<?php echo base_url('Ctintuc/dsthongbao/'.$malop); ?>" style="float: right;">Xem nhiều hơn >></a>
			</p>
			<?php endif ?>
		</div>
	</div>
</div>


<div class="fullwidth-block">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<h2 class="section-title"><i class="icon-calendar-lg"></i>Hỏi đáp, thắc mắc</h2>
							<ul class="posts">
							<?php if(empty($ds3CauHois)==true): ?>
							
            				<h4> Hiện chưa có câu hỏi nào</h4>
        					
        					<?php else: ?>
							<?php foreach ($ds3CauHois as $row): ?>
								<li class="post">
									<h3 class="entry-title"><a href="<?php echo base_url('Ctintuc/chiTietHoiDap/'.$row['matintuc'].'/'.$malop ); ?>"><?php echo $row['tieude']; ?></a></h3>
									<span class="date"><i class="icon-calendar"></i>  
										<?php echo $row['ngaydang']; ?> 
									</span>
			
									<span class="author"><i class="icon-user"></i> <?php echo $row['hoten']; ?> </span>
									
								</li>
								<?php endforeach ?>
							</ul>
							<?php endif; ?>
							<p class="text-center">
								<a href="<?php echo base_url('Ctintuc/dsHoiDap/'.$malop); ?>" class="more button secondary">Xem nhiều hơn</a>
								<a href="<?php echo base_url('Ctintuc/showViewThemCauHoi/'.$malop); ?>" class="more button secondary">Thêm câu hỏi</a>
							</p>
						</div>
						<div class="col-md-4">
							<h2 class="section-title"><i class="icon-newspaper"></i> Bài Giảng</h2>
							<ul class="posts">
								<li class="post">
									<h3 class="entry-title"><a href="#">Biểu diễn dữ liệu đa phương tiện</a></h3>
									<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
									<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
								</li>
								<li class="post">
									<h3 class="entry-title"><a href="#">Nostrud exercitation ullamco</a></h3>
									<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
									<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
								</li>
								<li class="post">
									<h3 class="entry-title"><a href="#">Nostrud exercitation ullamco</a></h3>
									<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
									<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
								</li>
							</ul>
							<p class="text-center">
								<a href="#" class="more button secondary">Xem nhiều hơn</a>
							</p>
						</div>
						<div class="col-md-4">
							<h2 class="section-title"><i class="icon-book"></i> Kiểm tra</h2>
							<ul class="posts">
								<?php foreach ($ds3dethi as $row): ?>
								<li class="post">
									<h3 class="entry-title"><a href="<?php echo base_url('clophoc/dethi/'.$row['madethi'] ); ?>"><?php echo $row['madethi']; ?></a></h3>
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
							<p class="text-center">
								<a href="#" class="more button secondary">Xem nhiều hơn</a>
							</p>
						</div>
					</div> <!-- .row -->
				</div>
</div> <!-- .fullwidth-block -->