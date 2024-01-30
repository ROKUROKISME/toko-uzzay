<?php

class Komentar_model extends CI_Model
{

    function getAllKomentar()
    {
        return $this->db->get('komentar')->result_array();
    }

    // public function getKomentarProduk($id)
    // {
    //     return $this->db->get_where('komentar', ['id_detail' => $id])->row_array();
    // }


    public function getKomentar($id, $case)
    {
        $row = $this->db->get_where('komentar', ['id_detail' => $id])->row();
        switch ($case) {
            case 'id':
                return $row->id;
                break;
            case 'produk':
                return $row->id_produk;
                break;
            case 'komentar':
                return $row->komentar;
                break;
            case 'rating':
                return $row->rating;
                break;
            case 'waktu':
                return $row->waktu;
                break;
        }
    }
}
