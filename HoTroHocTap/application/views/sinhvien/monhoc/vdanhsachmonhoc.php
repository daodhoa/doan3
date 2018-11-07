			<div class="fullwidth-block inner-content">
				<div class="container">
					<div class="fullwidth-content">
						<p class="leading">Danh sách các môn học:</p>
						<hr>

						<ul class="students-grid" style="background-color: #DDDDDD;">
							<?php foreach($data as $row): ?>
							<li class="student" >
								<figure class="avatar"><img src="<?php echo base_url('bootstrap/sinhvien/'); ?>dummy/monhoc.jpg" alt="Student 1"></figure>
								<h3 class="student-name"><a href="<?php echo base_url('cmonhoc/dslop/'.$row['mamon']); ?>"><?php echo $row['tenmon'] ?></a></h3>
								<h4>Mã học phần: <?php echo $row['mahocphan']; ?></h4>
								<h4>Giảng viên: <?php echo $row['hoten']; ?></h4>
							</li>
							<?php endforeach; ?>
						</ul>

						<!--<div class="pagination">-->
							<?php echo $this->pagination->create_links(); ?>
						<!--</div>-->
					</div>
				</div>
			</div> <!-- .fullwidth-block -->