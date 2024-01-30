<?php

class Transaksi_model extends CI_Model
{

    public function totalTransaksi()
    {
        $this->db->select_sum('total_harga');
        $this->db->where('status', 'Diterima');
        return $this->db->get('penjualan')->row('total_harga');
    }
    public function totalpesanan()
    {

        $this->db->from('penjualan');
        $this->db->where('status', 'Dibayar');
        return $this->db->count_all_results();
    }
    public function totalterjual()
    {
        $this->db->select_sum('qty');
        $this->db->where('status', 'Diterima');
        $this->db->or_where('status', 'Selesai');
        return $this->db->get('detail_penjualan')->row('qty');
    }
}
