<div class="content">
    <?php echo $this->session->flashdata('notif') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Edit K3</h4>
                        <p class="card-category">Lengkapi Surat K3 Anda</p>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="<?php echo base_url('User/uploadK3');?>" method="post" >
                            <?php if ($get_k3 == NULL) {?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. Dokumen</label>
                                        <input type="text" class="form-control" name="no_dokumen" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">No. Registrasi</label>
                                        <input type="text" class="form-control" name="no_registrasi" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Daftar</label>
                                            <input type="date" class="form-control" name="tanggal" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <!-- Standar Form -->
                                    <!-- <h4>Pilih File dari Komputer</h4> -->
                                    <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
                                        <input type="file" name="file" class="btn btn-info btn-sm" required="">
                                        <a href="#" class="text-dark" style="font-size: 20px;"  data-toggle="tooltip" data-placement="top" title=".. MAX FILE SIZE: 8MB .. FILE TYPE : PDF(ONLY)"><i class="fa fa-question-circle"></i></a><br>
                                        <!-- <button type="submit" class="btn btn-sm btn-info">Upload Berkas</button> -->
                                        <!-- </form> -->
                                    </div>
                                </div>
                                <?php }else{
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No. Dokumen</label>
                                                <input type="text" class="form-control" name="no_dokumen" required="" value="<?php echo $get_k3[0]['no_dokumen'];?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">No. Registrasi</label>
                                                <input type="text" class="form-control" name="no_registrasi" required="" value="<?php echo $get_k3[0]['no_registrasi'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $get_k3[0]['id'];?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Daftar</label>
                                                <input type="date" class="form-control" name="tanggal" required="" value="<?php echo $get_k3[0]['tanggal_daftar'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Standar Form -->
                                            <!-- <h4>Pilih File dari Komputer</h4> -->
                                            <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
                                                <input type="file" name="file" class="btn btn-info btn-sm">
                                                <a href="#" class="text-dark" style="font-size: 20px;"  data-toggle="tooltip" data-placement="top" title=".. MAX FILE SIZE: 8MB .. FILE TYPE : PDF(ONLY)"><i class="fa fa-question-circle"></i></a>
                                                <br>
                                                <a href="<?php echo base_url('upload/k3/' .$get_k3[0]['nama_file']);?>" class="text-danger"> File : <?php echo $get_k3[0]['nama_file'];?></a><br>
                                                <!-- <button type="submit" class="btn btn-sm btn-info">Upload Berkas</button> -->
                                                <!-- </form> -->
                                            </div>

                                        </div>
                                        <?php } ?>
                                        <button type="submit" class="btn btn-info pull-right">Perbarui K3</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <?php if ($get_k3 == NULL) {?>
                                <div class="card-body">
                                    <h6 class="card-category text-gray">ANDA BELUM MENGIRIM / MEMPERBAHARUI K3</h6>
                                    <h4 class="card-title"> (K3)</h4>
                                </div>
                                <?php }else{ ?>
                                <div class="card-avatar" style="border-radius: 0px;max-width: 100%;max-height: 100%;">
                                    <a href="#pablo">
                                        <object data="<?php echo base_url('upload/k3/' .$get_k3[0]['nama_file']);?>" type="application/pdf" width="100%" height="100%">
                                        </object>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"> (K3)</h4>
                                    <h6 class="card-category text-gray">Berlaku Sampai : <?php echo date('Y-m-d', strtotime('+1 year', strtotime($get_k3[0]['tanggal_daftar'])) );?></h6>
                                    <?php if ($get_k3[0]['status'] == 2) {?>
                                    <label class="badge badge-danger">FILE K3 KADALUARSA</label>
                                    <?php } ?>
                                    <p class="card-description">
                                        No. Registrasi : <?php echo $get_k3[0]['no_registrasi'];?><br>
                                        No. Dokumen : <?php echo $get_k3[0]['no_dokumen'];?>
                                    </p>
                                    <a href="<?php echo base_url('upload/k3/' .$get_k3[0]['nama_file']);?>" class="btn btn-info btn-round" target="_blank">Download/Detil</a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title ">History Pembaruan</h4>
                                    <p class="card-category"></p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="tableFilter">
                                            <thead class=" text-primary">
                                                <th>
                                                    No.
                                                </th>
                                                <th>
                                                    No. Registrasi
                                                </th>
                                                <th>
                                                    No. Dokumentasi
                                                </th>
                                                <th>
                                                    Tanggal Daftar
                                                </th>
                                                <th>
                                                    Tanggal Pembaruan
                                                </th>
                                                <th>
                                                    Aksi
                                                </th>
                                            </thead>
                                            <tbody>
                                                <?php if ($detail_k3==NULL) {?>
                                                <tr>
                                                    <td colspan="6" class="text-center"><h4>DATA KOSONG</h4></td>
                                                </tr>
                                                <?php }else{
                                                    $no =1;
                                                    foreach($detail_k3 as $detail){
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $no++;?>.
                                                            </td>
                                                            <td>
                                                                <?php echo $detail['no_registrasi'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo $detail['no_dokumen'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo $detail['tanggal_daftar'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo $detail['time'];?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url('upload/k3/' .$detail['nama_file']);?>" class="btn btn-info" target="_blank">Download</a>
                                                            </td>
                                                        </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript" src="<?php echo base_url('assets/assets_user/js/pdfObject.js');?>"></script>
                    <script type="text/javascript" src="<?php echo base_url();?>assets/assets_user/dataTable/jquery.dataTables.min.js"></script>
                    <script type="text/javascript">
                        $('#tableFilter').DataTable();
                    </script>
                    <script type="text/javascript">
                        $(function () {
                          $('[data-toggle="tooltip"]').tooltip()
                      });

                        $(":file").change(function() {
                            if (this.files && this.files[0] && this.files[0].name.match(/\.(pdf)$/) ) {
                                if(this.files[0].size>8048576) {
                                    $(':file').val('');
                                    alert('Batas Maximal Ukuran File 8MB !');
                                }
                                else {
                                    var reader = new FileReader();
                                    reader.readAsDataURL(this.files[0]);
                                }
                            } else{
                                $(':file').val('');
                                alert('Hanya File PDF Yang Diizinkan !');};
                            });
                        </script>
