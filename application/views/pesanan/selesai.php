<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"><?= $judul ?></h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= $judul ?>" class="text-muted"><?= $judul ?></a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page"><?= $sub ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row mt-3">
                <div class="col-lg">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        </strong><?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data <?= $judul ?></h4>
                        <!-- <p>
                            <a href="<?= site_url($page . '/tambah') ?>" class="btn btn-success">
                                <i class="fas fa-plus">
                                </i> Tambah
                            </a>
                        </p> -->
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered display no-wrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Penjualan</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Bukti</th>
                                        <th scope=" col" style="width: 10%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total_harga = 0;
                                    foreach ($permintaan as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no; ?></th>
                                            <td><?= threedigit($data['id']); ?></th>
                                            <td><?= formatrupiah($data['total_harga'] + $data['ongkir']); ?></td>
                                            <td><?= $data['status']; ?></td>
                                            <td>
                                                <a target="_blank" href="<?= base_url() ?>assets/img/bukti/<?= $data['bukti']; ?>">
                                                    <img src="<?= base_url() ?>assets/img/bukti/<?= $data['bukti']; ?>" width="50" height="50" alt="...">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?= site_url('pesanan/detail/' . $data['id']) ?>" class="btn btn-block btn-info btn-sm mt-2">
                                                    <i class="fa-solid fa-list"></i> Detail
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center text-muted">All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.</footer>
</div>


<script>
    $().DataTable();
    let table = new DataTable('#zero_config');
</script>
