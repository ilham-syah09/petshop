<div class="ltn__checkout-area mb-105">
	<div class="container">
		<form action="<?= base_url('placeOrder'); ?>" method="POST" id="form-pesanan">
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
									<div class="col-md-12 mt-3">
										<div class="input-item">
											<label class="fw-bold">Alamat</label>
											<textarea name="alamat" placeholder="House number and street name"></textarea>
										</div>
									</div>
									<div class="col-md-12 mt-3">
										<div class="input-item">
											<label class="fw-bold">Link Google Maps</label>
											<input type="text" name="link_maps" placeholder="Link google maps" autocomplete="off">
										</div>
									</div>
									<div class="col-md-12 mt-3">
										<div class="input-item">
											<label class="fw-bold">Catatan (opsional)</label>
											<textarea name="catatan" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
										</div>
									</div>
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
										<img src="<?= base_url('assets/image/qris.jpg'); ?>" class="img-fluid" alt="">
									</div>
								</div>
							</div>
							<div class="card">
								<h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-2" aria-expanded="false" id="b_t">
									Bank Transfer
								</h5>
								<div id="faq-item-2-2" class="collapse" data-parent="#checkout_accordion_1">
									<div class="card-body">
										<h6>Bank BCA atas nama Satria Ujianto</h6>
										<h6>Rekening : 3620512892</h6>
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
										<p>Bayar ketika pesananmu sampai</p>
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


<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

<script>
	$('#form-pesanan').validate({
		rules: {
			name: {
				required: true,
			},
			noHp: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 13,
			},
			idOngkir: {
				required: true,
			},
			alamat: {
				required: true,
			},
			link_maps: {
				required: true
			},
			payment: {
				required: true
			}
		},
		messages: {
			noHp: {
				required: "Harap isi nomor hp",
				minlength: "Panjang nomor hp kurang dari 10 digit",
				maxlength: "Panjang nomor hp lebih dari 13 digit",
				number: "Nomor hp harus berupa angka",
			},
			alamat: {
				required: "Alamat tidak boleh kosong!",
			},
			link_maps: {
				required: "Link google maps tidak boleh kosong!",
			},
			payment: {
				required: "Harap pilih metode pembayaran!",
			},
		},
		errorElement: 'small',
		errorClass: 'mb-2 text-danger'
	});

	$(document).ready(function() {
		$('#form-pesanan').on('submit', function(e) {
			var selectedPaymentMethod = $('input[name=payment]').val();

			if (!selectedPaymentMethod) {
				notify('Harap pilih metode pembayaran!');
				e.preventDefault();
				return false;
			}

			// If a payment method is selected, allow form submission
			return true;
		});

		// Payment method selection
		$('#qris, #b_t, #cod').on('click', function() {
			var paymentMethod = $(this).attr('id');
			$('input[name=payment]').val(paymentMethod); // Set the hidden input value to the selected payment method
		});

		function notify(message) {
			toastr.options = {
				"positionClass": "toast-top-center",
				"closeButton": true,
				"progressBar": true,
				"timeOut": "3000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};
			toastr.error(message, 'Error');
		}
	});
</script>

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