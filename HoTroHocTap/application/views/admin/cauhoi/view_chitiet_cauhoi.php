<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý câu hỏi</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="content-wrapper" id="add-form">

  <section class="content-header">
    
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/cdanhmuccauhoi'); ?>"><i class="fa fa-dashboard"></i>Quản lý câu hỏi</a></li>
      <li class="active">Chi tiết câu hỏi</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      	<div class="col-md-12">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<div class="row">
                		<div class="col-md-6">
                			<span>Môn Học: </span><?php echo $cauhoi['tenmon']; ?>
                		</div>
                		<div class="col-md-4">
                			<span>Mức độ: </span><?php echo $cauhoi['chuthich']; ?>
                		</div>
                	</div>
            	</div>
            	<div class="panel-body">
            		<h3><?php echo $cauhoi['noidung']; ?></h3>
            		<ul class="list-group">
            			<?php foreach ($cautraloi as $row):?>
            				<li class="list-group-item"><?php echo $row; ?></li>
            			<?php endforeach; ?>
            			<li class="list-group-item active">Đáp án: <?php echo $dapan['noidung'];?></li>
            		</ul>
            	</div>
            	
        	</div>
      	</div>
    </div><!-- /.row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->