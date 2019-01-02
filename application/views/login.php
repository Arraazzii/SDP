<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="description" content="Disnaker - Login Perusahaan">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/apple-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/custom/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark">
    <?=$this->session->flashdata('notif')?>
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="#">
                        <h2 class="text-light">DISNAKER KOTA DEPOK</h2>
                    </a><br>
                </div>
                <div class="login-form">
                    <form action="<?php echo base_url(); ?>Login/auth_login" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="user" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="pass">
                        </div>
                        <!-- <div class="checkbox">
                            <label>
                                <input type="checkbox"> Ingat Saya
                            </label>
                            <label class="pull-right">
                                <a href="#">Lupa Password?</a>
                            </label>

                        </div> -->
                        <input type="submit" name="login" class="btn btn-info btn-flat m-b-30 m-t-30" value="Sign in"> 
                        <div class="register-link m-t-15 text-center mt-3">
                            <p>Tidak Punya Akun ? <a href="<?php echo base_url();?>Home/register_page">Daftar</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/custom/js/main.js"></script>
</body>

</html>
<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Just For Example</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <a href="<?php echo base_url();?>Admin/"><button type="button" class="btn btn-outline-primary">Admin</button></a>
                    </div>
                    <div class="col-6">
                        <a href="<?php echo base_url();?>User/"><button type="button" class="btn btn-outline-primary">User</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>