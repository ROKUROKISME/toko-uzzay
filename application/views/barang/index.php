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
                            <a href="<?= site_url($page . '/tambah') ?>" class="btn btn-success">
                                <i class="fas fa-plus">
                                </i> Tambah
                            </a>
                        </p>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered display no-wrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Supplier</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Berat(gram)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($barang as $data) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td class="text-center">
                                                <a target="_blank" href="<?= base_url('assets/img/barang/' . $data['gambar']) ?>">
                                                    <img src="<?= base_url('assets/img/barang/' . $data['gambar']) ?>" alt="<?= $data['gambar']; ?>" width="50" height="50">
                                                </a>
                                            </td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $this->Kategori_model->getNameById($data['id_kategori'], 'nama');  ?></td>
                                            <td><?= $this->Supplier_model->getNameById($data['id_supplier'], 'nama');  ?></td>
                                            <td><?= formatrupiah($data['harga_beli']); ?></td>
                                            <td><?= formatrupiah($data['harga_jual']); ?></td>
                                            <td><?= $data['stok']; ?></td>
                                            <td><?= $data['berat']; ?>(gram)</td>
                                            <td>
                                                <a href="<?= site_url($page . '/ubah/' . $data['id']) ?>" type="button" class="btn btn-block btn-info btn-sm mt-2">
                                                    <i class="fas fa-pencil-alt"></i> Ubah
                                                </a>
                                                <a href="<?= site_url($page . '/tambahstok/' . $data['id']) ?>" type="button" class="btn btn-block btn-info btn-sm mt-2">
                                                    <i class="fas fa-plus"></i> Tambah Stok
                                                </a>
                                                <!-- <a href="<?= site_url($page . '/retur/' . $data['id']) ?>" type="button" class="btn btn-block btn-warning btn-sm mt-2">
                                                    <i class="fas fa-undo-alt"></i> Retur
                                                </a> -->
                                                <!-- <a href="<?= site_url($page . '/detail/' . $data['id']) ?>" type="button" class="btn btn-block btn-secondary btn-sm"><i class="fas fa-images"></i> Detail</a> -->
                                                <a href="<?= site_url($page . '/hapus/' . $data['id']) ?>" onclick="return confirm('Apakah kamu ingin menghapus data ini?')" type="button" class="btn btn-block btn-danger btn-sm mb-2"><i class="fas fa-trash-alt"></i> Hapus</a>
                                            </td>
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
