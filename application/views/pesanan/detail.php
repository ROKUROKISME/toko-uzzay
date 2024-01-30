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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data <?= $judul ?></h4>
                        <p>
                            <a href="<?= site_url($page) ?>" class="btn btn-success">
                                <i class="fas fa-arrow-left">
                                </i> Kembali
                            </a>
                        </p>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered display no-wrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Penjualan</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total_harga = 0;
                                    foreach ($details as $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $no; ?></th>
                                            <td><?= threedigit($data['id_detail']); ?></th>
                                            <td><?= $this->Barang_model->getBarang($data['id_barang'], 'nama'); ?></td>
                                            <td><?= formatrupiah($this->Barang_model->getBarang($data['id_barang'], 'hargajual')); ?></td>
                                            <td><?= $data['qty']; ?></th>
                                            <td><?= formatrupiah($data['total'] * $data['qty']); ?></td>
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

<!-- Modal Resi-->
<div class="modal fade" id="modalResi" tabindex="-1" aria-labelledby="modalResi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Set Resi</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id_penjualan" name="id_penjualan">

                    <div class="form-group">
                        <label for="nmresi">Nomor Resi</label>
                        <input type="text" class="form-control" id="nmresi" name="nmresi">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary exitModal" data-dismiss="modal">Batal</button>
                        <button type="submit" name="updateResi" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Resi -->


<script>
    $().DataTable();
    let table = new DataTable('#zero_config');


    function setResi(id, resi) {
        console.log(id, resi);
        $("#modalResi").modal("show");
        $("#id_penjualan").val(id);
        $("#nmresi").val(resi);
    }
</script>
