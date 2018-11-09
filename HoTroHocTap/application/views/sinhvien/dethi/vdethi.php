<div class="container" style="background-color: #EEEFFF; padding-top: 10px;">
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-9">
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
            <div class="form-control"  <?php if($dapandung[$row['macauhoi']]['macautraloi'] == $val['macautraloi'] ):?> style="color: red;" <?php endif; ?> >
              <label>
                <input type="radio" name="chondapan[<?php echo $row['macauhoi'] ?>][]" 
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
		<div class="col-md-3" style="background-color: white; border-style: solid; border-color: green">
      <div class="col-md-12" >
        <h3 class="text-center">QUIZ NAVIGATION</h3>
        <hr>
      </div>
      <div class="col-md-12">
        <div class="DH-list">
          <a href="" class="active">1</a>
          <a href="">2</a>
          <a href="">3</a>
          <a href="">4</a>
          <a href="">5</a>
          <a href="">6</a>
          <a href="">7</a>
        </div>
      </div>
      <div class="col-md-12">
        <p>Thời gian còn lại: <span>14:20</span></p>
        <a href="" style="text-decoration: none;">Nộp bài và kết thúc</a>
      </div>
		</div>
    <div class="col-md-12">
      <h4  style="color: #33CC33; float: right;">Được tạo bởi Đào Duy Hòa</h4>
    </div>
	</div>  
</div>