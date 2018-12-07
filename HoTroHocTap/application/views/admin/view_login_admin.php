<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập hệ thống</title>
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
	
<div class="login-form" style="margin-top: 5%">
<div class="main-div">
    <div class="panel">
   <h2>Đăng nhập</h2>
   <p>Vui lòng nhập tên đăng nhập và mật khẩu</p>
   </div>
    <form id="Login" action="<?php echo base_url().'admin/clogin_admin/login' ?>" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" id="inputEmail" placeholder="Username" name="tentaikhoan" required value="<?php echo $this->input->post('tentaikhoan'); ?>">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="matkhau" required>
        </div>
        <div class="forgot">
        <a href="<?php echo base_url('admin/csignup_admin'); ?>">Đăng ký tài khoản</a>
		    </div>
        <?php 
        $error_login= $this->session->userdata('error_login');
        if($error_login != ''):?>
          <p style="color: red;"><?php echo $error_login; ?></p>
        <?php endif;
          $this->session->unset_userdata('error_login');
        ?>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="Đăng nhập">
        </div>
        <!--<button type="submit" class="btn btn-primary" name="submit">Login</button>-->
        
    </form>
 </div>
	<p class="botto-text"> Designed by DuyHoa</p>
</div>
</div>
</body>
</html>