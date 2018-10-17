<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BK-Learn Admin</title>
    <!-- Core CSS - Include with every page -->
    <link href="../bootstrap/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../bootstrap/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../bootstrap/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="../bootstrap/assets/css/style.css" rel="stylesheet" />
    <link href="../bootstrap/assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="../bootstrap/assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="../bootstrap/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    
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
                        <span class="top-label label label-warning">5</span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i>New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i>3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
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
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
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
                            <?php echo $this->session->userdata('hoten'); ?></a>
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
        <div id="page-wrapper" style="background-color: white;">

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

    <!-- Core Scripts - Include with every page -->
    <script src="../bootstrap/assets/plugins/jquery-1.10.2.js"></script>
    <script src="../bootstrap/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="../bootstrap/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../bootstrap/assets/plugins/pace/pace.js"></script>
    <script src="../bootstrap/assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="../bootstrap/assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="../bootstrap/assets/plugins/morris/morris.js"></script>
    <script src="../bootstrap/assets/scripts/dashboard-demo.js"></script>
    <script src="../bootstrap/js/jquery.min.js"></script>

</body>

</html>
