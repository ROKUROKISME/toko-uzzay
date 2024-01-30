<?php

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data = [
            'judul' => 'Kategori',
            'sub' => 'Index',
            'page' => 'kategori',
            'kategori'  => $this->Kategori_model->getAllKategori(),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('kategori/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {

        $data = [
            'judul' => 'Kategori',
            'sub' => 'Ubah',
            'aksi' => 'kategori',
        ];

        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('kategori/tambah', $data);
            $this->load->view('template/footer');
        } else {

            $this->Kategori_model->tambah();
            redirect('kategori');
        }
    }

    public function ubah($id)
    {

        $data = [
            'judul' => 'Kategori',
            'sub' => 'Ubah',
            'aksi' => 'kategori',
            'kategori' => $this->Kategori_model->get($id),
        ];

        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('kategori/ubah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Kategori_model->ubah($id);
            redirect('kategori');
        }
    }

    public function hapus($id)
    {
        $this->Kategori_model->hapus($id);
        $this->session->set_flashdata('flash', 'Data kategori berhasil dihapus!');
        redirect('kategori');
    }
}
