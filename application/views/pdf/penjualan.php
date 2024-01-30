<?php

error_reporting(false);

require('vendor/fpdf181/fpdf.php');

$pdf = new FPDF('P', 'mm', array(200, 300));
$pdf->AddPage();

$pdf->SetTitle('Laporan Penjualan ');
// $pdf->Image(base_url() . 'assets/eiser-master/img/multi-cipta.png', 12, 8, 40, 20);

$pdf->SetFont('Times', 'b', 14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(180, 5, 'CAHAYA BARU', 0, 1, 'C');

// $pdf->SetFont('Times', 'b', 11);
// $pdf->SetTextColor(0, 0, 0);
// $pdf->Cell(180, 4, 'KABUPATEN SANGGAU', 0, 1, 'C');

// $pdf->SetFont('Times', '', 9);
// $pdf->SetTextColor(0, 0, 0);
// $pdf->Cell(180, 4, 'KECAMATAN JANGKANG', 0, 1, 'C');

$pdf->SetFont('Times', 'b', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(180, 4, 'DESA BALAI SEBUT', 0, 1, 'C');

$pdf->SetFont('Times', 'I', 8);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(180, 4, 'Alamat : Jln. Merakai RT/RW. 002/001', 0, 1, 'C',);

$pdf->ln(10);

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(35, 8, 'PERIODE LAPORAN', 0, 0, 'L');
$pdf->Cell(5, 8, ':', 0, 0, 'C');
$pdf->Cell(50, 8, date("d-m-Y", strtotime($this->uri->segment(3))) . ' s/d ' . date("d-m-Y", strtotime($this->uri->segment(4))), 0, 1, '');

$pdf->ln(2);

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(7, 8, 'No', 1, 0, 'L');
$pdf->Cell(25, 8, 'ID Penjualan', 1, 0, 'L');
$pdf->Cell(30, 8, 'Tanggal', 1, 0, 'L');
$pdf->Cell(45, 8, 'Nama Konsumen', 1, 0, 'L');
$pdf->Cell(30, 8, 'Status', 1, 0, 'L');
$pdf->Cell(40, 8, 'Total', 1, 1, 'L');


$no = 1;
$grandtotal = 0;
$total = 0;
$pdf->SetFont('Times', '', 10);
foreach ($laporan as $lap) :
    $pdf->Cell(7, 6, $no, 1, 0, 'L');
    $pdf->Cell(25, 6, $lap['id'], 1, 0, 'L');
    $pdf->Cell(30, 6, $lap['tanggal'], 1, 0, 'L');
    $pdf->Cell(45, 6, $this->Pengguna_model->getPengguna($lap['id_konsumen'], 'nama'), 1, 0, 'L');
    $pdf->Cell(30, 6, $lap['status'], 1, 0, 'L');
    $pdf->Cell(40, 6, formatrupiah($lap['total_harga']), 1, 1, 'L');

    $no++;
    $grandtotal = $grandtotal + $lap['total_harga'];
endforeach;
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(177, 8, 'Total : ' . formatrupiah($grandtotal), 1, 0, 'R');

$pdf->Output();
