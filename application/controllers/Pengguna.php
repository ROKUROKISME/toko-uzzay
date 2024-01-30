<?php

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data = [
            'judul' => 'Pengguna',
            'sub' => 'Index',
            'page' => 'pengguna',
            'pengguna' => $this->Pengguna_model->getAllPengguna(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pengguna/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {

        $data = [
            'judul' => 'Konsumen',
            'sub' => 'Tambah',
            'page' => 'pengguna',
        ];

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('pengguna/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Pengguna_model->tambah();
            $this->session->set_flashdata('flash', 'Data konsumen Berhasil ditambah');
            redirect('pengguna');
        }
    }

    public function ubah($id)
    {

        $data = [
            'judul' => 'Pengguna',
            'sub' => 'Index',
            'page' => 'pengguna',
            'pengguna' => $this->Pengguna_model->getPenggunaById($id)
        ];

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('pengguna/ubah', $data);
            $this->load->view('template/footer');
        } else {

            $this->Pengguna_model->ubah($id);
            $this->session->set_flashdata('flash', 'Data konsumen Berhasil diubah');
            redirect('pengguna');
        }
    }

    public function hapus($id)
    {
        $this->Pengguna_model->hapusDataPengguna($id);
        $this->session->set_flashdata('flash', 'Data Berhasil di Hapus');
        redirect('pengguna');
    }
}
