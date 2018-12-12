<div class="container" id="profile">
  
  <div class="row" style="margin-top: 2%">
    <div class="col-md-2">       
        <div class="col-md-12">
            <img id="anhmoi" src="<?php echo base_url('attachment/avatar/'.$profile['anhdaidien']) ?>" onerror="this.src='<?php echo base_url('attachment/avatar/macdinh.png');?>';" class="img-circle" alt="Ảnh đại diện" width="150" height="150">
        </div>
        <div class="col-md-12">
            <form id="anh" method="post">
            <div style="position: relative;overflow: hidden;display: inline-block; margin-top: 10% ">
                <button style="border: 2px solid gray;color: gray;background-color: white;padding: 8px 10px;border-radius: 8px;font-size: 12px;font-weight: bold; margin-left: 30px;">
                    Cập nhật ảnh đại diện
                </button>
                <input id="anhdaidien" style="font-size: 100px;position: absolute;left: 0;top: 0;opacity: 0;" type="file" name="anhdaidien" accept="image/*" />
            </div>
            </form>
        </div>
    </div>
    <div class="col-md-5">
        <h3 style="margin-left: 5%">Thông tin cá nhân</h3>
        <div class="col-md-12" style="font-size: 18px;">
            <p><span class="glyphicon glyphicon-envelope"></span> Email: <span id="newemail"><?php echo $profile['email'];?></span></p>
        </div>
        <div class="col-md-12" style="font-size: 18px;">
            <p><span class="glyphicon glyphicon-user"></span> Họ tên: <span id="newhoten"><?php echo $profile['hoten'];?></span> <span>- MSSV:</span> <?php echo $profile['masinhvien'];?></p>
        </div>
        <div class="col-md-12" style="font-size: 18px;">
            <p><span class="glyphicon glyphicon-gift"></span> Ngày sinh: <span id="newngaysinh"><?php echo $profile['ngaysinh'];?></span> <span>| Giới tính:</span> <span id="newgioitinh">
                <?php if( $profile['gioitinh'] == 'nam') {
                    echo "Nam";
                }else{ echo "Nữ";} ?></span></p>
        </div>
        <button v-on:click="HienThongTin" style="margin-top: 5%; margin-left: 5%" class="btn btn-primary">Thay đổi thông tin cá nhân</button>

        <div class="col-md-12" id="formsua" style="margin-top: 10%">
            <form id="form">
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Mật khẩu mới: <span style="color: red;">(Chỉ nhập khi thay đổi mật khẩu)</span></label>
                  <input type="password" class="form-control" id="matkhau" placeholder="Enter password" name="matkhau">
                </div>
                <div class="form-group">
                  <label for="pwd">Nhập lại mật khẩu: <span style="color: red;">(Chỉ nhập khi thay đổi mật khẩu)</span></label>
                  <input type="password" class="form-control" id="rematkhau" placeholder="Enter password" name="rematkhau">
                </div>
                <div class="form-group">
                  <label for="email">Họ tên:</label>
                  <input type="text" class="form-control" id="hoten" placeholder="Họ tên" name="hoten">
                </div>
                <div class="form-group">
                  <label>Ngày sinh:</label>
                  <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" >
                </div>
                <div class="form-group">
                  <label>Giới tính:</label><br>
                  <label class="radio-inline"><input type="radio" value="nam" name="gender">Nam</label>
                  <label class="radio-inline"><input type="radio" value="nu" name="gender">Nữ</label>
                </div>
                <button type="submit" class="btn btn-default">Cập nhật</button>
                <button type="reset" id="huy" class="btn btn-default">Hủy</button>
            </form>
        </div>
    </div>
    <div class="col-md-5">
        <h3 style="margin-left: 5%">Danh sách các lớp</h3>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="color: green">Các lớp đã tham gia</div>
                <div class="panel-body">
                    <ul class="list-group">
                      <?php foreach($thamgia as $row): ?>
                      <li class="list-group-item"><a href="<?php echo base_url('clophoc/index/'.$row['malophoc']) ?>"><?php echo $row['tenmon']; ?> - <?php echo $row['malophoc']; ?> </a></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('bootstrap/js/vue.js'); ?>"></script>
<script type="text/javascript">
    var vm = new Vue({
    el: '#profile',
    data: {
      monhoc: ""
    },
    mounted: function() {
        $("#formsua").hide();
        $("#huy").click(function(){
            $("#formsua").hide();
        });

        $('#form').on('submit', function (e) {

          e.preventDefault();
          var email = $('#email').val();
          var hoten = $('#hoten').val();
          var ngaysinh = $('#ngaysinh').val();
          var gioitinh = $("input[name='gender']:checked").val();
          var matkhau = $('#matkhau').val();
            var rematkhau = $('#rematkhau').val();

          if(matkhau != rematkhau){
            alert("Nhập lại mật khẩu chưa chính xác");
            return false;
          }

          $.ajax({
            type: 'post',
            url: "<?php echo base_url('csinhvien/capnhatthongtin') ?>",
            data: $('#form').serialize(),
            success: function (data) {
                $('#newemail').html(email);
                $('#newhoten').html(hoten);
                $('#newngaysinh').html(ngaysinh);
                if(gioitinh == 'nam'){
                    $('#newgioitinh').html("Nam");
                }else{
                    $('#newgioitinh').html("Nữ");
                }
                
              $("#formsua").hide();
              alert(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Có lỗi khi load dữ liệu');
            }

          });

        });

        $('#anhdaidien').change(function(){
           var file_data = $('#anhdaidien').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
            
                                         
            $.ajax({
                url: "<?php echo base_url('csinhvien/capnhatanhdaidien');?>",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(data){
                    var src = "<?php echo base_url('attachment/avatar/');?>"+ data;
                    $('#anhmoi').attr('src', src);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Có lỗi khi cập nhật ảnh đại diện');
                }
            });
            
        });


    },
    methods: {
      HienThongTin : function(){
        var url="";
        url = "<?php echo base_url('csinhvien/thongtincanhan');?>";

        $.ajax({
            url : url,
            type : "GET",
            dataType: "JSON",
            success: function(data){
              $('#email').val(data.email);
              $('#hoten').val(data.hoten);
              $('#ngaysinh').val(data.ngaysinh);
              var value = data.gioitinh;
              $("input[name=gender][value=" + value + "]").attr('checked', 'checked');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Có lỗi khi load dữ liệu');
            }
        });

        $("#formsua").show();
      }
    }
  })
</script>