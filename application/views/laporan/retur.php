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
                                        <th>Id Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah diretur</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($laporan as $data) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= threedigit($data['id_produk']) ?></td>
                                            <td><?= $data['nama_produk'] ?></td>
                                            <td><?= $data['qty'] ?></td>
                                            <td><?= formatrupiah($data['harga']) ?></td>
                                            <td><?= formatrupiah($data['harga'] * $data['qty']) ?></td>
                                            <td><?= $data['tanggal'] ?></td>
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
