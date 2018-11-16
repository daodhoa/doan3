<div class="container" style="background-color: #EEEFFF; padding-top: 10px;">
	<div class="row" style="margin-top: 20px;">
    <div class="col-md-9">
      <form method="POST" id="myForm" action="<?php echo base_url('clamdethi/ketqualambai/'.$madethi); ?>">
      <?php 
      $sottcau = 1;
      foreach ($dscauhoi as $row):?>
        <div class="col-md-12" style="margin-top: 20px;">
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
            <div class="radio" >
              <label><input type="radio" name="chondapan[<?php echo $row['macauhoi'] ?>]" 
                value="<?php echo $val['macautraloi']; ?>">
                <span><?php echo $label; $stt++; ?>:</span>
                <span> <?php echo $val['noidung']; ?></span>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
      <div class="col-md-12" style="margin-top: 30px;">
        <input type="submit" onclick="return confirm('xác nhận nộp bài?');" name="nopbai" id="nopbai" class="btn btn-primary" value="NỘP BÀI VÀ KẾT THÚC">
        <input type="submit" id="autonopbai" name="autonopbai" style="visibility: hidden;">
      </div>
      </form>

		</div>
		<div class="col-md-3" style="background-color: white; border-style: solid; border-color: green">
      <div class="col-md-12" >
        <h3 class="text-center">QUIZ NAVIGATION</h3>
        <hr>
      </div>
      <div class="col-md-12">
        <div class="DH-list">
          <?php $cau=1; foreach ($dscauhoi as $row):?>
            <a id="cau<?php echo $cau;?>">
              <?php echo $cau++;?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-md-12">
        <p>Thời gian còn lại: <span id="time"></span></p>
      </div>
		</div>
    <div class="col-md-12">
      <h4  style="color: #33CC33; float: right;">Được tạo bởi Đào Duy Hòa</h4>
    </div>
	</div>  
</div>

<script type="text/javascript">
      $(document).ready(function(){
            <?php $s = 1; foreach ($dscauhoi as $row):?>
              var macau = <?php echo $row['macauhoi']; ?>;
              $("input[name='chondapan["+macau+"]']").click(function(){
                $('#cau<?php echo $s; ?>').addClass('active');
              });
            <?php $s++; endforeach; ?>
      });

      //var now = 0;

      function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;            

            if (timer < 0) {
                //timer = duration;
                submitform();
            }
            now = timer;
            timer = timer - 1;


        }, 1000);
    }

    function submitform(){
                
                document.getElementById('autonopbai').click();
        }

    window.onload = function () {
        var phut = <?php echo $this->session->flashdata('thoigianlambai'); ?>;
        var fiveMinutes =  phut,
        display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };

    window.onbeforeunload = function ()
    {
       var now = $('#time').text();
       var p = now.slice(0,2);
       var s = now.slice(3,5);
       var cook = parseInt(p)*60 + parseInt(s);
       $.ajax({
        type: "POST",
        url: "<?php echo base_url('clamdethi/session_update/'); ?>" + cook,
        //data: { "timer": cook }
        }).done(function( msg ) {
          console.log( "Data Saved: " + msg );
        });
    };

    
</script>