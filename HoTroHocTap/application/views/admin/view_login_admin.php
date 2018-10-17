<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập hệ thống</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  	<script src="../bootstrap/js/jquery.min.js"></script>
  	<script src="../bootstrap/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
  	<link rel="stylesheet" type="text/css" href="../bootstrap/css/login_admin.css">
</head>
<body style="background-color: #33CC66	">
<div class="container-fluid">
	<h1 class="form-heading">Đăng nhập Hệ thống</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Admin Login</h2>
   <p>Please enter your username and password</p>
   </div>
    <form id="Login" action="<?php echo base_url().'admin/clogin_admin/login' ?>" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" id="inputEmail" placeholder="Username" name="tentaikhoan" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="matkhau" required>
        </div>
        <div class="forgot">
        <a href="reset.html">Forgot password?</a>
		    </div>
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