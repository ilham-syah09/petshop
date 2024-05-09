<div class="ltn__checkout-area mb-105">
	<div class="container">
		<form action="<?= base_url('placeOrder'); ?>" method="POST">
			<div class="row">
				<div class="col-lg-12">
					<div class="ltn__checkout-inner">
						<div class="ltn__checkout-single-content">
							<h4 class="title-2">Billing Details</h4>
							<div class="ltn__checkout-single-content-info">
								<h6>Personal Information</h6>
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
										<h6>Address</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="input-item">
													<textarea type="text" name="alamat" placeholder="House number and street name"></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
								<h6>Order Notes (optional)</h6>
								<div class="input-item input-item-textarea ltn__custom-icon">
									<textarea name="catatan" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="ltn__checkout-payment-method mt-50">
						<h4 class="title-2">Payment Method</h4>
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
							<p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="shoping-cart-total mt-50">
						<h4 class="title-2">Cart Totals</h4>
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
									<td><strong>Order Total</strong></td>
									<td><strong><?= 'Rp. ' . number_format($subTotal, 0, ',', '.'); ?></strong></td>
								</tr>
								<input type="hidden" name="total" value="<?= $subTotal; ?>" id="totalInput">
							</tbody>
						</table>

						<button class="btn theme-btn-1 btn-effect-1 text-uppercase btn-block" type="submit">Place order</button>
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
</script>