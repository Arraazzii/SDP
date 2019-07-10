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
                                                                <td><input type="text" class="form-control" placeholder="No Pendirian" name="no_pendirian"></td>
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
                                                            <input type="number" class="form-control" name="l_terakhir" value="0"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Pekerja Perempuan Terakhir</label>
                                                            <input type="number" class="form-control" name="p_terakhir" value="0"> 
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
                                                                <td><input type="number" class="form-control" name="nip" placeholder="NIP Pengesah"></td>
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
                                                                <td><input type="checkbox" name="pesawat_uap" value="1"> Pesawat Uap </td>
                                                                <td><input type="checkbox" name="pesawat_angkat" value="1"> Pesawat Angkat </td>
                                                                <td><input type="checkbox" name="pesawat_angkut" value="1"> Pesawat Angkut </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="alat_berat" value="1"> Alat - Alat Berat </td>
                                                                <td><input type="checkbox" name="motor" value="1"> Motor </td>
                                                                <td><input type="checkbox" name="amdal" value="1"> Amdal </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="ins_listrik" value="1"> Instalasi Listrik </td>
                                                                <td><input type="checkbox" name="ins_pemadam" value="1"> Instalasi Pemadam </td>
                                                                <td><input type="checkbox" name="ins_limbah" value="1"> Instalasi Pengolah Limbah </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="lift" value="1"> Lift </td>
                                                                <td><input type="checkbox" name="bejana" value="1"> Bejana Tekan </td>
                                                                <td><input type="checkbox" name="bahan_beracun" value="1"> Bahan Beracun </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="turbin" value="1"> Turbin </td>
                                                                <td><input type="checkbox" name="botol_baja" value="1"> Botol Baja </td>
                                                                <td><input type="checkbox" name="perancah" value="1"> Perancah </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="radio_aktif" value="1"> Bahan Radio Aktif </td>
                                                                <td><input type="checkbox" name="penyalur_petir" value="1"> Penyalur Petir </td>
                                                                <td><input type="checkbox" name="pembangkit_listrik" value="1"> Pembangkit Listrik </td>
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
                                                                <td><input type="checkbox" name="p3k" value="1"> P3K </td>
                                                                <td><input type="checkbox" name="klinik" value="1"> Poliklinik </td>
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
                                                                <td><input type="checkbox" name="bpjs" value="1"> JAMSOSTEK / BPJS </td>
                                                                <td><input type="checkbox" name="apindo" value="1"> APINDO</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" name="pk" value="1"> PK </td>
                                                                <td><input type="checkbox" name="pp" value="1"> PP </td>
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
                            <button type="submit" id="submit" class="btn btn-primary" disabled="true" style="cursor: not-allowed;">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
        });
    });

    // Javascript untuk penambahan perempuan WNI
    $(function(){
        $('#p_dibawah_15, #p_dibawah_18, #p_diatas_18').keyup(function(){
            var value1 = parseFloat($('#p_dibawah_15').val()) || 0;
            var value2 = parseFloat($('#p_dibawah_18').val()) || 0;
            var value3 = parseFloat($('#p_diatas_18').val()) || 0;
            $('#total_p').val(value1 + value2 + value3);
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

    // Javascript untuk button Submit Disabled
    $(function() {
        if ($('#nav-lainnya-tab').hasClass('active')) {
            $('#submit').attr("disabled", "false").css("cursor", "pointer");
        }
    })
</script>