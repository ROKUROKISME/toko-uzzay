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
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                    <small class="form-text text-danger"><?= form_error('username') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                                    <small class="form-text text-danger"><?= form_error('nama') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="jk" id="jk" class="form-control">
                                            <option value="">Pilih</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <small class="form-text text-danger"><?= form_error('jk') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                    <small class="form-text text-danger"><?= form_error('email') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="telp">Telp / WA</label>
                                    <input type="text" class="form-control" name="telp" id="telp" placeholder="08xx">
                                    <small class="form-text text-danger"><?= form_error('telp') ?></small>
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