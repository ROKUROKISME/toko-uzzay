<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Laporan_model');
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->load->model('Pengguna_model');
    }
    public function penjualan()
    {

        if (isset($_POST['filter'])) {
            $dari = $this->input->post('_dari', true);
            $sampai = $this->input->post('_sampai', true);
            $data = [
                'judul' => 'Laporan Penjualan',
                'sub' => 'Harian',
                'page' => 'penjualan',
                'dari' => $dari,
                'sampai' => $sampai,
                'laporan' => $this->Laporan_model->penjualan($dari, $sampai),
            ];
        } else {
            $data = [
                'judul' => 'Laporan Penjualan',
                'sub' => 'Harian',
                'page' => 'penjualan',
                'dari' => date('Y-m-d'),
                'sampai' => date('Y-m-d'),
                'laporan' => $this->Laporan_model->penjualan(date('Y-m-d'), date('Y-m-d')),
            ];
        }

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('laporan/penjualan', $data);
        $this->load->view('template/footer');
    }
    public function pembelian()
    {

        if (isset($_POST['filter'])) {
            $dari = $this->input->post('_dari', true);
            $sampai = $this->input->post('_sampai', true);
            $data = [
                'judul' => 'Laporan Pembelian',
                'sub' => 'Periode',
                'page' => 'laporan',
                'dari' => $dari,
                'sampai' => $sampai,
                'laporan' => $this->Laporan_model->pembelian($dari, $sampai),
            ];
        } else {
            $data = [
                'judul' => 'Laporan Pembelian',
                'sub' => 'Periode',
                'page' => 'laporan',
                'dari' => date('Y-m-d'),
                'sampai' => date('Y-m-d'),
                'laporan' => $this->Laporan_model->pembelian(date('Y-m-d'), date('Y-m-d')),
            ];
        }

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('laporan/pembelian', $data);
        $this->load->view('template/footer');
    }
    public function retur()
    {

        if (isset($_POST['filter'])) {
            $dari = $this->input->post('_dari', true);
            $sampai = $this->input->post('_sampai', true);
            $data = [
                'judul' => 'Laporan Retur',
                'sub' => 'Retur',
                'page' => 'retur',
                'dari' => $dari,
                'sampai' => $sampai,
                'laporan' => $this->Laporan_model->retur($dari, $sampai),
            ];
        } else {
            $data = [
                'judul' => 'Laporan Retur',
                'sub' => 'Retur',
                'page' => 'retur',
                'dari' => date('Y-m-d'),
                'sampai' => date('Y-m-d'),
                'laporan' => $this->Laporan_model->retur(date('Y-m-d'), date('Y-m-d')),
            ];
        }


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('laporan/retur', $data);
        $this->load->view('template/footer');
    }
    public function selesai()
    {

        $data['judul'] = 'Halaman Laporan Selesai';
        // $data['laporan'] = $this->Laporan_model->getLaporanSelesai();
        if (isset($_POST['filter'])) {
            $dari = $this->input->post('_dari', true);
            $sampai = $this->input->post('_sampai', true);
            $data = [
                'dari' => $dari,
                'sampai' => $sampai,
                'laporan' => $this->Laporan_model->getLaporanFilter($dari, $sampai),
            ];
        } else {
            $dari = date('Y-m-d');
            $sampai = date('Y-m-d');
            $data = [
                'dari' => $dari,
                'sampai' => $sampai,
                'laporan' => $this->Laporan_model->getLaporanFilter($dari, $sampai),
            ];
        }
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('laporan/selesai', $data);
        $this->load->view('template/footer');
    }

    // public function ditolak()
    // {

    //     $data['judul'] = 'Halaman Laporan Ditolak';
    //     if (isset($_POST['filter'])) {
    //         $dari = $this->input->post('_dari', true);
    //         $sampai = $this->input->post('_sampai', true);
    //         $data = [
    //             'dari' => $dari,
    //             'sampai' => $sampai,
    //             'laporan' => $this->Laporan_model->getLaporanDitolak($dari, $sampai),
    //         ];
    //     } else {
    //         $dari = date('Y-m-d');
    //         $sampai = date('Y-m-d');
    //         $data = [
    //             'dari' => $dari,
    //             'sampai' => $sampai,
    //             'laporan' => $this->Laporan_model->getLaporanDitolak($dari, $sampai),
    //         ];
    //     }
    //     $this->load->view('template/header', $data);
    //     $this->load->view('template/sidebar');
    //     $this->load->view('laporan/ditolak', $data);
    //     $this->load->view('template/footer');
    // }

    public function cetaknota($id)
    {
        $data =
            [
                'judul' => 'Nota Penjualan',
                'riwayat' => $this->Laporan_model->getDetaiByID($id),
                'notadetail' => $this->Laporan_model->getDetailNota($id)
            ];
        $this->load->view('laporan/nota', $data);
    }

    public function cetakpenjualan($dari, $sampai)
    {
        $data =
            [
                'judul' => 'Laporan Penjualan',
                'laporan' => $this->Laporan_model->penjualan($dari, $sampai),
            ];
        $this->load->view('pdf/penjualan', $data);
    }

    public function cetakpembelian($dari, $sampai)
    {
        $data =
            [
                'judul' => 'Laporan Pembelian',
                'laporan' => $this->Laporan_model->pembelian($dari, $sampai),
            ];
        $this->load->view('pdf/pembelian', $data);
    }

    public function stok()
    {
        $data =
            [
                'judul' => 'Laporan Stok',
                'laporan' => $this->Produk_model->getAllProduk()
            ];
        $this->load->view('laporan/stok', $data);
    }
}
