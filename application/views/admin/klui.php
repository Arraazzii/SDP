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
                                <strong class="card-title">Kode Klui</strong>
                                <a href="#" data-toggle="modal" title="Tambah Data" data-target="#myModal" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="tableFilter">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Klui</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($kode_klui as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->kode_klui; ?></td>
                                            <td><?php echo $row->dsk; ?></td>
                                            <td>
                                                <a href="#myModal<?php echo $row->kode_klui; ?>"><button type="button" data-toggle="modal" data-target="#myModal<?php echo $row->kode_klui; ?>" class="btn btn-outline-primary">Edit</button></a>
                                                <a href="<?php echo base_url(); ?>Admin/dlt_klui/<?php echo $row->kode_klui; ?>">
                                                <button type="button" class="btn btn-outline-danger">Hapus</button>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Tambah Kode Klui</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" method="post" action="<?php echo base_url();?>Admin/tambah_kode_klui">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Klui</label>
                        <input type="text" class="form-control" value="" name="kode_klui" placeholder="Kode Klui">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>                  
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
foreach ($kode_klui as $row) {
?>

<div class="modal fade" id="myModal<?php echo $row->kode_klui;?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Edit Kode Klui</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" method="post" action="<?php echo base_url();?>Admin/edit_kode_klui">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Klui</label>
                        <input type="text" class="form-control" value="<?php echo $row->kode_klui; ?>" name="kode_klui" placeholder="Kode Klui" readonly>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" placeholder="Deskripsi"><?php echo $row->dsk; ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>                  
                </div>
            </form>
        </div>
    </div>
</div>

<?php } ?>