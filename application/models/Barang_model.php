<?php

class Barang_model extends CI_Model
{

    public function getAllBarang()
    {
        return $this->db->get_where('barang', ['aktif' => 'Aktif'])->result_array();
    }


    public function getDetail($id)
    {
        return $this->db->get_where('barang', ['id' => $id])->row_array();
    }

    public function getTerlaris($lim)
    {
        $this->db->limit($lim);
        return $this->db->get('barang')->result_array();
    }
    public function getTerbaru($lim)
    {
        $this->db->order_by('tgl_masuk', 'DESC');
        $this->db->limit($lim);
        return $this->db->get('barang')->result_array();
    }

    public function getByCatName($kategori)
    {
        $query = $this->db->query("SELECT barang.*  FROM barang JOIN tbl_kategori ON barang.id_kategori = tbl_kategori.id WHERE tbl_kategori.nmkategori = '$kategori'");
        return $query->result_array();
    }

    public function getByName($nmbarang)
    {
        $this->db->like('nama', $nmbarang);
        return $this->db->get('barang')->result_array();
    }


    public function getByKategori($kategori)
    {
        $this->db->like('nama', $kategori);
        return $this->db->get('barang')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('barang', ['id' => $id])->row_array();
    }

    // public function getBarangFoto($id)
    // {
    //     return $this->db->get_where('barang_foto', ['id_barang' => $id])->result_array();
    // }

    public function getBarangReview($id)
    {
        return $this->db->get_where('komentar', ['id_barang' => $id])->result_array();
    }

    public function getKomentarById($id)
    {
        // return $this->db->get('komentar', ['id_barang' => $id])->result_array();
        $query = $this->db->query("SELECT * FROM komentar JOIN konsumen ON komentar.id_konsumen = konsumen.id WHERE id_barang = '$id'");
        return $query->result_array();
    }

    public function tambah($gambar)
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'id_kategori' => $this->input->post('kategori', true),
            'id_supplier' => $this->input->post('supplier', true),
            'harga_beli' => $this->input->post('hargabeli', true),
            'harga_jual' => $this->input->post('hargajual', true),
            'stok' => $this->input->post('stok', true),
            'berat' => $this->input->post('berat', true),
            'gambar' => $gambar,
            'deskripsi' => $this->input->post('desk', true),
            'aktif' => 'Aktif',
        ];

        $this->db->insert('barang', $data);
    }

    public function ubah($gambar)
    {
        $id = $this->input->post('id', true);

        if ($gambar == null) {
            $data = [
                'nama' => $this->input->post('nama', true),
                'id_kategori' => $this->input->post('kategori', true),
                'id_supplier' => $this->input->post('supplier', true),
                'harga_beli' => $this->input->post('hargabeli', true),
                'harga_jual' => $this->input->post('hargajual', true),
                'stok' => $this->input->post('stok', true),
                'berat' => $this->input->post('berat', true),
                'deskripsi' => $this->input->post('desk', true),
            ];
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'id_kategori' => $this->input->post('kategori', true),
                'id_supplier' => $this->input->post('supplier', true),
                'harga_beli' => $this->input->post('hargabeli', true),
                'harga_jual' => $this->input->post('hargajual', true),
                'stok' => $this->input->post('stok', true),
                'berat' => $this->input->post('berat', true),
                'gambar' => $gambar,
                'deskripsi' => $this->input->post('desk', true),
            ];
        }

        $this->db->where('id', $id);
        $this->db->update('barang', $data);
    }

    public function hapus($id)
    {

        $this->db->where('id', $id);
        $this->db->update('barang', ['aktif' => 'Nonaktif']);
    }

    public function getBarang($id, $case)
    {
        $row = $this->db->get_where('barang', ['id' => $id])->row();
        switch ($case) {
            case 'nama':
                return $row->nama;
                break;
            case 'kategori':
                return $row->id_kategori;
                break;
            case 'supplier':
                return $row->id_supplier;
                break;
            case 'hargabeli':
                return $row->harga_beli;
                break;
            case 'hargajual':
                return $row->harga_jual;
                break;
            case 'stok':
                return $row->stok;
                break;
            case 'berat':
                return $row->berat;
                break;
            case 'gambar':
                return $row->gambar;
                break;
            case 'desk':
                return $row->deskripsi;
                break;
        }
    }

    public function getBarangJSON($id)
    {
        $row = $this->db->get_where('barang', ['id' => $id])->row();
        return $row->nama;
    }

    public function barangTerjual($id)
    {
        $query = $this->db->query("SELECT SUM(qty) AS terjual FROM tbl_detail_penjualan WHERE id_barang = '$id' AND status = 'Selesai'");
        return $query->row('terjual');
    }


    // public function getBarangTop($barang)
    // {
    //     // $query = $this->db->query("SELECT barang.*, SUM(tbl_detail_penjualan.qty) as banyak FROM tbl_detail_penjualan INNER JOIN barang ON tbl_detail_penjualan.id_barang = barang.id GROUP BY tbl_detail_penjualan.id_barang ORDER BY banyak DESC");
    //     $query = $this->db->query("SELECT barang.*, SUM(tbl_detail_penjualan.qty) as banyak FROM tbl_detail_penjualan INNER JOIN barang ON tbl_detail_penjualan.id_barang = barang.id WHERE barang.nama LIKE '%$barang%' GROUP BY tbl_detail_penjualan.id_barang ORDER BY banyak DESC");
    //     return $query->result_array();
    // }

    // public function getBarangTopOnCat($kategori)
    // {
    //     $query = $this->db->query("SELECT barang.*, SUM(tbl_detail_penjualan.qty) as banyak FROM tbl_detail_penjualan INNER JOIN barang ON tbl_detail_penjualan.id_barang = barang.id WHERE barang.nama LIKE '%$barang%' GROUP BY tbl_detail_penjualan.id_barang ORDER BY banyak DESC");
    //     return $query->result_array();
    // }


    public function setRating()
    {
        $data = [
            'id_konsumen' => $_SESSION['Login'],
            'id_detail' => $this->input->post('id_detailpenjualanselesai', true),
            'id_barang' => $this->input->post('id_barangselesai', true),
            'komentar' => $this->input->post('komentar', true),
            'rating' => $this->input->post('star', true),
            'waktu' => date('Y-m-d h:i:s'),
        ];
        $this->db->insert('komentar', $data);
    }

    public function cekRating($id)
    {
        return $this->db->get_where('komentar', ['id_detail' => $id])->row_array();
    }

    public function getRating($id)
    {
        return $this->db->get_where('komentar', ['id_detail' => $id])->row('rating');
    }

    public function totalBarang()
    {
        $this->db->from('barang');
        return $this->db->count_all_results();
    }

    // DETAIL FOTO PRODUK

    // public function tambahBarangFoto($foto)
    // {
    //     $data = [
    //         'id_barang' => $this->input->post('id_barang', true),
    //         'foto' => $foto,
    //     ];

    //     $this->db->insert('barang_foto', $data);
    // }

    // public function hapusBarangFoto($id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->delete('barang_foto');
    // }

    // DISKON

    // public function setDiskon()
    // {
    //     $id = $this->input->post('id_barang', true);

    //     $data = [
    //         'diskon' => $this->input->post('diskon', true),
    //         'is_diskon' => $this->input->post('is_diskon', true),
    //     ];

    //     $this->db->where('id', $id);
    //     $this->db->update('barang', $data);
    // }

    public function totalRating($id)
    {
        $query = $this->db->query("SELECT SUM(rating) AS totalrating FROM komentar WHERE id_barang = '$id'");
        return $query->row('totalrating');
    }

    public function totalKomentar($id)
    {
        $this->db->from('komentar');
        $this->db->where('id_barang', $id);
        return $this->db->count_all_results();
    }

    public function deQty()
    {

        $qty = $this->input->post('qty', true);
        $id = $this->input->post('id', true);

        $sql = "UPDATE barang SET stok = stok-'$qty' WHERE id = '$id'";
        $this->db->query($sql);
    }


    public function retur()
    {
        $data = [
            'id_barang' => $this->input->post('id', true),
            'nama_barang' => $this->input->post('nama', true),
            'qty' => $this->input->post('qty', true),
            'harga' => $this->input->post('hargabeli', true),
            'tanggal' => date('Y-m-d'),
        ];

        $this->db->insert('retur', $data);
    }

    public function search($nama, $kat)
    {
        if ($kat != null) {
            $this->db->where('id_kategori', $kat);
        }
        $this->db->like('nama', $nama);
        return $this->db->get('barang')->result_array();
    }

    public function tambahpembelian()
    {
        $data = [
            'id_pembelian' => $this->input->post('nota', true),
            // 'id_barang' => $this->input->post('id', true),
            'nama_barang' => $this->input->post('nama', true),
            'qty' => $this->input->post('qty', true),
            'harga_beli' => $this->input->post('hargabeli', true),
            'tanggal' => date('Y-m-d'),
        ];

        $this->db->insert('detail_pembelian', $data);
    }
    public function tambahpembelianbaru()
    {
        $data = [
            'id_pembelian' => $this->input->post('nota', true),
            // 'id_barang' => $this->input->post('id', true),
            'nama_barang' => $this->input->post('nama', true),
            'qty' => $this->input->post('stok', true),
            'harga_beli' => $this->input->post('hargabeli', true),
			'tanggal' => date('Y-m-d'),
        ];

        $this->db->insert('detail_pembelian', $data);
    }

    public function tambahstok()
    {
        $id = $this->input->post('id', true);
        $qty = $this->input->post('qty', true);

        $sql = "UPDATE barang SET stok = stok+'$qty' WHERE id = '$id'";
        $this->db->query($sql);
    }
}
