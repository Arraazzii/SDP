        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li>Dashboard</li>
                            <li class="active">Email Setting</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->session->flashdata('notif') ?>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Email Setting</strong>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url();?>Admin/change_mail" method="post">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Example@exmaple.com" required="" value="<?php echo $email_setting[0]['email']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Nama Email</label>
                                                <input class="form-control" type="text" name="nama" placeholder="Example@exmaple.com" required="" value="<?php echo $email_setting[0]['nama']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Password Email</label>
                                                <input class="form-control" type="password" name="password" placeholder="Example@exmaple.com" required="" value="<?php echo $email_setting[0]['password']?>">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Password Akun Login</label>
                                                <input class="form-control" type="password" name="old_password" placeholder="*************" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="https://myaccount.google.com/u/1/lesssecureapps?pageId=none" target="_blank" class="badge badge-default">Silahkan Aktifkan Izin Kirim EMail Disini</a>
                                    <button type="submit" class="btn btn-success pull-right">Simpan</button>
                                </form>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->