<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý câu hỏi</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="row">
    <div class="col-lg-12">
        <button class="btn btn-primary" id="show-add-btn">Thêm câu hỏi</button>
        <div class="row">&nbsp;</div>
        
    </div>
</div>
<div class="content-wrapper" id="add-form">

  <section class="content-header">
    <h1>
      Import câu hỏi, đáp án
    </h1>
    <ol class="breadcrumb">
      <li><a href="{$url}trangchu"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Import câu hỏi, đáp án </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
        <!-- Thông báo-->
        <div class="col-md-12">
          <div class="row" id="thongbao">
            <?php if(!empty($this->session->flashdata('mes'))): 
              $mes= $this->session->flashdata('mes');
              ?>
            <div class="col-md-12">
              <div class="box box-<?php echo $mes['mau'];?> box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Thông báo</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php echo $mes['thongbao']; ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            <?php endif; ?>
          </div>
        </div>
        <!-- Thông báo-->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Import câu hỏi, đáp án</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <form action="<?php echo base_url('admin/cdanhmuccauhoi/them'); ?>" method="POST"  enctype="multipart/form-data" class="form-inline">
                <div class="col-md-12">
                  <div class="col-md-4">
                    <span><b>Chọn file excel *.xls</b></span>
                  </div>
                  <div class="col-md-4">
                    <input type="file" name="file_import">
                  </div>
                  <div class="col-md-4">
                    <button type="submit" name="import" value="import" class="btn btn-success btn-flat btn-sm">import<i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                  </div>
                </div>
              </form>
            </div>
            <br><br><br>
            <div class="row">
              <div class="col-md-12">
                <div class="alert alert-success flat" role="alert">
                  Chú ý: File Excel phải có định dạng .xls và theo một định dạng sau.<br>
                  - Dữ liệu sẽ được đọc từ dòng số 2 trong file excel, vì vậy cần loại bỏ những trường không cần thiết trước khi import.<br>
                  - Thứ tự các cột: [A]-Mã môn( xem ở danh mục môn), [B]-Mã loại câu hỏi(de,tbinh,kho), [C]-Nội dung câu hoi, [D]->[I]-Nội dung câu trả lời, [J]->[O]-Ô đáp án đúng(từ D->I).
                  <br><a style="color: #3366CC" target="_blank" href="../attachment/files/ImportCauHoiFitHouQuiz.xls">Download file excel mẫu</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<div class="row" >
	<div class="col-lg-12">
		<div class="panel panel-default">
                        <div class="panel-heading">
                             Danh sách câu hỏi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tbl-cauhoi">
                                    <thead>
                                        <tr>
                                            <td>Mã</td> 
                                            <td>Môn học</td>
                                            <td>Độ khó</td>
                                            <td>Nội dung</td>
                                            <td>Thao tác</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($records->result() as $row):?>
											<tr>
												<td><?php echo($row->macauhoi);?></td>
												<td><?php echo($row->tenmon); ?></td>
												<td><?php echo($row->chuthich); ?></td>
												<td><?php echo($row->noidung); ?></td>
												<td>
                          <a href="<?php echo base_url('admin/cdanhmuccauhoi/xem?macauhoi='.$row->macauhoi); ?>"><span class="glyphicon glyphicon-th-list"></span></a>
                          <a href="<?php echo base_url('admin/cdanhmuccauhoi/sua?macauhoi='.$row->macauhoi); ?>"><span class="glyphicon glyphicon-edit"></span></a>
												  <a onclick="return confirmAction()" href="<?php echo  base_url('admin/cdanhmuccauhoi/xoa?macauhoi='.$row->macauhoi); ?>"><span class="glyphicon glyphicon-remove"></span></a>

												</td>
											</tr>
										<?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

	</div>
</div>


<script type="text/javascript">
	$(document).ready(function (){
        $('#tbl-cauhoi').DataTable(
        {
          "language" :{
            "lengthMenu": "Hiển thị _MENU_ bản ghi/trang",
            "info": "Trang _PAGE_ trên _PAGES_",
            "search" : "Tìm kiếm",
            "paginate": {
              "previous": "Trang trước",
              "next" : "Trang sau"
            }
          }

        }
        );
        $("#add-form").hide();
       
    });

    $("#show-add-btn").click(function(){
        $("#add-form").toggle();
    });

</script>


