<?php

class Supplier_model extends CI_Model
{

    function getAllSupplier()
    {
        return $this->db->get_where('supplier', ['is_aktif' => 'Aktif'])->result_array();
    }

    function getSupplierDetail()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get('supplier')->row_array();
    }


    function tambah()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'telp' => $this->input->post('telp', true),
            'is_aktif' => 'Aktif',
        ];

        $this->db->insert('supplier', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('supplier', ['id' => $id])->row_array();
    }

    public function ubah($id)
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'telp' => $this->input->post('telp', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('supplier', $data);
    }

    public function hapus($id)
    {
        $data = [
            'is_aktif' => 'Nonaktif',
        ];

        $this->db->where('id', $id);
        $this->db->update('supplier', $data);
    }

    public function getTotalSupplier()
    {
        $this->db->from('supplier');
        return $this->db->count_all_results();
    }

    public function getNameById($id, $case)
    {
        $row = $this->db->get_where('supplier', ['id' => $id])->row();
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
