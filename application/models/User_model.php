<?php

class User_model extends CI_Model
{
    public function getKeranjangById()
    {
        return $this->db->get_where('detail_penjualan', ['id_konsumen' => $_SESSION['Login'], 'status' => 'Keranjang'])->result_array();
    }

    public function getCheckoutById($id)
    {
        return $this->db->get_where('detail_penjualan', ['id_konsumen' => $id, 'status' => 'Checkout'])->result_array();
    }

    public function getAllCheckout()
    {
        return $this->db->get_where('penjualan', ['status' => 'Checkout'])->result_array();
    }

    public function getAllSelesai()
    {
        // return $this->db->get_where('penjualan')->result_array();
        return $this->db->get_where('penjualan', ['status' => 'Selesai'])->result_array();
    }

    public function getPenjualanProgres($id, $status)
    {
        $this->db->where('id_konsumen', $id);
        $this->db->where('status', $status);
        // $this->db->where('(status = "Dibayar" OR status = "Diterima")');
        return $this->db->get('detail_penjualan')->result_array();
        // $query = "UPDATE penjualan JOIN detail_penjualan ON penjualan.id = detail_penjualan.id_penjualan SET penjualan.status = '$konfirmasi', detail_penjualan.status = '$konfirmasi' WHERE penjualan.id = '$id' AND detail_penjualan.id_penjualan = '$id'";
        // $this->db->query($query);
    }

    public function getPenjualanCancel($id)
    {
        $this->db->where('id_konsumen', $id);
        $this->db->where('(status = "Ditolak" OR status = "Dibatalkan")');
        return $this->db->get('detail_penjualan')->result_array();
    }

    //TAMBAH PRODUK KE KERANJANG
    public function buyBarang($id, $qty, $total)
    {
        $data = [
            'id_konsumen' => $_SESSION['Login'],
            'id_barang' => $id,
            'qty' => $qty,
            'total' => $total,
            'tanggal' => date('Y-m-d'),
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

        $this->db->where('id_konsumen', $_SESSION['Login']);
        $this->db->where('id_penjualan', '0');
        $this->db->where('status', 'Keranjang');
        $this->db->update('detail_penjualan', $data);
    }

    //CHECKOUT
    public function checkout($total_harga)
    {
        //INSERT INTO `detail_penjualan`(`id`, `id_konsumen`, `total_harga`, `resi`, `status`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
        $data = [
            'id_konsumen' => $_SESSION['Login'],
            'total_harga' => $total_harga,
            'tanggal' => date('Y-m-d'),
            'waktu' => date('h:i:s'),
            'ongkir' => $this->input->post('ongkir', true),
            'kurir' => $this->input->post('kkurir', true),
            'status' => 'Checkout',
            // 'alamat' => $this->input->post('alamat', true),
            'alamat' => 'NULL',
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
    public function buyUpdateBarang($id, $qty, $total)
    {
        $data = [
            'qty' => $qty,
            'total' => $total,
        ];

        $this->db->where('id_detail', $id);
        $this->db->update('detail_penjualan', $data);
    }

    public function hapusDataKeranjang($id)
    {
        $this->db->delete('detail_penjualan', ['id_detail' => $id]);
    }


    public function cekBarangDiKeranjang($id_konsumen, $id_barang)
    {
        $this->db->from('detail_penjualan');
        $this->db->where('id_konsumen', $id_konsumen);
        $this->db->where('id_penjualan', '0');
        $this->db->where('id_barang', $id_barang);
        $this->db->where('status', 'Keranjang');
        return $this->db->count_all_results();
    }

    public function getIdKeranjang($id_barang)
    {
        return
            $this->db->get_where('detail_penjualan', ['id_konsumen' => $_SESSION['Login'], 'id_penjualan' => '0', 'id_barang' => $id_barang, 'status' => 'Keranjang'])->row('id_detail');
        // $row = $this->db->get_where('detail_penjualan', ['id_konsumen' => $_SESSION['Login'], 'id_penjualan' => '0', 'id_barang' => $id_barang, 'status' => 'Keranjang'])->row();
        // switch ($case) {
        //     case 'id':
        //         return $row->id_detail;
        //         break;
        // }
    }

    public function getPenjualan($id, $case)
    {
        $row = $this->db->get_where('penjualan', ['id' => $id])->row();
        switch ($case) {
            case 'id_konsumen':
                return $row->id_konsumen;
                break;
            case 'total':
                return $row->total_harga;
                break;
            case 'nmresi':
                return $row->nmresi;
                break;
            case 'tanggal':
                return $row->tanggal;
                break;
            case 'waktu':
                return $row->waktu;
                break;
            case 'bukti':
                return $row->bukti;
                break;
            case 'status':
                return $row->status;
                break;
            case 'alamat':
                return $row->alamat;
                break;
            case 'resi':
                return $row->nomor_resi;
                break;
            case 'kurir':
                return $row->kurir;
                break;
        }
    }

    public function getKeranjang($id, $case)
    {
        $row = $this->db->get_where('detail_penjualan', ['id_detail' => $id])->row();
        switch ($case) {
            case 'id_konsumen':
                return $row->id_konsumen;
                break;
            case 'id_penjualan':
                return $row->id_penjualan;
                break;
            case 'id_barang':
                return $row->id_barang;
                break;
            case 'qty':
                return $row->qty;
                break;
            case 'total':
                return $row->total;
                break;
            case 'tanggal':
                return $row->tanggal;
                break;
            case 'waktu':
                return $row->waktu;
                break;
            case 'status':
                return $row->status;
                break;
        }
    }

    // JSON DATA RESULT DETAIL PEMBELIAN
    public function getDetailBarang($id)
    {
        return $this->db->get_where('detail_penjualan', ['id_penjualan' => $id])->result_array();
    }

    public function konfirmasiPenyewaan($konfirmasi, $id)
    {
        // UPDATE penjualan JOIN detail_penjualan ON penjualan.id = detail_penjualan.id_penjualan SET penjualan.status = 'Diterima', detail_penjualan.status = 'Diterima' WHERE penjualan.id = '5' AND detail_penjualan.id_penjualan ='5';
        // $data = [
        //     'status' => $konfirmasi,
        // ];
        // $this->db->where('id', $id);
        // $this->db->update('penjualan', $data);

        $query = "UPDATE penjualan JOIN detail_penjualan ON penjualan.id = detail_penjualan.id_penjualan SET penjualan.status = '$konfirmasi', detail_penjualan.status = '$konfirmasi' WHERE penjualan.id = '$id' AND detail_penjualan.id_penjualan = '$id'";
        $this->db->query($query);
    }

    public function getAllDiterima()
    {
        return $this->db->get_where('penjualan', ['status' => 'Diterima'])->result_array();
    }

    public function updateNomorResi($id, $resi)
    {
        $data = [
            'nmresi' => $resi,
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

    // UPDATE TABEL DETAIL PENJUALAN
    public function updateCheckoutDetailPenjualan()
    {
        $data = [
            'status' => 'Dibayar',
        ];
        $this->db->where('id_penjualan', $this->input->post('id_penjualan', true));
        $this->db->where('status', 'Checkout');
        $this->db->update('detail_penjualan', $data);
    }

    public function getAllPenjualan($id)
    {
        return $this->db->get_where('penjualan', ['id_konsumen' => $id])->result_array();
    }
    public function getRiwayatPenjualan($id, $case)
    {
        return $this->db->get_where('detail_penjualan', ['id_konsumen' => $id, 'status' => $case])->result_array();
    }

    public function confirmPesanan($konfirmasi, $id)
    {
        // $query = "UPDATE penjualan JOIN detail_penjualan ON penjualan.id = detail_penjualan.id_penjualan SET penjualan.status = '$konfirmasi', detail_penjualan.status = '$konfirmasi' WHERE penjualan.id = '$id' AND detail_penjualan.id_penjualan = '$id'";
        // $this->db->query($query);
        $data = [
            'status' => $konfirmasi,
        ];
        $this->db->where('id_detail', $id);
        $this->db->update('detail_penjualan', $data);
    }

    public function confirmPesananAdmin($konfirmasi, $id)
    {
        $query = "UPDATE penjualan JOIN detail_penjualan ON penjualan.id = detail_penjualan.id_penjualan SET penjualan.status = '$konfirmasi', detail_penjualan.status = '$konfirmasi' WHERE penjualan.id = '$id' AND detail_penjualan.id_penjualan = '$id'";
        $this->db->query($query);
    }

    public function getPembayaranById($id)
    {
        return $this->db->get_where('penjualan', ['id_konsumen' => $id, 'status' => 'Checkout'])->row_array();
    }
    public function getOrderById($id)
    {
        return $this->db->get_where('penjualan', ['id_konsumen' => $id, 'status' => 'Dibayar'])->row_array();
    }

    //AJAX UPDATE QTY AND TOTAL
    public function updateItem($id_detail, $qty, $total)
    {
        $data = [
            'qty' => $qty,
            'total' => $total,
        ];

        $this->db->where('id', $id_detail);
        $this->db->update('detail_penjualan', $data);
    }

    public function cancelPesanan($id)
    {
        $query = "UPDATE penjualan JOIN detail_penjualan ON penjualan.id = detail_penjualan.id_penjualan SET penjualan.status = 'Dibatalkan', detail_penjualan.status = 'Dibatalkan' WHERE penjualan.id = '$id' AND detail_penjualan.id_penjualan = '$id'";
        $this->db->query($query);
    }

	public function kurangiStok($id, $qty){
		$query = "UPDATE barang SET stok = stok - '$qty' WHERE id = '$id'";
        $this->db->query($query);
	}

	public function tambahStok($id, $qty){
		$query = "UPDATE barang SET stok = stok + '$qty' WHERE id = '$id'";
        $this->db->query($query);
	}
}
