<div class="ltn__checkout-area mb-105">
	<div class="container">
		<form action="<?= base_url('grooming/store'); ?>" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-12">
					<div class="ltn__checkout-inner">
						<div class="ltn__checkout-single-content">
							<h4 class="title-2">Add Grooming</h4>
							<div class="ltn__checkout-single-content-info">
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<h6>List Package</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="input-item">
													<select name="idPaket" id="idPaket" class="form-control" required>
														<option value="">-- Select Package --</option>
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
										<h6>Pet Type</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="input-item">
													<input type="text" class="form-control" name="jenis" placeholder="Pet type" required autocomplete="off">
												</div>
											</div>
										</div>
										<h6>Photo (opsional)</h6>
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
										<h6>Grooming</h6>
										<div class="row">
											<div class="col-md-6">
												<div class="input-item">
													<select name="mulai" id="mulai" class="form-control" required>
														<option value="">-- Select --</option>
														<option value="1">Self Delivered</option>
														<option value="2">Taken by Officers</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="input-item">
													<select name="selesai" id="selesai" class="form-control" required>
														<option value="">-- Select --</option>
														<option value="1">Taken by Myself</option>
														<option value="2">Delivered by The Officer</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<h6>Subdistrict</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="input-item">
													<select name="idOngkir" id="idOngkir" class="form-control" required>
														<option value="">-- Select Subdistrict --</option>
														<?php foreach ($ongkir as $ong) : ?>
															<option value="<?= $ong->id; ?>"><?= $ong->kecamatan; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<h6>Address</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="input-item">
													<textarea name="alamat" placeholder="House number and street name"></textarea>
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
								<h6>Order Notes (optional)</h6>
								<div class="input-item input-item-textarea ltn__custom-icon">
									<textarea name="deskripsi" placeholder="Notes about your order, e.g. special notes or description"></textarea>
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