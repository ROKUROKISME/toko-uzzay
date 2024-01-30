<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                    <img class="one-third order-md-last img-fluid" src="<?= base_url('assets/img/bg-parfume.jpg') ?>" alt="">
                    <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <!-- <span class="subheading">#New</span> -->
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3">Parfume Aroma Jasmie</h1>
                                <p class="mb-4">Parfume dengan aroma yang memikat lawan jenis.</p>

                                <!-- <p><a href="#" class="btn-custom">Discover Now</a></p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                    <img class="one-third order-md-last img-fluid" src="<?= base_url('assets/img/bg-parfume2.jpg') ?>" alt="">
                    <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <!-- <span class="subheading">#New</span> -->
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3">parfume Aroma Pisang</h1>
                                <p class="mb-4">Dengan aroma pisang keju.</p>

                                <!-- <p><a href="#" class="btn-custom">Discover Now</a></p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row no-gutters ftco-services">
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-5">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-bag"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Free Shipping</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-5">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Support Customer</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-5">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-payment-security"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Secure Payments</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">New Products</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <?php foreach ($barang as $pdk) : ?>
                <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
                    <div class="product d-flex flex-column">
                        <a href="<?= site_url('user/detail/' . $pdk['id']) ?>" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/img/barang/' . $pdk['gambar']) ?>" alt="">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3">
                            <div class="d-flex">
                                <div class="cat">
                                    <span><?= $this->Kategori_model->getNameById($pdk['id_kategori'], 'nama') ?></span>
                                </div>
                            </div>
                            <h3><a href="<?= site_url('user/detail/' . $pdk['id']) ?>"><?= $pdk['nama'] ?></a></h3>
                            <div class="pricing">
                                <p class="price"><span><?= formatrupiah($pdk['harga_jual']) ?></span></p>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <?php
                                if (isset($_SESSION['Login'])) { ?>
                                    <a type="button" onclick="addToCart(<?= $pdk['id'] ?>, '1', <?= $pdk['harga_jual'] ?>)" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                <?php } else { ?>
                                    <a type="button" onclick="addToCart(<?= $pdk['id'] ?>, '1', <?= $pdk['harga_jual'] ?>)" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                <?php }
                                ?>
                                
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
