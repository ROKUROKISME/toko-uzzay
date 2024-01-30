<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->model('Konsumen_model');
        $this->load->model('Kategori_model');
        $this->load->model('Barang_model');
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data = [
            'judul' => 'Halaman Home',
            'akun' => $this->Konsumen_model->totalAkunAktif(),
            'produk' => $this->Barang_model->totalBarang(),
            'kategori' => $this->Kategori_model->getTotalKategori(),
            'totaltransaksi' => $this->Transaksi_model->totalTransaksi(),
            'totalpesanan' => $this->Transaksi_model->totalpesanan(),
            'totalterjual' => $this->Transaksi_model->totalterjual()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('home/index', $data);
        $this->load->view('template/footer');
        // $this->load->view('template/test', $data);
    }
}
