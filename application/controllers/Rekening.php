<?php

class Rekening extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rekening_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data = [
            'judul' => 'Rekening',
            'sub' => 'Index',
            'page' => 'rekening',
            'rekening' => $this->Rekening_model->getAllRekening(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('rekening/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {

        $data = [
            'judul' => 'Rekening',
            'sub' => 'Tambah',
            'page' => 'rekening',
        ];

        $this->form_validation->set_rules('nama', 'Nama Pemilik', 'required');
        $this->form_validation->set_rules('bank', 'Bank', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor Rekening', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('rekening/tambah', $data);
            $this->load->view('template/footer');
        } else {

            $this->Rekening_model->tambah();
            $this->session->set_flashdata('flash', 'Data Rekening berhasil ditambahkan!');
            redirect('rekening');
        }
    }

    public function ubah($id)
    {

        $data = [
            'judul' => 'Rekening',
            'sub' => 'Tambah',
            'page' => 'rekening',
            'rekening' => $this->Rekening_model->getById($id),
        ];

        $this->form_validation->set_rules('nama', 'Nama Pemilik', 'required');
        $this->form_validation->set_rules('bank', 'Bank', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor Rekening', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('rekening/ubah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Rekening_model->ubah($id);
            $this->session->set_flashdata('flash', 'Data Rekening berhasil diubah!');
            redirect('rekening');
        }
    }

    public function hapus($id)
    {
        $this->Rekening_model->hapus($id);
        $this->session->set_flashdata('flash', 'Data Rekening berhasil dihapus!');
        redirect('rekening');
    }
}
