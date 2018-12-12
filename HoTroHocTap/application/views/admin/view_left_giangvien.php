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
                                <div><?php echo $this->session->userdata('hoten'); ?></strong></div>
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
                        <a href= "<?php echo base_url().'admin/cdanhmucmonhoc' ;?>"><i class="fa fa-flask fa-fw"></i>Quản lý môn học</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/cdsbaigiang'); ?>"><i class="fa fa-table fa-fw"></i>Quản lý bài giảng</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/cdanhmuccauhoi' ;?>"><i class="fa fa-table fa-fw"></i>Quản lý câu hỏi</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/cdanhmucmathi'); ?>"><i class="fa fa-table fa-fw"></i>Quản lý đề thi</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/cdanhmuctintuc/danhsachtintuc/0/0' ;?>"><i class="fa fa-table fa-fw"></i>Quản lý tin tức</a>
                    </li>

                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>