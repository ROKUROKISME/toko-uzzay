<?php

class Laporan_model extends CI_Model
{
    public function getLaporan()
    {
        return $this->db->get('penjualan')->result_array();
    }

    public function getLaporanSelesai()
    {
        return $this->db->get('penjualan', ['Status' => 'Selesai'])->result_array();
    }

    public function getDetaiByID($id)
    {
        $this->db->where('id_penjualan', $id);
        return $this->db->get('tbl_detail_penjualan')->result_array();
    }

    public function getDetailNota($id)
    {
        return $this->db->get_where('penjualan', ['id' => $id])->row_array();
    }

    public function penjualan($dari, $sampai)
    {
        $this->db->where('status', 'Selesai');
        $this->db->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"');
        return $this->db->get('penjualan')->result_array();
    }

    public function pembelian($dari, $sampai)
    {
        $this->db->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"');
        return $this->db->get('detail_pembelian')->result_array();
    }

    // public function getLaporanDitolak($dari, $sampai)
    // {
    //     $this->db->where('status', 'Ditolak');
    //     $this->db->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"');
    //     return $this->db->get('penjualan')->result_array();
    // }

    public function retur($dari, $sampai)
    {
        $this->db->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"');
        return $this->db->get('retur')->result_array();
    }
}
