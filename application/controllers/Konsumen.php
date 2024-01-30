<?php

class Konsumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konsumen_model');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data = [
            'judul' => 'Konsumen',
            'sub' => 'Index',
            'page' => 'konsumen',
            'konsumen' => $this->Konsumen_model->getAllKonsumen(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('konsumen/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {

        $data = [
            'judul' => 'Konsumen',
            'sub' => 'Tambah',
            'page' => 'konsumen',
        ];

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('konsumen/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Konsumen_model->tambah();
            $this->session->set_flashdata('flash', 'Data konsumen Berhasil ditambah');
            redirect('konsumen');
        }
    }

    public function ubah($id)
    {

        $data = [
            'judul' => 'Konsumen',
            'sub' => 'Index',
            'page' => 'konsumen',
            'konsumen' => $this->Konsumen_model->getKonsumenById($id)
        ];

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('konsumen/ubah', $data);
            $this->load->view('template/footer');
        } else {

            $this->Konsumen_model->ubah($id);
            $this->session->set_flashdata('flash', 'Data konsumen Berhasil diubah');
            redirect('konsumen');
        }
    }

    public function hapus($id)
    {
        $this->Konsumen_model->hapusDataKonsumen($id);
        $this->session->set_flashdata('flash', 'Data Berhasil di Hapus');
        redirect('konsumen');
    }
}
