<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/minishop/') ?>images/bg_6.jpg')">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">

                <h1 class="mb-0 bread">Pembayaran</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead>
                            <tr>
                                <!-- <th scope="col">No</th> -->
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope=" col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $chck['id_penjualan'] = 0;
                            $no = 1;
                            $total_harga = 0;
                            foreach ($mycheckout as $chck) : ?>
                                <tr>
                                    <!-- <th scope="row"><?= $no; ?></th> -->
                                    <td>
                                        <img src="<?= base_url() ?>assets/img/barang/<?= $this->Barang_model->getBarang($chck['id_barang'], 'gambar'); ?>" width="50" height="50" alt="...">
                                    </td>
                                    <td><?= $this->Barang_model->getBarang($chck['id_barang'], 'nama');  ?></td>
                                    <td>

                                        <?php $harganow = $this->Barang_model->getBarang($chck['id_barang'], 'hargajual'); ?>
                                        <?= formatrupiah($harganow) ?>
                                    </td>
                                    <td>
                                        <?= $chck['qty']; ?>
                                    </td>
                                    <td id="totalharga">
                                        <?= formatrupiah($chck['qty'] * $chck['total']); ?>
                                    </td>
                                </tr>
                            <?php
                                $total_harga = $total_harga + $chck['total'];
                                $no++;
                            endforeach;
                            if ($chck['id_penjualan'] != '0') { ?>
                                <tr>
                                    <td colspan="12" class="text-right">
                                        ONGKIR : <?= formatrupiah($mybayar['ongkir']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="12" class="text-right">
                                        <b>GRAND TOTAL : <?= formatrupiah($mybayar['total_harga'] + $mybayar['ongkir']) ?></b>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="12">
                                    <a <?= $chck['id_penjualan'] > '0' ? '' : 'hidden'; ?> type="button" id="btnBayar" onclick="modalBayar(<?= $chck['id_penjualan']; ?>)" class="btn btn-primary float-right">
                                        <i class="fa fa-money"></i> Lanjut Bayar </a>
                                    <a <?= $chck['id_penjualan'] > '0' ? '' : 'hidden'; ?> href="<?= site_url('user/cancelPesanan/' . $chck['id_penjualan']) ?>" onclick="return confirm('Anda yakin ingin membatalkan Pesanan?')" class="btn btn-info float-right mx-2 ">
                                        <i class="fa fa-cancel"></i> Batalkan pesanan </a>
                                    <a <?= $chck['id_penjualan'] > '0' ? 'hidden' : ''; ?> href="<?= site_url('user/shop') ?>" class="btn btn-info float-right mx-2 ">
                                        <i class="fa fa-cancel"></i> Belanja </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>



<!-- Modal Pembayaran-->
<div class="modal fade" id="modalBayar" tabindex="-1" aria-labelledby="modalBayar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Pembayaran</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">

                    <input type="hidden" class="form-control" id="id_penjualan" name="id_penjualan" value="<?= $chck['id_penjualan'] ?>">

                    <div class="col-12">
                        <div class="info-box">
                            <div class="form-group mt-2 mb-2">
                                <h5 class="my-auto">Total Pesanan : <?= formatrupiah($mybayar['total_harga'] + $mybayar['ongkir']) ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="info-box">
                            <div class="form-group mt-2 mb-2">
                                <label for="rek">No Rekening : <?= $rekening['nomor'] ?> (<?= $rekening['bank'] ?>) an <?= $rekening['nama'] ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="info-box">
                            <div class="form-group mt-2 mb-2">
                                <label for="bukti">Upload Bukti Pembayaran</label>
                                <input type="file" class="form-control" id="bukti" name="bukti" accept="image/*" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary exitModal" data-dismiss="modal">Batal</button>
                        <button type="submit" name="bayar" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Pembayaran -->

<script>
    function modalBayar(id) {
        // console.log(id);
        $('#modalBayar').modal("show");
    }
</script>