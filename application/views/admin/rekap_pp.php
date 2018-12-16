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
          <li>Laporan</li>
          <li class="active">Rekapitulasi PP</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Data PP Perusahaan</strong>
          </div>
          <div class="card-body">
            <table id="tableFilter" class="table table-striped table-bordered">
              <div class="row">
                <form class="form-inline" action="<?php echo base_url()?>Admin/report_pp" target="_blank" method="post" style="width:100%;">
                  <div class="col-sm-1">
                    <div class="form-group">
                      <label for=""> status</label>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <select class="form-control" name="status">
                      <option value=""> pilih status</option>
                      <option value="0">Baru</option>
                      <option value="2">Kadaluarsa</option>
                      <option value="1">Perbarui</option>
                    </select>
                  </div>
                  <div class="col-sm-1">
                    <span> periode </span>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" type="date" name="tgl_awal" value="">
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <label for="">sampai</label>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="date" name="tgl_akhir" value="">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-outline-primary float-right"><i class="fa fa-print"></i>&nbsp; Print</button>
                  </div>
                </form>
              </div>
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Perusahaan</th>
                  <th>No. Registrasi</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($rekap_pp as $row) {
                 ?>
                 <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->nama_perusahaan; ?></td>
                  <td><?php echo $row->no_registrasi; ?></td>
                  <td>1</td>
                  <td><?php 
                  if ($row->status == '0') {
                   echo "<span class='badge badge-info'>Baru</span> ";
                 } elseif ($row->status == '1') {
                  echo "<span class='badge badge-primary'>Perbarui</span> ";
                } elseif ($row->status == '2') {
                  echo "<span class='badge badge-danger'>Kadaluarsa</span> ";
                }
                ?> 
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div><!-- .animated -->
</div>
<script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets_user/dataTable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets_user/dataTable/bootstrap.dataTables.min.js"></script>
<script type="text/javascript">
  $('#tableFilter').DataTable();
</script> 