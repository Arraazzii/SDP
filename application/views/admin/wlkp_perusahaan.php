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
                            <li class="active">WLKP Perusahaan</li>
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
                                <strong class="card-title">Data WLKP Perusahaan</strong>
                                <a href="<?php echo base_url(); ?>Admin/print_perusahaan" target="_blank"><button type="button" class="btn btn-outline-primary float-right"><i class="fa fa-print"></i>&nbsp; Print</button></a> 
                                <a href="<?php echo base_url();?>Admin/wlkp_perusahaan" data-toggle="modal" title="Tambah Data" data-target="#myModal"><button type="button" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i>&nbsp; Data Baru</button></a> 
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

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Tambah WLKP Perusahaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" method="post" action="<?php echo base_url();?>Admin/terima">
                        <div class="modal-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Data Perusahaan</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Data Pengurus</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">File Pendukung</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label>Nama Perusahaan</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Input Nama Perusahaan">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Perusahaan</label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Kecamatan</label>
                                            <input type="text" class="form-control" placeholder="Kecamatan" >
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Kelurahan</label>
                                            <input type="text" class="form-control" placeholder="Kelurahan" >
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Telp. Perusahaan</label>
                                            <input type="text" class="form-control" placeholder="Telp. Perusahaan">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Jenis Usaha</label>
                                            <input type="text" class="form-control" placeholder="Jenis Usaha">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Nama Pemilik</label>
                                            <input type="text" class="form-control" placeholder="Nama Pemilik">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Nama Pengurus</label>
                                            <input type="text" class="form-control" placeholder="Nama Pengurus">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Tgl Pendirian</label>
                                            <input type="date" class="form-control" placeholder="Tgl Pendirian">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>No Pendirian</label>
                                            <input type="text" class="form-control" placeholder="No Pendirian">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Keterangan Kantor</label>
                                            <select class="form-control">
                                                <option hidden="true">-Silahkan Pilih-</option>
                                                <option>Pusat</option>
                                                <option>Cabang</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label>Jumlah Kantor Cabang</label>
                                            <input type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Status Kepemilikan</label>
                                            <select class="form-control">
                                                <option hidden="true">-Silahkan Pilih-</option>
                                                <option>Swasta</option>
                                                <option>Persero</option>
                                                <option>Patungan dengan Negara Asing</option>
                                                <option>Negara Asing</option>
                                                <option>Perusahaan Umum</option>
                                                <option>Perusahaan Daerah</option>
                                                <option>Yayasan</option>
                                                <option>Koperasi</option>
                                                <option>Perorangan</option>
                                                <option>Badan Usaha</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Permodalan</label>
                                            <input type="number" class="form-control">
                                        </div>                                        
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label>Nama Perusahaan</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Input Nama Perusahaan">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Perusahaan</label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <input type="text" class="form-control" placeholder="Kecamatan" >
                                        </div>
                                        <div class="form-group">
                                            <label>Kelurahan</label>
                                            <input type="text" class="form-control" placeholder="Kelurahan" >
                                        </div>
                                        <div class="form-group">
                                            <label>Telp. Perusahaan</label>
                                            <input type="text" class="form-control" placeholder="Telp. Perusahaan">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Usaha</label>
                                            <input type="text" class="form-control" placeholder="Jenis Usaha">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pemilik</label>
                                            <input type="text" class="form-control" placeholder="Nama Pemilik">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pengurus</label>
                                            <input type="text" class="form-control" placeholder="Nama Pengurus">
                                        </div>
                                        <div class="form-group">
                                            <label>Tgl Pendirian</label>
                                            <input type="text" class="form-control" placeholder="Tgl Pendirian">
                                        </div>
                                        <div class="form-group">
                                            <label>No Pendirian</label>
                                            <input type="text" class="form-control" placeholder="No Pendirian">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan Kantor</label>
                                            <select>
                                                <option hidden="true">-Silahkan Pilih-</option>
                                                <option>Pusat</option>
                                                <option>Cabang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Kantor Cabang</label>
                                            <input type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Status Kepemilikan</label>
                                            <select>
                                                <option hidden="true">-Silahkan Pilih-</option>
                                                <option>Swasta</option>
                                                <option>Persero</option>
                                                <option>Patungan dengan Negara Asing</option>
                                                <option>Negara Asing</option>
                                                <option>Perusahaan Umum</option>
                                                <option>Perusahaan Daerah</option>
                                                <option>Yayasan</option>
                                                <option>Koperasi</option>
                                                <option>Perorangan</option>
                                                <option>Badan Usaha</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Permodalan</label>
                                            <input type="number" class="form-control">
                                        </div>         
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                       <div class="form-group">
                                            <label>Nama Perusahaan</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Input Nama Perusahaan">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Perusahaan</label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <input type="text" class="form-control" placeholder="Kecamatan" >
                                        </div>
                                        <div class="form-group">
                                            <label>Kelurahan</label>
                                            <input type="text" class="form-control" placeholder="Kelurahan" >
                                        </div>
                                        <div class="form-group">
                                            <label>Telp. Perusahaan</label>
                                            <input type="text" class="form-control" placeholder="Telp. Perusahaan">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Usaha</label>
                                            <input type="text" class="form-control" placeholder="Jenis Usaha">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pemilik</label>
                                            <input type="text" class="form-control" placeholder="Nama Pemilik">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pengurus</label>
                                            <input type="text" class="form-control" placeholder="Nama Pengurus">
                                        </div>
                                        <div class="form-group">
                                            <label>Tgl Pendirian</label>
                                            <input type="text" class="form-control" placeholder="Tgl Pendirian">
                                        </div>
                                        <div class="form-group">
                                            <label>No Pendirian</label>
                                            <input type="text" class="form-control" placeholder="No Pendirian">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan Kantor</label>
                                            <select>
                                                <option hidden="true">-Silahkan Pilih-</option>
                                                <option>Pusat</option>
                                                <option>Cabang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Kantor Cabang</label>
                                            <input type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Status Kepemilikan</label>
                                            <select>
                                                <option hidden="true">-Silahkan Pilih-</option>
                                                <option>Swasta</option>
                                                <option>Persero</option>
                                                <option>Patungan dengan Negara Asing</option>
                                                <option>Negara Asing</option>
                                                <option>Perusahaan Umum</option>
                                                <option>Perusahaan Daerah</option>
                                                <option>Yayasan</option>
                                                <option>Koperasi</option>
                                                <option>Perorangan</option>
                                                <option>Badan Usaha</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Permodalan</label>
                                            <input type="number" class="form-control">
                                        </div>         
                                    </div>
                                </div>
                            </div>                    
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>