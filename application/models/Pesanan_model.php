<?php

class Pesanan_model extends CI_Model
{

    public function totalPesanan($case)
    {
        $this->db->from('penjualan');
        $this->db->where('status', $case);
        return $this->db->count_all_results();
    }

    public function getAllDibayar()
    {
        return $this->db->get_where('penjualan', ['status' => 'Dibayar'])->result_array();
    }

    public function getAllDiterima()
    {
        return $this->db->get_where('penjualan', ['status' => 'Diterima'])->result_array();
    }

    public function getAllSelesai()
    {
        return $this->db->get_where('penjualan', ['status' => 'Selesai'])->result_array();
    }

    public function getAllPesananKonsumen($id, $case)
    {
        return $this->db->get_where('penjualan', ['id_pengguna' => $id, 'status' => $case])->result_array();
    }


    //TAMBAH PRODUK KE KERANJANG
    public function buyProduk($id, $total)
    {
        $data = [
            'id_pengguna' => $_SESSION['Login'],
            'id_barang' => $id,
            'qty' => '1',
            'total' => $total,
            'status' => 'Keranjang',
        ];

        $this->db->insert('detail_penjualan', $data);
    }


    // UPDATE TABEL PEMBELIAN TO PEMBAYARAN
    public function updateKeranjang($id_penjualan)
    {
        $data = [
            'id_penjualan' => $id_penjualan,
            'status' => 'Checkout',
        ];

        $this->db->where('id_pengguna', $_SESSION['Login']);
        $this->db->where('id_penjualan', '0');
        $this->db->where('status', 'Keranjang');
        $this->db->update('detail_penjualan', $data);
    }

    //CHECKOUT
    public function checkout($total_harga)
    {
        //INSERT INTO `detail_penjualan`(`id`, `id_pengguna`, `total_harga`, `resi`, `status`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
        $data = [
            'id_pengguna' => $_SESSION['Login'],
            'total_harga' => $total_harga,
            'status' => 'Checkout',
        ];

        $this->db->insert('penjualan', $data);
    }

    //GET LAST ID DETAIL PEMBELIAN
    public function getLastId()
    {
        $this->db->select("*");
        $this->db->from("penjualan");
        $this->db->limit(1);
        $this->db->order_by('id', "DESC");
        $query = $this->db->get();
        return $result = $query->row('id');
    }


    //AJAX UPDATE QTY AND TOTAL
    public function buyUpdateProduk($id, $qty, $total)
    {
        $data = [
            'qty' => $qty,
            'total' => $total,
        ];

        $this->db->where('id', $id);
        $this->db->update('detail_penjualan', $data);
    }


    public function konfirmasiPenyewaan($konfirmasi, $id)
    {
        $data = [
            'status' => $konfirmasi,
        ];
        $this->db->where('id', $id);
        $this->db->update('penjualan', $data);
    }

    public function updateNomorResi($id, $resi)
    {
        $data = [
            'nomor_resi' => $resi,
        ];
        $this->db->where('id', $id);
        $this->db->update('penjualan', $data);
    }

    // UPDATE TABEL PEMBELIAN SETELAH DI BAYAR
    public function updateCheckout($bukti)
    {
        $data = [
            'status' => 'Dibayar',
            'bukti' => $bukti,
        ];

        $this->db->where('id', $this->input->post('id_penjualan', true));
        $this->db->update('penjualan', $data);
    }


    public function getAllPenjualan($id)
    {
        return $this->db->get_where('penjualan', ['id_pengguna' => $id])->result_array();
    }

    public function getDetailPenjualan($id)
    {
        return $this->db->get_where('detail_penjualan', ['id_penjualan' => $id])->result_array();
    }
}
