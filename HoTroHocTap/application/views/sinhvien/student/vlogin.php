<div class="fullwidth-block" id="login">
				<div class="container">

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

					<div class="row">
						<div class="col-md-6">
							<div class="boxed-section request-form">
								<h2 class="section-title text-center">Đăng nhập</h2>
								<form method="POST" enctype="multipart/form-data">
									<div class="form-group">
									    <label for="email">Email:</label>
									    <input type="email" name="email" class="form-control" >
									</div>
									<div class="form-group">
									  <label for="pwd">Mật khẩu:</label>
									  <input type="password" name="matkhau" class="form-control">
									</div>
									<input type="submit" name="dangnhap" class="btn btn-default" value="Đăng nhập">
									<?php if($this->session->flashdata('error_login')!= ""): ?>
										<br/>
										<p style="color: red !important;">Sai tài khoản hoặc mật khẩu</p>
									<?php endif; ?>
								</form>
							</div> 
						</div>
						<div class="col-md-6">
							<div class="boxed-section request-form" style="background-color: #EEEEEE !important;">
								<h2 class="section-title text-center">Đăng ký</h2>
								<form method="POST" enctype="multipart/form-data">
									<div class="form-group">
									    <label for="email">Email: <span style="color: red;">*</span></label>
									    <input value="<?php echo $this->input->post('email'); ?>" type="email" name="email" class="form-control" >
									    <p style="color: red !important;"><?php echo form_error('email'); ?></p>
									</div>
									<div class="form-group">
									  <label for="pwd">Mật khẩu: <span style="color: red;">*</span></label>
									  <input type="password" value="<?php echo $this->input->post('matkhau'); ?>"  name="matkhau" class="form-control" >
									  <p style="color: red !important;"><?php echo form_error('matkhau'); ?></p>
									</div>
									<div class="form-group">
									  <label for="pwd">Nhập lại mật khẩu: <span style="color: red;">*</span></label>
									  <input type="password" value="<?php echo $this->input->post('rematkhau'); ?>" name="rematkhau" class="form-control" >
									  <p style="color: red !important;"><?php echo form_error('rematkhau'); ?></p>
									</div>
									<div class="form-group">
									    <label for="mssv">MSSV: <span style="color: red;">*</span></label>
									    <input type="text" value="<?php echo $this->input->post('masinhvien'); ?>" class="form-control" name="masinhvien" >
									    <p style="color: red !important;"><?php echo form_error('masinhvien'); ?></p>
									</div>
									<div class="form-group">
									    <label for="hoten">Họ tên: <span style="color: red;">*</span></label>
									    <input type="text" value="<?php echo $this->input->post('hoten'); ?>" class="form-control" name="hoten" >
									    <p style="color: red !important;"><?php echo form_error('hoten'); ?></p>
									</div>
									<div class="form-group">
									    <label for="ngaysinh">Ngày sinh: <span style="color: red;">*</span></label>
									    <input type="date" required value="<?php echo $this->input->post('ngaysinh'); ?>"" name="ngaysinh" class="form-control" id="ngaysinh">
									</div>
									<div class="form-group">
									    <label for="gioitinh">Giới tính: <span style="color: red;">*</span></label>
									    <div>
									    <label class="checkbox-inline"><input required type="radio" name="gioitinh" value="nam"> Nam
									    </label>
										<label class="checkbox-inline"><input type="radio" name="gioitinh" value="nu"> Nữ</label>
										</div>
									</div>
									<div class="form-group">
									    <label for="anhdaidien">Ảnh đại diện:</label>
									    <input type="file" value="<?php echo $this->input->post('anhdaidien'); ?>" name="anhdaidien" class="form-control" id="anhdaidien">
									</div>
									<input type="submit" name="dangky" value="Đăng ký" class="btn btn-default">
								</form>
							</div> 
						</div>
					</div>  <!-- .row -->

				</div> <!-- .container -->
			</div> <!-- .fullwidth-block -->	