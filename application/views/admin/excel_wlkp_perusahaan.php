<?php 
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table style="text-align: center; overflow: auto; ">
    <thead>
        <tr>
            <th rowspan="2">NO.</th>
            <th rowspan="2">NAMA PERUSAHAAN</th>
            <th rowspan="2">ALAMAT</th>
            <th rowspan="2">KECAMATAN</th>
            <th rowspan="2">KELURAHAN</th>
            <th rowspan="2">TELEPON</th>
            <th rowspan="2">JENIS USAHA</th>
            <th rowspan="2">NAMA PEMILIK</th>
            <th rowspan="2">NAMA PENGURUS</th>
            <th rowspan="2">TGL PENDIRIAN</th>
            <th rowspan="2">NO PENDIRIAN</th>
            <th rowspan="2">PUSAT</th>
            <th rowspan="2">CABANG</th>
            <th rowspan="2">STATUS KEPEMILIKAN</th>
            <th rowspan="2">STATUS PERMODALAN</th>
            <th colspan="7">WNI</th>
            <th colspan="3">WNA</th>
            <th rowspan="2">JUMLAH</th>
            <th rowspan="2">WAKTU KERJA</th>
            <th rowspan="2">KATEGORI</th>
            <th rowspan="2">PESAWAT UAP</th>
            <th rowspan="2">PESAWAT ANGKAT</th>
            <th rowspan="2">PESAWAT ANGKUT</th>
            <th rowspan="2">PESAWAT LAINNYA</th>
            <th rowspan="2">ALAT - ALAT BERAT</th>
            <th rowspan="2">MOTOR</th>
            <th rowspan="2">INSTALASI LISTRIK</th>
            <th rowspan="2">INSTALASI PEMADAM</th>
            <th rowspan="2">INSTALASI PENGOLAH LIMBAH</th>
            <th rowspan="2">PENYALUR PETIR</th>
            <th rowspan="2">PEMBANGKIT LISTRIK</th>
            <th rowspan="2">LIFT</th>
            <th rowspan="2">BEJANA TEKAN</th>
            <th rowspan="2">BAHAN BERACUN</th>
            <th rowspan="2">TURBIN</th>
            <th rowspan="2">BOTOL BAJA</th>
            <th rowspan="2">PERANCAH</th>
            <th rowspan="2">BAHAN RADIO AKTIF</th>
            <th rowspan="2">LIMBAH PADAT</th>
            <th rowspan="2">LIMBAH CAIR</th>
            <th rowspan="2">LIMBAH GAS</th>
            <th rowspan="2">AMDAL</th>
            <th rowspan="2">JUMLAH UPAH</th>
            <th rowspan="2">UPAH TERTINGGI</th>
            <th rowspan="2">UPAH TERENDAH</th>
            <th rowspan="2">JUMLAH PENERIMA UMR</th>
            <th rowspan="2">P3K</th>
            <th rowspan="2">POLIKLINIK</th>
            <th rowspan="2">DOKTER PEMERIKSA</th>
            <th rowspan="2">AHLI K3</th>
            <th rowspan="2">PARAMEDIS</th>
            <th rowspan="2">REGU PEMADAM</th>
            <th rowspan="2">KOPERASI KARYAWAN</th>
            <th rowspan="2">TPA</th>
            <th rowspan="2">KANTIN</th>
            <th rowspan="2">SARANA IBADAH</th>
            <th rowspan="2">UNIT KB PERUSAHAAN</th>
            <th rowspan="2">OLAHRAGA KESENIAN</th>
            <th rowspan="2">PERUMAHAAN KARYAWAN</th>
            <th rowspan="2">JAMSOSTEK / BPJS</th>
            <th rowspan="2">PK</th>
            <th rowspan="2">PP</th>
            <th rowspan="2">PKB</th>
            <th rowspan="2">BIPARTITE</th>
            <th rowspan="2">SPTP</th>
            <th rowspan="2">UKSP</th>
            <th rowspan="2">P2K3</th>
            <th rowspan="2">APINDO</th>
            <th rowspan="2">JMLH PEKERJA L AKAN DATANG</th>
            <th rowspan="2">JMLH PEKERJA P AKAN DATANG</th>
            <th rowspan="2">JMLH PEKERJA L TERAKHIR</th>
            <th rowspan="2">JMLH PEKERJA P TERAKHIR</th>
            <th rowspan="2">JMLH PEKERJA TERAKHIR</th>
            <th rowspan="2">JMLH PEKERJA BERHENTI</th>
            <th rowspan="2">TEMPAT PENGESAHAN</th>
            <th rowspan="2">TGL PEMBUATAN</th>
            <th rowspan="2">PENGESAH</th>
            <th rowspan="2">NIP. PENGESAH</th>
        </tr>
        <tr>
        	<th>L ≥ 18 TAHUN</th>
        	<th>L ≥ 15 s/d ≤ 18 TAHUN</th>
        	<th>L ≤ 15 TAHUN</th>
        	<th>P ≥ 18 TAHUN</th>
        	<th>P ≥ 15 s/d ≤ 18 TAHUN</th>
        	<th>P ≤ 15 TAHUN</th>
        	<th>JMLH WNI</th>
        	<th>L</th>
        	<th>P</th>
        	<th>JMLH WNA</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            foreach ($data_wlkp_perusahaan as $row) {
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
                if ($ket_kantor == "PUSAT") {
                	$pusat = "1";
                	$cabang = " ";
                } else if ($ket_kantor == "CABANG") {
                	$pusat = " ";
                	$cabang = "1";
                }
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
                $l_dibawah_15 		= $l_dibawah_15_cpuh + $l_dibawah_15_cpubr + $l_dibawah_15_cpubl + $l_dibawah_15_hl + $l_dibawah_15_br + $l_dibawah_15_kr;

                $p_dibawah_15_cpuh  = $row->p_dibawah_15_cpuh;
                $p_dibawah_15_cpubr = $row->p_dibawah_15_cpubr;
                $p_dibawah_15_cpubl = $row->p_dibawah_15_cpubl;
                $p_dibawah_15_hl    = $row->p_dibawah_15_hl;
                $p_dibawah_15_br    = $row->p_dibawah_15_br;
                $p_dibawah_15_kr    = $row->p_dibawah_15_kr;
                $p_dibawah_15 		= $p_dibawah_15_cpuh + $p_dibawah_15_cpubr + $p_dibawah_15_cpubl + $p_dibawah_15_hl + $p_dibawah_15_br + $p_dibawah_15_kr;

                $l_dibawah_18_cpuh  = $row->l_dibawah_18_cpuh;
                $l_dibawah_18_cpubr = $row->l_dibawah_18_cpubr;
                $l_dibawah_18_cpubl = $row->l_dibawah_18_cpubl;
                $l_dibawah_18_hl    = $row->l_dibawah_18_hl;
                $l_dibawah_18_br    = $row->l_dibawah_18_br;
                $l_dibawah_18_kr    = $row->l_dibawah_18_kr;
                $l_dibawah_18 		= $l_dibawah_18_cpuh + $l_dibawah_18_cpubr + $l_dibawah_18_cpubl + $l_dibawah_18_hl + $l_dibawah_18_br + $l_dibawah_18_kr;

                $p_dibawah_18_cpuh  = $row->p_dibawah_18_cpuh;
                $p_dibawah_18_cpubr = $row->p_dibawah_18_cpubr;
                $p_dibawah_18_cpubl = $row->p_dibawah_18_cpubl;
                $p_dibawah_18_hl    = $row->p_dibawah_18_hl;
                $p_dibawah_18_br    = $row->p_dibawah_18_br;
                $p_dibawah_18_kr    = $row->p_dibawah_18_kr;
                $p_dibawah_18 		= $p_dibawah_18_cpuh + $p_dibawah_18_cpubr + $p_dibawah_18_cpubl + $p_dibawah_18_hl + $p_dibawah_18_br + $p_dibawah_18_kr;

                $l_diatas_18_cpuh  = $row->l_diatas_18_cpuh;
                $l_diatas_18_cpubr = $row->l_diatas_18_cpubr;
                $l_diatas_18_cpubl = $row->l_diatas_18_cpubl;
                $l_diatas_18_hl    = $row->l_diatas_18_hl;
                $l_diatas_18_br    = $row->l_diatas_18_br;
                $l_diatas_18_kr    = $row->l_diatas_18_kr;
                $l_diatas_18 		= $l_diatas_18_cpuh + $l_diatas_18_cpubr + $l_diatas_18_cpubl + $l_diatas_18_hl + $l_diatas_18_br + $l_diatas_18_kr;

                $p_diatas_18_cpuh  = $row->p_diatas_18_cpuh;
                $p_diatas_18_cpubr = $row->p_diatas_18_cpubr;
                $p_diatas_18_cpubl = $row->p_diatas_18_cpubl;
                $p_diatas_18_hl    = $row->p_diatas_18_hl;
                $p_diatas_18_br    = $row->p_diatas_18_br;
                $p_diatas_18_kr    = $row->p_diatas_18_kr;
                $p_diatas_18 	   = $p_diatas_18_cpuh + $p_diatas_18_cpubr + $p_diatas_18_cpubl + $p_diatas_18_hl + $p_diatas_18_br + $p_diatas_18_kr;

                $l_wna_cpuh  = $row->l_wna_cpuh;
                $l_wna_cpubr = $row->l_wna_cpubr;
                $l_wna_cpubl = $row->l_wna_cpubl;
                $l_wna_hl    = $row->l_wna_hl;
                $l_wna_br    = $row->l_wna_br;
                $l_wna_kr    = $row->l_wna_kr;
                $l_wna 		 = $l_wna_cpuh + $l_wna_cpubr + $l_wna_cpubl + $l_wna_hl + $l_wna_br + $l_wna_kr;

                $p_wna_cpuh  = $row->p_wna_cpuh;
                $p_wna_cpubr = $row->p_wna_cpubr;
                $p_wna_cpubl = $row->p_wna_cpubl;
                $p_wna_hl    = $row->p_wna_hl;
                $p_wna_br    = $row->p_wna_br;
                $p_wna_kr    = $row->p_wna_kr;
                $p_wna 		 = $p_wna_cpuh + $p_wna_cpubr + $p_wna_cpubl + $p_wna_hl + $p_wna_br + $p_wna_kr;

                $total_wni_l    = $l_diatas_18 + $l_dibawah_15 + $l_dibawah_18;
                $total_wni_p    = $p_diatas_18 + $p_dibawah_15 + $p_dibawah_18;
                $total_wni      = $total_wni_l + $total_wni_p;
                $total_l_wna    = $l_wna;
                $total_p_wna    = $p_wna;
                $total_wna      = $row->total_wna;
                $total 			= $total_wni + $total_wna;

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

                // TABLE PENGESAHAN
                $tempat_pengesahan  = $row->tempat_pengesahan;
                $tgl_pengesahan     = $row->tanggal_pengesahan;
                $nama_pengesah      = $row->nama_pengesah;
                $nip                = $row->nip;

                // TABLE ALAT & BAHAN
                $pesawat_uap        = $row->pesawat_uap;
                $pesawat_angkat     = $row->pesawat_angkat;
                $pesawat_angkut     = $row->pesawat_angkut;
                $pesawat_lainnya = "";
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
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $nama_perusahaan; ?></td>
            <td><?php echo $alamat_perusahaan; ?></td>
          	<td><?php echo $kecamatan_perusahaan; ?></td>
          	<td><?php echo $kelurahan_perusahaan; ?></td>
          	<td><?php echo $telp_perusahaan; ?></td>
            <td><?php echo $jenis_usaha; ?></td>
          	<td><?php echo $nama_pemilik; ?></td>
          	<td><?php echo $nama_pengurus; ?></td>
          	<td><?php echo $tanggal_pendirian; ?></td>
            <td><?php echo $no_pendirian; ?></td>
          	<td><?php echo $pusat; ?></td>
          	<td><?php echo $cabang; ?></td>
          	<td><?php echo $kepemilikan; ?></td>
            <td><?php echo $permodalan; ?></td>
          	<td><?php echo $l_diatas_18; ?></td>
          	<td><?php echo $l_dibawah_18; ?></td>
          	<td><?php echo $l_dibawah_15; ?></td>
          	<td><?php echo $p_diatas_18; ?></td>
          	<td><?php echo $p_dibawah_18; ?></td>
          	<td><?php echo $p_dibawah_15; ?></td>
            <td><?php echo $total_wni; ?></td>
          	<td><?php echo $total_l_wna; ?></td>
          	<td><?php echo $total_p_wna; ?></td>
          	<td><?php echo $total_wna; ?></td>
          	<td><?php echo $total; ?></td>
          	<td><?php echo $waktu_kerja; ?> jam/hari</td>
          	<td><?php echo $kategori; ?></td>
          	<td><?php echo $pesawat_uap; ?></td>
          	<td><?php echo $pesawat_angkat; ?></td>
          	<td><?php echo $pesawat_angkut; ?></td>
          	<td><?php echo $pesawat_lainnya; ?></td>
          	<td><?php echo $alat_berat; ?></td>
            <td><?php echo $motor; ?></td>
          	<td><?php echo $ins_listrik; ?></td>
          	<td><?php echo $ins_pemadam; ?></td>
          	<td><?php echo $ins_limbah; ?></td>
          	<td><?php echo $penyalur_petir; ?></td>
          	<td><?php echo $pembangkit_listrik; ?></td>
          	<td><?php echo $lift; ?></td>
          	<td><?php echo $bejana; ?></td>
          	<td><?php echo $bahan_beracun; ?></td>
            <td><?php echo $turbin; ?></td>
          	<td><?php echo $botol_baja; ?></td>
          	<td><?php echo $perancah; ?></td>
          	<td><?php echo $radio_aktif; ?></td>
          	<td><?php echo $limbah_padat; ?></td>
          	<td><?php echo $limbah_cair; ?></td>
            <td><?php echo $limbah_gas; ?></td>
          	<td><?php echo $amdal; ?></td>
          	<td><?php echo $jumlah_upah; ?></td>
          	<td><?php echo $upah_tinggi; ?></td>
          	<td><?php echo $upah_rendah; ?></td>
          	<td><?php echo $penerima_umr; ?></td>
          	<td><?php echo $p3k; ?></td>
            <td><?php echo $klinik; ?></td>
          	<td><?php echo $dokter; ?></td>
          	<td><?php echo $ahli_k3; ?></td>
          	<td><?php echo $medis; ?></td>
          	<td><?php echo $pemadam; ?></td>
          	<td><?php echo $koperasi; ?></td>
          	<td><?php echo $tpa; ?></td>
          	<td><?php echo $kantin; ?></td>
          	<td><?php echo $sarana_ibadah; ?></td>
          	<td><?php echo $unit_kb; ?></td>
            <td><?php echo $olahraga; ?></td>
          	<td><?php echo $perum; ?></td>
          	<td><?php echo $bpjs; ?></td>
          	<td><?php echo $pk; ?></td>
          	<td><?php echo $pp; ?></td>
          	<td><?php echo $pkb; ?></td>
          	<td><?php echo $bipartit; ?></td>
          	<td><?php echo $sptp; ?></td>
          	<td><?php echo $uksp; ?></td>
          	<td><?php echo $p2k3; ?></td>
          	<td><?php echo $apindo; ?></td>
            <td><?php echo $l_mendatang; ?></td>
          	<td><?php echo $p_mendatang; ?></td>
          	<td><?php echo $l_terakhir; ?></td>
          	<td><?php echo $p_terakhir; ?></td>
          	<td><?php echo $pekerja_terakhir; ?></td>
          	<td><?php echo $pekerja_berhenti; ?></td>
          	<td><?php echo $tempat_pengesahan; ?></td>
          	<td><?php echo $tgl_pengesahan; ?></td>
          	<td><?php echo $nama_pengesah; ?></td>
            <td><?php echo $nip; ?></td>
    	</tr>
        <?php
            }
        ?>
    </tbody>
</table>