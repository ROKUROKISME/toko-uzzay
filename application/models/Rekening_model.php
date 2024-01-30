<?php

class Rekening_model extends CI_Model
{

    function getAllRekening()
    {
        return $this->db->get('rekening')->result_array();
    }

    function getRekeningDetail()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get('rekening')->row_array();
    }


    function tambah()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'bank' => $this->input->post('bank', true),
            'nomor' => $this->input->post('nomor', true)
        ];

        $this->db->insert('rekening', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('rekening', ['id' => $id])->row_array();
    }

    public function ubah($id)
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'bank' => $this->input->post('bank', true),
            'nomor' => $this->input->post('nomor', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('rekening', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('rekening');
    }

    public function getTotalRekening()
    {
        $this->db->from('rekening');
        return $this->db->count_all_results();
    }

    public function getRekeningNameById($id, $case)
    {
        $row = $this->db->get_where('rekening', ['id' => $id])->row();
        switch ($case) {
            case 'id':
                return $row->id;
                break;
            case 'nama':
                return $row->nama;
                break;
            case 'bank':
                return $row->bank;
                break;
            case 'norek':
                return $row->norek;
                break;
        }
    }
}
