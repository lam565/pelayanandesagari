<?php
require_once "../fpdf/fpdf.php";

//FUNGSI MENGISI KOTAKAN
function isiKotak($pdf, $kata, $tKotak)
{
    $len = strlen($kata);
    $ckata = str_split($kata);
    for ($k = 0; $k < $len; $k++) {
        $pdf->Cell(3, 3, $ckata[$k], 1, 0, 'C');
    }
    while ($k < $tKotak) {
        $pdf->Cell(3, 3, '', 1, 0, 'C');
        $k++;
    }
}
//FUNGSI LABEL
function labelForm($pdf, $label)
{
    $pdf->Cell(60, 3.5, $label, 'L', 0, 'L');
    $pdf->Cell(3.5, 3.5, ':', 0, 0, 'L');
}


$pdf = new FPDF('P', 'mm', 'A4'); //A4 = 210 mm x 297mm
$pdf->Open();
$pdf->SetMargins(10,8);
$pdf->AddPage();

$t1 = 3.5;
$t2 = 4;
$tab = 60;
$fz1 = 9;
$fz2 = 10;

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(145);
$pdf->Cell(0, 5, 'F-2.01', 1, 1, 'C');

$pdf->SetFont('Times', '', $fz1);
$pdf->Cell($tab, $t1, 'Provinsi', 0, 0, 'L');
$pdf->Cell(0, $t1, ': Daerah Istimewa Yogyakarta', 0, 1, 'L');
$pdf->Cell($tab, $t1, 'Kabupaten', 0, 0, 'L');
$pdf->Cell(0, $t1, ': Gunungkidul', 0, 1, 'L');

//Get Sesuai data
$pdf->Cell($tab, $t1, 'Kecamatan', 0, 0, 'L');
$pdf->Cell(0, $t1, ': [Kec]', 0, 1, 'L');
$pdf->Cell($tab, $t1, 'Desa', 0, 0, 'L');
$pdf->Cell(0, $t1, ': [desa]', 0, 1, 'L');
$pdf->Cell($tab, $t1, 'Kode Wilayah', 0, 0, 'L');
$pdf->Cell(3, $t1, ':', 0, 0, 'L');
//contoh kode wilayah
$kdwil = '02032018';
isiKotak($pdf, $kdwil, 8);
$pdf->Ln();

//JUDUL
$pdf->SetFont('Times', 'B', $fz1);
$pdf->Cell(0, $t2, 'FORMULIR PELAPORAN PENCATATAN SIPIL DI DALAM WILAYAH NKRI', 0, 1, 'C');
$pdf->Cell(0, $t2, 'Jenis Pelaporan Pencatatan Sipil', 0, 1, 'L');

$jenis = array('Kelahiran', 'Pengakuan Anak', 'Lahir Mati', 'Pengesahan Anak', 'Perkawinan', 'Perubahan Nama', 'Pembatalan Perkawinan', 'Perubahan Status Kewarganegaraan', 'Perceraian', 'Pencatatan Peristiwa Penting Lainnya', 'Pembatalan Perceraian', 'Pembetulan Akta', 'Kematian', 'Pembatalan Akta', 'Pengankatan Anak', 'Pelaporan Pencatatan Sipil Dari Luar Wilayah NKRI');

//JENIS PELAPORAN
$pdf->SetFont('Times', '', $fz1);
$nj = 1;
foreach ($jenis as $jp) {
    if ($nj % 2 != 0) {
        //colom 1
        $pdf->Cell($t1, $t1, ' ', 1, 0, 'C');
        $pdf->Cell($tab, $t1, $jp, 0, 0, 'L');
        $pdf->Cell(30);
    } else {
        //colom 2
        $pdf->Cell($t1, $t1, ' ', 1, 0, 'C');
        $pdf->Cell($tab, $t1, $jp, 0, 1, 'L');
    }
    $nj++;
}
$pdf->Ln(2);

//DATA PELAPOR
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA PELAPOR', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf,'Nama');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'NIK');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Nomor Dokumen Perjalanan *');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Nomor Kartu Keluarga');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Kewarganegaraan');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);

//DATA SUBJECT AKTA KE SATU
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA SUBJEK AKTA KESATU', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf,'Nama');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'NIK');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Nomor Dokumen Perjalanan *');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Nomor Kartu Keluarga');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Kewarganegaraan');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);

//DATA SUBJEK AKTA KEDUA (JIKA ADA)
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA SUBJEK AKTA KEDUA (JIKA ADA)', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf,'Nama');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'NIK');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Nomor Dokumen Perjalanan *');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Nomor Kartu Keluarga');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Kewarganegaraan');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);

//DATA SAKSI - SAKSI
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA SAKSI I', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf,'Nama');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'NIK');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Nomor Kartu Keluarga');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Kewarganegaraan');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA SAKSI II', 'LR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf,'Nama');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'NIK');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Nomor Kartu Keluarga');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Kewarganegaraan');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);

//DATA ORANG TUA
$pdf->SetFont('Times', 'BIU', $fz2);
$pdf->Cell(0, $t2, 'DATA ORANG TUA** (Hanya diisi untuk keperluan pencatatan kelahiran, lahir mati dan kematian)', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf,'Nama Ayah');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'NIK Ayah');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Tempat Lahir Ayah');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Tanggal Lahir Ayah');
$pdf->Cell(4*$t1,$t1,'Tgl. ',0,0);
isiKotak($pdf,'',2);
$pdf->Cell(4*$t1,$t1,'Bln. ',0,0);
isiKotak($pdf,'',2);
$pdf->Cell(4*$t1,$t1,'Thn. ',0,0);
isiKotak($pdf,'',4);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Kewarganegaraan');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Nama Ibu');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'NIK Ibu');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Tempat Lahir Ibu');
isiKotak($pdf,'',16);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Tanggal Lahir Ibu');
$pdf->Cell(4*$t1,$t1,'Tgl. ',0,0);
isiKotak($pdf,'',2);
$pdf->Cell(4*$t1,$t1,'Bln. ',0,0);
isiKotak($pdf,'',2);
$pdf->Cell(4*$t1,$t1,'Thn. ',0,0);
isiKotak($pdf,'',4);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'Kewarganegaraan');
isiKotak($pdf,'',30);
$pdf->Cell(0,$t1,'','R',1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);

//DATA ANAK
$pdf->SetFont('Times', 'B', $fz2);
$pdf->Cell(0, $t2, 'DATA ANAK', 'LTR', 1, 'L');

$pdf->SetFont('Times', '', $fz1);
labelForm($pdf,'1. Nama');
//isikan nama disini
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'2. Jenis Kelamin');
isiKotak($pdf,'',1);
$pdf->Cell(10*$t1,$t1,'1. Laki-laki ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(10*$t1,$t1,'2. Perempuan ',0,0,'L');
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'3. Tempat dilahirkan');
isiKotak($pdf,'',1);
$pdf->Cell(5*$t1,$t1,'1. RS/RB ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(7*$t1,$t1,'2. Puskesmas ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(8*$t1,$t1,'3. Polides ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(7*$t1,$t1,'4. Rumah ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(7*$t1,$t1,'5. Lainnya ',0,0,'L');
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'4. Tempat Kelahiran');
//isikan tempat lahir disini
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'5. Hari dan tanggal lahir');
$pdf->Cell(5*$t1,$t1,'Hari: ',0,0);
isiKotak($pdf,'',2);
$pdf->Cell(4*$t1,$t1,'Tgl: ',0,0);
isiKotak($pdf,'',2);
$pdf->Cell(4*$t1,$t1,'Bln: ',0,0);
isiKotak($pdf,'',2);
$pdf->Cell(4*$t1,$t1,'Thn: ',0,0);
isiKotak($pdf,'',4);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'6. Pukul');
//isikan pukul disini
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'7. Jenis Kelahiran');
isiKotak($pdf,'',1);
$pdf->Cell(6*$t1,$t1,'1. Tunggal ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(6*$t1,$t1,'2. Kembar 2 ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(6*$t1,$t1,'3. Kembar 3 ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(6*$t1,$t1,'4. Kembar 4 ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(7*$t1,$t1,'5. Lainnya ',0,0,'L');
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'8. Kelahiran ke');
//isikan disini
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'9. Penolong Kelahiran');
isiKotak($pdf,'',1);
$pdf->Cell(7*$t1,$t1,'1. Dokter ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(10*$t1,$t1,'2. Bidan/Perwat ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(7*$t1,$t1,'3. Dukun ',0,0,'L');
isiKotak($pdf,'',1);
$pdf->Cell(7*$t1,$t1,'5. Lainnya ',0,0,'L');
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'10. Berat Bayi');
$pdf->Cell(4*$t1,$t1,'',1,0);
$pdf->Cell(3*$t1,$t1,' Kg',0,0);
$pdf->Cell(0,$t1,'','R',1);

labelForm($pdf,'11. Panjang Bayi');
$pdf->Cell(4*$t1,$t1,'',1,0);
$pdf->Cell(3*$t1,$t1,' Cm',0,0);
$pdf->Cell(0,$t1,'','R',1);

$pdf->Cell(0, $t1, '', 'LBR', 1, 'L');
$pdf->Ln(1);


//HALAMAN 2
$pdf->AddPage();


$pdf->Output();
