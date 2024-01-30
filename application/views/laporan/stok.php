<?php

$today = date('Y-m-d');
$kalender = CAL_GREGORIAN;
$bulan = date('m');
$tahun = date('Y');

$sekarang =  cal_days_in_month($kalender, $bulan, $tahun);
$title = $bulan;
$titlethn = $tahun;

$blnklndr = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

require('vendor/fpdf181/fpdf.php');

$pdf = new FPDF('P', 'mm', array(170, 180));
$pdf->AddPage();

$pdf->SetTitle('Laporan Stok');
// $pdf->Image(base_url() . 'assets/img/logo.png', 8, 8, 15, 15);

$pdf->SetFont('Times', 'b', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(150, 5, 'Cahaya Baru', 0, 1, 'C');

$pdf->SetFont('Times', '', 9);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(150, 5, 'KECAMATAN XXX', 0, 1, 'C');

$pdf->SetFont('Times', '', 9);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(150, 5, 'DESA XXX', 0, 1, 'C');

$pdf->SetFont('Times', 'I', 8);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(150, 5, 'Alamat : XXX', 0, 1, 'C',);

$pdf->ln(2);
$pdf->ln(1);

$pdf->SetFont('Times', '', 9);
$pdf->Cell(5, 5, '', 0, 0, 'L');
$pdf->Cell(10, 5, 'Tanggal Cetak', 0, 0, 'C');
$pdf->Cell(5, 5, ':', 0, 0, 'C');
$pdf->Cell(50, 5, tgl_indo($today), 0, 1, '');

$pdf->ln(2);

$pdf->SetFont('Times', '', 9);
$pdf->Cell(7, 5, 'No', 1, 0, 'L');
$pdf->Cell(40, 5, 'Nama Barang', 1, 0, 'L');
$pdf->Cell(35, 5, 'Kategori', 1, 0, 'L');
$pdf->Cell(15, 5, 'Stok', 1, 0, 'L');
$pdf->Cell(30, 5, 'Harga Beli', 1, 0, 'L');
$pdf->Cell(20, 5, 'Pesan', 1, 1, 'L');

$no = 1;

foreach ($laporan as $stok) :
    $pdf->Cell(7, 5, $no, 1, 0, 'L');
    $pdf->Cell(40, 5, $stok['nama'], 1, 0, 'L');
    $pdf->Cell(35, 5, $this->Kategori_model->getNameById($stok['id_kategori'], 'nama'), 1, 0, 'L');
    $pdf->Cell(15, 5, $stok['stok'], 1, 0, 'L');
    $pdf->Cell(30, 5, formatrupiah($stok['harga_beli']), 1, 0, 'L');
    $pdf->Cell(20, 5, '', 1, 1, 'L');
    $no++;
endforeach;

$pdf->Output();
