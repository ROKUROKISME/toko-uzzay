<?php

defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('tgl_indo')) {

    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei',
            'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );
        $bagi = explode(' ', $tanggal);
        $pecahkan = explode('-', $bagi[0]);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
}

if (!function_exists('tgl_indo_waktu')) {

    function tgl_indo_waktu($tanggal)
    {
        $bulan = array(
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei',
            'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );
        $bagi = explode(' ', $tanggal);
        $pecahkan = explode('-', $bagi[0]);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0] . ', Pukul ' . $bagi[1];
    }
}

if (!function_exists('umur')) {

    function umur($tanggal)
    {
        $tanggal_lahir = new DateTime($tanggal);
        $sekarang = new DateTime("today");
        $thn = $sekarang->diff($tanggal_lahir)->y;
        return $thn . " tahun ";
    }
}

if (!function_exists('rupiah')) {

    function formatrupiah($nilai)
    {
        if ($nilai == null) $nilai = 0;
        $hasil_rupiah = "Rp " . number_format($nilai, 2, ',', '.');
        return $hasil_rupiah;
    }
}

if (!function_exists('total')) {

    function total($qty, $harga)
    {
        return $qty * $harga;
    }
}

if (!function_exists('diskon')) {

    function diskon($harga, $diskon)
    {
        $harga = $harga - (($harga * $diskon) / 100);
        return $harga;
    }
}

if (!function_exists('title')) {

    function title()
    {
        return 'Cahaya Baru';
    }
}
if (!function_exists('threedigit')) {
	function threedigit($val)
	{
		if (strlen($val) == 1) {
			return '00' . $val;
		} elseif(strlen($val) == 2){
			return '0' . $val;
		}else {
			return $val;
		}
	}
}



if (!function_exists('bulanindo')) {

    function bulanindo($bulan)
    {
        switch ($bulan) {
            case '1':
                return 'Januari';
                break;
            case '2':
                return 'Februari';
                break;
            case '3':
                return 'Maret';
                break;
            case '4':
                return 'April';
                break;
            case '5':
                return 'Mei';
                break;
            case '6':
                return 'Juni';
                break;
            case '7':
                return 'Juli';
                break;
            case '8':
                return 'Agustus';
                break;
            case '9':
                return 'September';
                break;
            case '01':
                return 'Januari';
                break;
            case '02':
                return 'Februari';
                break;
            case '03':
                return 'Maret';
                break;
            case '04':
                return 'April';
                break;
            case '05':
                return 'Mei';
                break;
            case '06':
                return 'Juni';
                break;
            case '07':
                return 'Juli';
                break;
            case '08':
                return 'Agustus';
                break;
            case '09':
                return 'September';
                break;
            case '10':
                return 'Oktober';
                break;
            case '11':
                return 'November';
                break;
            case '12':
                return 'Desember';
                break;
        }
    }
}
