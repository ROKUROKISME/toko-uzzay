<?php

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
        $this->load->model('Supplier_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data = [
            'judul' => 'Barang',
            'sub' => 'Index',
            'page' => 'barang',
            'barang'  => $this->Barang_model->getAllBarang(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('barang/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {

        $data = [
            'judul' => 'Barang',
            'sub' => 'Tambah',
            'page' => 'barang',
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
            $this->load->view('barang/tambah', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['tambah'])) {
                $gambar = $_FILES['foto']['name'];
                $config['upload_path']   = './assets/img/barang';
                $config['allowed_types'] = 'png|jpg|gif|jpeg';
                $config['max_size']      = 10240;
                $config['max_width']     = 10240;
                $config['max_height']    = 7680;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('upload_form', $error);
                } else {

                    $this->Barang_model->tambahpembelianbaru();
                    $this->Barang_model->tambah($gambar);
                    $this->session->set_flashdata('flash', 'Data Barang berhasil ditambahkan!');
                    redirect('barang');
                }
            }
        }
    }

    public function tambahstok($id)
    {
        $data = [
            'judul' => 'Stok Barang',
            'sub' => 'Tambah Stok',
            'page' => 'barang',
            'barang' => $this->Barang_model->getById($id),
            'kategori' => $this->Kategori_model->getAllKategori(),
            'supplier' => $this->Supplier_model->getAllSupplier()
        ];

        $this->form_validation->set_rules('nota', 'Nomor Nota', 'required');
        $this->form_validation->set_rules('qty', 'Stok Baru', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('barang/tambahstok', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['tambah'])) {

                $this->Barang_model->tambahstok();
                $this->Barang_model->tambahpembelian();
                $this->session->set_flashdata('flash', 'Stok Barang berhasil ditambahkan!');
                redirect('barang');
            }
        }
    }

    public function ubah($id)
    {

        $data = [
            'judul' => 'Barang',
            'sub' => 'Index',
            'page' => 'barang',
            'barang' => $this->Barang_model->getById($id),
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
            $this->load->view('barang/ubah', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['ubah'])) {

                $gambar = $_FILES['foto']['name'];

                if ($gambar != null) {
                    $config['upload_path']   = './assets/img/barang';
                    $config['allowed_types'] = 'png|jpg|gif|jpeg';
                    $config['max_size']      = 10240;
                    $config['max_width']     = 10240;
                    $config['max_height']    = 7680;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('foto')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('upload_form', $error);
                    } else {

                        $this->Barang_model->ubah($gambar);
                        $this->session->set_flashdata('flash', 'Data Barang berhasil diubah!');
                        redirect('barang');
                    }
                } else {
                    $gambar = null;
                    $this->Barang_model->ubah($gambar);
                    $this->session->set_flashdata('flash', 'Data Barang berhasil diubah!');
                    redirect('barang');
                }
            }
        }
    }

    public function retur($id)
    {

        $data = [
            'judul' => 'Barang',
            'sub' => 'Retur',
            'page' => 'barang',
            'barang' => $this->Barang_model->getById($id),
            'kategori' => $this->Kategori_model->getAllKategori(),
            'supplier' => $this->Supplier_model->getAllSupplier()
        ];

        $this->form_validation->set_rules('qty', 'Qty', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('barang/retur', $data);
            $this->load->view('template/footer');
        } else {
            if (isset($_POST['retur'])) {

                $this->Barang_model->deQty();
                $this->Barang_model->retur();
                $this->session->set_flashdata('flash', 'Barang berhasil diretur!');
                redirect('barang');
            }
        }
    }

    public function hapus($id)
    {
        $this->Barang_model->hapus($id);
        $this->session->set_flashdata('flash', 'Data barang berhasil dihapus!');
        redirect('barang');
    }

    // public function detail($id)
    // {

    //     $data['judul'] = 'Halaman Ubah Barang';
    //     $data['detail'] = $this->Barang_model->getBarangFoto($id);
    //     $data['kategori'] = $this->Kategori_model->getAllKategori();

    //     $this->form_validation->set_rules('id_barang', 'id_barang', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('template/header', $data);
    //         $this->load->view('template/sidebar');
    //         $this->load->view('barang/detail', $data);
    //         $this->load->view('template/footer');
    //     } else {

    //         if (isset($_POST['addBarangFoto'])) {


    //             $gambar = $_FILES['foto']['name'];

    //             if ($gambar != null) {
    //                 $config['upload_path']   = './assets/img/barang';
    //                 $config['allowed_types'] = 'png|jpg|gif|jpeg';
    //                 $config['max_size']      = 10240;
    //                 $config['max_width']     = 10240;
    //                 $config['max_height']    = 7680;

    //                 $this->load->library('upload', $config);

    //                 if (!$this->upload->do_upload('foto')) {
    //                     $error = array('error' => $this->upload->display_errors());
    //                     $this->load->view('upload_form', $error);
    //                 } else {

    //                     $this->Barang_model->tambahBarangFoto($gambar);
    //                     $this->session->set_flashdata('flash', 'Foto Barang berhasil ditambah');
    //                     redirect('barang/detail/' . $id);
    //                 }
    //             } else {
    //                 $gambar = 'null';
    //                 $this->Barang_model->tambahBarangFoto($gambar);
    //                 redirect('barang/detail/' . $id);
    //             }
    //         }
    //     }
    // }

    // public function hapusfoto($id)
    // {
    //     $this->Barang_model->hapusBarangFoto($id);
    //     $this->session->set_flashdata('flash', 'Foto Barang berhasil dihapus');
    //     redirect('barang');
    // }

    // AJAX GET PRODUK
    public function getBarang()
    {
        $id_barang = $this->input->post('id_barang', true);
        $case = $this->input->post('case', true);
        $barang = $this->Barang_model->getBarangJSON($id_barang);
        echo json_encode($barang);
    }
}
