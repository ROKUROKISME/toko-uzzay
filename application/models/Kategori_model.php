<?php

class Kategori_model extends CI_Model
{

    function getAllKategori()
    {
        return $this->db->get_where('kategori', ['is_aktif' => 'Aktif'])->result_array();
    }

    function tambah()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'is_aktif' => 'Aktif',
        ];

        $this->db->insert('kategori', $data);
    }

    public function get($id)
    {
        return $this->db->get_where('kategori', ['id' => $id])->row_array();
    }

    public function ubah($id)
    {
        $data = [
            'nama' => $this->input->post('nama', true)
        ];

        $this->db->where('id', $id);
        $this->db->update('kategori', $data);
    }

    public function hapus($id)
    {
        $data = [
            'is_aktif' => 'Nonaktif'
        ];

        $this->db->where('id', $id);
        $this->db->update('kategori', $data);
    }

    public function getTotalKategori()
    {
        $this->db->from('kategori');
        return $this->db->count_all_results();
    }

    public function getNameById($id, $case)
    {
        $row = $this->db->get_where('kategori', ['id' => $id])->row();
        switch ($case) {
            case 'id':
                return $row->id;
                break;
            case 'nama':
                return $row->nama;
                break;
            case 'aktif':
                return $row->is_aktif;
                break;
        }
    }
}
