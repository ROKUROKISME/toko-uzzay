<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/minishop/') ?>images/bg_6.jpg')">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">

                <h1 class="mb-0 bread">Pesanan</h1>
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
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Kurir</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($mypembelian as $data) : ?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td>
                                        <img src="<?= base_url() ?>assets/img/barang/<?= $this->Barang_model->getBarang($data['id_barang'], 'gambar'); ?>" width="50" height="50" alt="...">
                                    </td>
                                    <td><?= $this->Barang_model->getBarang($data['id_barang'], 'nama');  ?></td>
                                    <td><?= formatrupiah($this->Barang_model->getBarang($data['id_barang'], 'hargajual')); ?></td>
                                    <td>
                                        <?= $data['qty']; ?>
                                    </td>
                                    <td>
                                        <?= strtoupper($this->User_model->getPenjualan($data['id_penjualan'], 'kurir')); ?>
                                    </td>
                                    <!-- <td>
                                        <a type="button" href="javascript:void(0)" onclick="cekresi('<?= $this->User_model->getPenjualan($data['id_penjualan'], 'kurir') ?>', '<?= $this->User_model->getPenjualan($data['id_penjualan'], 'nmresi') ?>')">
                                            <?= $this->User_model->getPenjualan($data['id_penjualan'], 'nmresi'); ?>
                                        </a>
                                    </td> -->
                                    <td>
                                        <?= $data['status']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($data['status'] == 'Dibayar') { ?>
                                            Pesanan Sedang Disiapkan
                                        <?php } else { ?>
                                            <a href="<?= site_url('user/confirmPesanan/' . $data['id']) ?>" onclick="return confirm('Yakin ingin terima pesanan?')" class="btn btn-primary">Pesanan Diterima</a>
                                        <?php }; ?>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Modal Resi-->
<div class="modal fade" id="cekresi" tabindex="-1" aria-labelledby="cekresi" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Lacak Paket</h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tabelresi" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Deskirpsi</th>
                                <th scope="col">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Resi -->


<script>
    function cekresi(kurir, resi) {

        console.log(kurir);
        console.log(resi);

        var table = document.getElementById("tabelresi");
        $('#cekresi').modal('show');
        $("#tabelresi td").remove();

        $.ajax({
            type: "GET",
            // url: "https://jsonplaceholder.typicode.com/users",
            url: "https://api.binderbyte.com/v1/track?api_key=25d82d807fb314afffeee5df37f2184f8e52be780536ef5fdf2c402a97a16dd8&courier=" + kurir + "&awb=" + resi,
            data: {},
            success: function(response) {
                console.log(response.data.history);
                for (let i = 0; i < response.data.history.length; i++) {
                    console.log(response);
                    row = `<tr>
                		<td>${i+1}</td>
                		<td>${response.data.history[i].date}</td>
                		<td>${response.data.history[i].desc}</td>
                		<td>${response.data.history[i].location}</td>
                    </tr>`;
                    table.innerHTML += row;
                }
            },
        });
    }
</script>
