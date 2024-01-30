<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

		$data = [
            'judul' => 'Halaman Admin',
            'sub' => 'Index',
            'page' => 'kategori',
			'admin' => $this->Admin_model->getAllAdmin(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
		$data = [
            'judul' => 'Admin',
            'sub' => 'Tambah',
            'aksi' => 'admin',
        ];

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('admin/tambah', $data);
            $this->load->view('template/footer');
        } else {

            $this->Admin_model->tambahDataAdmin();
			$this->session->set_flashdata('flash', 'Data Login berhasil ditambahkan!');
            redirect('admin');
        }
    }

    public function ubah($username)
    {

		$data = [
            'judul' => 'Halaman Ubah Admin',
            'sub' => 'Index',
			'aksi'	=> 'admin',
			'admin' => $this->Admin_model->getAdminById($username),
        ];

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('admin/ubah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Admin_model->ubahDataAdmin($username);
			$this->session->set_flashdata('flash', 'Data Login berhasil diubah!');
            redirect('admin');
        }
    }

    public function hapus($username)
    {
        $this->Admin_model->hapusDataAdmin($username);
        $this->session->set_flashdata('flash', 'Data Login berhasil dihapus!');
        redirect('admin');
    }
}
