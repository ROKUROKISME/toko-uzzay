<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= ucwords($this->uri->segment(1)) ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= site_url('home') ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#"><?= $this->uri->segment(1) ?></a></div>
                <div class="breadcrumb-item"></div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Admin</h3>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username">
                                        <small class="form-text text-danger"><?= form_error('username') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" name="password" id="password" placeholder="Masukan Password">
                                        <small class="form-text text-danger"><?= form_error('password') ?></small>
                                    </div>
                                </div>
                                <div class="card-footer">
									<a href="<?= site_url($aksi) ?>" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                                	<button type="submit" name="tambah" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
