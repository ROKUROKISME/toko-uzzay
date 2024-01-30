<!-- SECTION -->
<style>
    .txt-center {
        text-align: center;
    }

    .hide {
        display: none;
    }

    .clear {
        float: none;
        clear: both;
    }

    .rating {
        width: 90px;
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: center;
        position: relative;
    }

    .rating>label {
        float: right;
        display: inline;
        padding: 0;
        margin: 0;
        position: relative;
        width: 1.1em;
        cursor: pointer;
        color: #000;
    }

    .rating>label:hover,
    .rating>label:hover~label,
    .rating>input.radio-btn:checked~label {
        color: transparent;
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before,
    .rating>input.radio-btn:checked~label:before,
    .rating>input.radio-btn:checked~label:before {
        content: "\2605";
        position: absolute;
        left: 0;
        color: #FFD700;
    }
</style>

<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/minishop/') ?>images/bg_6.jpg')">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Pesanan Selesai</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg col-md col-xs">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Status</th>
                                <!-- <th scope="col">Aksi</th> -->
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
                                        <?= $data['status']; ?>
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
</div>
<!-- /SECTION -->

<script>
    function modalPenilaian(id, id_barang) {

        $('#modalrating').modal('show');
        $('#id_detailpenjualanselesai').val(id);
        $('#id_barangselesai').val(id_barang);
    }
</script>
