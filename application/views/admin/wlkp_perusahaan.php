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
                                <a href="<?php echo base_url();?>Admin/wlkp_perusahaan" data-toggle="modal" title="Tambah Data" data-target="#myModal"><button type="button" class="btn btn-outline-primary float-right" style="margin-right: 15px"><i class="fa fa-plus"></i>&nbsp; Data Baru</button></a> 
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="tableFilter">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Alamat</th>
                                            <th>No. Telepon</th>
                                            <th>Tanggal Kadaluarsa</th>
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
                                            <td><?php echo $row->alamat; ?>, KEC.  <?php echo $row->kecamatan; ?></td>
                                            <td><?php echo $row->no_telpon; ?></td>
                                            <td><?php echo $row->tgl_kadaluarsa; ?></td>
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
                                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true" onclick="profile()">Data Perusahaan</a>
                                        <a class="nav-item nav-link" id="nav-kerja-tab" data-toggle="tab" href="#nav-kerja" role="tab" aria-controls="nav-kerja" aria-selected="false" onclick="kerja()">Data Ketenagakerjaan</a>
                                        <a class="nav-item nav-link" id="nav-rencana-tab" data-toggle="tab" href="#nav-rencana" role="tab" aria-controls="nav-rencana" aria-selected="false" onclick="rencana()">Data Rencana Ketenagakerjaan</a>
                                        <a class="nav-item nav-link" id="nav-lainnya-tab" data-toggle="tab" href="#nav-lainnya" role="tab" aria-controls="nav-lainnya" aria-selected="false" onclick="lainnya()">Data Lainnya</a>
                                        <a class="nav-item nav-link" id="nav-tanggal_lapor-tab" data-toggle="tab" href="#nav-tanggal_lapor" role="tab" aria-controls="nav-tanggal_lapor" aria-selected="false" onclick="tanggal_lapor()">Tanggal Lapor</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                                                                <td>
                                                                <select name="kecamatan_perusahaan" class="form-control">
                                                                    <option hidden>-Pilih Kecamatan-</option>
                                                                </select>
                                                                </td>
                                                                <td>
                                                                <select name="kelurahan_perusahaan" class="form-control">
                                                                    <option hidden>-Pilih Kelurahan-</option>
                                                                </select>
                                                                </td>
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
                                                                <th>Alamat Pemilik</th>
                                                                <th>Alamat Pengurus</th>
                                                            </tr>
                                                            <tr>
                                                                <td><textarea class="form-control" name="alamat_pemilik"></textarea></td>
                                                                <td><textarea class="form-control" name="alamat_pengurus"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Tanggal Pendirian</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><input type="date" class="form-control" placeholder="Tgl Pendirian" name="tanggal_pendirian"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tanggal Akte Pendirian</th>
                                                                <th>No. Akte Pendirian</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="date" class="form-control" placeholder="Tgl Pendirian" name="tanggal_akte_pendirian"></td>
                                                                <td><input type="number" class="form-control" placeholder="No Pendirian" name="no_pendirian"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tanggal Akte Perubahan</th>
                                                                <th>No. Akte Perubahan</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="date" class="form-control" name="tanggal_akte_perubahan"></td>
                                                                <td><input type="number" class="form-control" placeholder="No Perubahan" name="no_perubahan"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>No. SIUP</th>
                                                                <th>No. TDP</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="number" class="form-control" name="no_siup"></td>
                                                                <td><input type="number" class="form-control" name="no_tdp"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>No. NPWP</th>
                                                                <th>No. KBLI</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="number" class="form-control" name="no_npwp"></td>
                                                                <td><input type="number" class="form-control" name="no_kbli"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>No. Edabu BPJS Kesehatan</th>
                                                                <th>No. BPJS Tenaga Kerja</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="number" class="form-control" name="no_bpjskes"></td>
                                                                <td><input type="number" class="form-control" name="no_bpjstk"></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Perpindahan Perusahaan</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><input type="text" class="form-control" name="pindah_perusahaan"></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Alamat Lama</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><textarea class="form-control" name="alamat_lama"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Keterangan Kantor</th>
                                                                <th>Jumlah Kantor Cabang</th>
                                                            </tr>
                                                            <tr>
                                                                <td><select class="form-control" name="ket_kantor" id="ket_kantor" onchange="kantor()">
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
                                    <div class="tab-pane fade" id="nav-kerja" role="tabpanel" aria-labelledby="nav-kerja-tab">
                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> WARGA NEGARA INDONESIA </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <th></th>
                                                                <th><center>CPUH</center></th>
                                                                <th><center>CPUBR</center></th>   
                                                                <th><center>CPUBL</center></th>
                                                                <th><center>HL</center></th>   
                                                                <th><center>BR</center></th>
                                                                <th><center>KR</center></th>        
                                                            </tr>
                                                            <tr>
                                                                <th colspan="7">Laki - Laki</th>    
                                                            </tr>
                                                            <tr>
                                                                <td>Dibawah 15 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_cpuh" value="0" id="l_dibawah_15_cpuh"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_cpubr" value="0" id="l_dibawah_15_cpubr"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_cpubl" value="0" id="l_dibawah_15_cpubl"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_hl" value="0" id="l_dibawah_15_hl"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_br" value="0" id="l_dibawah_15_br"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_kr" value="0" id="l_dibawah_15_kr"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="l_dibawah_15" value="0" id="l_dibawah_15"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diantara 15 - 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_cpuh" value="0" id="l_dibawah_18_cpuh"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_cpubr" value="0" id="l_dibawah_18_cpubr"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_cpubl" value="0" id="l_dibawah_18_cpubl"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_hl" value="0" id="l_dibawah_18_hl"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_br" value="0" id="l_dibawah_18_br"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_kr" value="0" id="l_dibawah_18_kr"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="l_dibawah_18" value="0" id="l_dibawah_18"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diatas 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_cpuh" value="0" id="l_diatas_18_cpuh"></td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_cpubr" value="0" id="l_diatas_18_cpubr"></td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_cpubl" value="0" id="l_diatas_18_cpubl"></td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_hl" value="0" id="l_diatas_18_hl"></td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_br" value="0" id="l_diatas_18_br"></td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_kr" value="0" id="l_diatas_18_kr"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="l_diatas_18" value="0" id="l_diatas_18"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Total :</strong></td>
                                                                <td colspan="6"><input type="number" class="form-control" name="total_wni_l" value="0" id="total_wni_l" readonly></td>
                                                            </tr>

                                                            <tr>
                                                                <th colspan="7">Perempuan</th>      
                                                            </tr>
                                                            <tr>
                                                                <td>Dibawah 15 tahun</td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_cpuh" value="0" id="p_dibawah_15_cpuh"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_cpubr" value="0" id="p_dibawah_15_cpubr"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_cpubl" value="0" id="p_dibawah_15_cpubl"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_hl" value="0" id="p_dibawah_15_hl"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_br" value="0" id="p_dibawah_15_br"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_kr" value="0" id="p_dibawah_15_kr"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="p_dibawah_15" value="0" id="p_dibawah_15"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diantara 15 - 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_cpuh" value="0" id="p_dibawah_18_cpuh"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_cpubr" value="0" id="p_dibawah_18_cpubr"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_cpubl" value="0" id="p_dibawah_18_cpubl"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_hl" value="0" id="p_dibawah_18_hl"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_br" value="0" id="p_dibawah_18_br"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_kr" value="0" id="p_dibawah_18_kr"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="p_dibawah_18" value="0" id="p_dibawah_18"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diatas 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_cpuh" value="0" id="p_diatas_18_cpuh"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_cpubr" value="0" id="p_diatas_18_cpubr"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_cpubl" value="0" id="p_diatas_18_cpubl"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_hl" value="0" id="p_diatas_18_hl"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_br" value="0" id="p_diatas_18_br"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_kr" value="0" id="p_diatas_18_kr"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="p_diatas_18" value="0" id="p_diatas_18"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Total :</strong></td>
                                                                <td colspan="6"><input type="number" class="form-control" name="total_wni_p" value="0" id="total_wni_p" readonly></td>
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
                                                                <th></th>
                                                                <th><center>CPUH</center></th>
                                                                <th><center>CPUBR</center></th>   
                                                                <th><center>CPUBL</center></th>
                                                                <th><center>HL</center></th>   
                                                                <th><center>BR</center></th>
                                                                <th><center>KR</center></th>        
                                                            </tr>
                                                            <tr>
                                                                <td>Laki - Laki</td>
                                                                <td><input type="number" class="form-control" name="l_wna_cpuh" value="0" id="l_wna_cpuh"></td>
                                                                <td><input type="number" class="form-control" name="l_wna_cpubr" value="0" id="l_wna_cpubr"></td>
                                                                <td><input type="number" class="form-control" name="l_wna_cpubl" value="0" id="l_wna_cpubl"></td>
                                                                <td><input type="number" class="form-control" name="l_wna_hl" value="0" id="l_wna_hl"></td>
                                                                <td><input type="number" class="form-control" name="l_wna_br" value="0" id="l_wna_br"></td>
                                                                <td><input type="number" class="form-control" name="l_wna_kr" value="0" id="l_wna_kr"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="l_wna" value="0" id="l_wna"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Perempuan</td>
                                                                <td><input type="number" class="form-control" name="p_wna_cpuh" value="0" id="p_wna_cpuh"></td>
                                                                <td><input type="number" class="form-control" name="p_wna_cpubr" value="0" id="p_wna_cpubr"></td>
                                                                <td><input type="number" class="form-control" name="p_wna_cpubl" value="0" id="p_wna_cpubl"></td>
                                                                <td><input type="number" class="form-control" name="p_wna_hl" value="0" id="p_wna_hl"></td>
                                                                <td><input type="number" class="form-control" name="p_wna_br" value="0" id="p_wna_br"></td>
                                                                <td><input type="number" class="form-control" name="p_wna_kr" value="0" id="p_wna_kr"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="p_wna" value="0" id="p_wna"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Total :</strong></td>
                                                                <td colspan="6"><input type="number" class="form-control" name="total_wna" value="0" id="total_wna" readonly></td>
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
                                                            <label>Waktu Kerja</label>
                                                            <select class="form-control" name="waktu_kerja">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="7 jam/hari dan 40 jam/minggu">7 jam/hari dan 40 jam/minggu</option>
                                                                <option value="8 jam/hari dan 40 jam/minggu">8 jam/hari dan 40 jam/minggu</option>         
                                                                <option value="12 jam/hari dan 40 jam/minggu">12 jam/hari dan 40 jam/minggu</option>
                                                                <option value="12 jam/hari selama 10 hari terus menerus">12 jam/hari selama 10 hari terus menerus</option>
                                                                <option value="12 jam/hari selama 14 hari terus menerus">12 jam/hari selama 14 hari terus menerus</option>
                                                                <option value="Lebih lama dari 7  dan 8 jam/hari dan 40 jam/minggu kurang dari 12 jam/hari selama 10 hari terus menerus">Lebih lama dari 7  dan 8 jam/hari dan 40 jam/minggu kurang dari 12 jam/hari selama 10 hari terus menerus</option>
                                                                <option value="Kurang atau sama dengan 24 jam/minggu">Kurang atau sama dengan 24 jam/minggu</option>
                                                                <option value="Kurang atau sama dengan 20 jam/minggu">Kurang atau sama dengan 20 jam/minggu</option>
                                                            </select>
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
                                                        <div class="form-group col-md-12 col-sm-12">
                                                            <label>Tunjangan Hari Raya Keagamaan</label>
                                                            <select class="form-control" name="thr">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="1 Bulan Upah">1 Bulan Upah</option>
                                                                <option value="Lebih dari 1 Bulan Upah">Lebih dari 1 Bulan Upah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> BPJS Tenaga Kerja </legend>    
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Mulai Menjadi Peserta</label>
                                                            <input type="date" class="form-control" name="tgl_bpjs"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Nomor Pendaftaran</label>
                                                            <input type="number" class="form-control" name="no_daftar_bpjs"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jumlah Peserta (Tenaga Kerja)</label>
                                                            <input type="number" class="form-control" name="peserta_tk"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jumlah Peserta (Keluarga)</label>
                                                            <input type="number" class="form-control" name="peserta_kel"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jaminan Kecelakaan</label>
                                                            <input type="text" class="form-control" name="jaminan_kecelakaan"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jaminan Kematian</label>
                                                            <input type="text" class="form-control" name="jaminan_kematian"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jaminan Hari Tua</label>
                                                            <input type="text" class="form-control" name="jaminan_haritua"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jaminan Pensiun</label>
                                                            <input type="text" class="form-control" name="jaminan_pensiun"> 
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset> 
                                        </div>

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> Program Pemagangan </legend>    
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Kebutuhan Pemagangan</label>
                                                            <input type="text" class="form-control" name="kebutuhan_magang"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Peserta</label>
                                                            <input type="number" class="form-control" name="peserta_magang"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Standarisasi</label>
                                                            <select class="form-control" name="standarisasi">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="Khusus">Khusus</option>
                                                                <option value="Internasional">Internasional</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Skema</label>
                                                            <select class="form-control" name="skema">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="Kualifikasi">Kualifikasi</option>
                                                                <option value="Okupasi">Okupasi</option>
                                                                <option value="Kluster">Kluster</option>
                                                            </select>
                                                        </div>
                                                        <fieldset>
                                                            <legend>LSP</legend>    
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">
                                                                    <div class="form-group col-md-4 col-sm-12">
                                                                        <label>P1</label>
                                                                        <input type="text" class="form-control" name="P1"> 
                                                                    </div>
                                                                    <div class="form-group col-md-4 col-sm-12">
                                                                        <label>P2</label>
                                                                        <input type="text" class="form-control" name="P2"> 
                                                                    </div>
                                                                    <div class="form-group col-md-4 col-sm-12">
                                                                        <label>P3</label>
                                                                        <input type="text" class="form-control" name="P3"> 
                                                                    </div>
                                                                    <div class="form-group col-md-12 col-sm-12">
                                                                        <label>Nama</label>
                                                                        <input type="text" class="form-control" name="lsp_nama"> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <br>
                                                        <div class="form-group col-md-12 col-sm-12">
                                                            <label>Penempatan</label>
                                                            <input type="text" class="form-control" name="penempatan"> 
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset> 
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-rencana" role="tabpanel" aria-labelledby="nav-rencana-tab">
                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> Rencana Pekerja Yang Dibutuhkan </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <input id="idrow" value="1" type="hidden" />
                                                        <fieldset>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Laki - Laki</label>
                                                            <input type="number" class="form-control" name="rencana_pekerja_l[]">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Perempuan</label>
                                                            <input type="number" class="form-control" name="rencana_pekerja_p[]">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Tingkat Pendidikan</label>
                                                            <select class="form-control" name="pendidikan[]">
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
                                                            <label>Kualifikasi</label>
                                                            <input type="text" class="form-control" name="kualifikasi[]">
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Untuk Posisi/Jabatan</label>
                                                            <input type="text" class="form-control" name="jabatan[]">
                                                        </div>
                                                        </fieldset>
                                                        <div id="divrow"></div>  
                                                        <br>  
                                                        <div class="form-group col-md-12 col-sm-12">
                                                            <button type="button" class="btn btn-primary float-right" onclick="addmore(); return false;">Add More</button>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                            <br>
                                            <fieldset>     
                                                <legend> Pekerja Pada 12 Bulan Terakhir </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <input id="idrows" value="1" type="hidden" />
                                                        <fieldset>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Laki - Laki</label>
                                                            <input type="number" class="form-control" name="pekerja_l_terakhir[]">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Perempuan</label>
                                                            <input type="number" class="form-control" name="pekerja_p_terakhir[]">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Tingkat Pendidikan</label>
                                                            <select class="form-control" name="pendidikan_terakhir[]">
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
                                                            <label>Kualifikasi</label>
                                                            <input type="text" class="form-control" name="kualifikasi_terakhir[]">
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Untuk Posisi/Jabatan</label>
                                                            <input type="text" class="form-control" name="jabatan_terakhir[]">
                                                        </div>
                                                        </fieldset>
                                                        <div id="divrows"></div>  
                                                        <br>  
                                                        <div class="form-group col-md-12 col-sm-12">
                                                            <button type="button" class="btn btn-primary float-right" onclick="addmores(); return false;">Add More</button>
                                                        </div>                      
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>  
                                    </div>
                                    <div class="tab-pane fade" id="nav-lainnya" role="tabpanel" aria-labelledby="nav-lainnya-tab">
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

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> Perangkat Hubungan Industrial </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <fieldset>
                                                            <legend> Perangkat Hubungan Kerja </legend>
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">
                                                                    <table class="table borderless">
                                                                        <tr>
                                                                            <th>PK</th>
                                                                            <th>PP</th>
                                                                            <th>PKB</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="text" class="form-control" name="phk_pk"></td>
                                                                            <td><input type="text" class="form-control" name="phk_pp"></td>
                                                                            <td><input type="text" class="form-control" name="phk_pkb"></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>    
                                                        </fieldset>
                                                        <br>
                                                        <fieldset>
                                                            <legend> Perangkat Organisasi Ketenagakerjaan </legend>
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">
                                                                    <table class="table borderless">
                                                                        <tr>
                                                                            <th>Bipartit</th>
                                                                            <th>SPTP</th>
                                                                            <th>UKSP</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="text" class="form-control" name="pok_bipartit"></td>
                                                                            <td><input type="text" class="form-control" name="pok_sptp"></td>
                                                                            <td><input type="text" class="form-control" name="pok_uksp"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>P2K3</th>
                                                                            <th>Apindo</th>
                                                                            <th>Kadin</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="text" class="form-control" name="pok_p2k3"></td>
                                                                            <td><input type="text" class="form-control" name="pok_apindo"></td>
                                                                            <td><input type="text" class="form-control" name="pok_kadin"></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>    
                                                        </fieldset>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>   
                                    </div>
                                    <div class="tab-pane fade" id="nav-tanggal_lapor" role="tabpanel" aria-labelledby="nav-tanggal_lapor">
                                       <div class="form-group">
                                            <fieldset>     
                                                <legend> Tanggal Lapor </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <th>Tanggal Lapor</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="date" class="form-control" name="tgl_lapor"></td>
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
                            <button type="submit" id="submit" class="btn btn-primary" style="display: none">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
            foreach ($detail_wlkp_perusahaan as $row):
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
                $alamat_pemilik         = $row->alamat_pemilik;
                $nama_pengurus          = $row->nama_pengurus;
                $alamat_pengurus        = $row->alamat_pengurus;
                $tanggal_pendirian      = $row->tanggal_pendirian;
                $tanggal_akte_pendirian = $row->tanggal_akte_pendirian;
                $no_pendirian           = $row->nomor_pendirian;
                $tanggal_akte_perubahan = $row->tanggal_akte_perubahan;
                $no_perubahan           = $row->nomor_perubahan;
                $no_siup                = $row->no_siup;
                $no_tdp                 = $row->no_tdp;
                $no_npwp                = $row->no_npwp;
                $no_kbli                = $row->no_kbli;
                $no_bpjskes             = $row->no_bpjskes;
                $no_bpjstk              = $row->no_bpjstk;
                $pindah_perusahaan      = $row->pindah_perusahaan;
                $alamat_lama            = $row->alamat_lama;
                $ket_kantor             = $row->ket_kantor;
                $kantor_cabang          = $row->kantor_cabang;
                $kepemilikan            = $row->status_kepemilikan;
                $permodalan             = $row->status_permodalan;
                $tgl_lapor              = $row->tgl_lapor;
                $tgl_kadaluarsa         = $row->tgl_kadaluarsa;

                // TABLE WARGA NEGARA
                $l_dibawah_15_cpuh  = $row->l_dibawah_15_cpuh;
                $l_dibawah_15_cpubr = $row->l_dibawah_15_cpubr;
                $l_dibawah_15_cpubl = $row->l_dibawah_15_cpubl;
                $l_dibawah_15_hl    = $row->l_dibawah_15_hl;
                $l_dibawah_15_br    = $row->l_dibawah_15_br;
                $l_dibawah_15_kr    = $row->l_dibawah_15_kr;

                $p_dibawah_15_cpuh  = $row->p_dibawah_15_cpuh;
                $p_dibawah_15_cpubr = $row->p_dibawah_15_cpubr;
                $p_dibawah_15_cpubl = $row->p_dibawah_15_cpubl;
                $p_dibawah_15_hl    = $row->p_dibawah_15_hl;
                $p_dibawah_15_br    = $row->p_dibawah_15_br;
                $p_dibawah_15_kr    = $row->p_dibawah_15_kr;

                $l_dibawah_18_cpuh  = $row->l_dibawah_18_cpuh;
                $l_dibawah_18_cpubr = $row->l_dibawah_18_cpubr;
                $l_dibawah_18_cpubl = $row->l_dibawah_18_cpubl;
                $l_dibawah_18_hl    = $row->l_dibawah_18_hl;
                $l_dibawah_18_br    = $row->l_dibawah_18_br;
                $l_dibawah_18_kr    = $row->l_dibawah_18_kr;

                $p_dibawah_18_cpuh  = $row->p_dibawah_18_cpuh;
                $p_dibawah_18_cpubr = $row->p_dibawah_18_cpubr;
                $p_dibawah_18_cpubl = $row->p_dibawah_18_cpubl;
                $p_dibawah_18_hl    = $row->p_dibawah_18_hl;
                $p_dibawah_18_br    = $row->p_dibawah_18_br;
                $p_dibawah_18_kr    = $row->p_dibawah_18_kr;

                $l_diatas_18_cpuh  = $row->l_diatas_18_cpuh;
                $l_diatas_18_cpubr = $row->l_diatas_18_cpubr;
                $l_diatas_18_cpubl = $row->l_diatas_18_cpubl;
                $l_diatas_18_hl    = $row->l_diatas_18_hl;
                $l_diatas_18_br    = $row->l_diatas_18_br;
                $l_diatas_18_kr    = $row->l_diatas_18_kr;

                $p_diatas_18_cpuh  = $row->p_diatas_18_cpuh;
                $p_diatas_18_cpubr = $row->p_diatas_18_cpubr;
                $p_diatas_18_cpubl = $row->p_diatas_18_cpubl;
                $p_diatas_18_hl    = $row->p_diatas_18_hl;
                $p_diatas_18_br    = $row->p_diatas_18_br;
                $p_diatas_18_kr    = $row->p_diatas_18_kr;

                $l_wna_cpuh  = $row->l_wna_cpuh;
                $l_wna_cpubr = $row->l_wna_cpubr;
                $l_wna_cpubl = $row->l_wna_cpubl;
                $l_wna_hl    = $row->l_wna_hl;
                $l_wna_br    = $row->l_wna_br;
                $l_wna_kr    = $row->l_wna_kr;

                $p_wna_cpuh  = $row->p_wna_cpuh;
                $p_wna_cpubr = $row->p_wna_cpubr;
                $p_wna_cpubl = $row->p_wna_cpubl;
                $p_wna_hl    = $row->p_wna_hl;
                $p_wna_br    = $row->p_wna_br;
                $p_wna_kr    = $row->p_wna_kr;

                $total_wni_l    = $row->total_wni_l;
                $total_wni_p    = $row->total_wni_p;
                $total_wni      = $row->total_wni;
                $total_l_wna    = $row->total_l_wna;
                $total_p_wna    = $row->total_p_wna;
                $total_wna      = $row->total_wna; 

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
                $thr                = $row->thr;

                // TABLE BPJS
                $tanggal_mulai      = $row->tanggal_mulai;
                $no_daftar_bpjs     = $row->no_daftar_bpjs;
                $peserta_tk         = $row->peserta_tk;
                $peserta_kel        = $row->peserta_keluarga;
                $jaminan_kecelakaan = $row->jaminan_kecelakaan;
                $jaminan_kematian   = $row->jaminan_kematian;
                $jaminan_haritua    = $row->jaminan_haritua;
                $jaminan_pensiun    = $row->jaminan_pensiun;

                // TABLE PEMAGANGAN
                $kebutuhan_magang   = $row->kebutuhan_magang;
                $jmlh_peserta       = $row->jmlh_peserta;
                $standarisasi       = $row->standarisasi;
                $skema              = $row->skema;
                $P1                 = $row->lsp_p1;
                $P2                 = $row->lsp_p2;
                $P3                 = $row->lsp_p3;
                $lsp_nama           = $row->lsp_nama;
                $penempatan         = $row->penempatan;

                // TABLE RENCANA BUTUH TENAGA KERJA
                $rencana_pekerja_l  = $row->rencana_pekerja_l;
                $rencana_pekerja_p  = $row->rencana_pekerja_p;
                $jumlah_pekerja     = $row->jumlah_pekerja;
                $pendidikan         = $row->pendidikan;
                $kualifikasi        = $row->kualifikasi;
                $jabatan            = $row->jabatan;

                // TABLE RENCANA TENAGA KERJA TERAKHIR
                $pekerja_l_terakhir     = $row->pekerja_l_terakhir;
                $pekerja_p_terakhir     = $row->pekerja_p_terakhir;
                $jumlah_sdm             = $row->jumlah_sdm;
                $pendidikan_terakhir    = $row->pendidikan_terakhir;
                $kualifikasi_terakhir   = $row->kualifikasi_terakhir;
                $jabatan_terakhir       = $row->jabatan_terakhir;

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

                // TABLE INDUSTRIAL
                $phk_pk         = $row->phk_pk;
                $phk_pp         = $row->phk_pp;
                $phk_pkb        = $row->phk_pkb;
                $pok_bipartit   = $row->pok_bipartit;
                $pok_sptp       = $row->pok_sptp;
                $pok_uksp       = $row->pok_uksp;
                $pok_p2k3       = $row->pok_p2k3;
                $pok_apindo     = $row->pok_apindo;
                $pok_kadin      = $row->pok_kadin;
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
                                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile<?php echo $kode_wlkp; ?>" role="tab" aria-controls="nav-profile" aria-selected="true" onclick="profile()">Data Perusahaan</a>
                                        <a class="nav-item nav-link" id="nav-kerja-tab" data-toggle="tab" href="#nav-kerja<?php echo $kode_wlkp; ?>" role="tab" aria-controls="nav-kerja" aria-selected="false" onclick="kerja()">Data Ketenagakerjaan</a>
                                        <a class="nav-item nav-link" id="nav-rencana-tab" data-toggle="tab" href="#nav-rencana<?php echo $kode_wlkp; ?>" role="tab" aria-controls="nav-rencana" aria-selected="false" onclick="rencana()">Data Rencana Ketenagakerjaan</a>
                                        <a class="nav-item nav-link" id="nav-lainnya-tab" data-toggle="tab" href="#nav-lainnya<?php echo $kode_wlkp; ?>" role="tab" aria-controls="nav-lainnya" aria-selected="false" onclick="lainnya()">Data Lainnya</a>
                                        <a class="nav-item nav-link" id="nav-tanggal_lapor-tab" data-toggle="tab" href="#nav-tanggal_lapor<?php echo $kode_wlkp; ?>" role="tab" aria-controls="nav-tanggal_lapor" aria-selected="false" onclick="tanggal_lapor()">Tanggal Lapor</a>
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
                                                                <td>              
                                                                <input type="text" class="form-control" value="<?php echo $kecamatan_perusahaan; ?>" id="kecamatan<?php echo $kode_wlkp; ?>">
                                                                <select name="kecamatan_perusahaan" class="form-control" id="ekecamatan<?php echo $kode_wlkp; ?>">
                                                                    <option hidden>-Pilih Kecamatan-</option>
                                                                </select>
                                                                </td>
                                                                <td>
                                                                <input type="text" class="form-control" value="<?php echo $kelurahan_perusahaan; ?>" id="kelurahan<?php echo $kode_wlkp; ?>">
                                                                <select name="kelurahan_perusahaan" class="form-control" id="ekelurahan<?php echo $kode_wlkp; ?>">
                                                                    <option hidden>-Pilih Kelurahan-</option>
                                                                </select>
                                                                </td>
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
                                                                <th>Alamat Pemilik</th>
                                                                <th>Alamat Pengurus</th>
                                                            </tr>
                                                            <tr>
                                                                <td><textarea class="form-control" name="alamat_pemilik"><?php echo $alamat_pemilik; ?></textarea></td>
                                                                <td><textarea class="form-control" name="alamat_pengurus"><?php echo $alamat_pengurus; ?></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Tanggal Pendirian</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><input type="date" class="form-control" placeholder="Tgl Pendirian" name="tanggal_pendirian" value="<?php echo $tanggal_pendirian; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tanggal Akte Pendirian</th>
                                                                <th>No. Akte Pendirian</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="date" class="form-control" placeholder="Tgl Pendirian" name="tanggal_akte_pendirian" value="<?php echo $tanggal_akte_pendirian; ?>"></td>
                                                                <td><input type="number" class="form-control" placeholder="No Pendirian" name="no_pendirian" value="<?php echo $no_pendirian; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tanggal Akte Perubahan</th>
                                                                <th>No. Akte Perubahan</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="date" class="form-control" name="tanggal_akte_perubahan" value="<?php echo $tanggal_akte_perubahan; ?>"></td>
                                                                <td><input type="number" class="form-control" placeholder="No Perubahan" name="no_perubahan" value="<?php echo $no_perubahan; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>No. SIUP</th>
                                                                <th>No. TDP</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="number" class="form-control" name="no_siup" value="<?php echo $no_siup; ?>"></td>
                                                                <td><input type="number" class="form-control" name="no_tdp" value="<?php echo $no_tdp; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>No. NPWP</th>
                                                                <th>No. KBLI</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="number" class="form-control" name="no_npwp" value="<?php echo $no_npwp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="no_kbli" value="<?php echo $no_kbli; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>No. Edabu BPJS Kesehatan</th>
                                                                <th>No. BPJS Tenaga Kerja</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="number" class="form-control" name="no_bpjskes" value="<?php echo $no_bpjskes; ?>"></td>
                                                                <td><input type="number" class="form-control" name="no_bpjstk" value="<?php echo $no_bpjstk; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Perpindahan Perusahaan</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><input type="text" class="form-control" name="pindah_perusahaan" value="<?php echo $pindah_perusahaan; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Alamat Lama</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><textarea class="form-control" name="alamat_lama"><?php echo $alamat_lama; ?></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Keterangan Kantor</th>
                                                                <th>Jumlah Kantor Cabang</th>
                                                            </tr>
                                                            <tr>
                                                                <td><select class="form-control" name="ket_kantor" id="eket_kantor" onchange="kantor()">
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
                                                                <th><center>CPUH</center></th>
                                                                <th><center>CPUBR</center></th>   
                                                                <th><center>CPUBL</center></th>
                                                                <th><center>HL</center></th>   
                                                                <th><center>BR</center></th>
                                                                <th><center>KR</center></th>        
                                                            </tr>
                                                            <tr>
                                                                <th colspan="7">Laki - Laki</th>    
                                                            </tr>
                                                            <tr>
                                                                <td>Dibawah 15 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_cpuh" value="<?php echo $l_dibawah_15_cpuh; ?>" id="l_dibawah_15_cpuh<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_cpubr" value="<?php echo $l_dibawah_15_cpubr; ?>" id="l_dibawah_15_cpubr<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_cpubl" value="<?php echo $l_dibawah_15_cpubl; ?>" id="l_dibawah_15_cpubl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_hl" value="<?php echo $l_dibawah_15_hl; ?>" id="l_dibawah_15_hl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_br" value="<?php echo $l_dibawah_15_br; ?>" id="l_dibawah_15_br<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_15_kr" value="<?php echo $l_dibawah_15_kr; ?>" id="l_dibawah_15_kr<?php echo $kode_wlkp; ?>"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="l_dibawah_15" value="0" id="l_dibawah_15<?php echo $kode_wlkp; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diantara 15 - 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_cpuh" value="<?php echo $l_dibawah_18_cpuh; ?>" id="l_dibawah_18_cpuh<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_cpubr" value="<?php echo $l_dibawah_18_cpubr; ?>" id="l_dibawah_18_cpubr<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_cpubl" value="<?php echo $l_dibawah_18_cpubl; ?>" id="l_dibawah_18_cpubl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_hl" value="<?php echo $l_dibawah_18_hl; ?>" id="l_dibawah_18_hl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_br" value="<?php echo $l_dibawah_18_br; ?>" id="l_dibawah_18_br<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_dibawah_18_kr" value="<?php echo $l_dibawah_18_kr; ?>" id="l_dibawah_18_kr<?php echo $kode_wlkp; ?>"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="l_dibawah_18" value="0" id="l_dibawah_18<?php echo $kode_wlkp; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diatas 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_cpuh" value="<?php echo $l_diatas_18_cpuh; ?>" id="l_diatas_18_cpuh<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_cpubr" value="<?php echo $l_diatas_18_cpubr; ?>" id="l_diatas_18_cpubr<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_cpubl" value="<?php echo $l_diatas_18_cpubl; ?>" id="l_diatas_18_cpubl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_hl" value="<?php echo $l_diatas_18_hl; ?>" id="l_diatas_18_hl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_br" value="<?php echo $l_diatas_18_br; ?>" id="l_diatas_18_br<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_diatas_18_kr" value="<?php echo $l_diatas_18_kr; ?>" id="l_diatas_18_kr<?php echo $kode_wlkp; ?>"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="l_diatas_18" value="0" id="l_diatas_18<?php echo $kode_wlkp; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Total :</strong></td>
                                                                <td colspan="6"><input type="number" class="form-control" name="total_wni_l" value="<?php echo $total_wni_l; ?>" id="total_wni_l<?php echo $kode_wlkp; ?>" readonly></td>
                                                            </tr>

                                                            <tr>
                                                                <th colspan="7">Perempuan</th>    
                                                            </tr>
                                                            <tr>
                                                                <td>Dibawah 15 tahun</td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_cpuh" value="<?php echo $p_dibawah_15_cpuh; ?>" id="p_dibawah_15_cpuh<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_cpubr" value="<?php echo $p_dibawah_15_cpubr; ?>" id="p_dibawah_15_cpubr<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_cpubl" value="<?php echo $p_dibawah_15_cpubl; ?>" id="p_dibawah_15_cpubl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_hl" value="<?php echo $p_dibawah_15_hl; ?>" id="p_dibawah_15_hl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_br" value="<?php echo $p_dibawah_15_br; ?>" id="p_dibawah_15_br<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_15_kr" value="<?php echo $p_dibawah_15_kr; ?>" id="p_dibawah_15_kr<?php echo $kode_wlkp; ?>"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="p_dibawah_15" value="0" id="p_dibawah_15<?php echo $kode_wlkp; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diantara 15 - 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_cpuh" value="<?php echo $p_dibawah_18_cpuh; ?>" id="p_dibawah_18_cpuh<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_cpubr" value="<?php echo $p_dibawah_18_cpubr; ?>" id="p_dibawah_18_cpubr<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_cpubl" value="<?php echo $p_dibawah_18_cpubl; ?>" id="p_dibawah_18_cpubl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_hl" value="<?php echo $p_dibawah_18_hl; ?>" id="p_dibawah_18_hl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_br" value="<?php echo $p_dibawah_18_br; ?>" id="p_dibawah_18_br<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_dibawah_18_kr" value="<?php echo $p_dibawah_18_kr; ?>" id="p_dibawah_18_kr<?php echo $kode_wlkp; ?>"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="p_dibawah_18" value="0" id="p_dibawah_18<?php echo $kode_wlkp; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diatas 18 tahun</td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_cpuh" value="<?php echo $p_diatas_18_cpuh; ?>" id="p_diatas_18_cpuh<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_cpubr" value="<?php echo $p_diatas_18_cpubr; ?>" id="p_diatas_18_cpubr<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_cpubl" value="<?php echo $p_diatas_18_cpubl; ?>" id="p_diatas_18_cpubl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_hl" value="<?php echo $p_diatas_18_hl; ?>" id="p_diatas_18_hl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_br" value="<?php echo $p_diatas_18_br; ?>" id="p_diatas_18_br<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_diatas_18_kr" value="<?php echo $p_diatas_18_kr; ?>" id="p_diatas_18_kr<?php echo $kode_wlkp; ?>"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="p_diatas_18" value="0" id="p_diatas_18<?php echo $kode_wlkp; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Total :</strong></td>
                                                                <td colspan="6"><input type="number" class="form-control" name="total_wni_p" value="<?php echo $total_wni_p; ?>" id="total_wni_p<?php echo $kode_wlkp; ?>" readonly></td>
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
                                                                <th></th>
                                                                <th><center>CPUH</center></th>
                                                                <th><center>CPUBR</center></th>   
                                                                <th><center>CPUBL</center></th>
                                                                <th><center>HL</center></th>   
                                                                <th><center>BR</center></th>
                                                                <th><center>KR</center></th>        
                                                            </tr>
                                                            <tr>
                                                                <td>Laki - Laki</td>
                                                                <td><input type="number" class="form-control" name="l_wna_cpuh" value="<?php echo $l_wna_cpuh; ?>" id="l_wna_cpuh<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_wna_cpubr" value="<?php echo $l_wna_cpubr; ?>" id="l_wna_cpubr<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_wna_cpubl" value="<?php echo $l_wna_cpubl; ?>" id="l_wna_cpubl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_wna_hl" value="<?php echo $l_wna_hl; ?>" id="l_wna_hl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_wna_br" value="<?php echo $l_wna_br; ?>" id="l_wna_br<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="l_wna_kr" value="<?php echo $l_wna_kr; ?>" id="l_wna_kr<?php echo $kode_wlkp; ?>"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="l_wna" value="<?php echo $total_l_wna; ?>" id="l_wna<?php echo $kode_wlkp; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Perempuan</td>             
                                                                <td><input type="number" class="form-control" name="p_wna_cpuh" value="<?php echo $p_wna_cpuh; ?>" id="p_wna_cpuh<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_wna_cpubr" value="<?php echo $p_wna_cpubr; ?>" id="p_wna_cpubr<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_wna_cpubl" value="<?php echo $p_wna_cpubl; ?>" id="p_wna_cpubl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_wna_hl" value="<?php echo $p_wna_hl; ?>" id="p_wna_hl<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_wna_br" value="<?php echo $p_wna_br; ?>" id="p_wna_br<?php echo $kode_wlkp; ?>"></td>
                                                                <td><input type="number" class="form-control" name="p_wna_kr" value="<?php echo $p_wna_kr; ?>" id="p_wna_kr<?php echo $kode_wlkp; ?>"></td>
                                                                <td style="display: none"><input type="number" class="form-control" name="p_wna" value="<?php echo $total_p_wna; ?>" id="p_wna<?php echo $kode_wlkp; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Total :</strong></td>
                                                                <td colspan="6"><input type="number" class="form-control" name="total_wna" value="<?php echo $total_wna; ?>" id="total_wna<?php echo $kode_wlkp; ?>" readonly></td>
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
                                                            <select class="form-control" name="waktu_kerja">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="7 jam/hari dan 40 jam/minggu"
                                                                <?php if ($waktu_kerja == '7 jam/hari dan 40 jam/minggu') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >7 jam/hari dan 40 jam/minggu</option>
                                                                <option value="8 jam/hari dan 40 jam/minggu"
                                                                <?php if ($waktu_kerja == '8 jam/hari dan 40 jam/minggu') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >8 jam/hari dan 40 jam/minggu</option>         
                                                                <option value="12 jam/hari dan 40 jam/minggu"
                                                                <?php if ($waktu_kerja == '12 jam/hari dan 40 jam/minggu') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >12 jam/hari dan 40 jam/minggu</option>
                                                                <option value="12 jam/hari selama 10 hari terus menerus"
                                                                <?php if ($waktu_kerja == '12 jam/hari selama 10 hari terus menerus') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >12 jam/hari selama 10 hari terus menerus</option>
                                                                <option value="12 jam/hari selama 14 hari terus menerus"
                                                                <?php if ($waktu_kerja == '12 jam/hari selama 14 hari terus menerus') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >12 jam/hari selama 14 hari terus menerus</option>
                                                                <option value="Lebih lama dari 7  dan 8 jam/hari dan 40 jam/minggu kurang dari 12 jam/hari selama 10 hari terus menerus"
                                                                <?php if ($waktu_kerja == 'Lebih lama dari 7  dan 8 jam/hari dan 40 jam/minggu kurang dari 12 jam/hari selama 10 hari terus menerus') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Lebih lama dari 7  dan 8 jam/hari dan 40 jam/minggu kurang dari 12 jam/hari selama 10 hari terus menerus</option>
                                                                <option value="Kurang atau sama dengan 24 jam/minggu"
                                                                <?php if ($waktu_kerja == 'Kurang atau sama dengan 24 jam/minggu') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Kurang atau sama dengan 24 jam/minggu</option>
                                                                <option value="Kurang atau sama dengan 20 jam/minggu"
                                                                <?php if ($waktu_kerja == 'Kurang atau sama dengan 20 jam/minggu') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Kurang atau sama dengan 20 jam/minggu</option>
                                                            </select>
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
                                                        <div class="form-group col-md-12 col-sm-12">
                                                            <label>Tunjangan Hari Raya Keagamaan</label>
                                                            <select class="form-control" name="thr">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="1 Bulan Upah"
                                                                    <?php if ($thr == '1 Bulan Upah') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >1 Bulan Upah</option>
                                                                <option value="Lebih dari 1 Bulan Upah"
                                                                    <?php if ($thr == 'Lebih dari 1 Bulan Upah') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Lebih dari 1 Bulan Upah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> BPJS Tenaga Kerja </legend>    
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Mulai Menjadi Peserta</label>
                                                            <input type="date" class="form-control" name="tgl_bpjs" value="<?php echo $tanggal_mulai; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Nomor Pendaftaran</label>
                                                            <input type="number" class="form-control" name="no_daftar_bpjs" value="<?php echo $no_daftar_bpjs; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jumlah Peserta (Tenaga Kerja)</label>
                                                            <input type="number" class="form-control" name="peserta_tk" value="<?php echo $peserta_tk; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jumlah Peserta (Keluarga)</label>
                                                            <input type="number" class="form-control" name="peserta_kel" value="<?php echo $peserta_kel; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jaminan Kecelakaan</label>
                                                            <input type="text" class="form-control" name="jaminan_kecelakaan" value="<?php echo $jaminan_kecelakaan; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jaminan Kematian</label>
                                                            <input type="text" class="form-control" name="jaminan_kematian" value="<?php echo $jaminan_kematian; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jaminan Hari Tua</label>
                                                            <input type="text" class="form-control" name="jaminan_haritua" value="<?php echo $jaminan_haritua; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6">
                                                            <label>Jaminan Pensiun</label>
                                                            <input type="text" class="form-control" name="jaminan_pensiun" value="<?php echo $jaminan_pensiun; ?>"> 
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset> 
                                        </div>

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> Program Pemagangan </legend>    
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Kebutuhan Pemagangan</label>
                                                            <input type="text" class="form-control" name="kebutuhan_magang" value="<?php echo $kebutuhan_magang; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Jumlah Peserta</label>
                                                            <input type="number" class="form-control" name="peserta_magang" value="<?php echo $jmlh_peserta; ?>"> 
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Standarisasi</label>
                                                            <select class="form-control" name="standarisasi">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="KHUSUS"
                                                                    <?php if ($standarisasi == 'KHUSUS') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Khusus</option>
                                                                <option value="INTERNASIONAL"
                                                                    <?php if ($standarisasi == 'INTERNASIONAL') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Internasional</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Skema</label>
                                                            <select class="form-control" name="skema">
                                                                <option hidden>-Silahkan Pilih-</option>
                                                                <option value="KUALIFIKASI"
                                                                    <?php if ($skema == 'KUALIFIKASI') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Kualifikasi</option>
                                                                <option value="OKUPASI"
                                                                    <?php if ($skema == 'OKUPASI') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Okupasi</option>
                                                                <option value="KLUSTER"
                                                                    <?php if ($skema == 'KLUSTER') {
                                                                        echo 'selected';
                                                                    } ?>
                                                                >Kluster</option>
                                                            </select>
                                                        </div>
                                                        <fieldset>
                                                            <legend>LSP</legend>    
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">
                                                                    <div class="form-group col-md-4 col-sm-12">
                                                                        <label>P1</label>
                                                                        <input type="text" class="form-control" name="P1" value="<?php echo $P1; ?>"> 
                                                                    </div>
                                                                    <div class="form-group col-md-4 col-sm-12">
                                                                        <label>P2</label>
                                                                        <input type="text" class="form-control" name="P2" value="<?php echo $P2; ?>"> 
                                                                    </div>
                                                                    <div class="form-group col-md-4 col-sm-12">
                                                                        <label>P3</label>
                                                                        <input type="text" class="form-control" name="P3" value="<?php echo $P3; ?>"> 
                                                                    </div>
                                                                    <div class="form-group col-md-12 col-sm-12">
                                                                        <label>Nama</label>
                                                                        <input type="text" class="form-control" name="lsp_nama" value="<?php echo $lsp_nama; ?>"> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <br>
                                                        <div class="form-group col-md-12 col-sm-12">
                                                            <label>Penempatan</label>
                                                            <input type="text" class="form-control" name="penempatan" value="<?php echo $penempatan; ?>"> 
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset> 
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nav-rencana<?php echo $kode_wlkp; ?>" role="tabpanel" aria-labelledby="nav-rencana-tab">
                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> Rencana Pekerja Yang Dibutuhkan </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <input id="idrow" value="1" type="hidden" />
                                                        <fieldset>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Laki - Laki</label>
                                                            <input type="number" class="form-control" name="rencana_pekerja_l[]">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Perempuan</label>
                                                            <input type="number" class="form-control" name="rencana_pekerja_p[]">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Tingkat Pendidikan</label>
                                                            <select class="form-control" name="pendidikan[]">
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
                                                            <label>Kualifikasi</label>
                                                            <input type="text" class="form-control" name="kualifikasi[]">
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Untuk Posisi/Jabatan</label>
                                                            <input type="text" class="form-control" name="jabatan[]">
                                                        </div>
                                                        </fieldset>
                                                        <div id="divrow"></div>  
                                                        <br>  
                                                        <div class="form-group col-md-12 col-sm-12">
                                                            <button type="button" class="btn btn-primary float-right" onclick="addmore(); return false;">Add More</button>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                            <br>
                                            <fieldset>     
                                                <legend> Pekerja Pada 12 Bulan Terakhir </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <input id="idrows" value="1" type="hidden" />
                                                        <fieldset>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Laki - Laki</label>
                                                            <input type="number" class="form-control" name="pekerja_l_terakhir[]">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Perempuan</label>
                                                            <input type="number" class="form-control" name="pekerja_p_terakhir[]">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label>Tingkat Pendidikan</label>
                                                            <select class="form-control" name="pendidikan_terakhir[]">
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
                                                            <label>Kualifikasi</label>
                                                            <input type="text" class="form-control" name="kualifikasi_terakhir[]">
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-12">
                                                            <label>Untuk Posisi/Jabatan</label>
                                                            <input type="text" class="form-control" name="jabatan_terakhir[]">
                                                        </div>
                                                        </fieldset>
                                                        <div id="divrows"></div>  
                                                        <br>  
                                                        <div class="form-group col-md-12 col-sm-12">
                                                            <button type="button" class="btn btn-primary float-right" onclick="addmores(); return false;">Add More</button>
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

                                        <div class="form-group">
                                            <fieldset>     
                                                <legend> Perangkat Hubungan Industrial </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <fieldset>
                                                            <legend> Perangkat Hubungan Kerja </legend>
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">
                                                                    <table class="table borderless">
                                                                        <tr>
                                                                            <th>PK</th>
                                                                            <th>PP</th>
                                                                            <th>PKB</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="text" class="form-control" name="phk_pk" value="<?php echo $phk_pk; ?>"></td>
                                                                            <td><input type="text" class="form-control" name="phk_pp" value="<?php echo $phk_pp; ?>"></td>
                                                                            <td><input type="text" class="form-control" name="phk_pkb" value="<?php echo $phk_pkb; ?>"></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>    
                                                        </fieldset>
                                                        <br>
                                                        <fieldset>
                                                            <legend> Perangkat Organisasi Ketenagakerjaan </legend>
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">
                                                                    <table class="table borderless">
                                                                        <tr>
                                                                            <th>Bipartit</th>
                                                                            <th>SPTP</th>
                                                                            <th>UKSP</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="text" class="form-control" name="pok_bipartit" value="<?php echo $pok_bipartit; ?>"></td>
                                                                            <td><input type="text" class="form-control" name="pok_sptp" value="<?php echo $pok_sptp; ?>"></td>
                                                                            <td><input type="text" class="form-control" name="pok_uksp" value="<?php echo $pok_uksp; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>P2K3</th>
                                                                            <th>Apindo</th>
                                                                            <th>Kadin</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="text" class="form-control" name="pok_p2k3" value="<?php echo $pok_p2k3; ?>"></td>
                                                                            <td><input type="text" class="form-control" name="pok_apindo" value="<?php echo $pok_apindo; ?>"></td>
                                                                            <td><input type="text" class="form-control" name="pok_kadin" value="<?php echo $pok_kadin; ?>"></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>    
                                                        </fieldset>
                                                    </div>
                                                </div>                                            
                                            </fieldset>  
                                        </div>    
                                    </div>

                                    <div class="tab-pane fade" id="nav-tanggal_lapor<?php echo $kode_wlkp; ?>" role="tabpanel" aria-labelledby="nav-tanggal_lapor">
                                       <div class="form-group">
                                            <fieldset>     
                                                <legend> Tanggal Lapor </legend>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <table class="table borderless">
                                                            <tr>
                                                                <th>Tanggal Lapor</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="date" class="form-control" name="tgl_lapor" value="<?php echo $tgl_lapor; ?>"></td>
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
                            <button type="submit" id="submit" class="btn btn-primary" style="display: none">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <?php endforeach; ?>

<script type="text/javascript">
    // Javascript untuk disabled #kantor_cabang jika #ket_kantor = PUSAT
    function kantor() {
        if ($('#ket_kantor').val() == "PUSAT") {
            $('#kantor_cabang').attr('disabled', 'true');
            $('#kantor_cabang').val('0');
        }
        else if ($('#ket_kantor').val() == "CABANG") {
            $('#kantor_cabang').removeAttr('disabled', 'false');
            $('#kantor_cabang').val('0');
        }
    }

    // Javascript untuk penambahan laki laki WNI
    $(function(){
        $('#l_dibawah_15_cpuh, #l_dibawah_15_cpubr, #l_dibawah_15_cpubl, #l_dibawah_15_hl, #l_dibawah_15_br, #l_dibawah_15_kr').on('keyup change', function(){
            var value1 = parseFloat($('#l_dibawah_15_cpuh').val()) || 0;
            var value2 = parseFloat($('#l_dibawah_15_cpubr').val()) || 0;
            var value3 = parseFloat($('#l_dibawah_15_cpubl').val()) || 0;
            var value4 = parseFloat($('#l_dibawah_15_hl').val()) || 0;
            var value5 = parseFloat($('#l_dibawah_15_br').val()) || 0;
            var value6 = parseFloat($('#l_dibawah_15_kr').val()) || 0;
            var value7 = parseFloat($('#l_dibawah_18').val()) || 0;
            var value8 = parseFloat($('#l_diatas_18').val()) || 0;
            $('#l_dibawah_15').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_l').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    $(function(){
        $('#l_dibawah_18_cpuh, #l_dibawah_18_cpubr, #l_dibawah_18_cpubl, #l_dibawah_18_hl, #l_dibawah_18_br, #l_dibawah_18_kr').on('keyup change', function(){
            var value1 = parseFloat($('#l_dibawah_18_cpuh').val()) || 0;
            var value2 = parseFloat($('#l_dibawah_18_cpubr').val()) || 0;
            var value3 = parseFloat($('#l_dibawah_18_cpubl').val()) || 0;
            var value4 = parseFloat($('#l_dibawah_18_hl').val()) || 0;
            var value5 = parseFloat($('#l_dibawah_18_br').val()) || 0;
            var value6 = parseFloat($('#l_dibawah_18_kr').val()) || 0;
            var value7 = parseFloat($('#l_dibawah_15').val()) || 0;
            var value8 = parseFloat($('#l_diatas_18').val()) || 0;
            $('#l_dibawah_18').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_l').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    $(function(){
        $('#l_diatas_18_cpuh, #l_diatas_18_cpubr, #l_diatas_18_cpubl, #l_diatas_18_hl, #l_diatas_18_br, #l_diatas_18_kr').on('keyup change', function(){
            var value1 = parseFloat($('#l_diatas_18_cpuh').val()) || 0;
            var value2 = parseFloat($('#l_diatas_18_cpubr').val()) || 0;
            var value3 = parseFloat($('#l_diatas_18_cpubl').val()) || 0;
            var value4 = parseFloat($('#l_diatas_18_hl').val()) || 0;
            var value5 = parseFloat($('#l_diatas_18_br').val()) || 0;
            var value6 = parseFloat($('#l_diatas_18_kr').val()) || 0;
            var value7 = parseFloat($('#l_dibawah_15').val()) || 0;
            var value8 = parseFloat($('#l_dibawah_18').val()) || 0;
            $('#l_diatas_18').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_l').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    // Javascript untuk penambahan Perempuan WNI
    $(function(){
        $('#p_dibawah_15_cpuh, #p_dibawah_15_cpubr, #p_dibawah_15_cpubl, #p_dibawah_15_hl, #p_dibawah_15_br, #p_dibawah_15_kr').on('keyup change', function(){
            var value1 = parseFloat($('#p_dibawah_15_cpuh').val()) || 0;
            var value2 = parseFloat($('#p_dibawah_15_cpubr').val()) || 0;
            var value3 = parseFloat($('#p_dibawah_15_cpubl').val()) || 0;
            var value4 = parseFloat($('#p_dibawah_15_hl').val()) || 0;
            var value5 = parseFloat($('#p_dibawah_15_br').val()) || 0;
            var value6 = parseFloat($('#p_dibawah_15_kr').val()) || 0;
            var value7 = parseFloat($('#p_dibawah_18').val()) || 0;
            var value8 = parseFloat($('#p_diatas_18').val()) || 0;
            $('#p_dibawah_15').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_p').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    $(function(){
        $('#p_dibawah_18_cpuh, #p_dibawah_18_cpubr, #p_dibawah_18_cpubl, #p_dibawah_18_hl, #p_dibawah_18_br, #p_dibawah_18_kr').on('keyup change', function(){
            var value1 = parseFloat($('#p_dibawah_18_cpuh').val()) || 0;
            var value2 = parseFloat($('#p_dibawah_18_cpubr').val()) || 0;
            var value3 = parseFloat($('#p_dibawah_18_cpubl').val()) || 0;
            var value4 = parseFloat($('#p_dibawah_18_hl').val()) || 0;
            var value5 = parseFloat($('#p_dibawah_18_br').val()) || 0;
            var value6 = parseFloat($('#p_dibawah_18_kr').val()) || 0;
            var value7 = parseFloat($('#p_dibawah_15').val()) || 0;
            var value8 = parseFloat($('#p_diatas_18').val()) || 0;
            $('#p_dibawah_18').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_p').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    $(function(){
        $('#p_diatas_18_cpuh, #p_diatas_18_cpubr, #p_diatas_18_cpubl, #p_diatas_18_hl, #p_diatas_18_br, #p_diatas_18_kr').on('keyup change', function(){
            var value1 = parseFloat($('#p_diatas_18_cpuh').val()) || 0;
            var value2 = parseFloat($('#p_diatas_18_cpubr').val()) || 0;
            var value3 = parseFloat($('#p_diatas_18_cpubl').val()) || 0;
            var value4 = parseFloat($('#p_diatas_18_hl').val()) || 0;
            var value5 = parseFloat($('#p_diatas_18_br').val()) || 0;
            var value6 = parseFloat($('#p_diatas_18_kr').val()) || 0;
            var value7 = parseFloat($('#p_dibawah_15').val()) || 0;
            var value8 = parseFloat($('#p_dibawah_18').val()) || 0;
            $('#p_diatas_18').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_p').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    // Javascript untuk penambahan jumlah WNA
    $(function(){
        $('#l_wna_cpuh, #l_wna_cpubr, #l_wna_cpubl, #l_wna_hl, #l_wna_br, #l_wna_kr').on('keyup change', function(){
            var value1 = parseFloat($('#l_wna_cpuh').val()) || 0;
            var value2 = parseFloat($('#l_wna_cpubr').val()) || 0;
            var value3 = parseFloat($('#l_wna_cpubl').val()) || 0;
            var value4 = parseFloat($('#l_wna_hl').val()) || 0;
            var value5 = parseFloat($('#l_wna_br').val()) || 0;
            var value6 = parseFloat($('#l_wna_kr').val()) || 0;
            var value7 = parseFloat($('#p_wna').val()) || 0;
            $('#l_wna').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wna').val(value1 + value2 + value3 + value4 + value5 + value6 + value7);
        });
    });

    $(function(){
        $('#p_wna_cpuh, #p_wna_cpubr, #p_wna_cpubl, #p_wna_hl, #p_wna_br, #p_wna_kr').on('keyup change', function(){
            var value1 = parseFloat($('#p_wna_cpuh').val()) || 0;
            var value2 = parseFloat($('#p_wna_cpubr').val()) || 0;
            var value3 = parseFloat($('#p_wna_cpubl').val()) || 0;
            var value4 = parseFloat($('#p_wna_hl').val()) || 0;
            var value5 = parseFloat($('#p_wna_br').val()) || 0;
            var value6 = parseFloat($('#p_wna_kr').val()) || 0;
            var value7 = parseFloat($('#l_wna').val()) || 0;
            $('#p_wna').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wna').val(value1 + value2 + value3 + value4 + value5 + value6 + value7);
        });
    });

    // Javascript untuk button Submit Disabled
    function profile() {
        $('#submit').css('display', 'none');
    }

    function kerja() {
        $('#submit').css('display', 'none');
    }

    function rencana() {
        $('#submit').css('display', 'none');
    }

    function lainnya() {
        $('#submit').css('display', 'none');
    }

    function tanggal_lapor() {
        $('#submit').css('display', '');
    }
    
</script>

<?php
foreach ($data_wlkp_perusahaan as $row):
    $kode_wlkp      = $row->kode_wlkp;
?>

<script type="text/javascript">
    // Javascript untuk disabled #kantor_cabang jika #ket_kantor = PUSAT
    $(function(){
        if ($('#eket_kantor').val() == "PUSAT") {
            $('#ekantor_cabang').attr('disabled', 'true');
            $('#ekantor_cabang').val('0');
        }
        else if ($('#eket_kantor').val() == "CABANG") {
            $('#ekantor_cabang').removeAttr('disabled', 'false');
            $('#ekantor_cabang').val('0');
        }
    });

    function kantor() {
        if ($('#eket_kantor').val() == "PUSAT") {
            $('#ekantor_cabang').attr('disabled', 'true');
            $('#ekantor_cabang').val('0');
        }
        else if ($('#eket_kantor').val() == "CABANG") {
            $('#ekantor_cabang').removeAttr('disabled', 'false');
            $('#ekantor_cabang').val('0');
        }
    }

    // Javascript untuk penambahan laki laki WNI
    $(function(){
        $('#l_dibawah_15_cpuh<?php echo $kode_wlkp; ?>, #l_dibawah_15_cpubr<?php echo $kode_wlkp; ?>, #l_dibawah_15_cpubl<?php echo $kode_wlkp; ?>, #l_dibawah_15_hl<?php echo $kode_wlkp; ?>, #l_dibawah_15_br<?php echo $kode_wlkp; ?>, #l_dibawah_15_kr<?php echo $kode_wlkp; ?>').on('keyup change', function(){
            var value1 = parseFloat($('#l_dibawah_15_cpuh<?php echo $kode_wlkp; ?>').val()) || 0;
            var value2 = parseFloat($('#l_dibawah_15_cpubr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value3 = parseFloat($('#l_dibawah_15_cpubl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value4 = parseFloat($('#l_dibawah_15_hl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value5 = parseFloat($('#l_dibawah_15_br<?php echo $kode_wlkp; ?>').val()) || 0;
            var value6 = parseFloat($('#l_dibawah_15_kr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value7 = parseFloat($('#l_dibawah_18<?php echo $kode_wlkp; ?>').val()) || 0;
            var value8 = parseFloat($('#l_diatas_18<?php echo $kode_wlkp; ?>').val()) || 0;
            $('#l_dibawah_15<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_l<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    $(function(){
        $('#l_dibawah_18_cpuh<?php echo $kode_wlkp; ?>, #l_dibawah_18_cpubr<?php echo $kode_wlkp; ?>, #l_dibawah_18_cpubl<?php echo $kode_wlkp; ?>, #l_dibawah_18_hl<?php echo $kode_wlkp; ?>, #l_dibawah_18_br<?php echo $kode_wlkp; ?>, #l_dibawah_18_kr<?php echo $kode_wlkp; ?>').on('keyup change', function(){
            var value1 = parseFloat($('#l_dibawah_18_cpuh<?php echo $kode_wlkp; ?>').val()) || 0;
            var value2 = parseFloat($('#l_dibawah_18_cpubr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value3 = parseFloat($('#l_dibawah_18_cpubl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value4 = parseFloat($('#l_dibawah_18_hl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value5 = parseFloat($('#l_dibawah_18_br<?php echo $kode_wlkp; ?>').val()) || 0;
            var value6 = parseFloat($('#l_dibawah_18_kr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value7 = parseFloat($('#l_dibawah_15<?php echo $kode_wlkp; ?>').val()) || 0;
            var value8 = parseFloat($('#l_diatas_18<?php echo $kode_wlkp; ?>').val()) || 0;
            $('#l_dibawah_18<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_l<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    $(function(){
        $('#l_diatas_18_cpuh<?php echo $kode_wlkp; ?>, #l_diatas_18_cpubr<?php echo $kode_wlkp; ?>, #l_diatas_18_cpubl<?php echo $kode_wlkp; ?>, #l_diatas_18_hl<?php echo $kode_wlkp; ?>, #l_diatas_18_br<?php echo $kode_wlkp; ?>, #l_diatas_18_kr<?php echo $kode_wlkp; ?>').on('keyup change', function(){
            var value1 = parseFloat($('#l_diatas_18_cpuh<?php echo $kode_wlkp; ?>').val()) || 0;
            var value2 = parseFloat($('#l_diatas_18_cpubr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value3 = parseFloat($('#l_diatas_18_cpubl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value4 = parseFloat($('#l_diatas_18_hl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value5 = parseFloat($('#l_diatas_18_br<?php echo $kode_wlkp; ?>').val()) || 0;
            var value6 = parseFloat($('#l_diatas_18_kr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value7 = parseFloat($('#l_dibawah_15<?php echo $kode_wlkp; ?>').val()) || 0;
            var value8 = parseFloat($('#l_dibawah_18<?php echo $kode_wlkp; ?>').val()) || 0;
            $('#l_diatas_18<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_l<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    // Javascript untuk penambahan Perempuan WNI
    $(function(){
        $('#p_dibawah_15_cpuh<?php echo $kode_wlkp; ?>, #p_dibawah_15_cpubr<?php echo $kode_wlkp; ?>, #p_dibawah_15_cpubl<?php echo $kode_wlkp; ?>, #p_dibawah_15_hl<?php echo $kode_wlkp; ?>, #p_dibawah_15_br<?php echo $kode_wlkp; ?>, #p_dibawah_15_kr<?php echo $kode_wlkp; ?>').on('keyup change', function(){
            var value1 = parseFloat($('#p_dibawah_15_cpuh<?php echo $kode_wlkp; ?>').val()) || 0;
            var value2 = parseFloat($('#p_dibawah_15_cpubr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value3 = parseFloat($('#p_dibawah_15_cpubl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value4 = parseFloat($('#p_dibawah_15_hl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value5 = parseFloat($('#p_dibawah_15_br<?php echo $kode_wlkp; ?>').val()) || 0;
            var value6 = parseFloat($('#p_dibawah_15_kr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value7 = parseFloat($('#p_dibawah_18<?php echo $kode_wlkp; ?>').val()) || 0;
            var value8 = parseFloat($('#p_diatas_18<?php echo $kode_wlkp; ?>').val()) || 0;
            $('#p_dibawah_15<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_p<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    $(function(){
        $('#p_dibawah_18_cpuh<?php echo $kode_wlkp; ?>, #p_dibawah_18_cpubr<?php echo $kode_wlkp; ?>, #p_dibawah_18_cpubl<?php echo $kode_wlkp; ?>, #p_dibawah_18_hl<?php echo $kode_wlkp; ?>, #p_dibawah_18_br<?php echo $kode_wlkp; ?>, #p_dibawah_18_kr<?php echo $kode_wlkp; ?>').on('keyup change', function(){
            var value1 = parseFloat($('#p_dibawah_18_cpuh<?php echo $kode_wlkp; ?>').val()) || 0;
            var value2 = parseFloat($('#p_dibawah_18_cpubr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value3 = parseFloat($('#p_dibawah_18_cpubl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value4 = parseFloat($('#p_dibawah_18_hl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value5 = parseFloat($('#p_dibawah_18_br<?php echo $kode_wlkp; ?>').val()) || 0;
            var value6 = parseFloat($('#p_dibawah_18_kr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value7 = parseFloat($('#p_dibawah_15<?php echo $kode_wlkp; ?>').val()) || 0;
            var value8 = parseFloat($('#p_diatas_18<?php echo $kode_wlkp; ?>').val()) || 0;
            $('#p_dibawah_18<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_p<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    $(function(){
        $('#p_diatas_18_cpuh<?php echo $kode_wlkp; ?>, #p_diatas_18_cpubr<?php echo $kode_wlkp; ?>, #p_diatas_18_cpubl<?php echo $kode_wlkp; ?>, #p_diatas_18_hl<?php echo $kode_wlkp; ?>, #p_diatas_18_br<?php echo $kode_wlkp; ?>, #p_diatas_18_kr<?php echo $kode_wlkp; ?>').on('keyup change', function(){
            var value1 = parseFloat($('#p_diatas_18_cpuh<?php echo $kode_wlkp; ?>').val()) || 0;
            var value2 = parseFloat($('#p_diatas_18_cpubr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value3 = parseFloat($('#p_diatas_18_cpubl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value4 = parseFloat($('#p_diatas_18_hl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value5 = parseFloat($('#p_diatas_18_br<?php echo $kode_wlkp; ?>').val()) || 0;
            var value6 = parseFloat($('#p_diatas_18_kr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value7 = parseFloat($('#p_dibawah_15<?php echo $kode_wlkp; ?>').val()) || 0;
            var value8 = parseFloat($('#p_dibawah_18<?php echo $kode_wlkp; ?>').val()) || 0;
            $('#p_diatas_18<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wni_p<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6 + value7 + value8);
        });
    });

    // Javascript untuk penambahan jumlah WNA
    $(function(){
        $('#l_wna_cpuh<?php echo $kode_wlkp; ?>, #l_wna_cpubr<?php echo $kode_wlkp; ?>, #l_wna_cpubl<?php echo $kode_wlkp; ?>, #l_wna_hl<?php echo $kode_wlkp; ?>, #l_wna_br<?php echo $kode_wlkp; ?>, #l_wna_kr<?php echo $kode_wlkp; ?>').on('keyup change', function(){
            var value1 = parseFloat($('#l_wna_cpuh<?php echo $kode_wlkp; ?>').val()) || 0;
            var value2 = parseFloat($('#l_wna_cpubr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value3 = parseFloat($('#l_wna_cpubl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value4 = parseFloat($('#l_wna_hl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value5 = parseFloat($('#l_wna_br<?php echo $kode_wlkp; ?><?php echo $kode_wlkp; ?>').val()) || 0;
            var value6 = parseFloat($('#l_wna_kr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value7 = parseFloat($('#p_wna').val()) || 0;
            $('#l_wna<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wna<?php echo $kode_wlkp; ?>').val(value1 + value2 + value3 + value4 + value5 + value6 + value7);
        });
    });

    $(function(){
        $('#p_wna_cpuh<?php echo $kode_wlkp; ?>, #p_wna_cpubr<?php echo $kode_wlkp; ?>, #p_wna_cpubl<?php echo $kode_wlkp; ?>, #p_wna_hl<?php echo $kode_wlkp; ?>, #p_wna_br<?php echo $kode_wlkp; ?>, #p_wna_kr<?php echo $kode_wlkp; ?>').on('keyup change', function(){
            var value1 = parseFloat($('#p_wna_cpuh<?php echo $kode_wlkp; ?>').val()) || 0;
            var value2 = parseFloat($('#p_wna_cpubr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value3 = parseFloat($('#p_wna_cpubl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value4 = parseFloat($('#p_wna_hl<?php echo $kode_wlkp; ?>').val()) || 0;
            var value5 = parseFloat($('#p_wna_br<?php echo $kode_wlkp; ?>').val()) || 0;
            var value6 = parseFloat($('#p_wna_kr<?php echo $kode_wlkp; ?>').val()) || 0;
            var value7 = parseFloat($('#l_wna').val()) || 0;
            $('#p_wn<?php echo $kode_wlkp; ?>a').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#p_wna').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#p_wn<?php echo $kode_wlkp; ?>a').val(value1 + value2 + value3 + value4 + value5 + value6);
            $('#total_wna').val(value1 + value2 + value3 + value4 + value5 + value6 + value7);
        });
    });

    $(function() {
        $("#myModalEdit<?php echo $kode_wlkp; ?>").each(function(index){
            var kecamatan = $('#kecamatan<?php echo $kode_wlkp; ?>').val();
            var kelurahan = $('#kelurahan<?php echo $kode_wlkp; ?>').val();
            var form_data = {}

            var kecamatanLoad = false;
            $.ajax({
                url: "<?= base_url() ?>indonesia/get_kecamatan",
                type: "POST",
                data: form_data,
                dataType: "json",
                async:false,
                success : function(data){
                    $('#ekecamatan<?php echo $kode_wlkp; ?>').empty();
                    var option = "<option value=''>-Pilih Kecamatan-</option>";
                    $.each(data, function(index, value){
                    // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                        if (value.name === kecamatan) {
                            option += "<option value='"+value.name+"' selected>"+value.name+"</option>";
                        }
                        else {
                            option += "<option value='"+value.name+"' >"+value.name+"</option>";
                        }
                    });
                    console.log(data, option);
                    $('#ekecamatan<?php echo $kode_wlkp; ?>').append(option);
                    kecamatanLoad = true;
                },
                error : function(e){
                  console.log(e);
                },
            });

            var kelurahanLoad = false;
            $('#ekecamatan<?php echo $kode_wlkp; ?>').change(function(){
                var form_data = {
                    districtsId : $(this).val(),
                }

                $.ajax({
                    url: "<?= base_url() ?>indonesia/get_kelurahan",
                    type: "POST",
                    data: form_data,
                    dataType: "json",
                    async:false,
                    success : function(data){
                        $('#ekelurahan<?php echo $kode_wlkp; ?>').empty();
                        var option = "<option value=''>-Pilih Kelurahan-</option>";
                        $.each(data, function(index, value){
                            // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                            if (value.name === kelurahan) {
                                option += "<option value='"+value.name+"' selected>"+value.name+"</option>";
                            }
                            else {
                                option += "<option value='"+value.name+"' >"+value.name+"</option>";
                            }
                        });
                        console.log(data, option);
                        $('#ekelurahan<?php echo $kode_wlkp; ?>').append(option);
                        kelurahanLoad = true;
                    },
                    error : function(e){
                      console.log(e);
                    },
                });
            });

            var kecamatanLength = false;
            if (kecamatan != "" && kecamatanLoad == true) {
                $('#ekecamatan<?php echo $kode_wlkp; ?>').val(kecamatan.toUpperCase()).change();
                kecamatanLength = true;
            }
        });

        var kelurahanLength = false;
        if (kecamatanLength == true && kelurahan != "" && kelurahanLoad == true) {
            $('#ekelurahan<?php echo $kode_wlkp; ?>').val(kelurahan.toUpperCase()).change();
            kelurahanLength = true;
        }
    });
</script>


<?php endforeach; ?>


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

<script language="javascript">
    function addmore() {
        var idrow = document.getElementById("idrow").value;
        var stre;
        stre="<div id='row" + idrow + "'><br><fieldset><div class='form-group col-md-4 col-sm-12'><label>Laki - Laki</label><input type='number' class='form-control' name='pekerja_l_terakhir[]'></div><div class='form-group col-md-4 col-sm-12'><label>Perempuan</label><input type='number' class='form-control' name='pekerja_p_terakhir[]'></div><div class='form-group col-md-4 col-sm-12'><label>Tingkat Pendidikan</label><select class='form-control' name='pendidikan_terakhir[]'><option hidden>-Silahkan Pilih-</option><option value='SD'>SD</option><option value='SMP'>SMP</option><option value='SMA'>SMA/SMK</option><option value='D3'>D3</option><option value='S1'>S1</option><option value='S2'>S2</option><option value='S3'>S3</option></select></div><div class='form-group col-md-5 col-sm-12'><label>Kualifikasi</label><input type='text' class='form-control' name='kualifikasi_terakhir[]'></div><div class='form-group col-md-5 col-sm-12'><label>Untuk Posisi/Jabatan</label><input type='text' class='form-control' name='jabatan_terakhir[]'></div><div class='form-group col-md-2 col-sm-12'><label>&nbsp;</label><br><button type='button' class='btn btn-outline-danger float-right' style='width: 100%' onclick='delrow(\"#row" + idrow + "\");'><i class='fa fa-trash'></i></button></div></fieldset></div>";
        $("#divrow").append(stre); 
        idrow = (idrow-1) + 2;
        document.getElementById("idrow").value = idrow;
    }
    
    function delrow(idrow) {
        $(idrow).remove();
    }
</script>

<script language="javascript">
    function addmores() {
        var idrows = document.getElementById("idrows").value;
        var stres;
        stres="<div id='rows" + idrows + "'><br><fieldset><div class='form-group col-md-4 col-sm-12'><label>Laki - Laki</label><input type='number' class='form-control' name='rencana_pekerja_l[]'></div><div class='form-group col-md-4 col-sm-12'><label>Perempuan</label><input type='number' class='form-control' name='rencana_pekerja_p[]'></div><div class='form-group col-md-4 col-sm-12'><label>Tingkat Pendidikan</label><select class='form-control' name='pendidikan[]'><option hidden>-Silahkan Pilih-</option><option value='SD'>SD</option><option value='SMP'>SMP</option><option value='SMA'>SMA/SMK</option><option value='D3'>D3</option><option value='S1'>S1</option><option value='S2'>S2</option><option value='S3'>S3</option></select></div><div class='form-group col-md-5 col-sm-12'><label>Kualifikasi</label><input type='text' class='form-control' name='kualifikasi[]'></div><div class='form-group col-md-5 col-sm-12'><label>Untuk Posisi/Jabatan</label><input type='text' class='form-control' name='jabatan[]'></div><div class='form-group col-md-2 col-sm-12'><label>&nbsp;</label><br><button type='button' class='btn btn-outline-danger float-right' style='width: 100%' onclick='delrows(\"#rows" + idrows + "\");'><i class='fa fa-trash'></i></button></div></fieldset></div>";
        $("#divrows").append(stres); 
        idrows = (idrows-1) + 2;
        document.getElementById("idrows").value = idrows;
    }
    
    function delrows(idrows) {
        $(idrows).remove();
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var form_data = { }

        $.ajax({
            url: "<?= base_url() ?>indonesia/get_kecamatan",
            type: "POST",
            data: form_data,
            dataType: "json",
            success : function(data){
                $("select[name='kecamatan_perusahaan']").empty();
                var option = "<option value=''>-Pilih Kecamatan-</option>";
                $.each(data, function(index, value){
                    // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                    option += "<option value='"+value.name+"'>"+value.name+"</option>";
                });
                console.log(data, option);
                $("select[name='kecamatan_perusahaan']").append(option);
            },
            error : function(e){
                console.log(e);
            },
        });

        $("select[name='kecamatan_perusahaan']").change(function(){
            var form_data = {
                districtsId : $(this).val(),
            }
            
            $.ajax({
                url: "<?= base_url() ?>indonesia/get_kelurahan",
                type: "POST",
                data: form_data,
                dataType: "json",
                success : function(data){
                    $("select[name='kelurahan_perusahaan']").empty();
                    var option = "<option value=''>-Pilih Kelurahan-</option>";
                    $.each(data, function(index, value){
                        // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                        option += "<option value='"+value.name+"'>"+value.name+"</option>";
                    });
                    console.log(data, option);
                    $("select[name='kelurahan_perusahaan']").append(option);
                },
                error : function(e){
                    console.log(e);
                },
            });
        });
    });
</script>

