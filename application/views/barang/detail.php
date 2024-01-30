<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= ucwords($this->uri->segment(1)) ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url('home') ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#"><?= ucwords($this->uri->segment(1)) ?></a></div>
                <div class="breadcrumb-item"></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row justify-content-center">
                <div class="col col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= ucwords($this->uri->segment(1)) ?></h4>
                        </div>
                        <div class="card-body">
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($detail as $det) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td class="text-center">
                                                    <a target="_blank" href="<?= base_url() ?>assets/img/produk/<?= $det['foto']; ?>">
                                                        <img src="<?= base_url() ?>assets/img/produk/<?= $det['foto']; ?>" alt="<?= $det['foto']; ?>" width="100" height="100">
                                                    </a>
                                                </td>
                                                <td>
                                                    <!-- <a href="<?= base_url() ?>produk/ubah/<?= $det['id']; ?>" type="button" class="btn btn-block btn-info btn-sm">
                                                        <i class="fa-solid fa-pen"></i> Ubah
                                                    </a> -->
                                                    <a href="<?= base_url() ?>produk/hapusfoto/<?= $det['id']; ?>" onclick="return confirm('Yakin ingin hapus?')" type="button" class="btn btn-block btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach; ?>
                                    </tbody>
                                    <button type="button" onclick="addImage()" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Tambah</button>
                                    <a href="<?= site_url($this->uri->segment(1)) ?>" class="btn btn-info mb-3 ml-2"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Resi-->
<div class="modal fade" id="modalAddFoto" tabindex="-1" aria-labelledby="modalAddFoto" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Foto</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input hidden type="text" name="id_produk" id="id_produk" class="form-control" value="<?= $this->uri->segment(3) ?>">
                    <div class="custom-file">
                        <label for="foto" class="col-lg-3 col-form-label">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" size="20" required>
                        <small class="form-text text-danger"><?= form_error('foto') ?></small>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary exitModal" data-dismiss="modal">Batal</button>
                        <button type="submit" name="addProdukFoto" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Resi -->

<script>
    function addImage() {
        $("#modalAddFoto").modal("show");
    }
</script>