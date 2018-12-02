<div class="fullwidth-block inner-content">
	<div class="container">
		<h2 class="section-title"><i class="icon-newspaper"></i>
			Danh sách bài giảng môn:	<?php echo $tenmon['tenmon']?></h2>
		<div class="row"><div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr class="success">
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Ngày đăng</th>
                    </tr>
				</thead>
				<tbody>
					<?php $stt = 0?>
					<?php foreach($getBaigiang as $row): ?>
						<tr >
							<td><?php echo($stt = $stt+1)?></td>
							<td><a href="<?php echo base_url('chitietbg/'.$row['mabg']); ?>"><?php echo $row['tieude']?></td>
							<td><?php echo $row['ngaydang']?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div></div>
	</div>
</div>