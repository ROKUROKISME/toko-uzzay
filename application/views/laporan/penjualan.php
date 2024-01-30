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
                        <p>
                            <a target="_blank" href="<?= site_url('laporan/cetakpenjualan/' . $dari . '/' . $sampai) ?>" class="btn btn-primary">
                                <i class="fas fa-file-pdf">
                                </i> Cetak Laporan
                            </a>
                        </p>
                        <!-- <h6 class="card-subtitle">On a per-column basis (i.e. order by a specific column and then a secondary column if the data in the first column is identical), through the <code> columns.orderData</code> option.</h6> -->
                        <div class="table-responsive">
                            <form form action="" method="post">
                                <div class="row justify-content-end mb-3">
                                    <div class="col-2">
                                        <div class="form-group row">
                                            <!-- <label for="_dari" class="col-lg-3 col-form-label">Dari</label> -->
                                            <div class="col">
                                                <input type="date" class="form-control" name="_dari" id="_dari" value="<?= $dari ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group row">
                                            <!-- <label for="_sampai" class="col-lg-3 col-form-label">Sampai</label> -->
                                            <div class="col">
                                                <input type="date" class="form-control" name="_sampai" id="_sampai" value="<?= $sampai ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" name="filter" class="btn btn-block btn-outline-warning"><i class="fa-solid fa-magnifying-glass"></i> Filter</button>
                                    </div>
                                </div>
                            </form>
                            <table id="zero_config" class="table table-striped table-bordered display no-wrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pembeli</th>
                                        <th>Total</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Bukti</th>
                                        <th>Nomor Resi</th>
                                        <th>Ongkir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($laporan as $data) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $this->Pengguna_model->getPengguna($data['id_konsumen'], 'nama') ?></td>
                                            <td><?= formatrupiah($data['total_harga']) ?></td>
                                            <td><?= $data['tanggal'] ?></td>
                                            <td><?= $data['waktu'] ?></td>
                                            <td>
                                                <a target="_blank" href="<?= site_url('assets/img/bukti/' . $data['bukti']) ?>">
                                                    <img src="<?= base_url('assets/img/bukti/' . $data['bukti']) ?>" width="50" height="50" alt="">
                                                </a>

                                            </td>
                                            <td><?= $data['nomor_resi'] ?></td>
                                            <td><?= formatrupiah($data['ongkir']) ?></td>
                                            <!-- <td>
                                                <a href="<?= site_url($page . '/ubah/' . $data['id']) ?>" class="btn btn-info"><i class=" fas fa-pencil-alt"></i> Ubah</a>
                                                <a href="<?= site_url($page . '/hapus/' . $data['id']) ?>" onclick="return confirm('Apakah kamu ingin menghapus data ini?')" class=" btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                            </td> -->
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach ?>
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
