<section class="feature_product_area mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>HASIL PENCARIAN</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if ($produk) {
                foreach ($produk as $pdk) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <img class="img-fluid w-100" src="<?= base_url('assets/img/produk/' . $pdk['gambar']) ?>" alt="" />
                                <div class="p_icon">
                                    <a href="<?= site_url('search/detail?view=' . $pdk['id']) ?>">
                                        <d class="ti-eye"></d>
                                    </a>
                                    <?php
                                    if (isset($_SESSION['Login'])) { ?>
                                        <a type="button" onclick="addToCart(<?= $pdk['id'] ?>, '1', <?= $pdk['harga'] ?>)">
                                            <i class="ti-shopping-cart"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a type="button" onclick="returnAuth()">
                                            <i class="ti-shopping-cart"></i>
                                        </a>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="<?= site_url('search/detail?view=' . $pdk['id']) ?>" class="d-block">
                                    <h4><?= $pdk['nama'] ?></h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4"><?= formatrupiah($pdk['harga']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            } else { ?>
                <div class="col-md-4 col-xs-6">
                    <h2>SORRY TIDAK DITEMUKAN</h2>
                </div>
            <?php } ?>
        </div>
    </div>
</section>