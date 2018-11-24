
	<div class="container">
		<input action="action" class="button secondary" onclick="window.history.go(-1); return false;" type="button" value="Trở về" />
		<div class="row">
			<?php foreach ($dsThongBaos as $row): ?>
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
			<br/><br/>
		</div>
	</div>
	