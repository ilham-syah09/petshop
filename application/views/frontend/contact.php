<div class="ltn__contact-address-area mb-90">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
					<div class="ltn__contact-address-icon">
						<img src="<?= base_url(); ?>/assets/user/img/icons/10.png" alt="Icon Image">
					</div>
					<h3>Alamat Email</h3>
					<p>kotaropetshop99@gmail.com</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
					<div class="ltn__contact-address-icon">
						<img src="<?= base_url(); ?>/assets/user/img/icons/11.png" alt="Icon Image">
					</div>
					<h3>No. Handphoe</h3>
					<p>085641150844</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
					<div class="ltn__contact-address-icon">
						<img src="<?= base_url(); ?>/assets/user/img/icons/12.png" alt="Icon Image">
					</div>
					<h3>Alamat Lengkap</h3>
					<p>Jl. Dr. Sutomo No. 13 Slawi
						(Sblh Timur RSUD. Susilo Slawi)
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- CONTACT ADDRESS AREA END -->

<!-- CONTACT MESSAGE AREA START -->
<div class="ltn__contact-message-area mb-120 mb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ltn__form-box contact-form-box box-shadow white-bg">
					<h4 class="title-2">Kirim Pesan ke Kami</h4>
					<form action="<?= base_url('message'); ?>" method="POST" name="sentMessage">
						<div class="row">
							<div class="col-md-4">
								<div class="input-item input-item-name ltn__custom-icon">
									<input type="text" name="name" placeholder="Nama lengkap kamu...">
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-item input-item-email ltn__custom-icon">
									<input type="email" name="email" placeholder="Alamat email kamu...">
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-item input-item-text ltn__custom-icon">
									<input type="text" name="subject" placeholder="Subjek...">
								</div>
							</div>
						</div>
						<div class="input-item input-item-textarea ltn__custom-icon">
							<textarea name="message" placeholder="Masukan pesan kamu..."></textarea>
						</div>
						<div class="btn-wrapper mt-0">
							<button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Kirim Pesan</button>
						</div>
						<p class="form-messege mb-0 mt-20"></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- CONTACT MESSAGE AREA END -->