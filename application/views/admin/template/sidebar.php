    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#"><h3>Disnaker</h3></a>
                <a class="navbar-brand hidden" href="#"><h3>D</h3></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li <?php if($this->uri->segment(1) == "Admin" && $this->uri->segment(2) == ""){ echo " class=\"active\"";}; ?>>
                        <a href="<?php echo base_url();?>Admin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Verifikasi</h3><!-- /.menu-title -->
                    <li <?php if($this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "userbaru"){ echo " class=\"active\"";}; ?>><a href="<?php echo base_url();?>Admin/userbaru"><i class="menu-icon ti-help"></i>Perusahaan Baru<span class="badge badge-primary"><?php echo $notif_perusahaan_baru; ?></span></a></li>
                    <h3 class="menu-title">Data</h3><!-- /.menu-title -->
                    <li <?php if($this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "perusahaan" || $this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "perusahaan_detail"){ echo " class=\"active\"";}; ?>>
                        <a href="<?php echo base_url();?>Admin/perusahaan"> <i class="menu-icon ti-layout-column4-alt"></i>Perusahaan</a>
                    </li>
                    <li <?php if($this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "wlkp_perusahaan" || $this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "wlkp_perusahaan_detail"){ echo " class=\"active\"";}; ?>>
                        <a href="<?php echo base_url();?>Admin/wlkp_perusahaan"> <i class="menu-icon ti-layout-column4-alt"></i>WLKP Perusahaan</a>
                    </li>
                    <h3 class="menu-title">Laporan</h3><!-- /.menu-title -->
                    <li <?php if($this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "rekap_pp" || $this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "rekap_pkb" || $this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "rekap_lks" || $this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "rekap_k3" || $this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "rekap_wlkp"){ echo " class=\"menu-item-has-children dropdown show\"";}; ?> class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-bookmark-alt"></i>Rekapitulasi</a>
                        <ul <?php if($this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "rekap_pp" || $this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "rekap_pkb" || $this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "rekap_lks" || $this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "rekap_k3" || $this->uri->segment(1) == "Admin" && $this->uri->segment(2) == "rekap_wlkp"){ echo " class=\"sub-menu children dropdown-menu show\"";}; ?> class="sub-menu children dropdown-menu ">
                            <li><i class="ti-arrow-right"></i><a href="<?php echo base_url();?>Admin/rekap_pp">PP</a></li>
                            <li><i class="ti-arrow-right"></i><a href="<?php echo base_url();?>Admin/rekap_pkb">PKB</a></li>
                            <li><i class="ti-arrow-right"></i><a href="<?php echo base_url();?>Admin/rekap_lks">LKS Bipartite</a></li>
                            <li><i class="ti-arrow-right"></i><a href="<?php echo base_url();?>Admin/rekap_k3">K3</a></li>
                            <li><i class="ti-arrow-right"></i><a href="<?php echo base_url();?>Admin/rekap_wlkp">WLKP</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->