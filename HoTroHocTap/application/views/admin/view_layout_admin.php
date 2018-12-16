<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BK-Learn Admin</title>
    <!-- Core CSS - Include with every page -->

    <link href="<?php echo base_url(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/bootstrap/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    
    <link href="<?php echo base_url(); ?>/bootstrap/assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/bootstrap/assets/css/main-style.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>/bootstrap/assets/plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>/bootstrap/assets/plugins/bootstrap/bootstrap.min.js"></script>
    
    <script src="<?php echo base_url(); ?>/bootstrap/js/jquery.min.js"></script>


   <script src="<?php echo base_url(); ?>/bootstrap/js/jquery.dataTables.min.js"></script>  
    <script src="<?php echo base_url(); ?>/bootstrap/js/dataTables.bootstrap.min.js"></script>            
    <link rel="stylesheet" href="<?php echo base_url(); ?>/bootstrap/css/dataTables.bootstrap.min.css" />  

    <script>
        setTimeout(function(){
        $('#thongbao').hide(1000);
        },2000);
    </script>
    <script src="<?php echo base_url(); ?>/bootstrap/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>/bootstrap/ckfinder/ckfinder.js"></script>

</head>
<body>
    <!--  wrapper -->
    <div id="wrapper" >
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin/chome_admin'); ?>">
                    <h2 style="color: white;">BK-Learn</h2>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-warning" id="so_cau" >5</span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    <ul class="dropdown-menu dropdown-alerts">
                        <!-- <li>
                            <a href="<?php echo base_url('admin/cdanhmuctintuc/getNewQuesList') ?>">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <i class="fa fa-comment fa-fw"></i>
                                    </div>
                                     <div class="col-sm-5" >
                                    1 comment
                                    </div>
                                    <div class="col-sm-5">
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </div>
                            </a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url('admin/cdanhmuctintuc/getNewQuesList') ?>">
                                <div class="row">
                                    <div class="col-sm-2">
                                    <i class="glyphicon glyphicon-question-sign" ></i> 
                                    </div>
                                    <div class="col-sm-5" id="so_cau_hoi_moi">
                                    1 câu hỏi mới
                                    </div>
                                    <div class="col-sm-5">
                                    <span class="pull-right text-muted small" id="thoi_gian_hoi">12 minutes ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- <li class="divider"></li> -->
                        <!-- <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i>Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i>New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i>Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li> -->
                        <!-- <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li> -->
                    </ul>
                    <!-- end dropdown-alerts -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>
                            <?php echo $this->session->userdata('Ahoten'); ?></a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('admin/clogout_admin');?>">
                            <i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
       <?php
            $maquyen = $this->session->userdata('maquyen');
            if($maquyen == 'giaovien')
            {
                $this->load->view('admin/view_left_giangvien');
            }
            if($maquyen == 'admin')
            {
                $this->load->view('admin/view_left_admin');
            }
       ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper" style="background-color: #EEEEEE;">

        <?php
            if(isset($content))
            {
                $this->load->view($content);
            }
        ?>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
    
    <script type="text/javascript">
        function confirmAction(){
        return confirm("Xác nhận xóa?");
        }
    </script>


    <?php 
    if($this->session->flashdata('message')!=''):
        $message = $this->session->flashdata('message');
    ?>
    <script type="text/javascript">
        alert('<?php echo $message; ?>');
    </script>
    <?php endif; ?>

</body>
<script type="text/javascript">
$(document).ready(function(){
    function load_unseen_notification(view = '')
    {
     
    //  var user_name = $("input#name_id").val();
    // var password = $("input#pwd_id").val();
    var user_name= "A";
    var password = "b";
      $.ajax({
            type: 'get',
            url: "<?php echo base_url('admin/cdanhmuctintuc/getNotifyList') ?>",
            data: $('#form').serialize(),
            success: function (data) {
                
                var json = JSON.parse(data);
                document.getElementById('so_cau_hoi_moi').innerHTML= " "+json.so_cau_hoi_moi+" câu hỏi mới";
                document.getElementById("thoi_gian_hoi").innerHTML= json.thoi_gian_hoi;
                document.getElementById("so_cau").innerHTML=json.so_cau_hoi_moi;
                console.log(json.thoi_gian_hoi);

                // console.log(data);
              //   $('#newemail').html(email);
              //   $('#newhoten').html(hoten);
              //   $('#newngaysinh').html(ngaysinh);
              //   if(gioitinh == 'nam'){
              //       $('#newgioitinh').html("Nam");
              //   }else{
              //       $('#newgioitinh').html("Nữ");
              //   }
                
              // $("#formsua").hide();
              // alert(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Có lỗi khi load dữ liệu');
            }

          });

    }
    load_unseen_notification();
    
});
</script>
</html>

