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
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/apple-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/custom/css/style.css">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/assets_user/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/assets_user/img/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?php echo base_url();?>assets/assets_user/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url();?>assets/assets_user/demo/demo.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />    
    <style type="text/css">
        a:link {color:black; text-decoration: none;}
        a:hover {color:gold; text-decoration: none;}
    </style>
</head>

<body class="bg-light">
    <?=$this->session->flashdata('notif')?>
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">info</i>
                                </div>
                                <p class="card-category">Status Akun :</p>
                                <h3 class="card-title">Belum Aktif</h3>
                            </div>                           
                            <div class="card-body">
                                Akun Anda Belum Aktif, Silahkan Tunggu.
                            </div>
                            <div class="card-footer">
                                <div class="stats ">
                                    <i class="material-icons">arrow_left</i><a href="<?php echo base_url();?>Home">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
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