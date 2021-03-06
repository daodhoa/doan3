<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>BK-LEARN online</title>
		<!-- Loading third party fonts -->
		
		<link href="<?php echo base_url('bootstrap/sinhvien/'); ?>fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="<?php echo base_url('bootstrap/sinhvien/'); ?>style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
		 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url('bootstrap');?>/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="<?php echo base_url('bootstrap');?>/js/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="<?php echo base_url('bootstrap');?>/js/bootstrap.min.js"></script> 
		

	</head>


	<body>
		
		<div id="site-content">
			<header class="site-header">
				<div class="primary-header">
					<div class="container">
						<a href="<?php echo base_url(); ?>" id="branding">
							<img src="<?php echo base_url('bootstrap/sinhvien/'); ?>images/logo.png" alt="Lincoln high School">
							<h1 class="site-title">BK-LEARN</h1>
						</a> <!-- #branding -->
						
						<div class="main-navigation">
							<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="menu-item "><a href="<?php echo base_url('chome'); ?>">Home</a></li>
								<li class="menu-item"><a href="<?php echo base_url('cmonhoc'); ?>">Môn học</a></li>
								
								
								<?php if($this->session->userdata('hoten')!= '' ): ?>
								<li class="menu-item dropdown">
  									<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> </span><?php echo $this->session->userdata('hoten'); ?><span class="caret"></span> </a>
  										<ul class="dropdown-menu duyhoa-ulli">
    									<li><a href="<?php echo base_url('csinhvien') ?>">Xem thông tin</a></li>
    									<li><a href="<?php echo base_url('clogout'); ?>">Đăng xuất</a></li>
 									 	</ul>
								</li>
								<?php else: ?>
								<li class="menu-item">
									<a href="<?php echo base_url('clogin'); ?>#login">Đăng nhập</a>
								</li>
							<?php endif; ?>
							</ul> <!-- .menu -->
						</div> <!-- .main-navigation -->

						<div class="mobile-navigation"></div>
					</div> <!-- .container -->
				</div> <!-- .primary-header -->
	
				<?php
				if (isset($slide)) {
					$this->load->view($slide);
				}	
				?>				
			</header>
		</div>

		<main class="main-content">
			<?php 
				if (isset($content)) {
					$this->load->view($content);
				}
			?>
		</main>

		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="widget">
							<h3 class="widget-title">Liên hệ</h3>
							<address>Đại học Bách Khoa Hà Nội <br>Số 17 Giải Phóng <br></address>

							<a href="">duyhoa.dao@gmail.com</a> <br>
							<a href="">(489) 42652394324</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="widget">
							<h3 class="widget-title">Mạng xã hội</h3>
							<p>Tham gia cùng chúng tôi</p>
							<div class="social-links circle">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="widget">
							<h3 class="widget-title">Featured students</h3>
							
						</div>
					</div>
					<div class="col-md-3">
						<div class="widget">
							<h3 class="widget-title">Newsletter</h3>
						</div>
					</div>
				</div>

				<div class="copy">Copyright 2018 Our School. All rights reserved.</div>
			</div>

		</footer>

		<script src="<?php echo base_url('bootstrap/sinhvien/'); ?>js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo base_url('bootstrap/sinhvien/'); ?>js/plugins.js"></script>
		<script src="<?php echo base_url('bootstrap/sinhvien/'); ?>js/app.js"></script>
		
		<?php 
	    if($this->session->flashdata('message')!=''):
	        $message = $this->session->flashdata('message');
	    ?>
	    <script type="text/javascript">
	        alert('<?php echo $message; ?>');
	    </script>
	    <?php endif; ?>
	</body>

</html>