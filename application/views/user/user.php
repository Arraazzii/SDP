            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">Edit Profil Perusahaan</h4>
                                    <p class="card-category">Lengkapi Profil Perusahaan Anda</p>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url();?>User/update_perusahaan_user" method="POST">
                                        <?php foreach($data_perusahaan as $edit_data_pengurus){?>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Perusahaan</label>
                                                    <input type="text" class="form-control" required="" value="<?php echo $edit_data_pengurus['nama_perusahaan']; ?>" name="nama_perusahaan">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">No. Telepon</label>
                                                    <input type="number" class="form-control" required="" value="<?php echo $edit_data_pengurus['no_telpon']; ?>" name="no_telpon">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Alamat</label>
                                                    <textarea class="form-control" rows="5" required="" name="alamat"><?php echo $edit_data_pengurus['alamat']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Kode Pos</label>
                                                    <input type="number" class="form-control" required="" value="<?php echo $edit_data_pengurus['kode_pos']; ?>" name="kode_pos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Provinsi</label>
                                                    <input type="text" class="form-control" required="" value="<?php echo $edit_data_pengurus['provinsi']; ?>" name="provinsi">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Kabupaten/Kota</label>
                                                    <input type="text" class="form-control" required="" value="<?php echo $edit_data_pengurus['kota']; ?>" name="kabupaten">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Kecamatan</label>
                                                    <input type="text" class="form-control" required="" value="<?php echo $edit_data_pengurus['kecamatan']; ?>" name="kecamatan">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Kelurahan</label>
                                                    <input type="text" class="form-control" required="" value="<?php echo $edit_data_pengurus['kelurahan']; ?>" name="kelurahan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Tentang Perusahaan Anda</label>
                                                        <textarea class="form-control" rows="5" required="" name="tentang"><?php echo $edit_data_pengurus['deskripsi']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="kode_perusahaan" value="<?php echo $edit_data_pengurus['kode_perusahaan']; ?>">
                                        <input type="hidden" name="kode_alamat" value="<?php echo $edit_data_pengurus['kode_alamat']; ?>">
                                        <button type="submit" class="btn btn-info pull-right">Perbarui Profil</button>
                                        <div class="clearfix"></div>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <?php if ($data_perusahaan_samping == NULL) { ?>
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="<?php echo base_url()?>assets/assets_user/img/logo1.png" />
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-category text-gray">Logo Perusahaan</h6>
                                    <h4 class="card-title">PT X</h4>
                                    <p class="card-description">
                                        <i>-Deskripsi Perusahaan-</i>
                                    </p>
                                </div>
                            </div>
                            <?php }elseif ($data_perusahaan_samping != NULL){ ?>
                            <?php foreach ($data_perusahaan_samping as $perusahaan_samping){ ?>
                            <div class="card card-profile">
                                <div class="card-avatar">

                                    <?php if($perusahaan_samping['logo'] == NULL){
                                        ?>
                                        <img class="img" src="<?php echo base_url()?>assets/assets_user/img/logo1.png" />
                                        <?php }else{
                                            ?>
                                            <img class="img" src="<?php echo base_url('upload/logo/' .$perusahaan_samping['logo']);?>" />
                                            <?php
                                        } ?>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-gray">Logo Perusahaan</h6>
                                        <?php if($perusahaan_samping['nama_perusahaan'] == NULL){
                                            ?>
                                            <h4 class="card-title">Nama Perusahaan</h4>
                                            <?php }else{
                                                ?>
                                                <h4 class="card-title"><?php echo $perusahaan_samping['nama_perusahaan'];?></h4>
                                                <?php
                                            } ?>
                                            <p class="card-description">
                                                <?php if($perusahaan_samping['deskripsi'] == NULL){
                                                    ?>
                                                    <i>Deskripsi Perusahaan</i>
                                                    <?php }else{
                                                        ?>
                                                        <i><?php echo $perusahaan_samping['deskripsi'];?></i>
                                                        <?php
                                                    } ?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php } 
                                    }?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header card-header-info">
                                            <h4 class="card-title">Edit Pengurus</h4>
                                            <p class="card-category">Lengkapi Profil Pengurus Anda</p>
                                        </div>
                                        <div class="container">
                                            <button class="btn btn-info pull-right" data-toggle="modal" data-target="#modalAdd"><i class="material-icons">add</i></button>
                                            <table class="table" id="tableFilter">
                                                <thead class=" text-primary">
                                                  <tr>
                                                      <th>Nama</th>
                                                      <th>Jabatan</th>
                                                      <th>Alamat</th>
                                                      <th>No Telp</th>
                                                      <th>Aksi</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php if ($data_pengurus == NULL) { ?>
                                                <tr>
                                                    <td class="text-center" rowspan="4">DATA PENGURUS KOSONG</td>
                                                </tr>
                                                <?php }else{?>
                                                <?php foreach($data_pengurus as $data_pengurus){?>
                                                <tr>
                                                    <td><?php echo $data_pengurus['nama'];?></td>
                                                    <td><?php echo $data_pengurus['jabatan'];?></td>
                                                    <td><?php echo $data_pengurus['alamat'];?></td>
                                                    <td><?php echo $data_pengurus['no_telpon'];?></td>
                                                    <td><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalPengurus<?php echo $data_pengurus['id'];?>">Edit</button>
                                                        <a href="<?php echo base_url('User/hapusPengurus/'.$data_pengurus['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa Anda Yakin Menghapus Pengurus <?php echo $data_pengurus['nama'];?> ?')">Hapus</a></td>
                                                    </tr>
                                                    <!-- Modal -->
                                                    <div id="modalPengurus<?php echo $data_pengurus['id'];?>" class="modal fade" role="dialog">
                                                      <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h4 class="modal-title">Edit Pengurus <?php echo $data_pengurus['nama'];?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url();?>User/update_pengurus_user" method="POST">
                                                                <div id="field">
                                                                    <div id="field0">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Nama Pengurus</label>
                                                                                    <input type="text" class="form-control" required="" value="<?php echo $data_pengurus['nama'];?>" name="nama">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Jabatan Pengurus</label>
                                                                                    <input type="text" class="form-control" required="" value="<?php echo $data_pengurus['jabatan'];?>" name="jabatan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">No. Telepon</label>
                                                                                    <input type="number" class="form-control" required="" value="<?php echo $data_pengurus['no_telpon'];?>" name="no_telpon">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-9">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Alamat</label>
                                                                                    <textarea class="form-control" required="" name="alamat"><?php echo $data_pengurus['alamat'];?></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Kode Pos</label>
                                                                                    <input type="number" class="form-control" required="" value="<?php echo $data_pengurus['kode_pos'];?>" name="kode_pos">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Provinsi</label>
                                                                                    <input type="text" class="form-control" required="" value="<?php echo $data_pengurus['provinsi'];?>" name="provinsi">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Kabupaten/Kota</label>
                                                                                    <input type="text" class="form-control" required="" value="<?php echo $data_pengurus['kota'];?>" name="kota">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Kecamatan</label>
                                                                                    <input type="text" class="form-control" required="" value="<?php echo $data_pengurus['kecamatan'];?>" name="kecamatan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Kelurahan</label>
                                                                                    <input type="text" class="form-control" required="" value="<?php echo $data_pengurus['kelurahan'];?>" name="kelurahan">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="kode_pengurus" value="<?php echo $data_pengurus['id'];?>">
                                                                        <input type="hidden" name="kode_alamat" value="<?php echo $data_pengurus['kode_alamat'];?>">
                                                                        <button type="submit" class="btn btn-info pull-right">Perbarui Profil</button>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header card-header-tabs card-header-info">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <span class="nav-tabs-title">Berkas :</span>
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#siup" data-toggle="tab">
                                                       SIUP
                                                       <div class="ripple-container"></div>
                                                   </a>
                                               </li>
                                               <li class="nav-item">
                                                <a class="nav-link" href="#tdp" data-toggle="tab">
                                                   TDP
                                                   <div class="ripple-container"></div>
                                               </a>
                                           </li>
                                           <li class="nav-item">
                                            <a class="nav-link" href="#akte" data-toggle="tab">
                                               Akte
                                               <div class="ripple-container"></div>
                                           </a>
                                       </li>
                                       <li class="nav-item">
                                        <a class="nav-link" href="#kehakiman" data-toggle="tab">
                                           Surat Hakim
                                           <div class="ripple-container"></div>
                                       </a>
                                   </li>
                                   <li class="nav-item">
                                    <a class="nav-link" href="#domisili" data-toggle="tab">
                                       Domisili
                                       <div class="ripple-container"></div>
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="card-body">
                <div class="tab-content">
                    <div id="siup" class="tab-pane in active" style="height: 400px;">
                        <h4>Berkas Siup Perusahaan Anda</h4>
                        <object data="<?php echo base_url('upload/siup/' .$get_berkas_perusahaan[0]['siup']);?>" type="application/pdf" width="100%" height="100%">
                        </object>
                    </div>
                    <div id="tdp" class="tab-pane fade in" style="height: 400px;">
                        <h4>Berkas TPD Perusahaan Anda</h4>
                        <object data="<?php echo base_url('upload/tdp/' .$get_berkas_perusahaan[0]['tdp']);?>" type="application/pdf" width="100%" height="100%">
                        </object>
                    </div>
                    <div id="akte" class="tab-pane fade in" style="height: 400px;">
                        <h4>Berkas Akte Perusahaan Anda</h4>
                        <object data="<?php echo base_url('upload/akte/' .$get_berkas_perusahaan[0]['akte']);?>" type="application/pdf" width="100%" height="100%">
                        </object>
                    </div>
                    <div id="kehakiman" class="tab-pane fade in " style="height: 400px;">
                        <h4>Berkas Kehakiman Perusahaan Anda</h4>
                        <object data="<?php echo base_url('upload/hakim/' .$get_berkas_perusahaan[0]['hakim']);?>" type="application/pdf" width="100%" height="100%">
                        </object>
                    </div>
                    <div id="domisili" class="tab-pane fade in" style="height: 400px;">
                        <h4>Berkas Domisili Perusahaan Anda</h4>
                        <object data="<?php echo base_url('upload/domisili/' .$get_berkas_perusahaan[0]['domisili']);?>" type="application/pdf" width="100%" height="100%">
                        </object>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Modal -->
<div id="modalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pengurus</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <form action="<?php echo base_url();?>User/tambah_pengurus_user" method="POST">
            <div id="field">
                <div id="field0">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Pengurus</label>
                                <input type="text" class="form-control" required="" name="nama">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Jabatan</label>
                                <input type="text" class="form-control" required="" name="jabatan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">No. Telepon</label>
                                <input type="number" class="form-control" required="" name="no_telpon">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="bmd-label-floating">Alamat</label>
                                <textarea class="form-control" required="" name="alamat"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Kode Pos</label>
                                <input type="number" class="form-control" required="" name="kode_pos">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Provinsi</label>
                                <input type="text" class="form-control" required="" name="provinsi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Kabupaten/Kota</label>
                                <input type="text" class="form-control" required="" name="kota">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Kecamatan</label>
                                <input type="text" class="form-control" required="" name="kecamatan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Kelurahan</label>
                                <input type="text" class="form-control" required="" name="kelurahan">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info pull-right">Perbarui Profil</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets_user/dataTable/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $('#tableFilter').DataTable();
</script> 
<script type="text/javascript">
    $("select[name='provinsi']").on('change', function (){
        $.ajax({
            type:'GET',
            url:'<?php echo base_url(); ?>User/user_wilayah',
            data: 'provinsi=' + $("select[name='provinsi']").val(),
            success: function(result) {
                $("select[name='kota']").html("<option>-- Pilih Kota / Kabupaten --</option>");
                $.each(result, function(nomor,hasil) {
                    $("select[name='kota']").append($("<option>", {
                        text: hasil.name,
                        value: hasil.name
                    }));
                })
                console.log('error');
            },
            error: function(result) {
                console.log("Ajax Error : User/user_wilayah+provinsi");
            }
        });
    });

    $("select[name='kota']").on('change', function (){
        $.ajax({
            type:'GET',
            url:'<?php echo base_url(); ?>User/user_wilayah',
            data: '&kota=' + $("select[name='kota']").val(),
            success: function(result) {
                $("select[name='kecamatan']").html("<option>-- Pilih Kecamatan --</option>");
                $.each(result, function(nomor,hasil) {
                    $("select[name='kecamatan']").append($("<option>", {
                        text: hasil.name,
                        value: hasil.name
                    }));
                })

            },
            error: function(result) {
                console.log("Ajax Error : User/user_wilayah+regency");
            }
        });
    });

    $("select[name='kecamatan']").on('change', function (){
        $.ajax({
            type:'GET',
            url:'<?php echo base_url(); ?>User/user_wilayah',
            data: '&kecamatan=' + $("select[name='kecamatan']").val(),
            success: function(result) {
                $("select[name='kelurahan']").html("<option>-- Pilih Kelurahan --</option>");
                $.each(result, function(nomor,hasil) {
                    $("select[name='kelurahan']").append($("<option>", {
                        text: hasil.name,
                        value: hasil.name
                    }));
                })

            },
            error: function(result) {
                console.log("Ajax Error : User/user_wilayah+regency");
            }
        });
    });
</script>