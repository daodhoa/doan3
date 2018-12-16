
	<div class="container">

		<button action="action" class="button secondary" onclick="location.href ='<?php echo base_url('clophoc/index/'.$malop); ?>'" >Quay lại</button>
		<div class="row">
			<?php if(empty($dsCauHois)==true): ?>
							
            <h4> Hiện chưa có câu hỏi nào</h4>
        					
        	<?php else: ?>
        	<h4> Danh sách câu hỏi: </h4>
			<?php foreach ($dsCauHois as $row): ?>
			<div class="accordion">
				<div class="accordion-toggle"> 
					<h3><a href="<?php echo base_url('Ctintuc/chiTietHoiDap/'.$row['matintuc'].'/'.$malop); ?>"><?php echo $row['tieude']; ?></a></h3>
					<span class="date"><i class="icon-calendar"></i> <?php echo $row['ngaydang']; ?> </span>
					<span class="location"><i class="icon-user"></i><?php echo $row['hoten']; ?>
				</div>
				<div class="accordion-content">
					<p><?php echo $row['noidung']; ?></p>
				</div>
			</div>
			<?php endforeach ?>
			<?php endif; ?>
			<br/><br/>
		</div>
	</div>
	