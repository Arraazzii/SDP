<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-stats">
                    <?php
                    if ($status_pp == NULL){ ?>
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <p class="card-category">Status :</p>
                        <h3 class="card-title">None</h3>
                    </div>
                    <?php }else{
                        if ($status_pp[0]['status_pp'] == 0){?>
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Baru</h3>
                        </div>
                        <?php }elseif($status_pp[0]['status_pp'] == 1){?>
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Perbarui</h3>
                        </div>
                        <?php }elseif($status_pp[0]['status_pp'] == 2){?>
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">warning</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Kadaluarsa</h3>
                        </div>
                        <?php }
                    }
                    ?>
                    <div class="card-body">
                        Peraturan Perusahaan (PP)
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="<?php echo base_url();?>User/pp">View More</a><i class="material-icons">arrow_right_alt</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-stats">
                    <?php
                    if ($status_pkb == NULL){ ?>
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <p class="card-category">Status :</p>
                        <h3 class="card-title">None</h3>
                    </div>
                    <?php }else{
                        if ($status_pkb[0]['status_pkb'] == 0){?>
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Baru</h3>
                        </div>
                        <?php }elseif($status_pkb[0]['status_pkb'] == 1){?>
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Perbarui</h3>
                        </div>
                        <?php }elseif($status_pkb[0]['status_pkb'] == 2){?>
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">warning</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Kadaluarsa</h3>
                        </div>
                        <?php }
                    }?>
                    <div class="card-body">
                        - (PKB)
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="<?php echo base_url();?>User/pkb">View More</a><i class="material-icons">arrow_right_alt</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-stats">
                    <?php
                    if ($status_lks == NULL){ ?>
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <p class="card-category">Status :</p>
                        <h3 class="card-title">None</h3>
                    </div>
                    <?php }else{
                        if ($status_lks[0]['status_lks'] == 0){?>
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Baru</h3>
                        </div>
                        <?php }elseif($status_lks[0]['status_lks'] == 1){?>
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Perbarui</h3>
                        </div>
                        <?php }elseif($status_lks[0]['status_lks'] == 2){?>
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">warning</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Kadaluarsa</h3>
                        </div>
                        <?php }
                    }?>
                    <div class="card-body">
                        LKS Bipartite
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="<?php echo base_url();?>User/lks">View More</a><i class="material-icons">arrow_right_alt</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-stats">
                    <?php
                    if ($status_k3 == NULL){ ?>
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <p class="card-category">Status :</p>
                        <h3 class="card-title">None</h3>
                    </div>
                    <?php }else{
                        if ($status_k3[0]['status_k3'] == 0){?>
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Baru</h3>
                        </div>
                        <?php }elseif($status_k3[0]['status_k3'] == 1){?>
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Perbarui</h3>
                        </div>
                        <?php }elseif($status_k3[0]['status_k3'] == 2){?>
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">warning</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Kadaluarsa</h3>
                        </div>
                        <?php }
                    }?>
                    <div class="card-body">
                        - (K3)
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="<?php echo base_url();?>User/k3">View More</a><i class="material-icons">arrow_right_alt</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-stats">
                    <?php
                    if ($status_wlkp == NULL){ ?>
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <p class="card-category">Status :</p>
                        <h3 class="card-title">None</h3>
                    </div>
                    <?php }else{
                        if ($status_wlkp[0]['status_wlkp'] == 0){?>
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Baru</h3>
                        </div>
                        <?php }elseif($status_wlkp[0]['status_wlkp'] == 1){?>
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">check</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Perbarui</h3>
                        </div>
                        <?php }elseif($status_wlkp[0]['status_wlkp'] == 2){?>
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">warning</i>
                            </div>
                            <p class="card-category">Status :</p>
                            <h3 class="card-title">Kadaluarsa</h3>
                        </div>
                        <?php }
                    }?>                    <div class="card-body">
                        - (WLKP)
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="<?php echo base_url();?>User/wlkp">View More</a><i class="material-icons">arrow_right_alt</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>