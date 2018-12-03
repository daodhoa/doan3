<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký tài khoản</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>/bootstrap/css/bootstrap.min.css">
  	<script src="<?php echo base_url(); ?>/bootstrap/js/jquery.min.js"></script>
  	<script src="<?php echo base_url(); ?>/bootstrap/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/bootstrap/css/style.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/bootstrap/css/login_admin.css">
</head>
<body style="background-color: #33CC66	">
<div class="container-fluid">
  <?php if(isset($message)): ?>
    <?php if($message['kieu'] == 1): ?>
    <div class="alert alert-info alert-dismissible">
    <?php else: ?>
    <div class="alert alert-warning alert-dismissible">
    <?php endif; ?>
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Thông báo: </strong> <?php echo $message['noidung']; ?>
    </div>
  <?php endif; ?>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Đăng ký</h2>
   <p>Vui lòng nhập đầy đủ thông tin</p>
   </div>
    <form id="Login"  method="POST">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="tentaikhoan" required value="<?php echo $this->input->post('tentaikhoan'); ?>">
            <p style="color: red"><?php echo form_error('tentaikhoan'); ?></p>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Mật khẩu" name="matkhau" required value="<?php echo $this->input->post('matkhau'); ?>" >
            <p style="color:red;"><?php echo form_error('matkhau'); ?></p>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="rematkhau" required value="<?php echo $this->input->post('rematkhau'); ?>" >
            <p style="color: red"><?php echo form_error('rematkhau'); ?></p>
        </div>
        <div class="form-group">
            <input type="text" class="form-control"  value="<?php echo $this->input->post('hoten'); ?>" placeholder="Họ tên" name="hoten" required>
            <p style="color: red;"><?php echo form_error('hoten'); ?></p>
        </div>
        <div class="forgot">
        <a href="<?php echo base_url('admin/Clogin_admin'); ?>">Quay lại trang đăng nhập</a>
		    </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="Đăng ký">
        </div>
        <!--<button type="submit" class="btn btn-primary" name="submit">Login</button>-->
        
    </form>
 </div>
	<p class="botto-text"> Designed by DuyHoa</p>
</div>
</div>
</body>
</html>