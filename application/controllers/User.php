<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konsumen_model');
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
        $this->load->model('Rekening_model');
        $this->load->model('User_model');
        $this->load->model('Pesanan_model');
        $this->load->model('Rajaongkir_model');
        $this->load->library('form_validation');
    }

    public $api_key = "99778b1da96ac66d6403b36b3b8f5747";


    public function index()
    {

        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login'] == 'Admin') {
                redirect('home');
            }
            $id = $_SESSION['Login'];
        } else {
            $id = 0;
        };

        $data = [
            'barang' => $this->Barang_model->getAllBarang(),
        ];

        $this->load->view('template/user/header');
        $this->load->view('user/index', $data);
        $this->load->view('template/user/footer');
    }

    public function shop()
    {

        $kat = $this->input->get('kat');

        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login'] == 'Admin') {
                redirect('home');
            }
            $id = $_SESSION['Login'];
        } else {
            $id = 0;
        };

        if ($this->input->post('keyword')) {
            $search = $this->input->post('keyword');
        } else {
            $search = '';
        }

        $data = [
            'barang' => $this->Barang_model->search($search, $kat),
            'kategori' => $this->Kategori_model->getAllKategori(),
        ];

        $this->load->view('template/user/header');
        $this->load->view('user/shop', $data);
        $this->load->view('template/user/footer');
    }

    public function detail($barang)
    {
        error_reporting(false);

        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login'] == 'Admin') {
                redirect('home');
            }
            $id = $_SESSION['Login'];
        } else {
            $id = 0;
        };

        $data = [
            'judul' => 'Halaman Home',
            'kategori' => $this->Kategori_model->getAllKategori(),
            'barang' => $this->Barang_model->getDetail($barang),
        ];

        $this->load->view('template/user/header');
        $this->load->view('user/detail', $data);
        $this->load->view('template/user/footer');
    }

    public function keranjang()
    {
        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login'] == 'Admin') {
                redirect('home');
            }
            $id = $_SESSION['Login'];
        } else {
            redirect('user');
        };

        $data =
            [
                'judul' => 'Keranjang',
                'kategori' => $this->Kategori_model->getAllKategori(),
                'mykeranjang' => $this->User_model->getKeranjangById(),
                'total' => 0,
                'ongkir' => 0,
            ];
        $this->load->view('template/user/header');
        $this->load->view('user/keranjang', $data);
        $this->load->view('template/user/footer');
    }

    public function checkout()
    {

        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login'] == 'Admin') {
                redirect('home');
            }
            $id = $_SESSION['Login'];
        } else {
            redirect('user');
        };

        $data =
            [
                'judul' => 'Halaman Checkout',
                'kategori' => $this->Kategori_model->getAllKategori(),
                'mykeranjang' => $this->User_model->getKeranjangById(),
                'myaccount' => $this->Konsumen_model->getKonsumenById($id),
                'provinsi' => $this->Rajaongkir_model->getAllProvinsi(),
                // 'cost' => $this->Rajaongkir_model->getCost('391', '27400',  'jne'),

            ];

        if (isset($_POST['_docheckout'])) {
            $this->_checkout($this->input->post('consttotal', true));
        } else {
            $this->load->view('template/user/header', $data);
            $this->load->view('user/checkout', $data);
            $this->load->view('template/user/footer');
        }
    }

    public function pembayaran()
    {
        error_reporting(false);

        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login'] == 'Admin') {
                redirect('home');
            }
            $id = $_SESSION['Login'];
        } else {
            redirect('user');
        };

        $data = [
            'judul' => 'Halaman Pembayaran',
            'kategori' => $this->Kategori_model->getAllKategori(),
            'mycheckout' => $this->User_model->getCheckoutById($id),
            'mykeranjang' => $this->User_model->getKeranjangById($id),
            'mybayar' => $this->User_model->getPembayaranById($id),
            'rekening' => $this->Rekening_model->getRekeningDetail(),
        ];

        if (isset($_POST['bayar'])) {
            $bukti = $_FILES['bukti']['name'];
            $config['upload_path']   = './assets/img/bukti';
            $config['allowed_types'] = 'png|jpg|gif|jpeg';
            $config['max_size']      = 10240;
            $config['max_width']     = 10240;
            $config['max_height']    = 7680;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('bukti')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload_form', $error);
            } else {
                $this->User_model->updateCheckoutDetailPenjualan();
                $this->User_model->updateCheckout($bukti);
                redirect('user');
            }
        } else {
            $this->load->view('template/user/header', $data);
            $this->load->view('user/pembayaran', $data);
            $this->load->view('template/user/footer');
        }
    }

    public function dibayar()
    {

        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login'] == 'Admin') {
                redirect('home');
            }
            $id = $_SESSION['Login'];
        } else {
            redirect('user');
        };

        $data = [
            'judul' => 'Halaman Home Pembayaran',
            'kategori' => $this->Kategori_model->getAllKategori(),
            // 'mypembelian' => $this->User_model->getPenjualanProgres($id),
            'mypembelian' => $this->User_model->getPenjualanProgres($id, 'Dibayar'),
            'mykeranjang' => $this->User_model->getKeranjangById($id),
            'myorder' => $this->User_model->getOrderById($id),
        ];

        $this->load->view('template/user/header', $data);
        $this->load->view('user/dibayar', $data);
        $this->load->view('template/user/footer');
    }

    public function dikirim()
    {

        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login'] == 'Admin') {
                redirect('home');
            }
            $id = $_SESSION['Login'];
        } else {
            redirect('user');
        };


        $data = [
            'judul' => 'Halaman Home Pembayaran',
            'kategori' => $this->Kategori_model->getAllKategori(),
            'mypembelian' => $this->User_model->getPenjualanProgres($id, 'Diterima'),
            'mykeranjang' => $this->User_model->getKeranjangById($id),
            'myorder' => $this->User_model->getOrderById($id),
        ];

        $this->load->view('template/user/header', $data);
        $this->load->view('user/dikirim', $data);
        $this->load->view('template/user/footer');
    }

    public function ditolak()
    {

        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login'] == 'Admin') {
                redirect('home');
            }
            $id = $_SESSION['Login'];
        } else {
            redirect('user');
        };


        $data = [
            'judul' => 'Halaman Home Pembayaran',
            'kategori' => $this->Kategori_model->getAllKategori(),
            'mypembelian' => $this->User_model->getPenjualanProgres($id, 'Dibatalkan'),
            'mykeranjang' => $this->User_model->getKeranjangById($id),
            'myorder' => $this->User_model->getOrderById($id),
        ];

        $this->load->view('template/user/header', $data);
        $this->load->view('user/ditolak', $data);
        $this->load->view('template/user/footer');
    }

    public function selesai()
    {

        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login'] == 'Admin') {
                redirect('home');
            }
            $id = $_SESSION['Login'];
        } else {
            redirect('user');
        };


        $data = [
            'judul' => 'Halaman Home Pembayaran',
            'kategori' => $this->Kategori_model->getAllKategori(),
            'mypembelian' => $this->User_model->getRiwayatPenjualan($id, 'Selesai'),
            'mykeranjang' => $this->User_model->getKeranjangById($id),
            'myorder' => $this->User_model->getOrderById($id),

        ];

        if (isset($_POST['btnrating'])) {
            $this->Barang_model->setRating();
            redirect('user/selesai');
        } else {
            $this->load->view('template/user/header', $data);
            $this->load->view('user/selesai', $data);
            $this->load->view('template/modalrating');
            $this->load->view('template/user/footer');
        }
    }

    // public function ditolak()
    // {

    //     if (isset($_SESSION['Login'])) {
    //         if ($_SESSION['Login'] == 'Admin') {
    //             redirect('home');
    //         }
    //         $id = $_SESSION['Login'];
    //     } else {
    //         redirect('user');
    //     };

    //     if (isset($_POST['pencarian'])) {
    //         $cats = $this->input->post(
    //             'kategori',
    //             true
    //         );
    //         $nmbarang = $this->input->post('nmbarang', true);
    //         $data = [
    //             'judul' => 'Halaman Home',
    //             'terlaris' => $this->Barang_model->getAllBarangTerlaris(5),
    //             'terbaru' => $this->Barang_model->getAllBarangTerbaru(5),
    //             'kategori' => $this->Kategori_model->getAllKategori(),
    //             'mykeranjang' => $this->User_model->getKeranjangById($id),
    //             'barang' => $this->Barang_model->getByNameCat($nmbarang, $cats),
    //             'nmbarang' => $nmbarang,
    //             'cats' => $cats,
    //         ];
    //         $this->load->view('template/top/header', $data);
    //         // $this->load->view('template/top/navbar');
    //         $this->load->view('user/pencarian', $data);
    //     } else {
    //         $data = [
    //             'judul' => 'Halaman Home Pembayaran',
    //             'kategori' => $this->Kategori_model->getAllKategori(),
    //             'mypembelian' => $this->User_model->getPenjualanCancel($id),
    //             'mykeranjang' => $this->User_model->getKeranjangById($id),
    //             'myorder' => $this->User_model->getOrderById($id),
    //             'nmbarang' => '',
    //             'cats' => '0',
    //         ];

    //         $this->load->view('template/top/header', $data);
    //         // $this->load->view('template/top/navbar');
    //         $this->load->view('user/dikirim', $data);
    //     }

    //     $this->load->view('template/modalsearch', $data);
    //     $this->load->view('template/top/footer');
    // }

    public function setting()
    {
        if (isset($_SESSION['Login'])) {
            if ($_SESSION['Login'] == 'Admin') {
                redirect('home');
            }
            $id = $_SESSION['Login'];
        } else {
            redirect('user');
        }

        $data = [
            'myaccount' => $this->Konsumen_model->getKonsumenById($_SESSION['Login']),
        ];


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/user/header');
            $this->load->view('user/myaccount', $data);
            $this->load->view('template/user/footer');
        } else {

            if (isset($_POST['_editakun'])) {

                $this->Konsumen_model->ubah($_SESSION['Login']);
                $this->session->set_flashdata('flash', 'Data berhasil diubah!');
                redirect('user/setting');
            }
        }
    }

    public function beli()
    {

        if ($_SESSION['Login'] == 'Admin') {
            redirect('home');
        } else {
            $_SESSION['Login'] == '1';
        }

        $id_barang = $this->input->post('id', true);
        $qtybaru = $this->input->post('qty', true);
        $total = $this->input->post('total', true);

		// KURANGI STOK
		$this->User_model->kurangiStok($id_barang, $qtybaru);

        $cek = $this->User_model->cekBarangDiKeranjang($_SESSION['Login'], $id_barang);
        if ($cek > 0) {
            $id_keranjang = $this->User_model->getIdKeranjang($id_barang);
            $qty = $this->User_model->getKeranjang($id_keranjang, 'qty');
            $this->User_model->buyUpdateBarang($id_keranjang, $qty + $qtybaru, $total * ($qty + $qtybaru));
        } else {
            $this->User_model->buyBarang($id_barang, $qtybaru, $total);
        }

        // redirect('user/keranjang/');
    }

    public function remove()
    {
        $id = $this->input->post('id', true);
        $id_barang = $this->input->post('id_barang', true);
        $qty = $this->input->post('qty', true);

		// TAMBAH STOK
		$this->User_model->tambahStok($id_barang, $qty);

        $this->User_model->hapusDataKeranjang($id);
    }

    public function _checkout($total_harga)
    {
        //BUAT NOTA PEMBELIANNYA
        $this->User_model->checkout($total_harga);
        //AMBIL ID NOTA
        $last = $this->User_model->getLastId();
        //UPDATE DATA KERANJANG AGAR MASUK KE PEMBAYARAN
        $this->User_model->updateKeranjang($last);

        redirect('user/pembayaran');
    }


    public function update()
    {
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');
        $total = $harga * $qty;
        $this->User_model->buyUpdateBarang($id, $qty, $total);
    }

    public function hapus($id)
    {
        $this->User_model->hapusDataKeranjang($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('user/keranjang/');
    }

    public function getDetail()
    {
        $id = $this->input->post('id_penjualan', true);
        $data = $this->User_model->getDetailBarang($id);
        echo json_encode($data);
    }

    public function confirmPesanan($id)
    {
        // $id = $this->input->post('id_penjualan', true);
        $this->User_model->confirmPesanan('Selesai', $id);
        redirect('user/dikirim');
    }

    // AJAX UPDATE
    public function updateDetail()
    {
        $id_detail = $this->input->post('id_detail');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');
        $total = $harga * $qty;
        $this->User_model->updateItem($id_detail, $qty, $total);
    }

    // API ONGKIR
    public function getKota()
    {
        $provinsi_id = $this->input->post('provinsi_id', true);
        $data = $this->Rajaongkir_model->getKota($provinsi_id);
        echo json_encode($data->rajaongkir->results);
    }

    public function getCost()
    {
        $tujuan_id = $this->input->post('tujuan_id', true);
        $berat = $this->input->post('berat', true);
        $kurir = $this->input->post('kurir', true);

        // $tujuan_id = '228';
        // $berat = '3400';
        // $kurir = 'jne';

        $data = $this->Rajaongkir_model->getCost($tujuan_id, $berat, $kurir);
        echo json_encode($data->rajaongkir->results[0]->costs[1]->cost[0]);
        // echo json_encode($data->rajaongkir->results[0]);
    }
    // END API ONGKIR

    public function cancelPesanan($id)
    {
        $this->User_model->cancelPesanan($id);
        redirect('user/pembayaran');
    }
}
