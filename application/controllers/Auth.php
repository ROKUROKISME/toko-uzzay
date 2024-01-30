<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konsumen_model');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $data['judul'] = 'Login';

            $this->load->view('auth/login', $data);
        } else {

            $this->_login();
        }
    }

    public function registrasi()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judu'] = 'Login';
            $this->load->view('auth/registrasi');
        } else {

            if (isset($_POST['_regis'])) {
                $this->Konsumen_model->tambah();
                $this->session->set_flashdata('flash', 'Berhasil Registrasi, Silahkan Login');
                redirect('auth');
            }
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $username, 'password' => $pass])->row_array();

        $user = $this->db->get_where('konsumen', ['username' => $username, 'password' => $pass])->row_array();

        if ($admin) {
            //user ada
            $this->session->set_userdata('Login', $data['user'] = 'Admin');
            redirect('home');
        } elseif ($user) {
            $query = $this->db->query("SELECT id FROM konsumen WHERE username = '$username' and password = '$pass';");
            $row = $query->row();
            $this->session->set_userdata('Login', $data['user'] = $row->id);
            redirect('user');
        } else {
            //tidak ada
            $this->session->set_flashdata('flash', 'Username / Password <strong> Salah ');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('Login');
        $this->session->unset_userdata('Admin');
        $this->session->set_flashdata('flash', ' Anda telah keluar!');
        redirect('auth');
    }
}
