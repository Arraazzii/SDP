<?php
    $dbhost = 'localhost'; 
    $dbuser = 'root';     
    $dbpass = '';    
    $dbname = 'db_perusahaan';
 
    $connect = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

    if ($connect->connect_error) {
        die('Maaf koneksi gagal: '. $connect->connect_error);
    }
?>


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
                            <li class="active">Dashboard</li>
                            <li>Perusahaan Baru</li>
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
                                <strong class="card-title">Data Perusahaan Baru</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
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
                                            foreach ($perusahaan_baru->result_array() as $row):
                                                $kode_perusahaan = $row['kode_perusahaan'];
                                                $nama_perusahaan = $row['nama_perusahaan'];
                                                $nama_pimpinan   = $row['nama'];
                                                $alamat          = $row['alamat'];
                                                $no_telpon       = $row['no_telpon'];
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $nama_perusahaan; ?></td>
                                            <td><?php echo $nama_pimpinan; ?></td>
                                            <td><?php echo $alamat; ?></td>
                                            <td><?php echo $no_telpon; ?></td>
                                            <td><a href="<?php echo base_url();?>Admin/userbaru/<?php echo $kode_perusahaan ;?>" data-toggle="modal" title="Edit Data" data-target="#myModal<?php echo $kode_perusahaan;?>" class="btn btn-outline-primary">Detail</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <script src="<?php echo base_url();?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/jszip/dist/jszip.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url();?>assets/custom/js/init-scripts/data-table/datatables-init.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
        //@naresh action dynamic childs
        var next = 0;
        $("#add-more").click(function(e) {
            e.preventDefault();
            var addto = "#field" + next;
            var addRemove = "#field" + (next);
            next = next + 1;
            var newIn = '<div id="field' + next + '" name="field' + next + '"><div class="form-group"><label>Nama Pengurus</label><input type="text" class="form-control" placeholder="Nama Pengurus"></div><div class="form-group"><label>Alamat Pengurus</label><textarea class="form-control"></textarea></div><div class="form-group"><label>Provinsi</label><select class="form-control"><option hidden>-Pilih Provinsi-</option></select></div><div class="form-group"><label>Kabupaten/Kota</label><select class="form-control"><option hidden>-Pilih Kabupaten/Kota-</option></select></div><div class="form-group"><label>Kecamatan</label><select class="form-control"><option hidden>-Pilih Kecamatan-</option></select></div><div class="form-group"><label>Kelurahan</label><select class="form-control"><option hidden>-Pilih Kelurahan-</option></select></div><div class="form-group"><label>Kode Pos</label><input type="text" class="form-control" placeholder="Kode Pos"></div><div class="form-group"><label>Telp. Pengurus</label><input type="text" class="form-control" placeholder="Telp. Pengurus"></div></div>';
            var newInput = $(newIn);
            var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
            var removeButton = $(removeBtn);
            $(addto).after(newInput);
            $(addRemove).after(removeButton);
            $("#field" + next).attr('data-source', $(addto).attr('data-source'));
            $("#count").val(next);

            $('.remove-me').click(function(e) {
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length - 1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
        });

    });

</script>
</body>

</html>
<?php
    foreach ($perusahaan_baru->result_array() as $row):
        $kode_perusahaan = $row['kode_perusahaan'];
        $email           = $row['email'];
        $kode_alamat     = $row['kode_alamat'];
        $nama_perusahaan = $row['nama_perusahaan'];
        $alamat          = $row['alamat'];
        $kelurahan       = $row['kelurahan'];
        $kecamatan       = $row['kecamatan'];
        $kota            = $row['kota'];
        $provinsi        = $row['provinsi'];
        $kode_pos        = $row['kode_pos'];
        $no_telpon       = $row['no_telpon']; 
        $logo_perusahaan = $row['logo'];
        $deskripsi       = $row['deskripsi'];
        $dsk             = $row['dsk'];
        $siup            = $row['siup'];
        $tdp             = $row['tdp'];
        $akte            = $row['akte'];
        $surat_hakim     = $row['hakim'];
        $domisili        = $row['domisili'];
?>
<div class="modal fade" id="myModal<?php echo $kode_perusahaan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Detail Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" method="post" action="<?php echo base_url();?>Admin/terima">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $kode_perusahaan; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <div class="default-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home<?php echo $kode_perusahaan;?>" role="tab" aria-controls="nav-home" aria-selected="true">Data Perusahaan</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile<?php echo $kode_perusahaan;?>" role="tab" aria-controls="nav-profile" aria-selected="false">Data Pengurus</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact<?php echo $kode_perusahaan;?>" role="tab" aria-controls="nav-contact" aria-selected="false">File Pendukung</a>
                            </div>
                        </nav>
                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home<?php echo $kode_perusahaan;?>" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="form-group">
                                    <label class="form-control-label">Logo Perusahaan</label>
                                    <img class="rounded-circle mx-auto d-block" style="width:200px;height:200px" src="<?php echo base_url();?>upload/logo/<?php echo $logo_perusahaan; ?>" alt="Card image cap">
                                </div>
                                <div class="form-group">
                                    <label>Nama Perusahaan</label>
                                    <input type="text" class="form-control" value="<?php echo $nama_perusahaan; ?>" name="nama" placeholder="Nama Perusahaan" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Perusahaan</label>
                                    <textarea class="form-control" readonly><?php echo $alamat; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text" class="form-control" value="<?php echo $provinsi; ?>" placeholder="Provinsi" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kabupaten/Kota</label>
                                    <input type="text" class="form-control" value="<?php echo $kota; ?>" placeholder="Kabupaten/Kota" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control" value="<?php echo $kecamatan; ?>" placeholder="Kecamatan" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input type="text" class="form-control" value="<?php echo $kelurahan; ?>" placeholder="Kelurahan" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" class="form-control" value="<?php echo $kode_pos; ?>" placeholder="Kode Pos" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Telp. Perusahaan</label>
                                    <input type="text" class="form-control" value="<?php echo $no_telpon; ?>" placeholder="Telp. Perusahaan" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Perusahaan</label>
                                    <textarea class="form-control" readonly><?php echo $deskripsi; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>KLUI</label>
                                    <textarea class="form-control" readonly><?php echo $dsk; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="file-input" class=" form-control-label">SIUP</label><br>
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <object data="<?php echo base_url();?>upload/siup/<?php echo $siup; ?>" type="application/pdf" width="100%" height="200"></object>
                                                    </div>
                                                    <a href="<?php echo base_url();?>upload/siup/<?php echo $siup; ?>" target="_blank" class="btn btn-primary col-12">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="file-input" class=" form-control-label">TDP</label><br>
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <object data="<?php echo base_url();?>upload/tdp/<?php echo $tdp; ?>" type="application/pdf" width="100%" height="200"></object>
                                                    </div>
                                                    <a href="<?php echo base_url();?>upload/tdp/<?php echo $tdp; ?>" target="_blank" class="btn btn-primary col-12">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="file-input" class=" form-control-label">AKTE</label><br>
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <object data="<?php echo base_url();?>upload/akte/<?php echo $akte; ?>" type="application/pdf" width="100%" height="200"></object>
                                                    </div>
                                                    <a href="<?php echo base_url();?>upload/akte/<?php echo $akte; ?>" target="_blank" class="btn btn-primary col-12">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="file-input" class=" form-control-label">SURAT HAKIM</label><br>
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <object data="<?php echo base_url();?>upload/hakim/<?php echo $surat_hakim; ?>" type="application/pdf" width="100%" height="200"></object>
                                                    </div>
                                                    <a href="<?php echo base_url();?>upload/hakim/<?php echo $surat_hakim; ?>" target="_blank" class="btn btn-primary col-12">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="file-input" class=" form-control-label">DOMISILI</label><br>
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <object data="<?php echo base_url();?>upload/domisili/<?php echo $domisili; ?>" type="application/pdf" width="100%" height="200"></object>
                                                    </div>
                                                    <a href="<?php echo base_url();?>upload/domisili/<?php echo $domisili; ?>" target="_blank" class="btn btn-primary col-12">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile<?php echo $kode_perusahaan;?>" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div id="field">
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
                                                    
                                                    $sql1 = "SELECT * FROM table_pengurus JOIN table_alamat ON table_pengurus.kode_alamat = table_alamat.kode_alamat WHERE table_pengurus.kode_perusahaan = '$kode_perusahaan'";
                                                    $result = mysqli_query($connect, $sql1);
                                                    $no1 = 1;
                                                    while ($row1 = mysqli_fetch_array($result)) {
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
                                    <hr>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact<?php echo $kode_perusahaan;?>" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <?php
                                    
                                    $sql2 = "SELECT * FROM table_pp JOIN table_perusahaan ON table_pp.kode_perusahaan = table_perusahaan.kode_perusahaan WHERE table_perusahaan.kode_perusahaan = '$kode_perusahaan' AND table_pp.status = '1'";
                                    $result2 = mysqli_query($connect, $sql2);
                                    while ($row2 = mysqli_fetch_array($result2)){
                                ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="file-input" class=" form-control-label">PP</label><br>
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <embed src="<?php echo base_url();?>upload/pp/<?php echo $row2['nama_file']; ?>">
                                                    </div>
                                                    <a href="<?php echo base_url();?>upload/pp/<?php echo $row2['nama_file']; ?>" target="_blank" class="btn btn-primary col-10">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                            <input type="text" class="form-control" placeholder="No. Registrasi" value="<?php echo $row2['no_dokumen']; ?>" readonly>
                                            <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                            <input type="text" class="form-control" placeholder="No. Registrasi" value="<?php echo $row2['no_registrasi']; ?>" readonly>
                                            <label for="file-input" class=" form-control-label">Tanggal Daftar</label>
                                            <input type="date" class="form-control" value="<?php echo $row2['tanggal_daftar']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <br>
                                <?php
                                    $sql3 = "SELECT * FROM table_pkb JOIN table_perusahaan ON table_pkb.kode_perusahaan = table_perusahaan.kode_perusahaan WHERE table_perusahaan.kode_perusahaan = '$kode_perusahaan' AND table_pkb.status = '1'";
                                    $result3 = mysqli_query($connect, $sql3);
                                    while ($row3 = mysqli_fetch_array($result3)){
                                    
                                ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="file-input" class=" form-control-label">PKB</label><br>
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <embed src="<?php echo base_url();?>upload/pkb/<?php echo $row3['nama_file']; ?>">
                                                    </div>
                                                    <a href="<?php echo base_url();?>upload/pkb/<?php echo $row3['nama_file']; ?>" target="_blank" class="btn btn-primary col-10">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                            <input type="text" class="form-control" placeholder="No. Registrasi" value="<?php echo $row3['no_dokumen']; ?>" readonly>
                                            <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                            <input type="text" class="form-control" placeholder="No. Registrasi" value="<?php echo $row3['no_registrasi']; ?>" readonly>
                                            <label for="file-input" class=" form-control-label">Tanggal Daftar</label>
                                            <input type="date" class="form-control" value="<?php echo $row3['tanggal_daftar']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <br>
                                <?php
                                    $sql4 = "SELECT * FROM table_lks JOIN table_perusahaan ON table_lks.kode_perusahaan = table_perusahaan.kode_perusahaan WHERE table_perusahaan.kode_perusahaan = '$kode_perusahaan' AND table_lks.status = '1'";
                                    $result4 = mysqli_query($connect, $sql4);
                                    while ($row4 = mysqli_fetch_array($result4)){
                                    
                                ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="file-input" class=" form-control-label">LKS</label><br>
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <embed src="<?php echo base_url();?>upload/lks/<?php echo $row4['nama_file']; ?>">
                                                    </div>
                                                    <a href="<?php echo base_url();?>upload/lks/<?php echo $row4['nama_file']; ?>" target="_blank" class="btn btn-primary col-10">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                            <input type="text" class="form-control" placeholder="No. Registrasi" value="<?php echo $row4['no_dokumen']; ?>" readonly>
                                            <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                            <input type="text" class="form-control" placeholder="No. Registrasi" value="<?php echo $row4['no_registrasi']; ?>" readonly>
                                            <label for="file-input" class=" form-control-label">Tanggal Daftar</label>
                                            <input type="date" class="form-control" value="<?php echo $row4['tanggal_daftar']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <br>
                                <?php
                                    $sql5 = "SELECT * FROM table_k3 JOIN table_perusahaan ON table_k3.kode_perusahaan = table_perusahaan.kode_perusahaan WHERE table_perusahaan.kode_perusahaan = '$kode_perusahaan' AND table_k3.status = '1'";
                                    $result5 = mysqli_query($connect, $sql5);
                                    while ($row5 = mysqli_fetch_array($result5)){
                                    
                                ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="file-input" class=" form-control-label">K3</label><br>
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <embed src="<?php echo base_url();?>upload/k3/<?php echo $row5['nama_file']; ?>">
                                                    </div>
                                                    <a href="<?php echo base_url();?>upload/k3/<?php echo $row5['nama_file']; ?>" target="_blank" class="btn btn-primary col-10">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                            <input type="text" class="form-control" placeholder="No. Registrasi" value="<?php echo $row5['no_dokumen']; ?>" readonly>
                                            <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                            <input type="text" class="form-control" placeholder="No. Registrasi" value="<?php echo $row5['no_registrasi']; ?>" readonly>
                                            <label for="file-input" class=" form-control-label">Tanggal Daftar</label>
                                            <input type="date" class="form-control" value="<?php echo $row5['tanggal_daftar']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <br>
                                <?php
                                    $sql6 = "SELECT * FROM table_wlkp JOIN table_perusahaan ON table_wlkp.kode_perusahaan = table_perusahaan.kode_perusahaan WHERE table_perusahaan.kode_perusahaan = '$kode_perusahaan' AND table_wlkp.status = '1'";
                                    $result6 = mysqli_query($connect, $sql6);
                                    while ($row6 = mysqli_fetch_array($result6)){
                                    
                                ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="file-input" class=" form-control-label">WLKP</label><br>
                                            <div class="file-box">
                                                <div class="box-content">
                                                    <div class="preview">
                                                        <embed src="<?php echo base_url();?>upload/wlkp/<?php echo $row6['nama_file']; ?>">
                                                    </div>
                                                    <a href="<?php echo base_url();?>upload/wlkp/<?php echo $row6['nama_file']; ?>" target="_blank" class="btn btn-primary col-10">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                            <input type="text" class="form-control" placeholder="No. Registrasi" value="<?php echo $row6['no_dokumen']; ?>" readonly>
                                            <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                            <input type="text" class="form-control" placeholder="No. Registrasi" value="<?php echo $row6['no_registrasi']; ?>" readonly>
                                            <label for="file-input" class=" form-control-label">Tanggal Daftar</label>
                                            <input type="date" class="form-control" value="<?php echo $row6['tanggal_daftar']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Terima</button>
                    <a href="<?php echo base_url(); ?>Admin/tolak/<?php echo $kode_perusahaan; ?>">
                        <button type="button" class="btn btn-danger">Tolak</button>
                    </a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</ftdiv>
<?php endforeach; ?>