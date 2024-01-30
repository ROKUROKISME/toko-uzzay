<?php

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
        $this->load->model('User_model');
        $this->load->model('Pesanan_model');
        $this->load->model('Komentar_model');
        $this->load->library('form_validation');
        error_reporting(0);
    }
    public function index()
    {

        $data = [
            'judul' => 'Halaman Pesanan',
            'sub'   => 'permintaan',
            'permintaan' => $this->Pesanan_model->getAllDibayar(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pesanan/index', $data);
        $this->load->view('template/modaldetail');
        $this->load->view('template/footer');
    }

    public function diterima()
    {

        $data = [
            'judul' => 'Pesanan',
            'sub' => 'Diterima',
            'permintaan' => $this->Pesanan_model->getAllDiterima(),
        ];

        if (isset($_POST['updateResi'])) {
            $this->Pesanan_model->updateNomorResi($this->input->post('id_penjualan', true), $this->input->post('nmresi', true));
            redirect('pesanan/diterima');
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('pesanan/diterima', $data);
            $this->load->view('template/modaldetail');
            $this->load->view('template/footer');
        }
    }

    public function selesai()
    {

        $data = [
            'judul' => 'Pesanan',
            'sub' => 'Selesai',
            'permintaan' => $this->User_model->getAllSelesai(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pesanan/selesai', $data);
        $this->load->view('template/modaldetail');
        $this->load->view('template/footer');
    }

    public function detail($id)
    {

        $data = [
            'judul' => 'Pesanan',
            'sub' => 'Detail',
            'page' => 'pesanan',
            'details' => $this->User_model->getDetailBarang($id),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pesanan/detail', $data);
        $this->load->view('template/footer');
    }

    public function details($id)
    {

        $data = [
            'judul' => 'Pesanan',
            'sub' => 'Detail',
            'details' => $this->User_model->getDetailBarang($id),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pesanan/detailselesai', $data);
        $this->load->view('template/footer');
    }

    public function konfirmasi($id_penjualan, $konfirmasi)
    {
        $this->User_model->confirmPesananAdmin($konfirmasi, $id_penjualan);
        redirect('pesanan/diterima');
    }
}
