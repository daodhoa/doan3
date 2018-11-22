<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý đề thi</h1>
    </div>
                <!--End Page Header -->
</div>
<div class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/cdanhmucmathi'); ?>"><i class="fa fa-dashboard"></i> Quản lý đề thi</a></li>
      <li class="active">Xem bài làm - mã đề: <?php echo $madethi; ?></li>
    </ol>
  </section>
  <section class="content" id="vue">
    <div class="row" >
      <div class="col-md-2">
        <h4>Học kỳ: </h4>
      </div>
      <div class="col-md-3">
        <select class="form-control" id="sel1" v-model="hocky" v-on:change="ChonLopHoc" >
          <?php foreach($hocky as $row): ?>
            <option value="<?php echo $row['makyhoc']; ?>"><?php echo $row['tenkyhoc']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-2">
        <h4>Mã lớp: </h4>
      </div>
      <div class="col-md-3">
        <select class="form-control" id="malophoc" v-on:change="DanhSachBL" v-model="malophoc">
        </select>
      </div>
    </div>
    <!--
    <div class="row">
      <div class="alert alert-info" id="alert">
        <strong>Chưa chọn mã lớp!</strong>.
      </div>
    </div>
    -->

    <div class="row" id="danhsach" style="background-color: white; border-top-width: 3px;
    border-top-style: solid; margin-top: 5%;
    border-top-color: green; border-radius: 4px;" >
      <div class="box box-success" >
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách bài làm</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table class="table table-striped table-bordered table-hover" id="tableBL">
            <thead>
              <tr>
                <th class="text-center col-md-3">Mã sinh viên</th>
                <th class="text-center col-md-3">Thời gian nộp bài</th>
                <th class="text-center col-md-2">Số câu đúng</th>
                <th class="text-center col-md-2">Số điểm</th>
                <th class="text-center col-md-2">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
      
    </div>
  </section>
</div>

<script type="text/javascript" src="<?php echo base_url('bootstrap/js/vue.js'); ?>"></script>
<script type="text/javascript">
  var vm = new Vue({
    el: '#vue',
    data: {
      hocky: "",
      malophoc: ""
    },
    mounted: function(){
      $("#danhsach").hide();
    },
    methods: {
      ChonLopHoc: function(){
        $("#danhsach").hide();
        if(this.hocky != ""){
          var url = "<?php echo base_url('admin/Cdanhmucmathi/danhsachlop/'); ?>" + this.hocky + "/<?php echo $madethi; ?>" ;
          
          $.ajax({
            url : url,
            type : "GET",
            dataType: "JSON",
            success: function(data)
            {
              var toAppend = '<option value="">--Chọn lớp học--</option>';
              
              $.each(data,function(i,o){
                  toAppend += '<option value="'+o.id_lophoc+'">'+o.malophoc+'</option>';
              });
              $("#malophoc").empty().append(toAppend);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }

          });

        }
      },
      DanhSachBL: function(){
        if(this.malophoc != ""){
          
          var url = "<?php echo base_url('admin/Cdanhmucmathi/danhsachbailam/'.$madethi); ?>"+ "/" + this.malophoc;
         // console.log(url);
          
          $.ajax({
            url : url,
            type : "GET",
            dataType: "JSON",
            success: function(data)
            {
              var toAppend = '';
          
              $.each(data,function(i,o){
                  toAppend += '<tr><td class="text-center col-md-3">'+o.masinhvien+'</td><td class="text-center col-md-3">'+o.thoigiannopbai+'</td><td class="text-center col-md-2">'+o.socaudung+'</td><td class="text-center col-md-2">'+o.sodiem+'</td><td class="text-center col-md-2"><a href="<?php echo base_url('admin/cdanhmucmathi/xemchitietbailam/'.$madethi.'/') ?>'+o.masinhvien+'" class="btn btn-success btn-flat btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a> <button  class="btn btn-danger btn-flat btn-sm" title="đã bị hủy" ><i class="fa fa-times" aria-hidden="true"></i></button></td></tr>';
              });
              $("#tableBL tbody").empty().append(toAppend);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }

          });
          

          
          $('#danhsach').show();
        }else{
          $('#danhsach').hide();
        }
        
      }
    }
  })
</script>