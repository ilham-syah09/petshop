<div class="ltn__checkout-area mb-105">
	<div class="container">
		<form action="<?= base_url('grooming/store'); ?>" method="POST" enctype="multipart/form-data" id="form-grooming">
			<div class="row">
				<div class="col-lg-12">
					<div class="ltn__checkout-inner">
						<div class="ltn__checkout-single-content">
							<h4 class="title-2">Booking Grooming</h4>
							<div class="ltn__checkout-single-content-info">
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<h6>Daftar Paket</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="input-item">
													<select name="idPaket" id="idPaket" class="form-control" required>
														<option value="">-- Pilih Paket --</option>
														<?php foreach ($paket as $pkt) : ?>
															<option value="<?= $pkt->id; ?>"><?= $pkt->namaPaket . ' - Rp. ' . number_format($pkt->harga, 0, ',', '.'); ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<h6>Jenis Kucing</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="input-item">
													<input type="text" class="form-control" name="jenis" required autocomplete="off">
												</div>
											</div>
										</div>
										<h6>Foto (opsional)</h6>
										<div class="row mb-3">
											<div class="col-md-12">
												<div class="input-item">
													<input type="file" class="form-control" name="image">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<h6>Penjemputan</h6>
										<div class="alert alert-info">
											Jika di antar akan dikenakan biaya ongkir
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="input-item">
													<label>Berangkat</label>
													<select name="mulai" id="mulai" class="form-control" required>
														<option value="">-- Pilih --</option>
														<option value="1">Di antar sendiri</option>
														<option value="2">Di jemput pihak petshop</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-item">
													<label>Pulang</label>
													<select name="selesai" id="selesai" class="form-control" required>
														<option value="">-- Pilih --</option>
														<option value="1">Di ambil sendiri</option>
														<option value="2">Di antar pihak petshop</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<h6>Wilayah</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="input-item">
													<select name="idOngkir" id="idOngkir" class="form-control" required>
														<option value="">-- Pilih Wilayah --</option>
														<?php foreach ($ongkir as $ong) : ?>
															<option value="<?= $ong->id; ?>"><?= $ong->kecamatan; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<h6>Alamat</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="input-item">
													<textarea name="alamat" placeholder="Alamat lengkap rumah anda"></textarea>
												</div>
											</div>
										</div>
										<h6>Link Google Maps</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="input-item">
													<input type="text" name="link_maps" placeholder="Link google maps" autocomplete="off">
												</div>
											</div>
										</div>
									</div>
								</div>
								<h6>Catatan (optional)</h6>
								<div class="input-item input-item-textarea ltn__custom-icon">
									<textarea name="deskripsi"></textarea>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase btn-block">Order</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

<script>
	$('#form-grooming').validate({
		rules: {
			idPaket: {
				selected: true,
			},
			jenis: {
				required: true,
			},
			mulai: {
				required: true,
			},
			selesai: {
				required: true,
			},
			idOngkir: {
				required: true
			},
			alamat: {
				required: true
			},
			link_maps: {
				required: true
			},
		},
		messages: {
			idPaket: {
				selected: "Paket tidak boleh kosong",
			},
			jenis: {
				required: "Jenis tidak boleh kosong",
			},
			alamat: {
				required: "Alamat tidak boleh kosong!",
			},
			mulai: {
				required: "mulai tidak boleh kosong!",
			},
			selesai: {
				required: "selesai tidak boleh kosong!",
			},
			idOngkir: {
				required: "Ongkir tidak boleh kosong!",
			},
			alamat: {
				required: "alamat tidak boleh kosong!",
			},
			link_maps: {
				required: "Link google maps tidak boleh kosong!",
			},
		},
		errorElement: 'small',
		errorClass: 'mb-2 text-danger'
	});
</script>