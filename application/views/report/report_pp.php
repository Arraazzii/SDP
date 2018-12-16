<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Report K3</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?></title>
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/apple-icon.png">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/favicon.ico">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/themify-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/selectFX/css/cs-skin-elastic.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/custom/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/custom/js/main.js"></script>
  <!--  Chart js -->
  <script src="<?php echo base_url();?>assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/custom/js/init-scripts/chart-js/chartjs-init.js"></script>
</head>
<body onload="window.print(); window.history.back();">
  <div class="content mt-3">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="text-center">
                <?php 
                $total = 0;
                foreach($data_pp as $key => $value) {
                  if ($value->status == 0){
                    $total += $value->status==0;
                  }
                }
                echo "Baru : $total,";
                ?>

                <?php 
                $total = 0;
                foreach($data_pp as $key => $value) {
                  if ($value->status == 1){
                    $total += $value->status==1;
                  }
                }
                echo "Perbarui : $total,";
                ?>

                <?php 
                $total = 0;
                foreach($data_pp as $key => $value) {
                  if ($value->status == 2){
                    $total += $value->status==2;
                  }
                }
                echo "Kadaluarsa : $total";
                ?>
              </div>
              <br>
              <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Perusahaan</th>
                    <th>No. Dokumen</th>
                    <th>No. Registrasi</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; foreach ($data_pp as $pp) : ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $pp->nama_perusahaan ?></td>
                    <td><?php echo $pp->no_dokumen ?></td>
                    <td><?php echo $pp->no_registrasi ?></td>
                    <td><?php 
                    if ($pp->status == 0) {
                      echo "Baru";
                    } elseif ($pp->status == 1) {
                      echo "Perbarui";
                    } elseif ($pp->status == 2) {
                      echo "Kadaluwarsa";
                    }                                               
                    ?>
                  </td>
                </tr>
                <?php $i++?>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->
</div>
</body>
</html>
