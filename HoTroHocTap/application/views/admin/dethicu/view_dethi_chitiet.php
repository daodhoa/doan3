<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid" style="background-color: #EEEFFF">
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-3">
      <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
          <h4>ĐỀ THI MÔN: </h4>
          <h5><?php echo $dethi['tenmon']; ?></h5>
          <p>Mã học phần: <span><?php echo $dethi['mahocphan']; ?></span></p>
        </div>
        <div class="panel-body">
          <p>Mã đề thi: <span><?php echo $dethi['madethi']; ?></span></p>
          <p>Ngày tạo: <span><?php echo $dethi['thoigiantao']; ?></span></p>
          <p>Thời gian làm bài: <span><?php echo $dethi['thoigianlambai']; ?></span> phút</p>

          <a href="<?php echo base_url('admin/cdanhmucmathi') ?>" class="btn btn-success btn-sm">Trở về</a>
        </div>
      </div>
      </div>
		</div>
		<div class="col-md-6">
      <form method="get">
      <?php 
      $sottcau = 1;
      foreach ($dscauhoi as $row):?>
        <div class="col-md-12">
        <h4>Câu <span><?php echo $sottcau;  $sottcau++; ?></span>: <span><?php echo $row['noidung'] ?>
        </span>
        </h4>
        <?php $stt = 1; ?>
          <?php foreach ($cautraloi[$row['macauhoi']] as $val): ?>
            <?php 
            $label = '';
            switch ($stt) {
              case 1:
                $label = 'A';
                break;
              case 2:
                $label = 'B';
                break;
              case 3:
                $label = 'C';
                break;
              case 4:
                $label = 'D';
                break;
              default:
                $label= '';
                break;
            } ?>
            <div class="radio"  <?php if($dapandung[$row['macauhoi']]['macautraloi'] == $val['macautraloi'] ):?> style="color: red;" <?php endif; ?> >
              <label><input type="radio" name="chondapan[<?php echo $row['macauhoi'] ?>][]" 
                value="<?php echo $val['macautraloi']; ?>">
                <span><?php echo $label; $stt++; ?>:</span>
                <span> <?php echo $val['noidung']; ?></span>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </form>
      

		</div>
		<div class="col-md-3" style="background-color: #EEEFFF">
		</div>
    <div class="col-md-12">
      <h4  style="color: #33CC33; margin-left: 10px;">&nbsp;</h4>
    </div>
	</div>  
</div>






<!-- end page-wrapper -->

</body>
</html>
