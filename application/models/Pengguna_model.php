<?php

class Pengguna_model extends CI_Model
{

    public function getAllPengguna()
    {
        return $this->db->get_where('pengguna', ['aktif' => 'Aktif'])->result_array();
    }

    public function getPenggunaById($id)
    {
        return $this->db->get_where('pengguna', ['id' => $id])->row_array();
    }

    public function tambah()
    {
        $data = [
            'username' => $this->input->post('username', true),
            'nama' => $this->input->post('nama', true),
            'jk' => $this->input->post('jk', true),
            'email' => $this->input->post('email', true),
            'telp' => $this->input->post('telp', true),
            'alamat' => '',
            'password' => $this->input->post('password', true),
            'aktif' => 'Aktif',
        ];

        $this->db->insert('pengguna', $data);
    }


    public function ubah($id)
    {
        $data = [
            'username' => $this->input->post('username', true),
            'jk' => $this->input->post('jk', true),
            'nama' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
            'telp' => $this->input->post('telp', true),
            'alamat' => '',
            'password' => $this->input->post('password', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('pengguna', $data);
    }

    public function hapus($id)
    {

        $this->db->where('id', $id);
        $this->db->update('pengguna', ['aktif' => 'Nonaktif']);
    }

    public function totalAkunAktif()
    {
        $this->db->from('pengguna');
        $this->db->where('aktif', 'Aktif');
        return $this->db->count_all_results();
    }

    public function getPengguna($id, $case)
    {
        $row = $this->db->get_where('pengguna', ['id' => $id])->row();
        switch ($case) {
            case 'username':
                return $row->username;
                break;
            case 'nama':
                return $row->nama;
                break;
            case 'jk':
                return $row->jk;
                break;
            case 'email':
                return $row->email;
                break;
            case 'alamat':
                return $row->alamat;
                break;
            case 'telp':
                return $row->telp;
                break;
            case 'password':
                return $row->password;
                break;
            case 'aktif':
                return $row->aktif;
                break;
        }
    }
}
