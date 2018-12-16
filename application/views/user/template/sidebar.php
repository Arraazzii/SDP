<div class="sidebar" data-color="azure" data-background-color="white" data-image="<?php echo base_url();?>assets/assets_user/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
      -->
      <div class="logo">
        <a href="" class="simple-text logo-normal">
          LOGO
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li <?php if($this->uri->segment(1) == "User" && $this->uri->segment(2) == "" || $this->uri->segment(1) == "User" && $this->uri->segment(2) == "setting"){ echo " class=\"nav-item active\"";}; ?> class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>User">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li <?php if($this->uri->segment(1) == "User" && $this->uri->segment(2) == "user"){ echo " class=\"nav-item active\"";}; ?> class="nav-item  ">
            <a class="nav-link" href="<?php echo base_url();?>User/user">
              <i class="material-icons">person</i>
              <p>Profil User</p>
            </a>
          </li>
          <li <?php if($this->uri->segment(1) == "User" && $this->uri->segment(2) == "pp"){ echo " class=\"nav-item active\"";}; ?> class="nav-item  ">
            <a class="nav-link" href="<?php echo base_url();?>User/pp">
              <i class="material-icons">arrow_right_alt</i>
              <p>PP</p>
            </a>
          </li>
          <li <?php if($this->uri->segment(1) == "User" && $this->uri->segment(2) == "pkb"){ echo " class=\"nav-item active\"";}; ?> class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>User/pkb">
              <i class="material-icons">arrow_right_alt</i>
              <p>PKB</p>
            </a>
          </li>
          <li<?php if($this->uri->segment(1) == "User" && $this->uri->segment(2) == "lks"){ echo " class=\"nav-item active\"";}; ?> class="nav-item ">
          <a class="nav-link" href="<?php echo base_url();?>User/lks">
            <i class="material-icons">arrow_right_alt</i>
            <p>LKS Bipartite</p>
          </a>
        </li>
        <li <?php if($this->uri->segment(1) == "User" && $this->uri->segment(2) == "k3"){ echo " class=\"nav-item active\"";}; ?> class="nav-item ">
          <a class="nav-link" href="<?php echo base_url();?>User/k3">
            <i class="material-icons">arrow_right_alt</i>
            <p>K3</p>
          </a>
        </li>
        <li <?php if($this->uri->segment(1) == "User" && $this->uri->segment(2) == "wlkp"){ echo " class=\"nav-item active\"";}; ?> class="nav-item ">
          <a class="nav-link" href="<?php echo base_url();?>User/wlkp">
            <i class="material-icons">arrow_right_alt</i>
            <p>WLKP</p>
          </a>
        </li>
      </ul>
    </div>
  </div>