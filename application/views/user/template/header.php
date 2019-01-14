            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#pablo">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="material-icons">notifications</i>
                              <span class="notification"><?php echo $count_notif_user;?></span>
                              <p class="d-lg-none d-md-block">
                                Notification
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <?php if ($notif_view == NULL) {?>
                                <a class="dropdown-item" href="#" >NOTIFIKASI KOSONG</a>
                           <?php }else{ ?>
                            <?php foreach($notif_view as $notif_view) {?>
                           
                                <a class="dropdown-item" id="push_dokumen_<?php echo $notif_view['no_registrasi'];?>" href="#" >Berkas <?php echo $notif_view['no_registrasi'];?>&nbsp; <span class="badge badge-danger">KADALUARSA</span></a>
                            <?php } }?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="" id="abc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="material-icons">person</i>
                          <p class="d-lg-none d-md-block">
                            Akun
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="abc">
                        <a class="dropdown-item" href="<?php echo base_url();?>User/setting">Pengaturan</a>
                        <a class="dropdown-item" href="<?php echo base_url();?>Login/logout">Keluar</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
            <!-- End Navbar -->
