    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <div class="dropdown for-notification">
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="label label-pill label-danger count" style="border-radius:10px;">
                                        <span class="badge badge-danger"><?php echo $notif_perusahaan_baru; ?></span>
                                    </span> 
                                    <span class="fa fa-bell" style="font-size:18px;">
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if ($detail_notifikasi == NULL) {
                                    ?>
                                        <li>
                                            <a class="dropdown-item media" href="<?php echo base_url();?>Admin/userbaru">
                                                <i class="fa fa-user"></i>
                                                <p>PENGAJUAN PERUSAHAAN BARU KOSONG</p>
                                            </a>
                                        </li>
                                    <?php }else{ 
                                        foreach ($detail_notifikasi as $notifications) {
                                        ?>
                                    <li>
                                        <a class="dropdown-item media" href="<?php echo base_url();?>Admin/userbaru">
                                            <i class="fa fa-user"></i>
                                            <p><?php echo $notifications['nama_perusahaan']; ?> Mendaftar Sebagai Perusahaan Baru</p>
                                        </a>
                                    </li>
                                    <?php } } ?>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url();?>assets/images/admin.jpg" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <!-- <a class="nav-link" href="<?php echo base_url();?>Admin/setting_email"><i class="fa fa-envelope"></i> Mail Setting</a> -->
                            <a class="nav-link" href="<?php echo base_url(); ?>Login/logout"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                    <!--                     <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </header><!-- /header -->