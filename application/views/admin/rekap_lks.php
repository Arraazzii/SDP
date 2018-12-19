<style type="text/css">
    .form-control{
        width: 100% !important;
    }
</style>
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
                    <li class="active">Rekapitulasi LKS</li>
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
                        <strong class="card-title">Data LKS Perusahaan</strong>
                    </div>
                    <div class="card-body">
                       <form class="form-inline" action="<?php echo base_url()?>Admin/report_lks" target="_blank" method="post">
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>Periode</label>
                        <input class="form-control" type="date" name="tgl_awal" value="">
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>Sampai</label>
                        <input class="form-control" type="date" name="tgl_akhir" value="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-outline-primary float-right"><i class="fa fa-print"></i>&nbsp; Print</button>
                    </div>
                </form>
  <table id="tableFilter" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Perusahaan</th>
            <th>No. Registrasi</th>
            <th>No. Dokumen</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($rekap_lks as $row) {
           ?>
           <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->nama_perusahaan; ?></td>
            <td><?php echo $row->no_registrasi; ?></td>
            <td><?php echo $row->no_dokumen; ?></td>
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
