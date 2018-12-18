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
                            <li class="active">Perusahaan</li>
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
                                <strong class="card-title">Data Perusahaan</strong>
                                <a href="<?php echo base_url(); ?>Admin/print_perusahaan" target="_blank"><button type="button" class="btn btn-outline-primary float-right"><i class="fa fa-print"></i>&nbsp; Print</button></a>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="tableFilter">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Pimpinan</th>
                                            <th>Alamat</th>
                                            <th>No. Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($data_perusahaan as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->nama_perusahaan; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td><?php echo $row->alamat; ?></td>
                                            <td><?php echo $row->no_telpon; ?></td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/perusahaan_detail/<?php echo $row->kode_perusahaan; ?>"><button type="button" class="btn btn-outline-primary">Detail</button></a>
                                                <a href="<?php echo base_url(); ?>Admin/nonaktif/<?php echo $row->kode_perusahaan; ?>">
                                                <button type="button" class="btn btn-outline-danger">Nonaktifkan</button>
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
        </div><!-- .content -->
        <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/assets_user/dataTable/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/assets_user/dataTable/bootstrap.dataTables.min.js"></script>
        <script type="text/javascript">
            $('#tableFilter').DataTable();
        </script> 