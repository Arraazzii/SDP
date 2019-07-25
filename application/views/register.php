<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Page</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/apple-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/custom/css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<style type="text/css">
@media(max-width: 767px){
    #progressbar li{
        width: 100% !important;
    }
}
.wizard > .content > .body{
    position: relative !important;
}
#progressbar {
    overflow: hidden;
    counter-reset: step;
}

#progressbar li {
    text-align: center;
    list-style-type: none;
    color: #111;
    text-transform: uppercase;
    font-size: 9px;
    width: 33.3%;
    float: left;
    position: relative;
    letter-spacing: 1px;
}

#progressbar li:before {
    border: 1px solid #007bff;
    content: counter(step);
    counter-increment: step;
    width: 100%;
    height: 24px;
    line-height: 26px;
    display: block;
    font-size: 12px;
    color: #007bff;
    background: white;
    border-radius: 25px;
    margin: 0 auto 10px auto;
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: #00abcf;
    position: absolute;
    left: -50%;
    top: 9px;
    z-index: -1;
}

#progressbar li:first-child:after {
    content: none;
}


#progressbar li.active:before, #progressbar li.active:after {
    background: #007bff;
    color: white;
}
#form-ms fieldset:not(:first-of-type) {
    display: none;
}
.w-auto{
    width: auto;
}
</style>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="register-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="register-form">
                    <ul id="progressbar">
                        <li class="active" id="ul1">DATA PERUSAHAAN</li>
                        <li id="ul2" class="">FILE PENGURUS</li>
                        <li id="ul3" class="">FILE PENDUKUNG</li>
                    </ul>

                    <form id="form-ms" method="post" action="<?php echo site_url('Home/simpan_aplikasi') ?>">
                        <fieldset id="form1">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Nama Perusahaan</label>
                                  <input name="nama_perusahaan" type="text" class="form-control required" placeholder="Nama Perusahaan" required="">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Email</label>
                                  <input name="email" type="email" class="form-control required" placeholder="Email" required="">
                                  <small class='email-used text-danger' style='display:none'>* Email already used!</small>
                                  <small class='email-available text-success' style='display:none'>* Email available!</small>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Password</label>
                                  <input name="password" type="password" class="form-control required" placeholder="Password" required="">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Alamat Perusahaan</label>
                                  <textarea name="alamat_perusahaan" class="form-control required" required=""></textarea>
                              </div>
                            </div>
                            <!-- <div class="col-sm-4">
                              <div class="form-group">
                                  <label>Provinsi</label>
                                  <input type="text" name="provinsi" class="form-control required" placeholder="Provinsi Perusahaan Anda" value="jawa barat" required="">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label>Kabupaten/Kota</label>
                                  <input type="text" name="kota" class="form-control required" placeholder="Kota Perusahaan Anda" value="Depok" required="">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label>Kecamatan</label>
                                  <input type="text" name="kecamatan" class="form-control required" placeholder="Kecamatan Perusahaan Anda" value="cilodong" required="">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label>Kelurahan</label>
                                  <input type="text" name="kelurahan" class="form-control required" placeholder="Kelurahan Perusahaan Anda" value="cilodong" required="">
                              </div>
                            </div> -->
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label>Provinsi</label>
                                <!-- <select name="provinsi" class="form-control" readonly>
                                  <option hidden value="JAWA BARAT">JAWA BARAT</option>
                                </select> -->
                                <input name="provinsi" type="text" class="form-control" value="JAWA BARAT" readonly>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label>Kabupaten/Kota</label>
                              <!--   <select name="kota" class="form-control" readonly>
                                  <option hidden value="KOTA DEPOK">KOTA DEPOK</option>
                                </select> -->
                                <input name="kota" type="text" class="form-control" value="KOTA DEPOK" readonly>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="kecamatan" class="form-control">
                                  <option hidden>-Pilih Kecamatan-</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label>Kelurahan</label>
                                <select name="kelurahan" class="form-control">
                                  <option hidden>-Pilih Kelurahan-</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label>Kode Pos</label>
                                  <input name="kode_pos_perusahaan" type="text" class="form-control required" placeholder="Kode Pos" required="">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label>Telp. Perusahaan</label>
                                  <input name="no_telp_perusahaan" type="text" class="form-control required" placeholder="Telp. Perusahaan" required="">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Kode Klui</label>
                                  <input name="kode_klui" type="text" class="form-control required" placeholder="Kode Klui" required="">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Deskripsi Perusahaan</label>
                                  <textarea name="deskripsi_perusahaan" class="form-control required" required=""></textarea>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label for="file-input" class=" form-control-label">Logo Perusahaan</label>
                                  <input type="file"  name="logo_perusahaan" class="form-control-file logo" required="">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label for="file-input" class=" form-control-label">SIUP</label>
                                  <input type="file"  name="siup" class="form-control-file files required" required="">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label for="file-input" class=" form-control-label">TDP</label>
                                  <input type="file"  name="tdp" class="form-control-file files required" required="">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label for="file-input" class=" form-control-label">akte</label>
                                  <input type="file"  name="akte" class="form-control-file files required" required="">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label for="file-input" class=" form-control-label">surat kehakiman</label>
                                  <input type="file"  name="surat_kehakiman" class="form-control-file files required" required="">
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                  <label for="file-input" class=" form-control-label">domisili</label>
                                  <input type="file"  name="domisili" class="form-control-file files required" required="">
                              </div>
                            </div>
                          </div>
                            <div class="form-group">
                                <button class="btn btn-success btnNext pull-right next w-auto" id="next1" type="button">Selanjutnya</button>
                            </div>
                        </fieldset>
                        <fieldset id="form2">
                            <div id="field_pengurus">
                                <div class="field0">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                          <label>Nama Pengurus</label>
                                          <input name="nama_pengurus" type="text" class="form-control" placeholder="Nama Pengurus" required="">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                          <label>Jabatan Pengurus</label>
                                          <input name="jabatan_pengurus" type="text" class="form-control" placeholder="Jabatan Pengurus" required="">
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                          <label>Alamat Pengurus</label>
                                          <textarea name="alamat_pengurus" class="form-control" required=""></textarea>
                                      </div>
                                    </div>
                                    <!-- <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>Provinsi</label>
                                          <input type="text" name="provinsi_pengurus" class="form-control" placeholder="Provinsi Perusahaan Anda" value="jawa barat" required="">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>Kabupaten/Kota</label>
                                          <input type="text" name="kota_pengurus" class="form-control" placeholder="Kota Perusahaan Anda" value="Depok" required="">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>Kecamatan</label>
                                          <input type="text" name="kecamatan_pengurus" class="form-control" placeholder="Kecamatan Perusahaan Anda" value="cilodong" required="">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>Kelurahan</label>
                                          <input type="text" name="kelurahan_pengurus" class="form-control" placeholder="Kelurahan Perusahaan Anda" value="cilodong" required="">
                                      </div>
                                    </div> -->
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>Provinsi</label>
                                          <select name="provinsi_pengurus" class="form-control">
                                              <option hidden>-Pilih Provinsi-</option>
                                          </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>Kabupaten/Kota</label>
                                          <select name="kota_pengurus" class="form-control">
                                              <option hidden>-Pilih Kabupaten/Kota-</option>
                                          </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select name="kecamatan_pengurus" class="form-control">
                                          <option hidden>-Pilih Kecamatan-</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Kelurahan</label>
                                        <select name="kelurahan_pengurus" class="form-control">
                                          <option hidden>-Pilih Kelurahan-</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>Kode Pos</label>
                                          <input name="kode_pos_pengurus" type="text" class="form-control" placeholder="Kode Pos" required="">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>Telp. Pengurus</label>
                                          <input name="no_telp_pengurus" type="text" class="form-control" placeholder="Telp. Pengurus" required="">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group button">
                                <button id="add-more" name="add-more" class="btn btn-primary">Add More</button>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btnNext pull-right next w-auto" id="next2" type="button">Selanjutnya</button>
                                <button class="btn btn-danger previous w-auto" id="prev2" type="button">Sebelumnya</button>
                            </div>
                        </fieldset>
                        <fieldset id="form3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="file-input" class=" form-control-label">PP</label>
                                        <input type="file"  name="file_pp" class="form-control-file files">
                                    </div>
                                    <div class="col-4">
                                        <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                        <input name="no_reg_pp" type="text" class="form-control" placeholder="No. Registrasi">
                                    </div>
                                    <div class="col-4">
                                      <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                      <input name="no_doc_pp" type="text" class="form-control" placeholder="No. Registrasi">
                                    </div>
                                    <div class="col-4">
                                      <label for="file-input" class=" form-control-label">Tanggal Daftar</label>
                                      <input name="berlaku_pp" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="file-input" class=" form-control-label">PKB</label>
                                        <input type="file"  name="file_pkb" class="form-control-file files">
                                    </div>
                                    <div class="col-4">
                                        <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                        <input name="no_reg_pkb" type="text" class="form-control" placeholder="No. Registrasi">
                                    </div>
                                    <div class="col-4">
                                      <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                      <input name="no_doc_pkb" type="text" class="form-control" placeholder="No. Registrasi">
                                    </div>
                                    <div class="col-4">
                                      <label for="file-input" class=" form-control-label">Tanggal Daftar</label>
                                      <input name="berlaku_pkb" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="file-input" class=" form-control-label">LKS Bepartite</label>
                                        <input type="file"  name="file_lks" class="form-control-file files">
                                    </div>
                                    <div class="col-4">
                                        <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                        <input name="no_reg_lks" type="text" class="form-control" placeholder="No. Registrasi">
                                    </div>
                                    <div class="col-4">
                                      <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                      <input name="no_doc_lks" type="text" class="form-control" placeholder="No. Registrasi">
                                    </div>
                                    <div class="col-4">
                                      <label for="file-input" class=" form-control-label">Tanggal Daftar</label>
                                      <input name="berlaku_lks" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="file-input" class=" form-control-label">K3</label>
                                        <input type="file"  name="file_k3" class="form-control-file files">
                                    </div>
                                    <div class="col-4">
                                        <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                        <input name="no_reg_k3" type="text" class="form-control" placeholder="No. Registrasi">
                                    </div>
                                    <div class="col-4">
                                      <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                      <input name="no_doc_k3" type="text" class="form-control" placeholder="No. Registrasi">
                                    </div>
                                    <div class="col-4">
                                      <label for="file-input" class=" form-control-label">Tanggal Daftar</label>
                                      <input name="berlaku_k3" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="file-input" class=" form-control-label">WLKP</label>
                                        <input type="file"  name="file_wlkp" class="form-control-file files">
                                    </div>
                                    <div class="col-4">
                                        <label for="file-input" class=" form-control-label">No. Registrasi</label>
                                        <input name="no_reg_wlkp" type="text" class="form-control" placeholder="No. Registrasi">
                                    </div>
                                    <div class="col-4">
                                      <label for="file-input" class=" form-control-label">No. Dokumen</label>
                                      <input name="no_doc_wlkp" type="text" class="form-control" placeholder="No. Registrasi">
                                    </div>
                                    <div class="col-4">
                                      <label for="file-input" class=" form-control-label">Tanggal Daftar</label>
                                      <input name="berlaku_wlkp" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="agree" type="checkbox" required> Setuju persyaratan dan kebijakan
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success pull-right w-auto" type="button" onclick="register()" name="submit">Simpan</button>
                                <button class="btn btn-danger previous w-auto" id="prev3" type="button">Sebelumnya</button>
                            </div>
                        </fieldset>
                         <div class="register-link m-t-15 text-center mt-3">
                            <a class="btn btn-info" href="<?php echo base_url();?>">Login</a>
                        </div>
                    </form>
                    <!-- <buttonc class="btn btn-info" onclick="register()"> submit </button> -->
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/custom/js/main.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#form2").hide();
                $("#form3").hide();
                onChangeProvinsi();
                onChangeProvinsiPengurus();
                $.getJSON( "<?= base_url() ?>Home/emailList", function( data ) {
                  // console.log(data);
                  window.emailList = data;
                });
        //@naresh action dynamic childs
        var next = 0;
        $("#add-more").click(function(e) {
            e.preventDefault();
            var clone = $(".field0:last").clone(true);
            var addto = "#field" + next;
            var addRemove = "#field" + (next);
            next = next + 1;
            var newIn = '<div id="field' + next + '" name="field' + next + '"><br><div class="form-group"><label>Nama Pengurus</label><input type="text" class="form-control" placeholder="Nama Pengurus" name="nama_pengurus"></div><div class="form-group"><label>Nama Pengurus</label><input type="text" class="form-control" placeholder="Jabatan Pengurus" name="jabatan_pengurus"></div><div class="form-group"><label>Alamat Pengurus</label><textarea class="form-control" name="alamat_pengurus"></textarea></div><div class="form-group"><label>Provinsi</label><input type="text" name="provinsi_pengurus" class="form-control" placeholder="Provinsi Perusahaan Anda" value="jawa barat"></div><div class="form-group"><label>Kabupaten/Kota</label><input type="text" name="kota_pengurus" class="form-control" placeholder="Kota Perusahaan Anda" value="Depok"></div><div class="form-group"><label>Kecamatan</label><input type="text" name="kecamatan_pengurus" class="form-control" placeholder="Kecamatan Perusahaan Anda" value="cilodong"></div><div class="form-group"><label>Kelurahan</label><input type="text" name="kelurahan_pengurus" class="form-control" placeholder="Kelurahan Perusahaan Anda" value="cilodong"></div><div class="form-group"><label>Kode Pos</label><input type="text" class="form-control" placeholder="Kode Pos"></div><div class="form-group"><label>Telp. Pengurus</label><input type="text" class="form-control" placeholder="Telp. Pengurus"></div></div>';
            var newInput = $(newIn);
            var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
            var removeButton = $(removeBtn);
            // $(addto).after(newInput);
            // $(addRemove).after(removeButton);
            // $("#field" + next).attr('data-source', $(addto).attr('data-source'));
            // $("#count").val(next);
            clone.append(removeBtn);
            //clone.find("#add-more").remove();
            console.log(clone);
            $("#field_pengurus").prepend(clone);
            $('.remove-me').click(function(e) {
                e.preventDefault();
                // var fieldNum = this.id.charAt(this.id.length - 1);
                // var fieldID = "#field" + fieldNum;
                // $(this).remove();
                // $(fieldID).remove();

                $(this).parents(".field0").remove();
            });
        });
        window.emailValid = false;
        $("input[name='email']").change(function(){
          var val = $(this).val();
          if (window.emailList.indexOf(val) != -1) {
            console.log("ada");
            $(this).css({ 'border-color': '#a94442'});
            $(".email-available").hide();
            $(".email-used").show();
            window.emailValid = false;
          } else {
            console.log("tak ada");
            $(this).css({ 'border-color': '#3c763d'});
            $(".email-used").hide();
            $(".email-available").show();
            window.emailValid = true;
          }
        });

    });
            $("#next1").click(function(){
                $("#form2").fadeIn();
                $("#form1").hide();
                $("#ul2").addClass("active");
            });
            $("#next2").click(function(){
                $("#form3").fadeIn();
                $("#form2").hide();
                $("#ul3").addClass("active");
            });
            $("#prev3").click(function(){
                $("#form2").fadeIn();
                $("#form3").hide();
                $("#ul3").removeClass("active");
            });
            $("#prev2").click(function(){
                $("#form1").fadeIn();
                $("#form2").hide();
                $("#ul2").removeClass("active");
            });

            function register(){
                var form_perusahaan = {
                    email                : $("input[name='email']").val(),
                    password             : $("input[name='password']").val(),
                    nama_perusahaan      : $("input[name='nama_perusahaan']").val(),
                    alamat_perusahaan    : $("textarea[name='alamat_perusahaan']").val(),
                    provinsi             : $("select[name='provinsi']").val(),
                    kota                 : $("select[name='kota']").val(),
                    kecamatan            : $("select[name='kecamatan']").val(),
                    kelurahan            : $("select[name='kelurahan']").val(),
                    no_telp_perusahaan   : $("input[name='no_telp_perusahaan']").val(),
                    deskripsi_perusahaan : $("textarea[name='deskripsi_perusahaan']").val(),
                    kode_pos_perusahaan  : $("input[name='kode_pos_perusahaan']").val(),
                    kode_klui            : $("select[name='kode_klui']").val(),
                    logo_perusahaan      : $("input[name='logo_perusahaan']")[0].files[0],
                    siup                 : $("input[name='siup']")[0].files[0],
                    tdp                  : $("input[name='tdp'")[0].files[0],
                    akte                 : $("input[name='akte']")[0].files[0],
                        //sk                   : $("input[name='sk'")
                        surat_kehakiman      : $("input[name='surat_kehakiman']")[0].files[0],
                        domisili             : $("input[name='domisili'")[0].files[0],
                    }

                    var data_pengurus = [];
                    console.log(data_pengurus);

                    $(".field0").each(function(index){
                        data_pengurus[index] = {
                          nama_pengurus      : $(this).find("input[name='nama_pengurus']").val(),
                          jabatan_pengurus    : $(this).find("input[name='jabatan_pengurus']").val(),
                          alamat_pengurus    : $(this).find("textarea[name='alamat_pengurus']").val(),
                          provinsi_pengurus  : $(this).find("select[name='provinsi_pengurus']").val(),
                          kota_pengurus      : $(this).find("select[name='kota_pengurus']").val(),
                          kecamatan_pengurus : $(this).find("select[name='kecamatan_pengurus']").val(),
                          kelurahan_pengurus : $(this).find("select[name='kelurahan_pengurus']").val(),
                          kode_pos_pengurus  : $(this).find("input[name='kode_pos_pengurus']").val(),
                          no_telp_pengurus   : $(this).find("input[name='no_telp_pengurus']").val(),
                      }
                  });

                    var form_pengurus = {
                      data_pengurus : data_pengurus,
                  }

                  var form_pendukung = {
                      file_pp : $("input[name='file_pp'")[0].files[0],
                      no_reg_pp : $("input[name='no_reg_pp']").val(),
                      no_doc_pp : $("input[name='no_doc_pp']").val(),
                      berlaku_pp : $("input[name='berlaku_pp']").val(),

                      file_pkb : $("input[name='file_pkb'")[0].files[0],
                      no_reg_pkb : $("input[name='no_reg_pkb']").val(),
                      no_doc_pkb : $("input[name='no_doc_pkb']").val(),
                      berlaku_pkb : $("input[name='berlaku_pkb']").val(),

                      file_lks : $("input[name='file_lks'")[0].files[0],
                      no_reg_lks : $("input[name='no_reg_lks']").val(),
                      no_doc_lks : $("input[name='no_doc_lks']").val(),
                      berlaku_lks : $("input[name='berlaku_lks']").val(),

                      file_k3 : $("input[name='file_k3'")[0].files[0],
                      no_reg_k3 : $("input[name='no_reg_k3']").val(),
                      no_doc_k3 : $("input[name='no_doc_k3']").val(),
                      berlaku_k3 : $("input[name='berlaku_k3']").val(),


                      file_wlkp : $("input[name='file_wlkp'")[0].files[0],
                      no_reg_wlkp : $("input[name='no_reg_wlkp']").val(),
                      no_doc_wlkp : $("input[name='no_doc_wlkp']").val(),
                      berlaku_wlkp : $("input[name='berlaku_wlkp']").val(),

                  }

                  console.log(form_perusahaan, form_pengurus, form_pendukung);
                  var formData = new FormData();
                  $.each(form_perusahaan, function(index, value){
                      formData.append(index, value);
                  });
                  $.each(form_pengurus, function(index, value){
                      // $.each(value, function(i, v){
                      //   formData.append(index+'[]', v);
                      // });
                      formData.append(index, JSON.stringify(value));
                  });
                  $.each(form_pendukung, function(index, value){
                      formData.append(index, value);
                  });
                  var empty = [];
                  var field = [];
                  $("input.required").each(function(index){
                    // console.log("required");
                    if ($(this).val() == "") {
                      empty.push(true);
                      field.push($(this).attr("name"));
                    }
                  });
                  $("textarea.required").each(function(index){
                    // console.log("required");
                    if ($(this).val() == "") {
                      empty.push(true);
                      field.push($(this).attr("name"));
                    }
                  });
                  $("select.required").each(function(index){
                    // console.log("required");
                    if ($(this).val() == "") {
                      empty.push(true);
                      field.push($(this).attr("name"));
                    }
                  });

                  var verif = $('input[name="agree"]:checked').length > 0;
                  console.log(verif);
                  if (empty.indexOf(true) == -1 && verif == true && window.emailValid == true) {

                    $.ajax({
                      url : '<?= base_url() ?>Home/register',
                      type : 'POST',
                      data : formData,
                      processData: false,  // tell jQuery not to process the data
                      contentType: false,  // tell jQuery not to set contentType
                      dataType : 'json',
                      success : function(data) {
                        // console.log(data);
                        if (data.input_error.indexOf(true) == -1) {
                          // alert("Data Berhasil di Input!");
                          swal({
                            title: "Success",
                            text: "Data Berhasil di Input!!!",
                            icon: "success",
                            button: "Ok",
                          }).then((after) => {
                            if (after) {
                            //   location.href = "<?= base_url()?>Home/";
                            } else {
                              // swal("Your imaginary file is safe!");
                            }
                          });
                        } else {
                          // alert("Data Gagal di Input!");
                          swal({
                            title: "Failed!",
                            text: "Data Gagal di Input!!!",
                            icon: "error",
                            button: "Ok",
                          });
                        }
                        // alert(data);

                      },
                      error: function(e){
                        console.log(e);
                        swal({
                          title: "Failed!",
                          text: "Data Gagal di Input!!!",
                          icon: "error",
                          button: "Ok",
                        });
                      }
                    });

                  } else if (verif == false) {
                    swal({
                      title: "Warning!",
                      text: "Mohon Centang \"Setuju persyaratan dan kebijakan\"!! ",
                      icon: "warning",
                      button: "Ok",
                    });
                  }else if (window.emailValid == false) {
                    swal({
                      title: "Warning!",
                      text: "Email sudah digunakan!! ",
                      icon: "warning",
                      button: "Ok",
                    });
                  }  else if(empty.indexOf(true) != -1) {
                    console.log(field);

                    swal({
                      title: "Warning!",
                      text: "Tolong Isi Form Dengan Lengkap!!",
                      icon: "warning",
                      button: "Ok",
                    });
                  }
              }

              function onChangeProvinsi(){
                var form_data = {}

                // $.ajax({
                //     url: "<?= base_url() ?>indonesia/get_provinsi",
                //     type: "POST",
                //     data: form_data,
                //     dataType: "json",
                //     success : function(data){
                //         $("select[name='provinsi']").empty();
                //         var option = "<option value=''>-Pilih Provinsi-</option>";
                //         $.each(data, function(index, value){
                //             // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                //             option += "<option value='"+value.name+"'>"+value.name+"</option>";
                //         });
                //         console.log(data, option);
                //         $("select[name='provinsi']").append(option);
                //     },
                //     error : function(e){
                //         console.log(e);
                //     },
                //     });


                // $("select[name='provinsi']").change(function(){
                //     var form_data = {
                //         provincesId : $(this).val(),
                //     }

                //     $.ajax({
                //         url: "<?= base_url() ?>indonesia/get_kota",
                //         type: "POST",
                //         data: form_data,
                //         dataType: "json",
                //         success : function(data){
                //             $("select[name='kota']").empty();
                //             var option = "<option value=''>-Pilih Kabupaten/Kota-</option>";
                //             $.each(data, function(index, value){
                //                 // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                //                 option += "<option value='"+value.name+"'>"+value.name+"</option>";
                //             });
                //             console.log(data, option);
                //             $("select[name='kota']").append(option);
                //         },
                //         error : function(e){
                //             console.log(e);
                //         },
                //         });
                // });

                // $("select[name='kota']").change(function(){
                    var form_data = { }

                //  var form_data = {
                //         regenciesid : $(this).val(),
                //     }

                    $.ajax({
                        url: "<?= base_url() ?>indonesia/get_kecamatan",
                        type: "POST",
                        data: "form_data",
                        dataType: "json",
                        success : function(data){
                            $("select[name='kecamatan']").empty();
                            var option = "<option value=''>-Pilih Kecamatan-</option>";
                            $.each(data, function(index, value){
                                // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                                option += "<option value='"+value.name+"'>"+value.name+"</option>";
                            });
                            console.log(data, option);
                            $("select[name='kecamatan']").append(option);
                        },
                        error : function(e){
                            console.log(e);
                        },
                        });
                // });

                $("select[name='kecamatan']").change(function(){
                    var form_data = {
                        districtsId : $(this).val(),
                    }

                    $.ajax({
                        url: "<?= base_url() ?>indonesia/get_kelurahan",
                        type: "POST",
                        data: form_data,
                        dataType: "json",
                        success : function(data){
                            $("select[name='kelurahan']").empty();
                            var option = "<option value=''>-Pilih Kelurahan-</option>";
                            $.each(data, function(index, value){
                                // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                                option += "<option value='"+value.name+"'>"+value.name+"</option>";
                            });
                            console.log(data, option);
                            $("select[name='kelurahan']").append(option);
                        },
                        error : function(e){
                            console.log(e);
                        },
                        });
                });
            }

            function onChangeProvinsiPengurus(){
              var form_data = {}

              $.ajax({
                  url: "<?= base_url() ?>indonesia/get_provinsi",
                  type: "POST",
                  data: form_data,
                  dataType: "json",
                  success : function(data){
                      $("select[name='provinsi_pengurus']").empty();
                      var option = "<option value=''>-Pilih Provinsi-</option>";
                      $.each(data, function(index, value){
                          // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                          option += "<option value='"+value.name+"'>"+value.name+"</option>";
                      });
                      // console.log(data, option);
                      $("select[name='provinsi_pengurus']").append(option);
                  },
                  error : function(e){
                      console.log(e);
                  },
                  });


              $("select[name='provinsi_pengurus']").change(function(){
                console.log("provinsi change");
                var parents = $(this).parents(".field0");
                  var form_data = {
                      provincesId : $(this).val(),
                  }

                  $.ajax({
                      url: "<?= base_url() ?>indonesia/get_kota",
                      type: "POST",
                      data: form_data,
                      dataType: "json",
                      success : function(data){
                          parents.find("select[name='kota_pengurus']").empty();
                          var option = "<option value=''>-Pilih Kabupaten/Kota-</option>";
                          $.each(data, function(index, value){
                              // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                              option += "<option value='"+value.name+"'>"+value.name+"</option>";
                          });
                          // console.log(data, option);
                          parents.find("select[name='kota_pengurus']").append(option);
                      },
                      error : function(e){
                          console.log(e);
                      },
                      });
              });

            $("select[name='kota_pengurus']").change(function(){
                  var parents = $(this).parents(".field0");
                  var form_data = {
                      regenciesId : $(this).val(),
                  }

                  $.ajax({
                      url: "<?= base_url() ?>indonesia/get_kecamatan",
                      type: "POST",
                      data: form_data,
                      dataType: "json",
                      success : function(data){
                          parents.find("select[name='kecamatan_pengurus']").empty();
                          var option = "<option value=''>-Pilih Kecamatan-</option>";
                          $.each(data, function(index, value){
                              // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                              option += "<option value='"+value.name+"'>"+value.name+"</option>";
                          });
                          // console.log(data, option);
                          parents.find("select[name='kecamatan_pengurus']").append(option);
                      },
                      error : function(e){
                          console.log(e);
                      },
                      });
              });

              $("select[name='kecamatan_pengurus']").change(function(){
                var parents = $(this).parents(".field0");
                  var form_data = {
                      districtsId : $(this).val(),
                  }

                  $.ajax({
                      url: "<?= base_url() ?>indonesia/get_kelurahan",
                      type: "POST",
                      data: form_data,
                      dataType: "json",
                      success : function(data){
                          parents.find("select[name='kelurahan_pengurus']").empty();
                          var option = "<option value=''>-Pilih Kelurahan-</option>";
                          $.each(data, function(index, value){
                              // option += "<option value='"+value.id+"'>"+value.name+"</option>";
                              option += "<option value='"+value.id+"'>"+value.name+"</option>";
                          });
                          // console.log(data, option);
                          parents.find("select[name='kelurahan_pengurus']").append(option);
                      },
                      error : function(e){
                          console.log(e);
                      },
                      });
              });
            }

        </script>
        <script type="text/javascript">
            $(".files").change(function() {
                if (this.files && this.files[0] && this.files[0].name.match(/\.(pdf)$/) ) {
                    if(this.files[0].size>8048576) {
                        $(this).val('');
                        alert('Batas Maximal Ukuran File 8MB !');
                    }
                    else {
                        var reader = new FileReader();
                        reader.readAsDataURL(this.files[0]);
                    }
                } else{
                    $(this).val('');
                    alert('Hanya File PDF Yang Diizinkan !');};
                });
            </script>
            <script type="text/javascript">
                $(".logo").change(function() {
                    if (this.files && this.files[0] && this.files[0].name.match(/\.(jpg|png)$/) ) {
                        if(this.files[0].size>8048576) {
                            $('.logo').val('');
                            alert('Batas Maximal Ukuran File 8MB !');
                        }
                        else {
                            var reader = new FileReader();
                            reader.readAsDataURL(this.files[0]);
                        }
                    } else{
                        $('.logo').val('');
                        alert('Hanya File jpg/png Yang Diizinkan !');};
                    });
                </script>
            </body>

            </html>
