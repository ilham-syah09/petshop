<div class="ltn__product-area ltn__product-gutter">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 order-lg-2 mb-120">
				<div class="ltn__shop-options">
					<ul>
						<li>
							<div class="showing-product-number text-right">
								<span> <?= 'Showing ' . count($products) . ' of ' . $total_rows . ' result'; ?></span>
							</div>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade active show" id="liton_product_grid">
						<div class="ltn__product-tab-content-inner ltn__product-grid-view">
							<div class="row">
								<!-- ltn__product-item -->
								<?php foreach ($products as $product) : ?>
									<div class="col-xl-4 col-sm-6 col-6">
										<div class="ltn__product-item ltn__product-item-3 text-center">
											<div class="product-img">
												<a href="<?= base_url('detail/' . $product->id); ?>"><img src="<?= base_url('upload/gambar/' . gambar($product->id)); ?>" alt="<?= $product->nama_barang; ?>"></a>
												<div class="product-hover-action">
													<ul>
														<li>
															<a href="#" title="Quick View" data-toggle="modal" data-target="<?= '#quick_view_modal_' . $product->id; ?>">
																<i class="far fa-eye"></i>
															</a>
														</li>
														<?php if ($product->stok > 0) : ?>
															<li>
																<a href="#" title="Add to Cart" data-toggle="modal" onclick="addToCart(`<?= $product->id; ?>`, <?= $product->stok; ?>, 'no_cek')">
																	<i class="fas fa-shopping-cart"></i>
																</a>
															</li>
														<?php endif; ?>
													</ul>
												</div>
											</div>
											<div class="product-info">
												<div class="product-ratting">
													<?php $getRating = getRating($product->id); ?>
													<ul>
														<?php if ($getRating['total'] != 0) : ?>
															<?php if ($getRating['rating'] < 1) : ?>
																<li><i class="fas fa-star-half-alt"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
															<?php elseif ($getRating['rating'] == 1) : ?>
																<li><i class="fas fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
															<?php elseif ($getRating['rating'] > 1 && $getRating['rating'] < 2) : ?>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star-half-alt"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
															<?php elseif ($getRating['rating'] == 2) : ?>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
															<?php elseif ($getRating['rating'] > 2 && $getRating['rating'] < 3) : ?>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star-half-alt"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
															<?php elseif ($getRating['rating'] == 3) : ?>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
															<?php elseif ($getRating['rating'] > 3 && $getRating['rating'] < 4) : ?>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star-half-alt"></i></li>
																<li><i class="far fa-star"></i></li>
															<?php elseif ($getRating['rating'] == 4) : ?>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="far fa-star"></i></li>
															<?php elseif ($getRating['rating'] > 4 && $getRating['rating'] < 5) : ?>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star-half-alt"></i></li>
															<?php elseif ($getRating['rating'] == 5) : ?>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															<?php endif; ?>
													</ul>
												<?php endif; ?>
												</div>
												<h2 class="product-title"><a href="<?= base_url('detail/' . $product->id); ?>"><?= $product->nama_barang; ?></a></h2>
												<div class="product-price">
													<span><?= 'Rp. ' . number_format($product->harga, 0, ',', '.'); ?></span>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="ltn__pagination-area text-center">
					<div class="ltn__pagination">
						<?= $paging; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 mb-120">
				<aside class="sidebar ltn__shop-sidebar">
					<!-- Category Widget -->
					<div class="widget ltn__menu-widget">
						<h4 class="ltn__widget-title ltn__widget-title-border">Product categories</h4>
						<ul>
							<?php foreach ($kategori as $kat) : ?>
								<li class="<?= ($kat->id == $kategori_id) ? 'product-price' : ''; ?>"><a href="<?= base_url('shop/') . $kat->id; ?>"><?= $kat->kategori; ?> <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
							<?php endforeach; ?>
						</ul>
					</div>

					<!-- Top Rated Product Widget -->
					<div class="widget ltn__top-rated-product-widget">
						<h4 class="ltn__widget-title ltn__widget-title-border">Most Popular Products</h4>
						<ul>
							<?php foreach ($productsPopuler as $product) : ?>
								<li>
									<div class="top-rated-product-item clearfix">
										<div class="top-rated-product-img">
											<a href="<?= base_url('detail/' . $product->id); ?>">
												<img src="<?= base_url('upload/gambar/' . gambar($product->id)); ?>" alt="<?= $product->nama_barang; ?>">
											</a>
										</div>
										<div class="top-rated-product-info">
											<div class="product-ratting">
												<?php $getRating = getRating($product->id); ?>
												<?php if ($getRating['total'] != 0) : ?>
													<ul>
														<?php if ($getRating['rating'] < 1) : ?>
															<li><i class="fas fa-star-half-alt"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
														<?php elseif ($getRating['rating'] == 1) : ?>
															<li><i class="fas fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
														<?php elseif ($getRating['rating'] > 1 && $getRating['rating'] < 2) : ?>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star-half-alt"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
														<?php elseif ($getRating['rating'] == 2) : ?>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
														<?php elseif ($getRating['rating'] > 2 && $getRating['rating'] < 3) : ?>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star-half-alt"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
														<?php elseif ($getRating['rating'] == 3) : ?>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
														<?php elseif ($getRating['rating'] > 3 && $getRating['rating'] < 4) : ?>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star-half-alt"></i></li>
															<li><i class="far fa-star"></i></li>
														<?php elseif ($getRating['rating'] == 4) : ?>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="far fa-star"></i></li>
														<?php elseif ($getRating['rating'] > 4 && $getRating['rating'] < 5) : ?>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star-half-alt"></i></li>
														<?php elseif ($getRating['rating'] == 5) : ?>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
															<li><i class="fas fa-star"></i></li>
														<?php endif; ?>
													</ul>
												<?php endif; ?>
											</div>
											<h6><a href="<?= base_url('detail/' . $product->id); ?>"><?= $product->nama_barang; ?></a></h6>
											<div class="product-price">
												<span><?= 'Rp. ' . number_format($product->harga, 0, ',', '.'); ?></span>
											</div>
										</div>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>

<!-- MODAL AREA START (Quick View Modal) -->
<?php foreach ($products as $product) : ?>
	<div class="modal fade" id="<?= 'quick_view_modal_' . $product->id; ?>" tabindex="-1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<!-- <i class="fas fa-times"></i> -->
					</button>
				</div>
				<div class="modal-body">
					<div class="ltn__quick-view-modal-inner">
						<div class="modal-product-item">
							<div class="row">
								<div class="col-lg-6 col-12">
									<div class="modal-product-img">
										<img src="<?= base_url('upload/gambar/' . gambar($product->id)); ?>" alt="<?= $product->nama_barang; ?>">
									</div>
								</div>
								<div class="col-lg-6 col-12">
									<div class="modal-product-info">
										<div class="product-ratting">
											<?php $getRating = getRating($product->id); ?>
											<?php if ($getRating['total'] != 0) : ?>
												<ul>
													<?php if ($getRating['rating'] < 1) : ?>
														<li><i class="fas fa-star-half-alt"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
													<?php elseif ($getRating['rating'] == 1) : ?>
														<li><i class="fas fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
													<?php elseif ($getRating['rating'] > 1 && $getRating['rating'] < 2) : ?>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star-half-alt"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
													<?php elseif ($getRating['rating'] == 2) : ?>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
													<?php elseif ($getRating['rating'] > 2 && $getRating['rating'] < 3) : ?>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star-half-alt"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
													<?php elseif ($getRating['rating'] == 3) : ?>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
													<?php elseif ($getRating['rating'] > 3 && $getRating['rating'] < 4) : ?>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star-half-alt"></i></li>
														<li><i class="far fa-star"></i></li>
													<?php elseif ($getRating['rating'] == 4) : ?>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="far fa-star"></i></li>
													<?php elseif ($getRating['rating'] > 4 && $getRating['rating'] < 5) : ?>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star-half-alt"></i></li>
													<?php elseif ($getRating['rating'] == 5) : ?>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													<?php endif; ?>
													&nbsp;
													<li class="review-total"> ( <?= $getRating['rating'] . ' / ' . $getRating['total']; ?> Reviews )</li>
												</ul>
											<?php endif; ?>
										</div>
										<h3><?= $product->nama_barang; ?></h3>
										<p><?= $product->deskripsi; ?></p>
										<div class="product-price">
											<span><?= 'Rp. ' . number_format($product->harga, 0, ',', '.'); ?></span>
										</div>
										<div class="ltn__product-details-menu-2">
											<ul>
												<li>
													<div class="cart-plus-minus">
														<input type="text" value="1" name="qtybutton" class="cart-plus-minus-box" id="<?= 'qty_' . $product->id; ?>">
													</div>
												</li>
												<li>
													<a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" data-toggle="modal" onclick="addToCart(`<?= $product->id; ?>`, <?= $product->stok; ?>, 'cek')">
														<i class="fas fa-shopping-cart"></i>
														<span>ADD TO CART</span>
													</a>
												</li>
											</ul>
										</div>
										<hr>
										<div class="ltn__social-media">
											<ul>
												<li>Stok <?= $product->stok; ?></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!-- MODAL AREA END -->

<!-- MODAL AREA START (Add To Cart Modal) -->
<?php foreach ($products as $product) : ?>
	<div class="modal fade" id="<?= 'add_to_cart_modal_' . $product->id; ?>" tabindex="-1">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="ltn__quick-view-modal-inner">
						<div class="modal-product-item">
							<div class="row">
								<div class="col-12">
									<div class="modal-product-info">
										<h5><a href="product-details.html"><?= $product->nama_barang; ?></a></h5>
										<p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to your Cart</p>
										<div class="btn-wrapper">
											<a href="<?= base_url('cart'); ?>" class="theme-btn-1 btn btn-effect-1">View Cart</a>
											<a href="<?= base_url('checkout'); ?>" class="theme-btn-2 btn btn-effect-2">Checkout</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!-- MODAL AREA END -->

<script>
	function addToCart(id, stok, qty) {
		if (qty == 'cek') {
			qty = $(`#qty_${id}`).val();

			if (qty == 0) {
				toastr.warning('Quantity cannot be empty');

				return 0;
			} else if (qty > stok) {
				toastr.warning('Quantity must not exceed stock');

				return 0;
			}
		} else {
			qty = null;
		}

		let dataJson = {
			idBarang: id,
			qty,
			stok
		}

		$.ajax({
			url: '<?= base_url('addToCart'); ?>',
			type: 'get',
			dataType: 'json',
			data: dataJson,
			success: function(result) {
				if (result.status == 'gagal') {
					toastr.error(result.msg);
				} else {
					$(`#add_to_cart_modal_${id}`).modal('toggle');
				}
			}
		});
	}
</script>