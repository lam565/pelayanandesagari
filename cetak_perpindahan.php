<?php
session_start();
require "fpdf/fpdf.php";
require "connect.php";
require "assets/fwilayah.php";

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 215-(10*2)=195mm

$pdf = new FPDF('L','mm',array(215,330));

$pdf->AddPage();
$pdf->SetFont('Times','B',12);
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(280 ,6,'',0,0,'C');
$pdf->Cell(25 ,6,' F-1.03 ',1,1,'C');
$pdf->ln(5);
$pdf->SetFont('Times','B',12);
$pdf->Cell(310,13,"FORMULIR PENDAFTARAN PERPINDAHAN PENDUDUK",1,1,"C");
$pdf->ln(3);
$pdf->SetFont("Times","",10);
$fs=4;
$pdf->SetFont("Times","B",10);
$pdf->Cell(185,$fs,"Perhatian:",0,0,"L");
$pdf->ln(3);
$pdf->Cell(100,$fs,"  Harap diisi dengan huruf cetak dan menggunakan tinta hitam",0,0,"L");
$pdf->ln(7);

$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"1. No KK",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(140,$fs,'a',1,0,"L");
$pdf->Cell(2,0,"","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(5);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"2. Nama Lengkap Pemohon",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(140,$fs,'a',1,0,"L");
$pdf->Cell(2,0,"","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(5);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"3. NIK",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(140,$fs,'a',1,0,"L");
$pdf->Cell(2,0,"","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(5);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"4. Jenis Permohonan",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(5,0,"");
$pdf->Cell(3,$fs,'',1,0,"L");
$pdf->SetFont("Times","B",8);
$pdf->Cell(2,3,"D. SURAT KETERANGAN KEPENDUDUKAN","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(2);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"",0,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,"",0,0,"L");
$pdf->Cell(9,0,"");
$pdf->Cell(5,$fs,'',1,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(2,3,"Surat Keterangan Pindah","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(2);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"",0,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,"",0,0,"L");
$pdf->Cell(9,0,"");
$pdf->Cell(5,$fs,'',1,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(2,3,"Surat Keterangan Pindah Luar Negeri (SKPLN)","",1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(2);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"",0,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,"",0,0,"L");
$pdf->Cell(9,0,"");
$pdf->Cell(5,$fs,'',1,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(2,3,"Surat Keterangan Pindah Tempat Tinggal (SKTT) Bagi Orang Asing Tinggal Terbatas",200,1);
$pdf->Cell(195,1,"","",1);

$pdf->ln(5);
$pdf->SetFont("Times","",10);
$pdf->Cell(1,0,"","");
$pdf->Cell(50,$fs,"5. Alamat Asal",1,0,"L");
$pdf->Cell(2,0,"");
$pdf->Cell(3,0,":",0,0,"L");
$pdf->Cell(140,$fs,'',1,0,"L");
$pdf->SetFont("Times","",8);
$pdf->Cell(7,0,"");
$pdf->Cell(1,3,"RT","",1);
$pdf->Cell(210,0,"");
$pdf->Cell(300,1,"","",1);

$pdf->Output();

?>