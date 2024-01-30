<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/minishop/') ?>images/bg_6.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Produk</a></span> <span>Detail</span></p>
				<h1 class="mb-0 bread">Detail Produk</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="images/product-1.png" class="image-popup prod-img-bg"><img src="<?= base_url('assets/img/barang/' . $barang['gambar']) ?>" class="img-fluid" alt=""></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3><?= $barang['nama'] ?></h3>
				<div class="rating d-flex">
					<p class="text-left mr-4">
						<?php
						?>
					</p>
					<p class="text-left mr-4">
						<a href="#" class="mr-2" style="color: #000;"><?= $barang['stok'] ?> <span style="color: #bbb;">Stok</span></a>
					</p>
				</div>
				<p class="price"><span><?= formatrupiah($barang['harga_jual']) ?></span></p>
				<p><?= $barang['deskripsi'] ?></p>
				<div class="row mt-4">
					<div class="w-100"></div>
					<div class="input-group col-md-6 d-flex mb-3">
						<span class="input-group-btn mr-2">
							<button type="button" id="btn-mines" class="quantity-left-minus btn" data-type="minus" data-field="">
								<i class="ion-ios-remove"></i>
							</button>
						</span>
						<input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="<?= $barang['stok'] ?>">
						<span class="input-group-btn ml-2">
							<button type="button" id="btn-plus" class="quantity-right-plus btn" data-type="plus" data-field="">
								<i class="ion-ios-add"></i>
							</button>
						</span>
					</div>
					<div class="w-100"></div>
				</div>
				<p>
					<?php
					if (isset($_SESSION['Login'])) { ?>
						<a type="button" onclick="addCart('<?= $barang['id'] ?>', '<?= $barang['harga_jual'] ?>')" class="btn btn-black py-3 px-5 mr-2">Add to Cart</a>
					<?php } else { ?>
						<a href="<?= site_url('auth') ?>" class="btn btn-black py-3 px-5 mr-2">Add to Cart</a>
					<?php } ?>
				</p>
			</div>
		</div>


		<div class="row mt-5">
			<div class="col-md-12 nav-link-wrap">
				<div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link ftco-animate active" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>
				</div>
			</div>
			
		</div>
	</div>
</section>


<script>
	$(document).ready(function() {
		let value = $('.input-number').val();
		let max = $('.input-number').attr('max');
		$('#btn-mines').on('click', function() {

			if (value <= 1) {
				return false;
			} else {
				value = parseInt(value) - 1;
				$('#quantity').val(value);
			}
		});
		$('#btn-plus').on('click', function() {
			console.log(max);
			if (value == max) {
				return false;
			} else {
				value = parseInt(value) + 1;
				$('#quantity').val(value);
			}
		});
	});
</script>

<script>
	function addCart(id, total) {
		const qty = document.getElementById("quantity").value;
		$.ajax({
			type: "POST",
			url: base_url + "user/beli",
			data: {
				id: id,
				qty: qty,
				total: total,
			},
			success: function(msg) {
				// showToast();
				// setTimeout(function() {}, 500);
				window.location.reload();
			},
		});
	}
</script>
