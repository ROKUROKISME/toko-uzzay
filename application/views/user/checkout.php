<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/minishop/') ?>images/bg_6.jpg')">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs">
					<span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span>
				</p>
				<h1 class="mb-0 bread">Checkout</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-10 ftco-animate">
				<form action="#" class="billing-form">
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					<div class="row align-items-end">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nama">Nama Penerima</label>
								<input type="text" name="nama" class="form-control" placeholder="Nama Penerima" value="<?= $myaccount['nama'] ?>" />
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="telp">No Telp / WA</label>
								<input type="text" name="telp" class="form-control" placeholder="0812xxx" value="<?= $myaccount['telp'] ?>" />
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" class="form-control" placeholder="0812xxx" value="<?= $myaccount['email'] ?>" />
							</div>
						</div>

						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="country">Provinsi</label>
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="provinsi" id="provinsi" onchange="getKota(this.value)" class="form-control">
										<option value="">Pilih Provinsi</option>
										<?php
										foreach ($provinsi->rajaongkir->results as $_provinsi) : ?>
											<option value="<?= $_provinsi->province_id ?>"><?= $_provinsi->province ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="country">Kota</label>
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select class="form-control" name="kota" id="kota" onchange="getCost()" required>
										<option disabled value="288">Pilih Kota</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="country">Kurir</label>
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select disabled class="form-control" onchange="getCost()" name="kurir" id="kurir">
										<option value="jne">JNE</option>
										<option value="pos">POS</option>
										<option value="tiki">Tiki</option>
									</select>
								</div>
							</div>
						</div>

						<div class="w-100"></div>
						<!-- <div class="col-md-6">
							<div class="form-group">
								<label for="streetaddress">Street Address</label>
								<input type="text" class="form-control" placeholder="House number and street name" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)" />
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="towncity">Town / City</label>
								<input type="text" class="form-control" placeholder="" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="postcodezip">Postcode / ZIP *</label>
								<input type="text" class="form-control" placeholder="" />
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="text" class="form-control" placeholder="" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="emailaddress">Email Address</label>
								<input type="text" class="form-control" placeholder="" />
							</div>
						</div>
						<div class="w-100"></div> -->
						<!-- <div class="col-md-12">
							<div class="form-group mt-4">
								<div class="radio">
									<label class="mr-3"><input type="radio" name="optradio" /> Create an Account? </label>
									<label><input type="radio" name="optradio" /> Ship to different address</label>
								</div>
							</div>
						</div> -->
					</div>
				</form>
				<!-- END -->

				<div class="row mt-5 pt-3 d-flex">
					<form action="" method="post" class="col-md-6 d-flex">
						<div class="cart-detail cart-total bg-light p-3 p-md-4">
							<h3 class="billing-heading mb-4">Cart Total</h3>
							<?php
							$total = 0;
							$berat = 0;
							foreach ($mykeranjang as $myc) :
								$berat = $berat + $this->Barang_model->getBarang($myc['id_barang'], 'berat') * $myc['qty'] ?>
								<p class="d-flex">
									<span><?= $this->Barang_model->getBarang($myc['id_barang'], 'nama') ?> x <?= $myc['qty'] ?></span>
									<span><?= formatrupiah($myc['total']) ?></span>
								</p>
							<?php
								$total = $total + ($myc['total'] * $myc['qty']);
							endforeach; ?>
							<p class="d-flex">
								<span>Subtotal</span>
								<span><?= formatrupiah($total) ?></span>
							</p>
							<hr />
							<p class="d-flex">
								<input class="form-control" type="hidden" name="berat" id="berat" value="<?= $berat ?>">
								<span>Biaya Pengiriman</span>
								<span id="realongkir">-</span>
							</p>
							<p class="d-flex total-price">
								<span>Total</span>
								<span>
									<strong id="showtotal"><?= formatrupiah($total) ?></strong>
								</span>
							</p>

							<!-- <div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
										<label><input type="checkbox" value="" class="mr-2" /> I have read and accept the terms and conditions</label>
									</div>
								</div>
							</div> -->
							<input type="hidden" name="consttotal" id="consttotal" value="<?= $total ?>">
							<input type="hidden" name="ongkir" id="ongkir" value="<?= $berat ?>">
							<input type="hidden" name="kkurir" id="kkurir" value="">
							<p><button type="submit" name="_docheckout" class="btn btn-primary py-3 px-4">Place an order</button></p>
						</div>
					</form>
					<!-- <div class="col-md-6">
						<div class="cart-detail bg-light p-3 p-md-4">
							<h3 class="billing-heading mb-4">Payment Method</h3>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2" /> Direct Bank Tranfer</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2" /> Check Payment</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2" /> Paypal</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
										<label><input type="checkbox" value="" class="mr-2" /> I have read and accept the terms and conditions</label>
									</div>
								</div>
							</div>
							<input type="hidden" name="consttotal" id="consttotal" value="<?= $total + $berat ?>">
							<input type="hidden" name="ongkir" id="ongkir" value="<?= $berat ?>">
							<p><button type="button" name="submit" name="_docheckout" class="btn btn-primary py-3 px-4">Place an order</button></p>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>


<script>
	function rupiah(angka) {
		var reverse = angka.toString().split("").reverse().join(""),
			ribuan = reverse.match(/\d{1,3}/g);
		ribuan = ribuan.join(".").split("").reverse().join("");
		return "Rp " + ribuan + ",00";
	}

	function getKota(id) {
		let opsikota = document.getElementById("kota");
		let options = "";

		$('#kurir').removeAttr("disabled");
		$('#kota').removeAttr("disabled");
		$('#kota option[value=""]').remove();

		console.log(id);
		$.ajax({
			type: "POST",
			url: base_url + "user/getKota",
			data: {
				provinsi_id: id,
			},
			success: function(dkota) {
				let datadetail = JSON.parse(dkota);
				for (let i = 0; i < datadetail.length; i++) {
					options += "<option value=" + datadetail[i].city_id + ">" + datadetail[i].city_name + "</option>";
					console.log(datadetail[i].city_name);
				}
				opsikota.innerHTML = options;
			},
		});
	}

	function getCost() {

		let tujuan_id = document.getElementById("kota").value;
		let kurir = document.getElementById("kurir").value;
		let berat = document.getElementById("berat").value;

		console.log(tujuan_id);
		console.log(berat);
		console.log(kurir);

		$.ajax({
			type: "POST",
			url: base_url + "user/getCost",
			data: {
				tujuan_id: tujuan_id,
				berat: berat,
				kurir: kurir,
			},
			success: function(dcost) {
				console.log(dcost);

				let cost = JSON.parse(dcost);

				let total = document.getElementById('consttotal').value;
				let grand_total = 0;

				grand_total = parseInt(cost.value) + parseInt(total);

				$('#ongkir').val(cost.value);
				$('#realongkir').html(rupiah(cost.value));
				$('#kkurir').val(kurir);
				$('#showtotal').html(rupiah(grand_total));
			},
		});
	}
</script>