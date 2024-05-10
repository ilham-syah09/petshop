<style>
	.tombol {
		background-color: red;
		border: none;
		color: white;
		padding: 5px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
	}

	.btn_plus_min {
		background-color: #000;
		border: none;
		color: white;
		padding: 5px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
	}
</style>
<div class="liton__shoping-cart-area mb-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="shoping-cart-inner">
					<div class="shoping-cart-table table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Products</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $total = 0;; ?>
								<?php foreach ($cart as $c) : ?>
									<?php $total += ($c->harga * $c->total); ?>
									<tr>
										<td>
											<a href="<?= base_url('detail/') . $c->idBarang; ?>" target="detail"><?= $c->nama_barang; ?></a>
										</td>
										<td><?= 'Rp. ' . number_format($c->harga, 0, ',', '.'); ?></td>
										<td>
											<div class="btn-group">
												<button type="button" class="btn_plus_min btn_minus" data-id="<?= $c->id; ?>">-</button>
												<input type="text" value="<?= $c->total; ?>" data-stok="<?= $c->stok; ?>" data-id="<?= $c->id; ?>" data-harga="<?= $c->harga; ?>" name="qtybutton" class="cart-plus-minus-box input_total">
												<button type="button" class="btn_plus_min btn_plus" data-id="<?= $c->id; ?>">+</button>
											</div>
										</td>
										<td class="subTotal">
											<span class="harga"><?= 'Rp. ' . number_format(($c->harga * $c->total), 0, ',', '.'); ?></span>
										</td>
										<td>
											<form action="<?= base_url('deleteCart'); ?>" method="POST">
												<input type="hidden" name="id" value="<?= $c->id; ?>">
												<button type="submit" class="tombol" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></button>
											</form>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php if (count($cart) > 0) : ?>
				<div class="col-lg-4">
					<div class="shoping-cart-inner">
						<div class="shoping-cart-total mt-50">
							<h4>Cart Totals</h4>
							<table class="table">
								<tbody>
									<tr>
										<td>Cart Subtotal</td>
										<td id="subTotal"><?= 'Rp. ' . number_format($total, 0, ',', '.'); ?></td>
									</tr>
									<tr>
										<td><strong>Order Total</strong></td>
										<td id="total"><strong><?= 'Rp. ' . number_format($total, 0, ',', '.'); ?></strong></td>
									</tr>
								</tbody>
							</table>
							<div class="btn-wrapper text-right">
								<button class="theme-btn-1 btn btn-effect-1 btn-block" onclick="window.location.href='<?php echo base_url('checkout') ?>'">Proceed to checkout</button>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<script>
	let input_total = $('.input_total');
	let btn_plus = $('.btn_plus');
	let subTotal = $('.subTotal');

	let totalSebelumnya = 1;

	$(btn_plus).each(function(i) {
		$(btn_plus[i]).click(function() {
			let id = $(this).data('id');

			let harga = $(input_total[i]).data('harga');
			let stok = $(input_total[i]).data('stok');
			let tot = $(input_total[i]).val();

			let total = parseInt(tot) + 1;

			if (total > stok) {
				total = stok;
				toastr.warning('Orders cannot exceed stock');

				$(input_total[i]).val(total);

				$('#to-checkout').prop('disabled', false);
				return 0;
			}

			$(input_total[i]).val(total);

			updateQty(id, total, harga, i);
			$('#to-checkout').prop('disabled', false);
		});
	});

	let btn_minus = $('.btn_minus');

	$(btn_minus).each(function(i) {
		$(btn_minus[i]).click(function() {
			let id = $(this).data('id');

			let harga = $(input_total[i]).data('harga');
			let tot = $(input_total[i]).val();
			let total = parseInt(tot) - 1;

			if (total < 1) {
				total = 1;
				toastr.warning('The minimum order cannot be less than one');

				$(input_total[i]).val(total);
				$('#to-checkout').prop('disabled', false);

				return 0;
			}

			$(input_total[i]).val(total);
			$('#to-checkout').prop('disabled', false);

			updateQty(id, total, harga, i);
		});
	});

	$(input_total).each(function(i) {
		$(input_total[i]).change(function() {
			let total = $(this).val();

			let id = $(this).data('id');
			let harga = $(this).data('harga');
			let stok = $(this).data('stok');

			if (total > stok) {
				total = stok;
				toastr.warning('Orders cannot exceed stock');

				$(this).val(total);
				$('#to-checkout').prop('disabled', true);
			}

			$('#to-checkout').prop('disabled', false);

			if (total == '') {
				$(this).val(totalSebelumnya);

				return 0;
			} else if (total == 0) {
				$(this).val(totalSebelumnya);

				return 0;
			}

			updateQty(id, total, harga, i);
		});
	});

	$(input_total).each(function(i) {
		$(input_total).click(function() {
			totalSebelumnya = $(this).val();
			$('#to-checkout').prop('disabled', true);
		});
	})

	const updateQty = (id, total, harga, i) => {
		$.ajax({
			url: `<?= base_url('updateQuantity'); ?>`,
			type: 'post',
			dataType: 'json',
			data: {
				id,
				total,
				harga
			},
			success: function(res) {
				$('#subTotal').text(res.total);
				$('#total').html(`<strong>${res.total}</strong>`);
				$(subTotal[i]).text(res.subTotal);

				toastr.success('Successfully updated product quantity');
			}
		});
	}
</script>