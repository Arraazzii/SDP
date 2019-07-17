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
                                            <th>Nama Perusahaan</th>
                                            <th>Pemilik</th>
                                            <th>No. Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($data_wlkp_perusahaan as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->nama_perusahaan; ?></td>
                                            <td><?php echo $row->nama_pemilik; ?></td>
                                            <td><?php echo $row->no_telpon; ?></td>
                                            <td>
                                                <a href="" data-toggle="modal" title="Detail Data" data-target="#myModalEdit<?php echo $row->kode_wlkp;?>"><button type="button" class="btn btn-outline-primary">Detail</button></a>
                                                <a href="<?php echo base_url(); ?>Admin/delete_wlkp/<?php echo $row->kode_wlkp; ?>">
                                                <button type="button" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-outline-danger">Delete</button></a>
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

        <!-- MODAL TAMBAH -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Tambah WLKP Perusahaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" method="post" action="<?php echo base_url();?>Admin/input_wlkp">
                        <div class="modal-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Data Perusahaan</a>
                                        <a class="nav-item nav-link" id="nav-kerja-tab" data-toggle="tab" href="#nav-kerja" role="tab" aria-controls="nav-kerja" aria-selected="false">Data Ketenagakerjaan</a>
                                        <a class="nav-item nav-link" id="nav-lainnya-tab" data-toggle="tab" href="#nav-lainnya" role="tab" aria-controls="nav-lainnya" aria-selected="false">Data Lainnya</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> PROFIL PERUSAHAAN </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <th colspan="2">Nama Perusahaan</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><input type="text" class="form-control" name="nama_perusahaan" placeholder="Input Nama Perusahaan"></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Alamat Perusahaan</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><textarea class="form-control" name="alamat_perusahaan"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Kecamatan</th>
                                                                <th>Kelurahan</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" placeholder="Kecamatan" name="kecamatan_perusahaan"></td>
                                                                <td><input type="text" class="form-control" placeholder="Kelurahan" name="kelurahan_perusahaan"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Telp. Perusahaan</th>
                                                                <th>Jenis Usaha</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" placeholder="Telp. Perusahaan" name="telp_perusahaan"></td>
                                                                <td><input type="text" class="form-control" placeholder="Jenis Usaha" name="jenis_usaha"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama Pemilik</th>
                                                                <th>Nama Pengurus</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" placeholder="Nama Pemilik" name="nama_pemilik"></td>
                                                                <td><input type="text" class="form-control" placeholder="Nama Pengurus" name="nama_pengurus"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tanggal Pendirian</th>
                                                                <th>Nomor Pendirian</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="date" class="form-control" placeholder="Tgl Pendirian" name="tanggal_pendirian"></td>
                                                                <td><input type="number" class="form-control" placeholder="No Pendirian" name="no_pendirian"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Keterangan Kantor</th>
                                                                <th>Jumlah Kantor Cabang</th>
                                                            </tr>
                                                            <tr>
                                                                <td><select class="form-control" name="ket_kantor" id="ket_kantor">
                                                                    <option hidden="true">-Silahkan Pilih-</option>
                                                                    <option value="PUSAT">Pusat</option>
                                                                    <option value="CABANG">Cabang</option>
                                                                </select></td>
                                                                <td><input type="number" class="form-control" value="0" name="kantor_cabang" id="kantor_cabang"></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Status Kepemilikan</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <select class="form-control" name="kepemilikan">
                                                                        <option hidden="true">-Silahkan Pilih-</option>
                                                                        <option value="Swasta">Swasta</option>
                                                                        <option value="Persero">Persero</option>
                                                                        <option value="Patungan dengan Negara Asing">Patungan dengan Negara Asing</option>
                                                                        <option value="Negara Asing">Negara Asing</option>
                                                                        <option value="Perusahaan Umum">Perusahaan Umum</option>
                                                                        <option value="Perusahaan Daerah">Perusahaan Daerah</option>
                                                                        <option value="Yayasan">Yayasan</option>
                                                                        <option value="Koperasi">Koperasi</option>
                                                                        <option value="Perorangan">Perorangan</option>
                                                                        <option value="Badan Usaha">Badan Usaha</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Status Permodalan</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><input type="text" class="form-control" name="permodalan"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>                         
                                    </div>
                                    <div class="tab-pane fade" id="nav-kerja" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> WARGA NEGARA INDONESIA </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <th></th>
                                                                <th><center>Laki - Laki</center></th>
                                                                <th><center>Perempuan</center></th>        
                                                            </tr>
                                                            <tr>
                                                                <td>Dibawah 15 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15" value="0" id="l_dibawah_15"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15" value="0" id="p_dibawah_15"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diantara 15 - 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18" value="0" id="l_dibawah_18"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18" value="0" id="p_dibawah_18"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diatas 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18" value="0" id="l_diatas_18"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18" value="0" id="p_diatas_18"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Total :</strong></td>
                                                                <td><input type="number" class="form-control" name="total_l" value="0" id="total_l" readonly></td>
                                                                <td><input type="number" class="form-control" name="total_p" value="0" id="total_p" readonly></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div> 

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> WARGA NEGARA ASING </legend>    
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <th>Laki - Laki</th>
                                                                <th>Perempuan</th> 
                                                                <th>Total</th>       
                                                            </tr>
                                                            <tr>
                                                                <td><input type="number" class="form-control" name="l_wna" value="0" id="l_wna"></td>
                                                                <td><input type="number" class="form-control" name="p_wna" value="0" id="p_wna"></td>
                                                                <td><input type="number" class="form-control" name="total_wna" value="0" id="total_wna" readonly></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> Keadaan Ketenagakerjaan </legend>    
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Waktu Kerja (jam/hari)</label>
                                                            <input type="number" class="form-control" name="waktu_kerja" value="0"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Kategori</label>
                                                            <select class="form-control" name="kategori">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="KECIL">Kecil</option>
                                                                <option value="SEDANG">Sedang</option>
                                                                <option value="BESAR">Besar</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Penerima UMR</label>
                                                            <input type="number" class="form-control" name="penerima_umr" value="0"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Upah</label>
                                                            <input type="number" class="form-control" name="jumlah_upah" value="0"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Upah Tertinggi</label>
                                                            <input type="number" class="form-control" name="upah_tinggi" value="0"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Upah Terendah</label>
                                                            <input type="number" class="form-control" name="upah_rendah" value="0"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Laki - Laki Mendatang</label>
                                                            <input type="number" class="form-control" name="l_mendatang" value="0"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Perempuan Mendatang</label>
                                                            <input type="number" class="form-control" name="p_mendatang" value="0"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Laki - Laki Terakhir</label>
                                                            <input type="number" class="form-control" name="l_terakhir" id="l_terakhir" value="0"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Perempuan Terakhir</label>
                                                            <input type="number" class="form-control" name="p_terakhir" id="p_terakhir" value="0"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Terakhir</label>
                                                            <input type="number" class="form-control" name="pekerja_terakhir" value="0"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Berhenti</label>
                                                            <input type="number" class="form-control" name="pekerja_berhenti" value="0"> 
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> Rencana Kebutuhan Tenaga Kerja </legend>    
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Jumlah Pria Di Butuhkan</label>
                                                            <input type="number" class="form-control" name="sdm_l" value="0" id="sdm_l"> 
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Jumlah Wanita Di Butuhkan</label>
                                                            <input type="number" class="form-control" name="sdm_p" value="0" id="sdm_p"> 
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Jumlah Tenaga Kerja</label>
                                                            <input type="number" class="form-control" name="jumlah_sdm" value="0" id="jumlah_sdm" readonly> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Tingkat Pendidikan yang Di Butuhkan</label>
                                                            <select class="form-control" name="pendidikan">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="SD" >SD</option>
                                                                <option value="SMP">SMP</option>
                                                                <option value="SMA">SMA/SMK</option>
                                                                <option value="D3">D3</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2" >S2</option>
                                                                <option value="S3">S3</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Keterampilan yang Di Butuhkan</label>
                                                            <input type="text" class="form-control" name="keterampilan"> 
                                                        </div>
                                                        <div class="form-group col-md-12 col-sm-12">
                                                            <label>Posisi yang Di Butuhkan</label>
                                                            <input type="text" class="form-control" name="posisi"> 
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset> 
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-lainnya" role="tabpanel" aria-labelledby="nav-contact-tab">
                                       <div class="form-group">
                                            <fieldset>     
                                                <legend> PENGESAHAN </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <th>Tempat Pengesahan</th>
                                                                <th>Tanggal Pembuatan</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" name="tempat_pengesahan" placeholder="Tempat Pengesahan"></td>
                                                                <td><input type="date" class="form-control" name="tgl_pengesahan"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Pengesah</th>
                                                                <th>NIP. Pengesah</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" name="nama_pengesah" placeholder="Nama Pengesah"></td>
                                                                <td><input type="text" class="form-control" name="nip" placeholder="NIP Pengesah"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> ALAT & BAHAN </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <td><input type="checkbox" name="pesawat_uap" value="1" > Pesawat Uap </td>
                                                                <td><input type="checkbox" name="pesawat_angkat" value="1" > Pesawat Angkat </td>
                                                                <td><input type="checkbox" name="pesawat_angkut" value="1" > Pesawat Angkut </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="alat_berat" value="1"> Alat - Alat Berat </td>
                                                                <td><input type="checkbox" name="motor" value="1"> Motor </td>
                                                                <td><input type="checkbox" name="amdal" value="1"> Amdal </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="ins_listrik" value="1" > Instalasi Listrik </td>
                                                                <td><input type="checkbox" name="ins_pemadam" value="1" > Instalasi Pemadam </td>
                                                                <td><input type="checkbox" name="ins_limbah" value="1"> Instalasi Pengolah Limbah </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="lift" value="1" > Lift </td>
                                                                <td><input type="checkbox" name="bejana" value="1" > Bejana Tekan </td>
                                                                <td><input type="checkbox" name="bahan_beracun" value="1"> Bahan Beracun </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="turbin" value="1"> Turbin </td>
                                                                <td><input type="checkbox" name="botol_baja" value="1"> Botol Baja </td>
                                                                <td><input type="checkbox" name="perancah" value="1"> Perancah </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="radio_aktif" value="1"> Bahan Radio Aktif </td>
                                                                <td><input type="checkbox" name="penyalur_petir" value="1" > Penyalur Petir </td>
                                                                <td><input type="checkbox" name="pembangkit_listrik" value="1" > Pembangkit Listrik </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="limbah_padat" value="1"> Limbah Padat </td>
                                                                <td><input type="checkbox" name="limbah_cair" value="1"> Limbah Cair </td>
                                                                <td><input type="checkbox" name="limbah_gas" value="1"> Limbah Gas </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div> 

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> FASILITAS KERJA </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <td><input type="checkbox" name="p3k" value="1" > P3K </td>
                                                                <td><input type="checkbox" name="klinik" value="1" > Poliklinik </td>
                                                                <td><input type="checkbox" name="dokter" value="1"> Dokter Pemeriksa </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="ahli_k3" value="1"> Ahli K3 </td>
                                                                <td><input type="checkbox" name="medis" value="1"> Paramedis </td>
                                                                <td><input type="checkbox" name=pemadam value="1"> Regu Pemadam </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="koperasi" value="1"> Koperasi Karyawan </td>
                                                                <td><input type="checkbox" name="tpa" value="1"> TPA </td>
                                                                <td><input type="checkbox" name="kantin" value="1"> Kantin </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="sarana_ibadah" value="1"> Sarana Ibadah </td>
                                                                <td><input type="checkbox" name="unit_kb" value="1"> Unit KB Perusahaan </td>
                                                                <td><input type="checkbox" name="olahraga" value="1"> Olahraga Kesenian </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="perum" value="1"> Perumahan Karyawan </td>
                                                                <td><input type="checkbox" name="bpjs" value="1" > JAMSOSTEK / BPJS </td>
                                                                <td><input type="checkbox" name="apindo" value="1"> APINDO</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="pk" value="1" > PK </td>
                                                                <td><input type="checkbox" name="pp" value="1" > PP </td>
                                                                <td><input type="checkbox" name="pkb" value="1"> PKB </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="bipartit" value="1"> BIPARTIT </td>
                                                                <td><input type="checkbox" name="sptp" value="1"> SPTP </td>
                                                                <td><input type="checkbox" name="uksp" value="1"> UKSP </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="p2k3" value="1"> P2K3 </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>       
                                    </div>
                                </div>
                            </div>                    
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
            foreach ($data_wlkp_perusahaan as $row):
                $kode_wlkp      = $row->kode_wlkp;
                $kode_alamat    = $row->kode_alamat;

                // TABLE WLKP PERUSAHAAN
                $nama_perusahaan        = $row->nama_perusahaan;
                $alamat_perusahaan      = $row->alamat;
                $kecamatan_perusahaan   = $row->kecamatan;
                $kelurahan_perusahaan   = $row->kelurahan;
                $telp_perusahaan        = $row->no_telpon;
                $jenis_usaha            = $row->jenis_usaha;
                $nama_pemilik           = $row->nama_pemilik;
                $nama_pengurus          = $row->nama_pengurus;
                $tanggal_pendirian      = $row->tanggal_pendirian;
                $no_pendirian           = $row->nomor_pendirian;
                $ket_kantor             = $row->ket_kantor;
                $kantor_cabang          = $row->kantor_cabang;
                $kepemilikan            = $row->status_kepemilikan;
                $permodalan             = $row->status_permodalan;

                // TABLE WARGA NEGARA
                $l_dibawah_15   = $row->l_dibawah_15;
                $p_dibawah_15   = $row->p_dibawah_15;
                $l_dibawah_18   = $row->l_dibawah_18;
                $p_dibawah_18   = $row->p_dibawah_18;
                $l_diatas_18    = $row->l_diatas_18;
                $p_diatas_18    = $row->p_diatas_18;
                $l_wna          = $row->l_wna;
                $p_wna          = $row->p_wna;
                $total_wni      = $row->total_wni;
                $total_wna      = $row->total_wna;                
                $total_l        = $l_dibawah_15 + $l_dibawah_18 + $l_diatas_18;
                $total_p        = $p_dibawah_15 + $p_dibawah_18 + $p_diatas_18;

                // TABLE KETENAGAKERJAAN
                $waktu_kerja        = $row->jam_kerja;
                $kategori           = $row->kategori;
                $penerima_umr       = $row->jumlah_penerima_umr;
                $jumlah_upah        = $row->jumlah_upah;
                $upah_tinggi        = $row->upah_tinggi;
                $upah_rendah        = $row->upah_rendah;
                $l_mendatang        = $row->l_mendatang;
                $p_mendatang        = $row->p_mendatang;
                $l_terakhir         = $row->l_terakhir;
                $p_terakhir         = $row->p_terakhir;
                $pekerja_terakhir   = $row->pekerja_terakhir;
                $pekerja_berhenti   = $row->pekerja_berhenti;

                // TABLE RENCANA TENAGA KERJA
                $sdm_l          = $row->sdm_l;
                $sdm_p          = $row->sdm_p;
                $jumlah_sdm     = $row->jumlah_sdm;
                $pendidikan     = $row->pendidikan;
                $keterampilan   = $row->keterampilan;
                $posisi         = $row->posisi;

                // TABLE PENGESAHAN
                $tempat_pengesahan  = $row->tempat_pengesahan;
                $tgl_pengesahan     = $row->tanggal_pengesahan;
                $nama_pengesah      = $row->nama_pengesah;
                $nip                = $row->nip;

                // TABLE ALAT & BAHAN
                $pesawat_uap        = $row->pesawat_uap;
                $pesawat_angkat     = $row->pesawat_angkat;
                $pesawat_angkut     = $row->pesawat_angkut;
                $alat_berat         = $row->alat_berat;
                $motor              = $row->motor;
                $amdal              = $row->amdal;
                $ins_listrik        = $row->instalasi_listrik;
                $ins_pemadam        = $row->instalasi_pemadam;
                $ins_limbah         = $row->instalasi_limbah;
                $lift               = $row->lift;
                $bejana             = $row->bejana_tekan;
                $bahan_beracun      = $row->bahan_beracun;
                $turbin             = $row->turbin;
                $botol_baja         = $row->botol_baja;
                $perancah           = $row->perancah;
                $radio_aktif        = $row->radio_aktif;
                $penyalur_petir     = $row->penyalur_petir;
                $pembangkit_listrik = $row->pembangkit_listrik;
                $limbah_padat       = $row->limbah_padat;
                $limbah_cair        = $row->limbah_cair;
                $limbah_gas         = $row->limbah_gas;

                // TABLE FASILITAS
                $p3k            = $row->p3k;
                $klinik         = $row->poliklinik;
                $dokter         = $row->dokter;
                $ahli_k3        = $row->ahli_k3;
                $medis          = $row->paramedis;
                $pemadam        = $row->pemadam;
                $koperasi       = $row->koperasi;
                $tpa            = $row->tpa;
                $kantin         = $row->kantin;
                $sarana_ibadah  = $row->sarana_ibadah;
                $unit_kb        = $row->unit_kb;
                $olahraga       = $row->olahraga;
                $perum          = $row->perumahan;
                $bpjs           = $row->bpjs;
                $apindo         = $row->apindo;
                $pk             = $row->pk;
                $pp             = $row->pp;
                $pkb            = $row->pkb;
                $bipartit       = $row->bipartit;
                $sptp           = $row->sptp;
                $uksp           = $row->uksp;
                $p2k3           = $row->p2k3;
        ?>

        <!-- MODAL EDIT -->
        <div class="modal fade" id="myModalEdit<?php echo $kode_wlkp; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Detail WLKP Perusahaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" method="post" action="<?php echo base_url();?>Admin/update_wlkp">
                        <input type="hidden" name="kode_wlkp" value="<?php echo $kode_wlkp; ?>">
                        <input type="hidden" name="kode_alamat" value="<?php echo $kode_alamat; ?>">
                        <div class="modal-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile<?php echo $kode_wlkp; ?>" role="tab" aria-controls="nav-profile" aria-selected="true">Data Perusahaan</a>
                                        <a class="nav-item nav-link" id="nav-kerja-tab" data-toggle="tab" href="#nav-kerja<?php echo $kode_wlkp; ?>" role="tab" aria-controls="nav-kerja" aria-selected="false">Data Ketenagakerjaan</a>
                                        <a class="nav-item nav-link" id="nav-lainnya-tab" data-toggle="tab" href="#nav-lainnya<?php echo $kode_wlkp; ?>" role="tab" aria-controls="nav-lainnya" aria-selected="false">Data Lainnya</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-profile<?php echo $kode_wlkp; ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> PROFIL PERUSAHAAN </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <th colspan="2">Nama Perusahaan</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><input type="text" class="form-control" name="nama_perusahaan" placeholder="Input Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Alamat Perusahaan</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><textarea class="form-control" name="alamat_perusahaan"><?php echo $alamat_perusahaan; ?></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Kecamatan</th>
                                                                <th>Kelurahan</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" placeholder="Kecamatan" name="kecamatan_perusahaan" value="<?php echo $kecamatan_perusahaan; ?>"></td>
                                                                <td><input type="text" class="form-control" placeholder="Kelurahan" name="kelurahan_perusahaan" value="<?php echo $kelurahan_perusahaan; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Telp. Perusahaan</th>
                                                                <th>Jenis Usaha</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" placeholder="Telp. Perusahaan" name="telp_perusahaan" value="<?php echo $telp_perusahaan; ?>"></td>
                                                                <td><input type="text" class="form-control" placeholder="Jenis Usaha" name="jenis_usaha" value="<?php echo $jenis_usaha; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama Pemilik</th>
                                                                <th>Nama Pengurus</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" placeholder="Nama Pemilik" name="nama_pemilik" value="<?php echo $nama_pemilik; ?>"></td>
                                                                <td><input type="text" class="form-control" placeholder="Nama Pengurus" name="nama_pengurus" value="<?php echo $nama_pengurus; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tanggal Pendirian</th>
                                                                <th>Nomor Pendirian</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="date" class="form-control" placeholder="Tgl Pendirian" name="tanggal_pendirian" value="<?php echo $tanggal_pendirian; ?>"></td>
                                                                <td><input type="number" class="form-control" placeholder="No Pendirian" name="no_pendirian" value="<?php echo $no_pendirian; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Keterangan Kantor</th>
                                                                <th>Jumlah Kantor Cabang</th>
                                                            </tr>
                                                            <tr>
                                                                <td><select class="form-control" name="ket_kantor" id="eket_kantor">
                                                                    <option hidden="true">-Silahkan Pilih-</option>
                                                                    <option value="PUSAT" 
                                                                    <?php if ($ket_kantor == 'PUSAT') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                    >Pusat</option>
                                                                    <option value="CABANG" 
                                                                    <?php if ($ket_kantor == 'CABANG') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                    >Cabang</option>
                                                                </select></td>
                                                                <td><input type="number" class="form-control" value="<?php echo $kantor_cabang; ?>" name="kantor_cabang" id="ekantor_cabang"></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Status Kepemilikan</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <select class="form-control" name="kepemilikan">
                                                                        <option hidden="true">-Silahkan Pilih-</option>
                                                                        <option value="Swasta" 
                                                                        <?php if ($kepemilikan == 'Swasta') {
                                                                            echo 'selected';
                                                                        } ?>
                                                                        >Swasta</option>
                                                                        <option value="Persero" 
                                                                        <?php if ($kepemilikan == 'Persero') {
                                                                            echo 'selected';
                                                                        } ?>
                                                                        >Persero</option>
                                                                        <option value="Patungan dengan Negara Asing" 
                                                                        <?php if ($kepemilikan == 'Patungan dengan Negara') {
                                                                            echo 'selected';
                                                                        } ?>
                                                                        >Patungan dengan Negara Asing</option>
                                                                        <option value="Negara Asing" 
                                                                        <?php if ($kepemilikan == 'Negara Asing') {
                                                                            echo 'selected';
                                                                        } ?>
                                                                        >Negara Asing</option>
                                                                        <option value="Perusahaan Umum" 
                                                                        <?php if ($kepemilikan == 'Perusahaan Umum') {
                                                                            echo 'selected';
                                                                        } ?>
                                                                        >Perusahaan Umum</option>
                                                                        <option value="Perusahaan Daerah"  
                                                                        <?php if ($kepemilikan == 'Perusahaan Daerah') {
                                                                            echo 'selected';
                                                                        } ?>
                                                                        >Perusahaan Daerah</option>
                                                                        <option value="Yayasan" 
                                                                        <?php if ($kepemilikan == 'Yayasan') {
                                                                            echo 'selected';
                                                                        } ?>
                                                                        >Yayasan</option>
                                                                        <option value="Koperasi"  
                                                                        <?php if ($kepemilikan == 'Koperasi') {
                                                                            echo 'selected';
                                                                        } ?>
                                                                        >Koperasi</option>
                                                                        <option value="Perorangan"  
                                                                        <?php if ($kepemilikan == 'Perorangan') {
                                                                            echo 'selected';
                                                                        } ?>
                                                                        >Perorangan</option>
                                                                        <option value="Badan Usaha" 
                                                                        <?php if ($kepemilikan == 'Badan Usaha') {
                                                                            echo 'selected';
                                                                        } ?>
                                                                        >Badan Usaha</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Status Permodalan</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><input type="text" class="form-control" name="permodalan" value="<?php echo $permodalan; ?>"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>                         
                                    </div>
                                    <div class="tab-pane fade" id="nav-kerja<?php echo $kode_wlkp; ?>" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> WARGA NEGARA INDONESIA </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <th></th>
                                                                <th><center>Laki - Laki</center></th>
                                                                <th><center>Perempuan</center></th>        
                                                            </tr>
                                                            <tr>
                                                                <td>Dibawah 15 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15" value="<?php echo $l_dibawah_15; ?>" id="el_dibawah_15"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15" value="<?php echo $p_dibawah_15; ?>" id="ep_dibawah_15"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diantara 15 - 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18" value="<?php echo $l_dibawah_18; ?>" id="el_dibawah_18"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18" value="<?php echo $p_dibawah_18; ?>" id="ep_dibawah_18"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diatas 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18" value="<?php echo $l_diatas_18; ?>" id="el_diatas_18"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18" value="<?php echo $p_diatas_18; ?>" id="ep_diatas_18"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Total :</strong></td>
                                                                <td><input type="number" class="form-control" name="total_l" value="<?php echo $total_l; ?>" id="etotal_l" readonly></td>
                                                                <td><input type="number" class="form-control" name="total_p" value="<?php echo $total_p; ?>" id="etotal_p" readonly></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div> 

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> WARGA NEGARA ASING </legend>    
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <th>Laki - Laki</th>
                                                                <th>Perempuan</th> 
                                                                <th>Total</th>       
                                                            </tr>
                                                            <tr>
                                                                <td><input type="number" class="form-control" name="l_wna" value="<?php echo $l_wna; ?>" id="el_wna"></td>
                                                                <td><input type="number" class="form-control" name="p_wna" value="<?php echo $p_wna; ?>" id="ep_wna"></td>
                                                                <td><input type="number" class="form-control" name="total_wna" value="<?php echo $total_wna; ?>" id="etotal_wna" readonly></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> Keadaan Ketenagakerjaan </legend>    
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Waktu Kerja (jam/hari)</label>
                                                            <input type="number" class="form-control" name="waktu_kerja" value="<?php echo $waktu_kerja; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Kategori</label>
                                                            <select class="form-control" name="kategori">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="KECIL" 
                                                                    <?php if ($kategori == 'KECIL') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Kecil</option>
                                                                <option value="SEDANG" 
                                                                    <?php if ($kategori == 'SEDANG') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Sedang</option>
                                                                <option value="BESAR" 
                                                                    <?php if ($kategori == 'BESAR') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Besar</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Penerima UMR</label>
                                                            <input type="number" class="form-control" name="penerima_umr" value="<?php echo $penerima_umr; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Upah</label>
                                                            <input type="number" class="form-control" name="jumlah_upah" value="<?php echo $jumlah_upah; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Upah Tertinggi</label>
                                                            <input type="number" class="form-control" name="upah_tinggi" value="<?php echo $upah_tinggi; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Upah Terendah</label>
                                                            <input type="number" class="form-control" name="upah_rendah" value="<?php echo $upah_rendah; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Laki - Laki Mendatang</label>
                                                            <input type="number" class="form-control" name="l_mendatang" value="<?php echo $l_mendatang; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Perempuan Mendatang</label>
                                                            <input type="number" class="form-control" name="p_mendatang" value="<?php echo $p_mendatang; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Laki - Laki Terakhir</label>
                                                            <input type="number" class="form-control" name="l_terakhir" value="<?php echo $l_terakhir; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Perempuan Terakhir</label>
                                                            <input type="number" class="form-control" name="p_terakhir" value="<?php echo $p_terakhir; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Terakhir</label>
                                                            <input type="number" class="form-control" name="pekerja_terakhir" value="<?php echo $pekerja_terakhir; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Berhenti</label>
                                                            <input type="number" class="form-control" name="pekerja_berhenti" value="<?php echo $pekerja_berhenti; ?>"> 
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> Rencana Kebutuhan Tenaga Kerja </legend>    
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Jumlah Pria Di Butuhkan</label>
                                                            <input type="number" class="form-control" name="sdm_l" value="<?php echo $sdm_l; ?>" id="esdm_l"> 
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Jumlah Wanita Di Butuhkan</label>
                                                            <input type="number" class="form-control" name="sdm_p" value="<?php echo $sdm_p; ?>" id="esdm_p"> 
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Jumlah Tenaga Kerja</label>
                                                            <input type="number" class="form-control" name="jumlah_sdm" value="<?php echo $jumlah_sdm; ?>" id="ejumlah_sdm" readonly> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Tingkat Pendidikan yang Di Butuhkan</label>
                                                            <select class="form-control" name="pendidikan">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="SD" 
                                                                <?php if ($pendidikan == 'SD') {
                                                                    echo 'selected';
                                                                } ?>
                                                                >SD</option>
                                                                <option value="SMP" 
                                                                <?php if ($pendidikan == 'SMP') {
                                                                    echo 'selected';
                                                                } ?>
                                                                >SMP</option>
                                                                <option value="SMA" 
                                                                <?php if ($pendidikan == 'SMA') {
                                                                    echo 'selected';
                                                                } ?>
                                                                >SMA/SMK</option>
                                                                <option value="D3" 
                                                                <?php if ($pendidikan == 'D3') {
                                                                    echo 'selected';
                                                                } ?>
                                                                >D3</option>
                                                                <option value="S1" 
                                                                <?php if ($pendidikan == 'S1') {
                                                                    echo 'selected';
                                                                } ?>
                                                                >S1</option>
                                                                <option value="S2" 
                                                                <?php if ($pendidikan == 'S2') {
                                                                    echo 'selected';
                                                                } ?>
                                                                >S2</option>
                                                                <option value="S3" 
                                                                <?php if ($pendidikan == 'S3') {
                                                                    echo 'selected';
                                                                } ?>
                                                                >S3</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Keterampilan yang Di Butuhkan</label>
                                                            <input type="text" class="form-control" name="keterampilan" value="<?php echo $keterampilan; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-12 col-sm-12">
                                                            <label>Posisi yang Di Butuhkan</label>
                                                            <input type="text" class="form-control" name="posisi" value="<?php echo $posisi; ?>"> 
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-lainnya<?php echo $kode_wlkp; ?>" role="tabpanel" aria-labelledby="nav-contact-tab">
                                       <div class="form-group">
                                            <fieldset>     
                                                <legend> PENGESAHAN </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <th>Tempat Pengesahan</th>
                                                                <th>Tanggal Pembuatan</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" name="tempat_pengesahan" placeholder="Tempat Pengesahan" value="<?php echo $tempat_pengesahan; ?>"></td>
                                                                <td><input type="date" class="form-control" name="tgl_pengesahan" value="<?php echo $tgl_pengesahan; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Pengesah</th>
                                                                <th>NIP. Pengesah</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" name="nama_pengesah" placeholder="Nama Pengesah" value="<?php echo $nama_pengesah; ?>"></td>
                                                                <td><input type="text" class="form-control" name="nip" placeholder="NIP Pengesah" value="<?php echo $nip; ?>"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> ALAT & BAHAN </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <td><input type="checkbox" name="pesawat_uap" value="1" 
                                                                <?php if ($pesawat_uap == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Pesawat Uap </td>
                                                                <td><input type="checkbox" name="pesawat_angkat" value="1" 
                                                                <?php if ($pesawat_angkat == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Pesawat Angkat </td>
                                                                <td><input type="checkbox" name="pesawat_angkut" value="1" 
                                                                <?php if ($pesawat_angkut == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Pesawat Angkut </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="alat_berat" value="1" 
                                                                <?php if ($alat_berat == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Alat - Alat Berat </td>
                                                                <td><input type="checkbox" name="motor" value="1"
                                                                <?php if ($motor == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Motor </td>
                                                                <td><input type="checkbox" name="amdal" value="1"
                                                                <?php if ($amdal == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Amdal </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="ins_listrik" value="1" 
                                                                <?php if ($ins_listrik == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Instalasi Listrik </td>
                                                                <td><input type="checkbox" name="ins_pemadam" value="1" 
                                                                <?php if ($ins_pemadam == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Instalasi Pemadam </td>
                                                                <td><input type="checkbox" name="ins_limbah" value="1" 
                                                                <?php if ($ins_limbah == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Instalasi Pengolah Limbah </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="lift" value="1" 
                                                                <?php if ($lift == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Lift </td>
                                                                <td><input type="checkbox" name="bejana" value="1" 
                                                                <?php if ($bejana == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Bejana Tekan </td>
                                                                <td><input type="checkbox" name="bahan_beracun" value="1" 
                                                                <?php if ($bahan_beracun == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Bahan Beracun </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="turbin" value="1" 
                                                                <?php if ($turbin == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Turbin </td>
                                                                <td><input type="checkbox" name="botol_baja" value="1" 
                                                                <?php if ($botol_baja == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Botol Baja </td>
                                                                <td><input type="checkbox" name="perancah" value="1" 
                                                                <?php if ($perancah == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Perancah </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="radio_aktif" value="1" 
                                                                <?php if ($radio_aktif == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Bahan Radio Aktif </td>
                                                                <td><input type="checkbox" name="penyalur_petir" value="1" 
                                                                <?php if ($penyalur_petir == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Penyalur Petir </td>
                                                                <td><input type="checkbox" name="pembangkit_listrik" value="1" 
                                                                <?php if ($pembangkit_listrik == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Pembangkit Listrik </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="limbah_padat" value="1" 
                                                                <?php if ($limbah_padat == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Limbah Padat </td>
                                                                <td><input type="checkbox" name="limbah_cair" value="1" 
                                                                <?php if ($limbah_cair == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Limbah Cair </td>
                                                                <td><input type="checkbox" name="limbah_gas" value="1" 
                                                                <?php if ($limbah_gas == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Limbah Gas </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div> 

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> FASILITAS KERJA </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <td><input type="checkbox" name="p3k" value="1" 
                                                                <?php if ($p3k == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > P3K </td>
                                                                <td><input type="checkbox" name="klinik" value="1" 
                                                                <?php if ($klinik == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Poliklinik </td>
                                                                <td><input type="checkbox" name="dokter" value="1" 
                                                                <?php if ($dokter == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Dokter Pemeriksa </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="ahli_k3" value="1" 
                                                                <?php if ($ahli_k3 == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Ahli K3 </td>
                                                                <td><input type="checkbox" name="medis" value="1"
                                                                <?php if ($medis == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Paramedis </td>
                                                                <td><input type="checkbox" name=pemadam value="1"
                                                                <?php if ($pemadam == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Regu Pemadam </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="koperasi" value="1" 
                                                                <?php if ($koperasi == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Koperasi Karyawan </td>
                                                                <td><input type="checkbox" name="tpa" value="1" 
                                                                <?php if ($tpa == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > TPA </td>
                                                                <td><input type="checkbox" name="kantin" value="1" 
                                                                <?php if ($kantin == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Kantin </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="sarana_ibadah" value="1" 
                                                                <?php if ($sarana_ibadah == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Sarana Ibadah </td>
                                                                <td><input type="checkbox" name="unit_kb" value="1" 
                                                                <?php if ($unit_kb == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Unit KB Perusahaan </td>
                                                                <td><input type="checkbox" name="olahraga" value="1" 
                                                                <?php if ($olahraga == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Olahraga Kesenian </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="perum" value="1"
                                                                <?php if ($perum == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > Perumahan Karyawan </td>
                                                                <td><input type="checkbox" name="bpjs" value="1" 
                                                                <?php if ($bpjs == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > JAMSOSTEK / BPJS </td>
                                                                <td><input type="checkbox" name="apindo" value="1" 
                                                                <?php if ($apindo == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > APINDO</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="pk" value="1" 
                                                                <?php if ($pk == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > PK </td>
                                                                <td><input type="checkbox" name="pp" value="1" 
                                                                <?php if ($pp == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > PP </td>
                                                                <td><input type="checkbox" name="pkb" value="1" 
                                                                <?php if ($pkb == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > PKB </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="bipartit" value="1" 
                                                                <?php if ($bipartit == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > BIPARTIT </td>
                                                                <td><input type="checkbox" name="sptp" value="1" 
                                                                <?php if ($sptp == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > SPTP </td>
                                                                <td><input type="checkbox" name="uksp" value="1" 
                                                                <?php if ($uksp == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > UKSP </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="p2k3" value="1" 
                                                                <?php if ($p2k3 == '1') {
                                                                    echo 'checked';
                                                                } ?>
                                                                > P2K3 </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>       
                                    </div>
                                </div>
                            </div>                    
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

<script type="text/javascript">
    // Javascript untuk disabled #kantor_cabang jika #ket_kantor = PUSAT
    document.getElementById('ket_kantor').onchange = function () {
        document.getElementById("kantor_cabang").disabled = (this.value === 'PUSAT');
    }

    // Javascript untuk penambahan laki laki WNI
    $(function(){
        $('#l_dibawah_15, #l_dibawah_18, #l_diatas_18').keyup(function(){
            var value1 = parseFloat($('#l_dibawah_15').val()) || 0;
            var value2 = parseFloat($('#l_dibawah_18').val()) || 0;
            var value3 = parseFloat($('#l_diatas_18').val()) || 0;
            $('#total_l').val(value1 + value2 + value3);
            //$('#l_terakhir').val(value1 + value2 + value3);
        });
    });

    // Javascript untuk penambahan perempuan WNI
    $(function(){
        $('#p_dibawah_15, #p_dibawah_18, #p_diatas_18').keyup(function(){
            var value1 = parseFloat($('#p_dibawah_15').val()) || 0;
            var value2 = parseFloat($('#p_dibawah_18').val()) || 0;
            var value3 = parseFloat($('#p_diatas_18').val()) || 0;
            $('#total_p').val(value1 + value2 + value3);
            //$('#p_terakhir').val(value1 + value2 + value3);
        });
    });

    // Javascript untuk penambahan jumlah WNA
    $(function(){
        $('#l_wna, #p_wna').keyup(function(){
            var value1 = parseFloat($('#l_wna').val()) || 0;
            var value2 = parseFloat($('#p_wna').val()) || 0;
            $('#total_wna').val(value1 + value2);
        });
    });

    // Javascript untuk penambahan jumlah SDM
    $(function(){
        $('#sdm_l, #sdm_p').keyup(function(){
            var value1 = parseFloat($('#sdm_l').val()) || 0;
            var value2 = parseFloat($('#sdm_p').val()) || 0;
            $('#jumlah_sdm').val(value1 + value2);
        });
    });

    // // Javascript untuk button Submit Disabled
    // document.getElementById("#nav-lainnya-tab").onclick = function() {
    //     document.getElementById("#submit").attr("disabled", "false").css("cursor", "pointer");
    // }

    
</script>

<script type="text/javascript">
    // Javascript untuk disabled #kantor_cabang jika #ket_kantor = PUSAT
    document.getElementById('eket_kantor').onchange = function () {
        document.getElementById("ekantor_cabang").disabled = (this.value === 'PUSAT');
    }

    // Javascript untuk penambahan laki laki WNI
    $(function(){
        $('#el_dibawah_15, #el_dibawah_18, #el_diatas_18').keyup(function(){
            var value1 = parseFloat($('#el_dibawah_15').val()) || 0;
            var value2 = parseFloat($('#el_dibawah_18').val()) || 0;
            var value3 = parseFloat($('#el_diatas_18').val()) || 0;
            $('#etotal_l').val(value1 + value2 + value3);
        });
    });

    // Javascript untuk penambahan perempuan WNI
    $(function(){
        $('#ep_dibawah_15, #ep_dibawah_18, #ep_diatas_18').keyup(function(){
            var value1 = parseFloat($('#ep_dibawah_15').val()) || 0;
            var value2 = parseFloat($('#ep_dibawah_18').val()) || 0;
            var value3 = parseFloat($('#ep_diatas_18').val()) || 0;
            $('#etotal_p').val(value1 + value2 + value3);
        });
    });

    // Javascript untuk penambahan jumlah WNA
    $(function(){
        $('#el_wna, #ep_wna').keyup(function(){
            var value1 = parseFloat($('#el_wna').val()) || 0;
            var value2 = parseFloat($('#ep_wna').val()) || 0;
            $('#etotal_wna').val(value1 + value2);
        });
    });

    // Javascript untuk penambahan jumlah SDM
    $(function(){
        $('#esdm_l, #esdm_p').keyup(function(){
            var value1 = parseFloat($('#esdm_l').val()) || 0;
            var value2 = parseFloat($('#esdm_p').val()) || 0;
            $('#ejumlah_sdm').val(value1 + value2);
        });
    });

    // // Javascript untuk button Submit Disabled
    // document.getElementById("#nav-lainnya-tab").onclick = function() {
    //     document.getElementById("#submit").attr("disabled", "false").css("cursor", "pointer");
    // }

    
</script>


<script type="text/javascript">
    // Javascript Sweetalert delete
    $(document).ready(function(){
        $("#delete").on("click",function(){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        });
        .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
                .then(() => {
                    window.location.href = '<?php echo base_url(); ?>Admin/delete_wlkp/<?php echo $row->kode_wlkp; ?>';
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
        });
    });
</script>
