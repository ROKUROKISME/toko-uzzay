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

<section class="checkout_area mt-3">
	<div class="container">
		<div class="mb-5 mt-5">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<?php if ($this->session->flashdata('flash')) : ?>
						<div class="row mt-3">
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
					<h3>My Account</h3>
					<form class="row contact_form" action="" method="POST" enctype="multipart/form-data">
						<div class="col-12 form-group">
							<label for="nama">Nama</label>
							<input class="form-control" type="text" name="nama" id="nama" placeholder="Nama" value="<?= $myaccount['nama'] ?>">
							<small class="form-text text-danger"><?= form_error('nama') ?></small>
						</div>
						<div class="col-12 form-group">
							<label for="username">Username</label>
							<input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?= $myaccount['username'] ?>">
							<small class="form-text text-danger"><?= form_error('username') ?></small>
						</div>

						<div class="col-12 form-group">
							<label for="jk">Jenis Kelamin</label>
							<select class="form-control" name="jk" id="jk">
								<option <?= ($myaccount['jk'] == 'L' ? 'selected' : '') ?> value="L">Laki-laki</option>
								<option <?= ($myaccount['jk'] == 'P' ? 'selected' : '') ?> value="P">Perempuan</option>
							</select>
						</div>
						<div class="col-12 form-group">
							<label for="telp">No Telp/WA</label>
							<input class="form-control" type="text" name="telp" id="telp" placeholder="08xxx" value="<?= $myaccount['telp'] ?>">
							<small class="form-text text-danger"><?= form_error('telp') ?></small>
						</div>
						<div class="col-12 form-group">
							<label for="email">Email</label>
							<input class="form-control" type="email" name="email" id="email" placeholder="example@mail.com" value="<?= $myaccount['email'] ?>">
							<small class="form-text text-danger"><?= form_error('email') ?></small>
						</div>
						<div class="col-12 form-group">
							<label for="password">Password</label>
							<input class="form-control" type="password" name="password" id="password" placeholder="******" value="<?= $myaccount['password'] ?>">
							<small class="form-text text-danger"><?= form_error('password') ?></small>
						</div>
						<!-- <div class="col-12 form-group">
							<label for="foto">Foto</label>
							<input type="file" id="foto" name="foto" class="form-control" accept="image/*" />
						</div> -->
						<div class="col-12 form-group">
							<!-- <button type="submit" name="_editakun" class="btn btn-success">Simpan</button> -->
							<button type="submit" name="_editakun" class="btn btn-primary py-2 px-3">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
