<?php

class Admin_model extends CI_Model
{

    function getAllAdmin()
    {
        return $this->db->get('admin')->result_array();
    }

    function tambahDataAdmin()
    {
        $data = [
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true)
        ];

        $this->db->insert('admin', $data);
    }

    public function getAdminById($username)
    {
        return $this->db->get_where('admin', ['username' => $username])->row_array();
    }

    public function ubahDataAdmin($username)
    {
        $data = [
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true)
        ];

        $this->db->where('username', $username);
        $this->db->update('admin', $data);
    }

    public function hapusDataAdmin($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('admin');
    }

    public function getTotalAdmin()
    {
        $this->db->from('admin');
        return $this->db->count_all_results();
    }

    public function getAdminNameById($username, $case)
    {
        $row = $this->db->get_where('admin', ['username' => $username])->row();
        switch ($case) {
            case 'username':
                return $row->username;
                break;
            case 'password':
                return $row->password;
                break;
        }
    }
}
