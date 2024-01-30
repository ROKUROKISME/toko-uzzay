<?php

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->load->model('Supplier_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data = [
            'judul' => 'Produk',
            'sub' => 'Index',
            'page' => 'produk',
            'produk'  => $this->Produk_model->getAllProduk(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('produk/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {

        $data = [
            'judul' => 'Produk',
            'sub' => 'Tambah',
            'page' => 'produk',
            'kategori' => $this->Kategori_model->getAllKategori(),
            'supplier' => $this->Supplier_model->getAllSupplier()
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('hargabeli', 'Harga Beli', 'required');
        $this->form_validation->set_rules('hargajual', 'Harga Jual', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
        $this->form_validation->set_rules('desk', 'Deskripsi', 'required');
        $this->form_validation->set_rules('nota', 'Nomor Nota', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('produk/tambah', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['tambah'])) {
                $gambar = $_FILES['foto']['name'];
                $config['upload_path']   = './assets/img/produk';
                $config['allowed_types'] = 'png|jpg|gif|jpeg';
                $config['max_size']      = 10240;
                $config['max_width']     = 10240;
                $config['max_height']    = 7680;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('upload_form', $error);
                } else {

                    $this->Produk_model->tambahpembelianbaru();
                    $this->Produk_model->tambah($gambar);
                    $this->session->set_flashdata('flash', 'Data Produk berhasil ditambahkan!');
                    redirect('produk');
                }
            }
        }
    }

    public function tambahstok($id)
    {
        $data = [
            'judul' => 'Stok Produk',
            'sub' => 'Tambah Stok',
            'page' => 'produk',
            'produk' => $this->Produk_model->getById($id),
            'kategori' => $this->Kategori_model->getAllKategori(),
            'supplier' => $this->Supplier_model->getAllSupplier()
        ];

        $this->form_validation->set_rules('nota', 'Nomor Nota', 'required');
        $this->form_validation->set_rules('qty', 'Stok Baru', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('produk/tambahstok', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['tambah'])) {

                $this->Produk_model->tambahstok();
                $this->Produk_model->tambahpembelian();
                $this->session->set_flashdata('flash', 'Stok Produk berhasil ditambahkan!');
                redirect('produk');
            }
        }
    }

    public function ubah($id)
    {

        $data = [
            'judul' => 'Produk',
            'sub' => 'Index',
            'page' => 'produk',
            'produk' => $this->Produk_model->getById($id),
            'kategori' => $this->Kategori_model->getAllKategori(),
            'supplier' => $this->Supplier_model->getAllSupplier()
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('hargabeli', 'Harga Beli', 'required');
        $this->form_validation->set_rules('hargajual', 'Harga Jual', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
        $this->form_validation->set_rules('desk', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('produk/ubah', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['ubah'])) {

                $gambar = $_FILES['foto']['name'];

                if ($gambar != null) {
                    $config['upload_path']   = './assets/img/produk';
                    $config['allowed_types'] = 'png|jpg|gif|jpeg';
                    $config['max_size']      = 10240;
                    $config['max_width']     = 10240;
                    $config['max_height']    = 7680;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('foto')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('upload_form', $error);
                    } else {

                        $this->Produk_model->ubah($gambar);
                        $this->session->set_flashdata('flash', 'Data Produk berhasil diubah!');
                        redirect('produk');
                    }
                } else {
                    $gambar = null;
                    $this->Produk_model->ubah($gambar);
                    $this->session->set_flashdata('flash', 'Data Produk berhasil diubah!');
                    redirect('produk');
                }
            }
        }
    }

    public function retur($id)
    {

        $data = [
            'judul' => 'Produk',
            'sub' => 'Retur',
            'page' => 'produk',
            'produk' => $this->Produk_model->getById($id),
            'kategori' => $this->Kategori_model->getAllKategori(),
            'supplier' => $this->Supplier_model->getAllSupplier()
        ];

        $this->form_validation->set_rules('qty', 'Qty', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('produk/retur', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['retur'])) {

                $this->Produk_model->deQty();
                $this->Produk_model->retur();
                $this->session->set_flashdata('flash', 'Produk berhasil diretur!');
                redirect('produk');
            }
        }
    }

    public function hapus($id)
    {
        $this->Produk_model->hapus($id);
        $this->session->set_flashdata('flash', 'Data barang berhasil dihapus!');
        redirect('produk');
    }

    // public function detail($id)
    // {

    //     $data['judul'] = 'Halaman Ubah Produk';
    //     $data['detail'] = $this->Produk_model->getProdukFoto($id);
    //     $data['kategori'] = $this->Kategori_model->getAllKategori();

    //     $this->form_validation->set_rules('id_produk', 'id_produk', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('template/header', $data);
    //         $this->load->view('template/sidebar');
    //         $this->load->view('produk/detail', $data);
    //         $this->load->view('template/footer');
    //     } else {

    //         if (isset($_POST['addProdukFoto'])) {


    //             $gambar = $_FILES['foto']['name'];

    //             if ($gambar != null) {
    //                 $config['upload_path']   = './assets/img/produk';
    //                 $config['allowed_types'] = 'png|jpg|gif|jpeg';
    //                 $config['max_size']      = 10240;
    //                 $config['max_width']     = 10240;
    //                 $config['max_height']    = 7680;

    //                 $this->load->library('upload', $config);

    //                 if (!$this->upload->do_upload('foto')) {
    //                     $error = array('error' => $this->upload->display_errors());
    //                     $this->load->view('upload_form', $error);
    //                 } else {

    //                     $this->Produk_model->tambahProdukFoto($gambar);
    //                     $this->session->set_flashdata('flash', 'Foto Produk berhasil ditambah');
    //                     redirect('produk/detail/' . $id);
    //                 }
    //             } else {
    //                 $gambar = 'null';
    //                 $this->Produk_model->tambahProdukFoto($gambar);
    //                 redirect('produk/detail/' . $id);
    //             }
    //         }
    //     }
    // }

    // public function hapusfoto($id)
    // {
    //     $this->Produk_model->hapusProdukFoto($id);
    //     $this->session->set_flashdata('flash', 'Foto Produk berhasil dihapus');
    //     redirect('produk');
    // }

    // AJAX GET PRODUK
    public function getProduk()
    {
        $id_produk = $this->input->post('id_produk', true);
        $case = $this->input->post('case', true);
        $produk = $this->Produk_model->getProdukJSON($id_produk);
        echo json_encode($produk);
    }
}
