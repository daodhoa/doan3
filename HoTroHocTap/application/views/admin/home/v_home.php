<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">
			<section class="content-header">
				<ol class="breadcrumb">
				<li><a href="<?php echo base_url('admin/chome_admin'); ?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
				</ol>
			</section>
        </h1>
    </div>
                <!--End Page Header -->
</div>
<div class="content-wrapper">
  <section class="content">
  	<div class="col-md-4 col-md-offset-4 text-center">
		
  		<?php if($this->session->userdata('maquyen') == 'admin'): ?>
		<h2>Xin chào quản trị viên <?php echo $this->session->userdata('Ahoten'); ?></h2>
		<?php else: ?>
			<h2>Xin chào giảng viên <?php echo $this->session->userdata('Ahoten'); ?></h2>
		<?php endif; ?>
		<p style="font-size: 18px;">Chào mừng bạn đến với BK-LEARN</p>
  	</div>
  </section>
</div>