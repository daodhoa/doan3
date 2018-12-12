 <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="<?php echo base_url(); ?>/bootstrap/assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><?php echo $this->session->userdata('Ahoten'); ?></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('admin/csinhvien'); ?>"><i class="fa fa-table fa-fw"></i>Quản lý sinh viên</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/cgiangvien'); ?>"><i class="fa fa-table fa-fw"></i>Quản lý giảng viên</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/chocky'); ?>"><i class="fa fa-table fa-fw"></i>Học kỳ</a>
                    </li>
                    
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>