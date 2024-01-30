<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko - Uzzay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/adminmart/assets/') ?>images/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>animate.css">

    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>aos.css">

    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>jquery.timepicker.css">


    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>icomoon.css">
    <link rel="stylesheet" href="<?= base_url('assets/minishop/css/') ?>style.css">

    <!-- JS -->
    <script src="<?= base_url('assets/minishop/js/') ?>jquery.min.js"></script>
    <!-- END JS -->

    <script>
        let base_url = '<?php echo base_url() ?>';
    </script>

</head>

<body class="goto-here">
    <!-- <div class="py-1 bg-black">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">+ 1235 2355 98</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <span class="text">youremail@email.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('/') ?>">
                <h3>
                <b>Toko Uzzay</b>
                </h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="<?= site_url('/') ?>" class="nav-link"><b>Home</b></a></li>
                    <li class="nav-item"><a href="<?= site_url('user/shop') ?>" class="nav-link"><b>Shop</b></a></li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="<?= site_url('user/shop') ?>">Shop</a>
                            <a class="dropdown-item" href="product-single.html">Single Product</a>
                            <a class="dropdown-item" href="cart.html">Cart</a>
                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
                    <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
                    <?php if (isset($_SESSION['Login'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Pesanan</b></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown">
                                <a class="dropdown-item" href="<?= site_url('user/pembayaran') ?>">Belum dibayar</a>
                                <a class="dropdown-item" href="<?= site_url('user/dibayar') ?>">Dibayar</a>
                                <a class="dropdown-item" href="<?= site_url('user/dikirim') ?>">Dikirim</a>
                                <a class="dropdown-item" href="<?= site_url('user/ditolak') ?>">Ditolak</a>
                                <a class="dropdown-item" href="<?= site_url('user/selesai') ?>">Selesai</a>
                            </div>
                        </li>
                        <li class="nav-item cta cta-colored"><a href="<?= site_url('user/keranjang') ?>" class="nav-link">
                            <h6><span class="icon-shopping_cart"></span></h6></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Account</b></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown">
                                <a class="dropdown-item" href="<?= site_url('user/setting') ?>"><b>Setting</b></a>
                                <a class="dropdown-item" href="<?= site_url('auth/logout') ?>"><b>Logout</b></a>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item active"><a href="<?= site_url('auth') ?>" class="nav-link"><b>Login</b></a></li>
                        <li class="nav-item active"><a href="<?= site_url('auth/registrasi') ?>" class="nav-link"><b>Register</b></a></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
