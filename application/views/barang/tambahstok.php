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
                        <h4 class="card-title">Tambah <?= $judul ?> (Rekap Pembelian)</h4>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id">Id Produk</label>
                                    <input readonly type="text" class="form-control" name="id" id="id" value="<?= $barang['id'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Produk</label>
                                    <input readonly type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Produk" value="<?= $barang['nama'] ?>">
                                    <small class="form-text text-danger"><?= form_error('nama') ?></small>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori" id="kategori">
                                        <option selected value="<?= $barang['id_kategori'] ?>"><?= $this->Kategori_model->getNameById($barang['id_kategori'], 'nama') ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select class="form-control" name="supplier" id="supplier">
                                        <option selected value="<?= $barang['id_supplier'] ?>"><?= $this->Supplier_model->getNameById($barang['id_supplier'], 'nama') ?></option>
                                    </select>
                                </div> -->

                                <div hidden class="form-group">
                                    <label for="hargabeli">Harga Beli</label>
                                    <input readonly type="number" min="0" class="form-control" name="hargabeli" id="hargabeli" placeholder="Masukan Harga Beli" value="<?= $barang['harga_beli'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="stok">Stok Lama</label>
                                    <input readonly type="number" min="0" class="form-control" name="stok" id="stok" placeholder="Masukan Jumlah Produk" value="<?= $barang['stok'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="nota">Nomor Nota*</label>
                                    <input type="text" class="form-control" name="nota" id="nota" placeholder="Masukan Nomor Nota">
                                    <small class="form-text text-danger"><?= form_error('nota') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="qty">Jumlah Stok Baru*</label>
                                    <input type="number" min="0" class="form-control" name="qty" id="qty" placeholder="Masukan Stok Baru Masuk">
                                    <small class="form-text text-danger"><?= form_error('qty') ?></small>
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
