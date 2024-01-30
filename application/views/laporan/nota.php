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

$pdf = new FPDF('P', 'mm', array(120, 150));
$pdf->AddPage();

$pdf->SetTitle('Bukti Pembelian');
$pdf->Image(base_url() . 'assets/eiser-master/img/multi-cipta.png', 8, 8, 23, 15);

$pdf->SetFont('Times', 'b', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(110, 5, 'MULTI CIPTA', 0, 1, 'C');

$pdf->SetFont('Times', '', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(110, 5, 'KECAMATAN PONTIANAK KOTA', 0, 1, 'C');

$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(110, 5, 'DESA SUNGAI BANGKONG', 0, 1, 'C');

$pdf->SetFont('Times', 'I', 8);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(110, 5, 'Alamat : Jln. Ampera', 0, 1, 'C',);

$pdf->ln(2);

$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(110, 5, 'NOTA', 0, 1, 'C');
$pdf->SetFont('Times', '', 9);
$pdf->Cell(110, 5, 'Nomor : ' . $notadetail['id'], 0, 1, 'C');

$pdf->ln(1);

$pdf->SetFont('Times', '', 9);
$pdf->Cell(10, 5, 'Tanggal', 0, 0, 'C');
$pdf->Cell(5, 5, ':', 0, 0, 'C');
$pdf->Cell(50, 5, date('d-m-Y', strtotime($notadetail['tanggal'])), 0, 1, '');

$pdf->ln(2);

$pdf->SetFont('Times', 'b', 10);
$pdf->Cell(7, 5, 'No', 1, 0, 'L');
$pdf->Cell(30, 5, 'Barang', 1, 0, 'L');
$pdf->Cell(8, 5, 'Qty', 1, 0, 'L');
$pdf->Cell(30, 5, 'Harga', 1, 0, 'L');
$pdf->Cell(30, 5, 'Total', 1, 1, 'L');

$no = 1;
$grandtotal = 0;
$total = 0;
foreach ($riwayat as $det) :

    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(7, 5, $no, 1, 0, 'L');
    $pdf->Cell(30, 5, $this->Produk_model->getProduk($det['id_produk'], 'nama'), 1, 0, 'L');
    $pdf->Cell(8, 5, $det['qty'], 1, 0, 'L');
    $pdf->Cell(30, 5, formatrupiah($this->Produk_model->getProduk($det['id_produk'], 'harga')), 1, 0, 'L');
    $total = $det['qty'] * $this->Produk_model->getProduk($det['id_produk'], 'harga');
    $pdf->Cell(30, 5, formatrupiah($total), 1, 1, 'L');
    $grandtotal = $grandtotal + $total;
    $no++;
endforeach;
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(105, 5, 'Total : ' . formatrupiah($grandtotal), 1, 0, 'R');

$pdf->Output();
