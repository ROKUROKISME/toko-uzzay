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
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah <?= $judul ?></h4>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Barang">
                                    <small class="form-text text-danger"><?= form_error('nama') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori" id="kategori">
                                        <option value="">- Kategori -</option>
                                        <?php foreach ($kategori as $ktgr) : ?>
                                            <option value="<?= $ktgr['id'] ?>"><?= $ktgr['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('kategori') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select class="form-control" name="supplier" id="supplier">
                                        <option value="">- Supplier -</option>
                                        <?php foreach ($supplier as $supp) : ?>
                                            <option value="<?= $supp['id'] ?>"><?= $supp['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('supplier') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="hargabeli">Harga Beli</label>
                                    <input type="number" min="0" class="form-control" name="hargabeli" id="hargabeli" placeholder="Masukan Harga Beli">
                                    <small class="form-text text-danger"><?= form_error('hargabeli') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="hargajual">Harga Jual</label>
                                    <input type="number" min="0" class="form-control" name="hargajual" id="hargajual" placeholder="Masukan Harga Jual">
                                    <small class="form-text text-danger"><?= form_error('hargajual') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" min="0" class="form-control" name="stok" id="stok" placeholder="Masukan Jumlah Barang">
                                    <small class="form-text text-danger"><?= form_error('stok') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="berat">Berat(gram)</label>
                                    <input type="number" min="0" class="form-control" name="berat" id="berat" placeholder="Masukan Berat(100gram) Barang">
                                    <small class="form-text text-danger"><?= form_error('berat') ?></small>
                                </div>


                                <div class="form-group">
                                    <label for="desk">Deskripsi</label>
                                    <textarea class="form-control" name="desk" id="desk" rows="3" placeholder="Masukkan deskripsi..."></textarea>
                                    <small class="form-text text-danger"><?= form_error('desk') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="nota">Nomor Nota*</label>
                                    <input type="text" class="form-control" name="nota" id="nota" placeholder="Masukan Nomor Nota">
                                    <small class="form-text text-danger"><?= form_error('nota') ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <label for="foto" class="col-lg-3 col-form-label">Foto</label>
                                        <input type="file" name="foto" id="foto" class="form-control" size="20" required>
                                        <small class="form-text text-danger"><?= form_error('foto') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <a href="<?= site_url($page) ?>" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" name="tambah" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center text-muted">All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.</footer>
</div>
