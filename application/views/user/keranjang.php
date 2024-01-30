<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/minishop/') ?>images/bg_6.jpg')">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span>
                </p>
                <h1 class="mb-0 bread">My Wishlist</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mykeranjang as $data) : ?>
                                <tr class="text-center">
                                    <td class="product-remove">
                                        <a type="button" onclick="remove('<?= $data['id_detail'] ?>', '<?= $data['id_barang'] ?>', '<?= $data['qty'] ?>')"><span class="ion-ios-close"></span></a>
                                    </td>

                                    <td class="image-prod">
                                        <div class="img" style="background-image: url(<?= base_url('assets/img/barang/' . $this->Barang_model->getBarang($data['id_barang'], 'gambar')) ?>)"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3><?= $this->Barang_model->getBarang($data['id_barang'], 'nama') ?></h3>
                                    </td>

                                    <td class="price"><?= formatrupiah($this->Barang_model->getBarang($data['id_barang'], 'hargajual')) ?></td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input readonly type="text" name="quantity" class="quantity form-control input-number" value="<?= $data['qty'] ?>" min="1" max="100" />
                                        </div>
                                    </td>

                                    <td class="total"><?= formatrupiah($data['total']) ?></td>
                                </tr>
                            <?php
                                $total = $total + $data['total'];
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span><?= formatrupiah($total) ?></span>
                    </p>
                    <hr />
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span><?= formatrupiah($total + $ongkir) ?></span>
                    </p>
                </div>
                <p class="text-center">
                    <?php if ($total > 0) { ?>
                        <a href="<?= site_url('user/checkout') ?>" class="btn btn-primary py-3 px-4">Proceed to Checkout</a>
                    <?php } else { ?>
                        <a href="<?= site_url('user/shop') ?>" class="btn btn-primary py-3 px-4">Shop</a>
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    // UBAH QTY
    function ubahQtyUP(id_detail, harga) {
        let result = document.getElementById('qty<?= $myk['id'] ?>').value;
        let max = document.getElementById('qty<?= $myk['id'] ?>').max;

        if (result == max) {
            return false;
        } else {
            let qty = parseInt(result) + 1;
            $('#qty<?= $myk['id'] ?>').val(qty);
            ubahJumlah(id_detail, harga);
        }
    }

    function ubahQtyDown(id_detail, harga) {
        let result = document.getElementById('qty<?= $myk['id'] ?>').value;
        if (result == 1) {
            return false;
        } else {
            let qty = parseInt(result) - 1;
            $('#qty<?= $myk['id'] ?>').val(qty);
            ubahJumlah(id_detail, harga);
        }
    }

    // UBAH JUMLAH BARANG DI KERANJANG
    function ubahJumlah(id_detail, harga) {
        // console.log(id_detail, harga);
        const qty = $("#qty" + id_detail).val();
        var total = harga * qty;
        // console.log(id_detail, harga, qty, total);

        $.ajax({
            type: "POST",
            url: base_url + "user/updateDetail",
            data: {
                id_detail: id_detail,
                qty: qty,
                harga: harga,
            },
            async: false,
            datatype: JSON,
            success: function(data) {
                // $("#totalharga" + id_detail).text(rupiah(total));
                location.reload();
            },
        });
    }
</script>
