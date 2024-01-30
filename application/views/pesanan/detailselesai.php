<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <div class="page-header ">
                        <h4 class="page-title text-white pb-2"><?= ucwords($this->uri->segment(1)) ?></h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home text-white pb-2 fw-bold">
                                <a href="<?= site_url('home') ?>">
                                    <i class="flaticon-home text-white pb-2 fw-bold"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow text-white pb-2 fw-bold"></i>
                            </li>
                            <li class="nav-item ">
                                <a class="text-white pb-2" href="#"><?= ucwords($this->uri->segment(1)) ?></a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow text-white pb-2 fw-bold"></i>
                            </li>
                            <li class="nav-item">
                                <a class="text-white pb-2" href="#"><?= ucwords(($this->uri->segment(2) == null ? 'Index' : $this->uri->segment(2))) ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md">
                <div class="card full-height">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Komentar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $total_harga = 0;
                                foreach ($details as $det) : ?>
                                    <tr>
                                        <th scope="row"><?= $det['id']; ?></th>
                                        <td><?= $this->Produk_model->getProduk($det['id_produk'], 'nama'); ?></th>
                                        <td><?= $det['qty']; ?></th>
                                        <td><?= formatrupiah($det['total']); ?></td>
                                        <td><?= $det['status']; ?></td>
                                        <td><?= $this->Komentar_model->getKomentar($det['id'], 'rating') ?></td>
                                        <td><?= $this->Komentar_model->getKomentar($det['id'], 'komentar') ?></td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <a href="<?= site_url('pesanan/selesai') ?>" class="btn btn-info mb-3 mt-3"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
