<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Report LKS</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
  <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/custom/js/main.js"></script>
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
                foreach($data_lks as $key => $value) {
                  if ($value->status == ''){
                    $total += $value->status== '';
                  }
                }
                echo "Kosong : $total,";
                ?>

                <?php
                $total = 0;
                foreach($data_lks as $key => $value) {
                  if ($value->status == 0){
                    $total += $value->status==0;
                  }
                }
                echo "Baru : $total,";
                ?>

                <?php
                $total = 0;
                foreach($data_lks as $key => $value) {
                  if ($value->status == 1){
                    $total += $value->status==1;
                  }
                }
                echo "Perbarui : $total,";
                ?>

                <?php
                $total = 0;
                foreach($data_lks as $key => $value) {
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
                  <?php $i = 1; foreach ($data_lks as $lks) : ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $lks->nama_perusahaan ?></td>
                    <td><?php echo $lks->no_dokumen ?></td>
                    <td><?php echo $lks->no_registrasi ?></td>
                    <td><?php
                    if ($lks->status == 0) {
                      echo "Baru";
                    } elseif ($lks->status == 1) {
                      echo "Perbarui";
                    } elseif ($lks->status == 2) {
                      echo "Kadaluwarsa";
                    }
                    ?>
                  </td>
                </tr>
                <?php $i++?>
              <?php endforeach ?>
            </tbody>
          </table>
          <?php 
          $total9 = 0;
          foreach($data_lks as $key => $value) {
            if ($value->status == ''){
              $total9 += $value->status=='';
            }
          }

          $total1 = 0;
          foreach($data_lks as $key => $value) {
            if ($value->status == 0){
              $total1 += $value->status==0;
            }
          }

          $total2 = 0;
          foreach($data_lks as $key => $value) {
            if ($value->status == 1){
              $total2 += $value->status==1;
            }
          }

          $total3 = 0;
          foreach($data_lks as $key => $value) {
            if ($value->status == 2){
              $total3 += $value->status==2;
            }
          }
          echo "<span class='pull-right'>Jumlah : " .intval($total3 + $total2 + $total1 + $total9). " Data </span>";
          ?>
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->
</div>
</body>
</html>
