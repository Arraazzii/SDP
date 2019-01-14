            <div class="content">
                <div class="container-fluid">
                    <?php echo $this->session->flashdata('notif') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">Edit Password</h4>
                                    <p class="card-category">Ubah Password Anda</p>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('User/changePassword');?>" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Password Lama</label>
                                                    <input type="password" class="form-control" name="password_lama" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Password Baru</label>
                                                    <input type="password" class="form-control" name="password_baru" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Konfirmasi Password Baru</label>
                                                    <input type="password" class="form-control" name="confirm_password" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info pull-right">Perbarui Password</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>