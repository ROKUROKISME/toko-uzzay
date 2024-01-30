<?php
if (isset($_SESSION['Login'])) {
    redirect('');
}
?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/adminmart/assets/') ?>images/favicon.png">
    <title>Toko - Uzzay | Login</title>
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/adminmart/dist/') ?>css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(<?= base_url('assets/adminmart/assets/') ?>images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row justify-content-center">
                <!-- <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(<?= base_url('assets/adminmart/assets/') ?>images/big/3.jpg);">
                </div> -->
                <div class="col-lg-6 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="<?= base_url('assets/adminmart/assets/') ?>images/big/icon.png" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Sign Up</h2>
                        <?php if ($this->session->flashdata('flash')) : ?>
                            <div class="row mt-2">
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
                        <form class="mt-4" action="" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="username">Username</label>
                                        <input class="form-control" name="username" id="username" type="text" placeholder="enter your username">
                                        <small class="form-text text-danger"><?= form_error('username') ?></small>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="nama">Nama</label>
                                        <input class="form-control" name="nama" id="nama" type="text" placeholder="enter your nama">
                                        <small class="form-text text-danger"><?= form_error('nama') ?></small>
                                    </div>
                                </div>


                                <div class="col-lg-12">
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
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="email">Email</label>
                                        <input class="form-control" name="email" id="email" type="text" placeholder="enter your email">
                                        <small class="form-text text-danger"><?= form_error('email') ?></small>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="telp">Telp / WA</label>
                                        <input class="form-control" name="telp" id="telp" type="text" placeholder="enter your telp">
                                        <small class="form-text text-danger"><?= form_error('telp') ?></small>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="Alamat"></textarea>
                                        <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="password">Password</label>
                                        <input class="form-control" name="password" id="password" type="password" placeholder="enter your password">
                                        <small class="form-text text-danger"><?= form_error('password') ?></small>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <button type="submit" name="_regis" class="btn btn-block btn-dark">Sign Up</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Don't have an account? <a href="<?= site_url('auth') ?>" class="text-danger">Sign In</a>
                                    <p>
                                        <a href="<?= site_url('') ?>" class="text-danger">Halaman Utama </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?= base_url('assets/adminmart/assets/') ?>libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/adminmart/assets/') ?>libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="<?= base_url('assets/adminmart/assets/') ?>libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>
