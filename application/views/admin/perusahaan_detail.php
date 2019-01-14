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
                        <li>Perusahaan</li>
                        <li class="active">Perusahaan Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($data_perusahaan as $row) { }?>
    <div class="content mt-3">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Perusahaan <?php echo $row->nama_perusahaan; ?></strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Nama Perusahaan</label>
                            <p class="form-control-static"><?php echo $row->nama_perusahaan; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Pimpinan Perusahaan</label>
                            <p class="form-control-static"><?php echo $row->nama; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Alamat Perusahaan</label>
                            <p class="form-control-static"><?php echo $row->alamat.", ".$row->kelurahan.", ".$row->kecamatan.", ".$row->kota.", ".$row->provinsi." - ".$row->kode_pos; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">No. Telp Perusahaan</label>
                            <p class="form-control-static"><?php echo $row->no_telpon; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">KLUI</label>
                            <p class="form-control-static"><?php echo $row->dsk; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Logo Perusahaan</strong>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" style="width:200px;height:200px" src="<?php echo base_url();?>upload/logo/<?php echo $row->logo; ?>" alt="Card image cap">
                            <!-- <h5 class="text-sm-center mt-2 mb-1">Pt. Y</h5> -->
                            <!-- <div class="location text-sm-center"><i class="fa fa-map-marker"></i> California, United States</div> -->
                        </div>
                            <!-- <hr>
                            <div class="card-text text-sm-center">
                                <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
                                <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Pengurus Perusahaan <?php echo $row->nama_perusahaan; ?></strong>
                    </div>
                    <div class="card-body">
                       <div id="field0">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Pengurus</th>
                                    <th>Jabatan</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $kode = $this->uri->segment(3);
                                $sql1 = $this->db->query("SELECT * FROM table_pengurus JOIN table_alamat ON table_pengurus.kode_alamat = table_alamat.kode_alamat WHERE table_pengurus.kode_perusahaan = '$kode' ")->result_array();
                                $no1 = 1;
                                foreach ($sql1 as $row1) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row1['nama']; ?></td>
                                        <td><?php echo $row1['jabatan']; ?></td>
                                        <td><?php echo $row1['alamat']; ?>, <?php echo $row1['kelurahan']; ?>, <?php echo $row1['kecamatan']; ?>, <?php echo $row1['kota']; ?>, <?php echo $row1['provinsi']; ?> - <?php echo $row1['kode_pos']; ?></td>
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
    </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>File Pendukung</h4>
                        </div>
                        <div class="card-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-siup-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-home" aria-selected="true">SIUP</a>
                                        <a class="nav-item nav-link" id="nav-tdp-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-profile" aria-selected="false">TDP</a>
                                        <a class="nav-item nav-link" id="nav-akte-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-contact" aria-selected="false">Akte</a>
                                        <a class="nav-item nav-link" id="nav-hakim-tab" data-toggle="tab" href="#nav-5" role="tab" aria-controls="nav-home" aria-selected="true">Surat Kehakiman</a>
                                        <a class="nav-item nav-link" id="nav-domisili-tab" data-toggle="tab" href="#nav-6" role="tab" aria-controls="nav-home" aria-selected="true">Domisili</a>
                                        <a class="nav-item nav-link" id="nav-pp-tab" data-toggle="tab" href="#nav-7" role="tab" aria-controls="nav-home" aria-selected="true">PP</a>
                                        <a class="nav-item nav-link" id="nav-pkb-tab" data-toggle="tab" href="#nav-8" role="tab" aria-controls="nav-home" aria-selected="true">PKB</a>
                                        <a class="nav-item nav-link" id="nav-lks-tab" data-toggle="tab" href="#nav-9" role="tab" aria-controls="nav-home" aria-selected="true">Bipartite</a>
                                        <a class="nav-item nav-link" id="nav-k3-tab" data-toggle="tab" href="#nav-10" role="tab" aria-controls="nav-home" aria-selected="true">K3</a>
                                        <a class="nav-item nav-link" id="nav-wlkp-tab" data-toggle="tab" href="#nav-11" role="tab" aria-controls="nav-home" aria-selected="true">WLKP</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-siup-tab">
                                        <?php foreach ($data_perusahaan as $row){ ?>
                                        <div class="file-box">
                                            <div class="box-content">
                                                <div class="preview">
                                                    <object data="<?php echo base_url().'upload/siup/'.$row->siup; ?>" type="application/pdf" width="100%" height="500"></object>
                                                </div>
                                                <a href="<?php echo base_url().'upload/siup/'.$row->siup; ?>" target="_blank" class="btn btn-primary col-12">Download</a>
                                            </div>
                                        </div>
                                        <?php }  ?>
                                    </div>
                                    <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <?php foreach ($data_perusahaan as $row){ ?>
                                        <div class="file-box">
                                            <div class="box-content">
                                                <div class="preview">
                                                    <object data="<?php echo base_url().'upload/tdp/'.$row->tdp; ?>" type="application/pdf" width="100%" height="500"></object>
                                                </div>
                                                <a href="<?php echo base_url().'upload/tdp/'.$row->tdp; ?>" target="_blank" class="btn btn-primary col-12">Download</a>
                                            </div>
                                        </div>
                                        <?php }  ?>
                                    </div>
                                    <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <?php foreach ($data_perusahaan as $row){ ?>
                                        <div class="file-box">
                                            <div class="box-content">
                                                <div class="preview">
                                                    <object data="<?php echo base_url().'upload/akte/'.$row->akte; ?>" type="application/pdf" width="100%" height="500"></object>
                                                </div>
                                                <a href="<?php echo base_url().'upload/akte/'.$row->akte; ?>" target="_blank" class="btn btn-primary col-12">Download</a>
                                            </div>
                                        </div>
                                        <?php }  ?>
                                    </div>
                                    <div class="tab-pane fade" id="nav-5" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <?php foreach ($data_perusahaan as $row){ ?>
                                        <div class="file-box">
                                            <div class="box-content">
                                                <div class="preview">
                                                    <object data="<?php echo base_url().'upload/hakim/'.$row->hakim; ?>" type="application/pdf" width="100%" height="500"></object>
                                                </div>
                                                <a href="<?php echo base_url().'upload/hakim/'.$row->hakim; ?>" target="_blank" class="btn btn-primary col-12">Download</a>
                                            </div>
                                        </div>
                                        <?php }  ?>
                                    </div>
                                    <div class="tab-pane fade" id="nav-6" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <?php foreach ($data_perusahaan as $row){ ?>
                                        <div class="file-box">
                                            <div class="box-content">
                                                <div class="preview">
                                                    <object data="<?php echo base_url().'upload/domisili/'.$row->domisili; ?>" type="application/pdf" width="100%" height="500"></object>
                                                </div>
                                                <a href="<?php echo base_url().'upload/domisili/'.$row->domisili; ?>" target="_blank" class="btn btn-primary col-12">Download</a>
                                            </div>
                                        </div>
                                        <?php }  ?>
                                    </div>
                                    <div class="tab-pane fade" id="nav-7" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <object data="<?php echo base_url().'upload/pp/'.$row->nama_file; ?>" type="application/pdf" width="100%" height="500"></object>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                                <input type="text" class="form-control" value="<?php echo $row->no_dokumen; ?>" readonly>
                                                <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                                <input type="text" class="form-control" value="<?php echo $row->no_registrasi; ?>" readonly>
                                                <label for="file-input" class="form-control-label">Tanggal Daftar</label>
                                                <input type="date" value="<?php echo $row->tanggal_daftar; ?>"  class="form-control" readonly>
                                                <br/>
                                                <a href="<?php echo base_url().'upload/pp/'.$row->nama_file; ?>" target="_blank" class="btn btn-primary col-12">Download</a>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-8" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <object data="<?php echo base_url().'upload/pkb/'.$row->nama_file; ?>" type="application/pdf" width="100%" height="500"></object>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                                <input type="text" class="form-control" value="<?php echo $row->no_dokumen; ?>" readonly>
                                                <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                                <input type="text" class="form-control" value="<?php echo $row->no_registrasi; ?>" readonly>
                                                <label for="file-input" class="form-control-label">Tanggal Daftar</label>
                                                <input type="date" value="<?php echo $row->tanggal_daftar; ?>"  class="form-control" readonly>
                                                <br/>
                                                <a href="<?php echo base_url().'upload/pkb/'.$row->nama_file; ?>" target="_blank" class="btn btn-primary col-12">Download</a>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-9" role="tabpanel" aria-labelledby="nav-contact-tab">
                                       <div class="row">
                                            <div class="col-lg-6">
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <object data="<?php echo base_url().'upload/lks/'.$row->nama_file; ?>" type="application/pdf" width="100%" height="500"></object>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                                <input type="text" class="form-control" value="<?php echo $row->no_dokumen; ?>" readonly>
                                                <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                                <input type="text" class="form-control" value="<?php echo $row->no_registrasi; ?>" readonly>
                                                <label for="file-input" class="form-control-label">Tanggal Daftar</label>
                                                <input type="date" value="<?php echo $row->tanggal_daftar; ?>"  class="form-control" readonly>
                                                <br/>
                                                <a href="<?php echo base_url().'upload/lks/'.$row->nama_file; ?>" target="_blank" class="btn btn-primary col-12">Download</a>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-10" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <object data="<?php echo base_url().'upload/k3/'.$row->nama_file; ?>" type="application/pdf" width="100%" height="500"></object>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                                <input type="text" class="form-control" value="<?php echo $row->no_dokumen; ?>" readonly>
                                                <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                                <input type="text" class="form-control" value="<?php echo $row->no_registrasi; ?>" readonly>
                                                <label for="file-input" class="form-control-label">Tanggal Daftar</label>
                                                <input type="date" value="<?php echo $row->tanggal_daftar; ?>"  class="form-control" readonly>
                                                <br/>
                                                <a href="<?php echo base_url().'upload/k3/'.$row->nama_file; ?>" target="_blank" class="btn btn-primary col-12">Download</a>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-11" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <object data="<?php echo base_url().'upload/wlkp/'.$row->nama_file; ?>" type="application/pdf" width="100%" height="500"></object>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                                <input type="text" class="form-control" value="<?php echo $row->no_dokumen; ?>" readonly>
                                                <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                                <input type="text" class="form-control" value="<?php echo $row->no_registrasi; ?>" readonly>
                                                <label for="file-input" class="form-control-label">Tanggal Daftar</label>
                                                <input type="date" value="<?php echo $row->tanggal_daftar; ?>"  class="form-control" readonly>
                                                <br/>
                                                <a href="<?php echo base_url().'upload/wlkp/'.$row->nama_file; ?>" target="_blank" class="btn btn-primary col-12">Download</a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>