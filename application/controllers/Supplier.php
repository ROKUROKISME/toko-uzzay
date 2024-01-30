<?php

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data = [
            'judul' => 'Supplier',
            'sub' => 'Index',
            'page' => 'supplier',
            'supplier'  => $this->Supplier_model->getAllSupplier(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('supplier/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Supplier',
            'sub' => 'Tambah',
            'page' => 'supplier',
        ];

        $this->form_validation->set_rules('nama', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('telp', 'Telp / WA', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('supplier/tambah', $data);
            $this->load->view('template/footer');
        } else {

            $this->Supplier_model->tambah();
            $this->session->set_flashdata('flash', 'Data supplier berhasil ditambahkan!');
            redirect('supplier');
        }
    }

    public function ubah($id)
    {

        $data = [
            'judul' => 'Supplier',
            'sub' => 'Ubah',
            'page' => 'supplier',
            'supplier' => $this->Supplier_model->getById($id),
        ];

        $this->form_validation->set_rules('nama', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('telp', 'Telp / WA', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('supplier/ubah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Supplier_model->ubah($id);
            $this->session->set_flashdata('flash', 'Data supplier berhasil diubah!');
            redirect('supplier');
        }
    }

    public function hapus($id)
    {
        $this->Supplier_model->hapus($id);
        $this->session->set_flashdata('flash', 'Data supplier berhasil dihapus!');
        redirect('supplier');
    }
}
