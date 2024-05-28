<div class="ltn__checkout-area mb-105">
	<div class="container">
		<form action="<?= base_url('placeOrder'); ?>" method="POST">
			<div class="row">
				<div class="col-lg-12">
					<div class="ltn__checkout-inner">
						<div class="ltn__checkout-single-content">
							<h4 class="title-2">Detail Pembayaran</h4>
							<div class="ltn__checkout-single-content-info">
								<h6>Informasi Pribadi</h6>
								<div class="row">
									<div class="col-md-6">
										<div class="input-item input-item-name ltn__custom-icon">
											<input type="text" name="name" value="<?= $this->dt_user->name; ?>" placeholder="Full name" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-item input-item-phone ltn__custom-icon">
											<input type="text" name="noHp" value="<?= $this->dt_user->noHp; ?>" placeholder="phone number">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<h6>Wilayah</h6>
										<div class="row">
											<div class="col-md-10">
												<div class="input-item">
													<select name="idOngkir" id="idOngkir" class="form-control">
														<option value="">-- Select Wilayah --</option>
														<?php foreach ($ongkir as $ong) : ?>
															<option value="<?= $ong->id; ?>" data-harga="<?= $ong->harga; ?>" data-hargarp="<?= 'Rp. ' . number_format($ong->harga, 0, ',', '.'); ?>"><?= $ong->kecamatan; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="col-md-2">
												<button type="button" class="btn btn-primary" id="cek-ongkir">Cek</button>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<h6>Alamat</h6>
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
								<h6>Catatan (optional)</h6>
								<div class="input-item input-item-textarea ltn__custom-icon">
									<textarea name="catatan" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="ltn__checkout-payment-method mt-50">
						<h4 class="title-2">Metode Pembayaran</h4>
						<input type="hidden" name="payment" id="payment">
						<div id="checkout_accordion_1">
							<!-- card -->
							<div class="card">
								<h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-1" aria-expanded="false" id="qris">
									QRIS
								</h5>
								<div id="faq-item-2-1" class="collapse" data-parent="#checkout_accordion_1">
									<div class="card-body">
										<p>Please scan the QRIS image on the invoice</p>
									</div>
								</div>
							</div>
							<div class="card">
								<h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-2" aria-expanded="false" id="b_t">
									Bank Transfer
								</h5>
								<div id="faq-item-2-2" class="collapse" data-parent="#checkout_accordion_1">
									<div class="card-body">
										<table>
											<tr>
												<td>BRI</td>
												<td>999301005602533</td>
											</tr>
											<tr>
												<td>BCA</td>
												<td>4071677832</td>
											</tr>
											<tr>
												<td>BNI</td>
												<td>12345678</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<!-- card -->
							<div class="card">
								<h5 class="ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-3" aria-expanded="false" id="cod">
									Cash on delivery
								</h5>
								<div id="faq-item-2-3" class="collapse" data-parent="#checkout_accordion_1">
									<div class="card-body">
										<p>Pay with cash upon delivery.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="ltn__payment-note mt-30 mb-30">
							<p>Data pribadi Anda akan digunakan untuk memproses pesanan Anda, mendukung pengalaman Anda di seluruh situs web ini, dan untuk tujuan lain yang dijelaskan dalam kebijakan privasi kami.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="shoping-cart-total mt-50">
						<h4 class="title-2">Total Keranjang</h4>
						<table class="table">
							<tbody>
								<?php $subTotal = 0; ?>
								<?php foreach ($cart as $c) : ?>
									<?php $subTotal += ($c->harga * $c->total); ?>
									<div class="d-flex justify-content-between">
										<tr>
											<td><?= $c->nama_barang; ?> <sup><?= '(' . $c->total . ')'; ?></td>
											<td><?= 'Rp. ' . number_format(($c->harga * $c->total), 0, ',', '.'); ?></td>
										</tr>
									</div>
								<?php endforeach; ?>
								<tr>
									<td><strong>Sub Total</strong></td>
									<td><strong><?= 'Rp. ' . number_format($subTotal, 0, ',', '.'); ?></strong></td>
									<input type="hidden" id="subTotal" value="<?= $subTotal; ?>">
								</tr>
								<tr>
									<td>Pengiriman</td>
									<td id="shipping"></td>
								</tr>
								<tr>
									<td><strong>Order Total</strong></td>
									<td><strong id="totalInputrp"></strong></td>
								</tr>
								<input type="hidden" name="total" id="totalInput">
							</tbody>
						</table>

						<button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase btn-block btn-order" disabled>Place order</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	$('#qris').click(function() {
		$('#payment').val(1);
	});

	$('#b_t').click(function() {
		$('#payment').val(2);
	});

	$('#cod').click(function() {
		$('#payment').val(3);
	});

	$('#cek-ongkir').click(function() {
		const idOngkir = $('#idOngkir').find(':selected').val();
		const harga = $('#idOngkir').find(':selected').data('harga');
		const hargarp = $('#idOngkir').find(':selected').data('hargarp');
		const subTotal = $('#subTotal').val();

		if (idOngkir) {
			let rupiah = new Intl.NumberFormat('id-ID', {
				style: 'currency',
				currency: 'IDR'
			});

			let total = Number(harga) + Number(subTotal);

			$('#shipping').text(hargarp);
			$('#totalInputrp').text(rupiah.format(total));
			$('#totalInput').val(total);

			$('.btn-order').attr('disabled', false);
		} else {
			let total = Number(subTotal);

			$('#shipping').text('');
			$('#totalInputrp').text('');
			$('#totalInput').val('');

			$('.btn-order').attr('disabled', true);
		}
	});
</script>