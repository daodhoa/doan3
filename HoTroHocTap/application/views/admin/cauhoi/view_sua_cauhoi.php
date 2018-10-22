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
      <li class="active">Sửa câu hỏi</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      	<div class="col-md-12">
          <form method="POST" class="form-horizontal">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<div class="row">
                		<div class="col-md-6">
                			<span>Môn Học: </span><?php echo $cauhoi['tenmon']; ?>
                		</div>
                		<div class="col-md-4">
                			<!--<span>Mức độ: </span><?php echo $cauhoi['chuthich']; ?>-->
                      <label class="col-sm-4">Mức độ:</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="mucdo">
                          <?php foreach($nhomcauhoi->result() as $row):?>
                            <?php if($row->manhom == $cauhoi['manhom'])
                                  {
                                    echo "<option value='".$row->manhom."' selected >
                                    ".$row->chuthich."</option>";
                                  }
                                  else
                                  {
                                    echo "<option value='".$row->manhom."' >
                                    ".$row->chuthich."</option>";
                                  }
                            ?>
                          <?php endforeach;?>
                        </select>
                      </div>
                		</div>
                	</div>
            	</div>
            	<div class="panel-body">
                <label class="">Câu hỏi:</label>
                  <div class="form-group">
                      <input style="font-size: 20px;" required type="text" class="form-control" name="noidung" value="<?php echo $cauhoi['noidung']; ?>">
                  </div>
            		<ul class="list-group">
            			<?php foreach ($cautraloi->result() as $row):?>
            				<li class="list-group-item">
                      <div class="form-group">
                        <input  required type="text" class="form-control" name="cautraloi[<?php echo $row->macautraloi?>]" value="<?php echo $row->noidung; ?>">
                      </div>
                    </li>
            			<?php endforeach; ?>
            			<li class="list-group-item">
                    <div class="form-group">
                      <label>Đáp án</label>
                      <select class="form-control" name="dapan">
                          <?php foreach($cautraloi->result() as $row):?>
                            <?php if($row->macautraloi == $dapan['macautraloi'])
                                  {
                                    echo "<option value='".$row->macautraloi."' selected >
                                    ".$row->noidung."</option>";
                                  }
                                  else
                                  {
                                    echo "<option value='".$row->macautraloi."' >
                                    ".$row->noidung."</option>";
                                  }
                            ?>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </li>
            		</ul>
            	</div>
              <div class="panel-footer"> 
                <input type="submit" name="sua" class="btn btn-success" value="Cập nhật">
                <input type="reset" class="btn btn-warning" value="Reset">
              </div>  
        	</div>
        </form>
      	</div>
    </div><!-- /.row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->