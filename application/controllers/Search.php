<?php

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Barang_model');
        $this->load->model('Konsumen_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->model('Pesanan_model');
        $this->load->model('Rajaongkir_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        if (isset($_SESSION['Login'])) {
            $id = $_SESSION['Login'];
        } else {
            $id = 0;
        };

        $search = $this->input->get('keyword');

        if (isset($_POST['pencarian'])) {
            $cats = $this->input->post(
                'kategori',
                true
            );

            $nmproduk = $this->input->post('nmproduk', true);
            $data = [
                'judul' => 'Halaman Home',
                'terlaris' => $this->Barang_model->getAllBarangTerlaris(5),
                'terbaru' => $this->Barang_model->getAllBarangTerbaru(5),
                'kategori' => $this->Kategori_model->getAllKategori(),
                'mykeranjang' => $this->User_model->getKeranjangById($id),
                'produk' => $this->Barang_model->getByNameCat($nmproduk, $cats),
                'nmproduk' => $nmproduk,
                'cats' => $cats,
            ];
            $this->load->view('template/top/header', $data);
            // $this->load->view('template/top/navbar');
            $this->load->view('user/pencarian', $data);
        } else {
            $data = [
                'judul' => 'Halaman Pencarian',
                'produk' => $this->Barang_model->getByCatName($search),
                'produktop' => $this->Barang_model->getBarangTop($search),
                'kategori' => $this->Kategori_model->getAllKategori(),
                'mykeranjang' => $this->User_model->getKeranjangById($id),
                'nmproduk' => '',
                'cats' => '0',
            ];
            $this->load->view('template/top/header', $data);
            // $this->load->view('template/top/navbar', $data);
            $this->load->view('user/pencarian', $data);
        }
        $this->load->view('template/top/footer');
    }

    public function detail()
    {
        if (isset($_SESSION['Login'])) {
            $id_login = $_SESSION['Login'];
        } else {
            $id_login = 0;
        };

        $id = $this->input->get('view');

        $data = [
            'judul' => 'Halaman Detail Barang',
            'produk' => $this->Barang_model->getDetailBarang($id),
            'kategori' => $this->Kategori_model->getAllKategori(),
            'reviews' => $this->Barang_model->getBarangReview($id),
            'mykeranjang' => $this->User_model->getKeranjangById($id_login),
            'fotos' => $this->Barang_model->getBarangFoto($id),
            'totalrating' => $this->Barang_model->totalRating($id),
            'totalkomentar' => $this->Barang_model->totalKomentar($id)
        ];

        $this->load->view('template/top/header', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('template/top/footer');
    }
}
