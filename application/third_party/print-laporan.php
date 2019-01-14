<?php
//untuk mulai menggunakan library FPDF terlebih dahulu kita harus memanggil atau mengincludekan librarinya
require('fpdf/fpdf.php');
 
//kemudian kita membuat object library FPDF dan halaman
// P = orientasi jenis kertas, menggunakan Potrait
// mm = jenis ukuran milimeter
// A4 = ukuran kertas
$pdf = new FPDF('L','mm','A4');
// membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','B',12);
        // mencetak string 
        $pdf->Cell(300,4,'PERATURAN PERUSAHAAN (PP) YANG DI SYAHKAN',0,1,'C');
        $pdf->Cell(300,4,'DI KOTA DEPOK',0,1,'C');
        $pdf->Cell(300,4,'BULAN JANUARI s/d DESEMBER 2018',0,1,'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(50);
        $pdf->Cell(15,6,'NO',1,0,'C');
        $pdf->Cell(65,6,'NAMA PERUSAHAAN',1,0,'C');
        $pdf->Cell(27,6,'STATUS',1,0,'C');
        $pdf->Cell(45,6,'NO. REGISTRASI',1,0,'C');
        $pdf->Cell(40,6,'JUMLAH',1,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(15,6,1,1,0,'C');
        $pdf->Cell(65,6,'PT. Y',1,0,'C');
        $pdf->Cell(27,6,'Baru',1,0,'C');
        $pdf->Cell(45,6,'KEP.568/01/PP/I/2018',1,0,'C');
        $pdf->Cell(40,6,'1',1,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(15,6,2,1,0,'C');
        $pdf->Cell(65,6,'',1,0,'C');
        $pdf->Cell(27,6,'',1,0,'C');
        $pdf->Cell(45,6,'',1,0,'C');
        $pdf->Cell(40,6,'',1,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(15,6,3,1,0,'C');
        $pdf->Cell(65,6,'',1,0,'C');
        $pdf->Cell(27,6,'',1,0,'C');
        $pdf->Cell(45,6,'',1,0,'C');
        $pdf->Cell(40,6,'',1,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(15,6,4,1,0,'C');
        $pdf->Cell(65,6,'',1,0,'C');
        $pdf->Cell(27,6,'',1,0,'C');
        $pdf->Cell(45,6,'',1,0,'C');
        $pdf->Cell(40,6,'',1,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(15,6,5,1,0,'C');
        $pdf->Cell(65,6,'',1,0,'C');
        $pdf->Cell(27,6,'',1,0,'C');
        $pdf->Cell(45,6,'',1,0,'C');
        $pdf->Cell(40,6,'',1,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(15,6,6,1,0,'C');
        $pdf->Cell(65,6,'',1,0,'C');
        $pdf->Cell(27,6,'',1,0,'C');
        $pdf->Cell(45,6,'',1,0,'C');
        $pdf->Cell(40,6,'',1,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(15,6,7,1,0,'C');
        $pdf->Cell(65,6,'',1,0,'C');
        $pdf->Cell(27,6,'',1,0,'C');
        $pdf->Cell(45,6,'',1,0,'C');
        $pdf->Cell(40,6,'',1,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(15,6,8,1,0,'C');
        $pdf->Cell(65,6,'',1,0,'C');
        $pdf->Cell(27,6,'',1,0,'C');
        $pdf->Cell(45,6,'',1,0,'C');
        $pdf->Cell(40,6,'',1,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(15,6,9,1,0,'C');
        $pdf->Cell(65,6,'',1,0,'C');
        $pdf->Cell(27,6,'',1,0,'C');
        $pdf->Cell(45,6,'',1,0,'C');
        $pdf->Cell(40,6,'',1,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(15,6,10,1,0,'C');
        $pdf->Cell(65,6,'',1,0,'C');
        $pdf->Cell(27,6,'',1,0,'C');
        $pdf->Cell(45,6,'',1,0,'C');
        $pdf->Cell(40,6,'',1,1,'C');
        // $pdf->Ln();
        // $pdf->Ln();
        // $pdf->SetFont('Times','B',12);
        // $pdf->Cell(420,4,'KEPALA DINAS TENAGA KERJA',0,1,'C');
        // $pdf->Cell(420,7,'KOTA DEPOK',0,1,'C');
        // $pdf->Ln();
        // $pdf->Ln();
        // $pdf->Ln();
        // $pdf->SetFont('Times','BU',12);
        // $pdf->Cell(420,4,'DIAH SADIAH,S.Sos., M.Si.',0,1,'C');
        // $pdf->SetFont('Times','B',10);
        // $pdf->Cell(420,3,'NIP.196809131996032005',0,1,'C');
        $pdf->Output();
?>