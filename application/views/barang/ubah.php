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
                        <h4 class="card-title">Ubah <?= $judul ?></h4>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id">Id barang</label>
                                    <input hidden type="text" class="form-control" name="id" id="id" value="<?= $barang['id'] ?>">
                                    <input readonly type="text" class="form-control" value="<?= threedigit($barang['id']) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama barang</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Produk" value="<?= $barang['nama'] ?>">
                                    <small class="form-text text-danger"><?= form_error('nama') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori" id="kategori">
                                        <option value="">- Kategori -</option>
                                        <?php foreach ($kategori as $ktgr) : ?>
                                            <option <?= ($barang['id_kategori'] == $ktgr['id'] ? 'selected' : '') ?> value="<?= $ktgr['id'] ?>"><?= $ktgr['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('kategori') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select class="form-control" name="supplier" id="supplier">
                                        <option value="">- Supplier -</option>
                                        <?php foreach ($supplier as $supp) : ?>
                                            <option <?= ($barang['id_supplier'] == $supp['id'] ? 'selected' : '') ?> value="<?= $supp['id'] ?>"><?= $supp['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('supplier') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="hargabeli">Harga Beli</label>
                                    <input type="number" min="0" class="form-control" name="hargabeli" id="hargabeli" placeholder="Masukan Harga Beli" value="<?= $barang['harga_beli'] ?>">
                                    <small class="form-text text-danger"><?= form_error('hargabeli') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="hargajual">Harga Jual</label>
                                    <input type="number" min="0" class="form-control" name="hargajual" id="hargajual" placeholder="Masukan Harga Jual" value="<?= $barang['harga_jual'] ?>">
                                    <small class="form-text text-danger"><?= form_error('hargajual') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" min="0" class="form-control" name="stok" id="stok" placeholder="Masukan Stok Produk" value="<?= $barang['stok'] ?>">
                                    <small class="form-text text-danger"><?= form_error('stok') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="berat">Berat(gram)</label>
                                    <input type="number" min="0" class="form-control" name="berat" id="berat" placeholder="Masukan Berat(100gram) Produk" value="<?= $barang['berat'] ?>">
                                    <small class="form-text text-danger"><?= form_error('berat') ?></small>
                                </div>


                                <div class="form-group">
                                    <label for="desk">Deskripsi</label>
                                    <textarea class="form-control" name="desk" id="desk" rows="3" placeholder="Masukkan deskripsi..."><?= $barang['deskripsi'] ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('desk') ?></small>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <label for="foto" class="col-lg-3 col-form-label">Foto <span><a target="_blank" href="<?= base_url('assets/img/barang/' . $barang['gambar']) ?>"><?= $barang['gambar'] ?></a></span></label>
                                        <input type="file" name="foto" id="foto" class="form-control" size="20">
                                        <small class="form-text text-danger"><?= form_error('foto') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <a href="<?= site_url($page) ?>" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" name="ubah" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center text-muted">All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.</footer>
</div>
