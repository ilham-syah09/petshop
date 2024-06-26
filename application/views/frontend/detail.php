<div class="ltn__shop-details-area pb-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<div class="ltn__shop-details-inner mb-60">
					<div class="row">
						<div class="col-md-6">
							<div class="ltn__shop-details-img-gallery">
								<div class="ltn__shop-details-large-img">
									<?php foreach ($gambar as $i => $g) : ?>
										<div class="single-large-img">
											<a href="<?= base_url('upload/gambar/' . $g->gambar); ?>" data-rel="lightcase:myCollection">
												<img src="<?= base_url('upload/gambar/' . $g->gambar); ?>" alt="<?= $product->nama_barang; ?>">
											</a>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="ltn__shop-details-small-img slick-arrow-2">
									<?php foreach ($gambar as $i => $g) : ?>
										<div class="single-small-img">
											<img src="<?= base_url('upload/gambar/' . $g->gambar); ?>" alt="<?= $product->nama_barang; ?>">
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="modal-product-info shop-details-info pl-0">
								<div class="product-ratting">
									<ul>
										<?php if ($rating['total'] != 0) : ?>
											<ul>
												<?php if ($rating['rating'] < 1) : ?>
													<li><i class="fas fa-star-half-alt"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
												<?php elseif ($rating['rating'] == 1) : ?>
													<li><i class="fas fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
												<?php elseif ($rating['rating'] > 1 && $rating['rating'] < 2) : ?>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star-half-alt"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
												<?php elseif ($rating['rating'] == 2) : ?>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
												<?php elseif ($rating['rating'] > 2 && $rating['rating'] < 3) : ?>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star-half-alt"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
												<?php elseif ($rating['rating'] == 3) : ?>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
												<?php elseif ($rating['rating'] > 3 && $rating['rating'] < 4) : ?>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star-half-alt"></i></li>
													<li><i class="far fa-star"></i></li>
												<?php elseif ($rating['rating'] == 4) : ?>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
												<?php elseif ($rating['rating'] > 4 && $rating['rating'] < 5) : ?>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star-half-alt"></i></li>
												<?php elseif ($rating['rating'] == 5) : ?>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
												<?php endif; ?>
												&nbsp;
												<li class="review-total"> ( <?= $rating['rating'] . ' / ' . $rating['total']; ?> Reviews )</li>
											</ul>
										<?php endif; ?>
									</ul>
								</div>
								<h3><?= $product->nama_barang; ?></h3>
								<div class="product-price">
									<span><?= 'Rp. ' . number_format($product->harga, 0, ',', '.'); ?></span>
								</div>
								<div class="ltn__product-details-menu-2">
									<ul>
										<li>
											<div class="cart-plus-minus">
												<input type="text" value="1" name="qtybutton" class="cart-plus-minus-box" id="qty">
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
				<!-- Shop Tab Start -->
				<div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
					<div class="ltn__shop-details-tab-menu">
						<div class="nav">
							<a class="active show" data-toggle="tab" href="#liton_tab_details_1_1">Description</a>
							<a data-toggle="tab" href="#liton_tab_details_1_2" class="">Reviews</a>
						</div>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade active show" id="liton_tab_details_1_1">
							<div class="ltn__shop-details-tab-content-inner">
								<p><?= $product->deskripsi; ?></p>
							</div>
						</div>
						<div class="tab-pane fade" id="liton_tab_details_1_2">
							<div class="ltn__shop-details-tab-content-inner">
								<h4 class="title-2">Customer Reviews</h4>
								<div class="product-ratting">
									<?php if ($rating['total'] != 0) : ?>
										<ul>
											<?php if ($rating['rating'] < 1) : ?>
												<li><i class="fas fa-star-half-alt"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
											<?php elseif ($rating['rating'] == 1) : ?>
												<li><i class="fas fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
											<?php elseif ($rating['rating'] > 1 && $rating['rating'] < 2) : ?>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star-half-alt"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
											<?php elseif ($rating['rating'] == 2) : ?>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
											<?php elseif ($rating['rating'] > 2 && $rating['rating'] < 3) : ?>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star-half-alt"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
											<?php elseif ($rating['rating'] == 3) : ?>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
											<?php elseif ($rating['rating'] > 3 && $rating['rating'] < 4) : ?>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star-half-alt"></i></li>
												<li><i class="far fa-star"></i></li>
											<?php elseif ($rating['rating'] == 4) : ?>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="far fa-star"></i></li>
											<?php elseif ($rating['rating'] > 4 && $rating['rating'] < 5) : ?>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star-half-alt"></i></li>
											<?php elseif ($rating['rating'] == 5) : ?>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
											<?php endif; ?>
											&nbsp;
											<li class="review-total"> ( <?= $rating['rating'] . ' / ' . $rating['total']; ?> Reviews )</li>
										</ul>
									<?php endif; ?>
								</div>
								<hr>
								<!-- comment-area -->
								<div class="ltn__comment-area mb-30">
									<div class="ltn__comment-inner">
										<ul>
											<?php foreach ($review as $rev) : ?>
												<li>
													<div class="ltn__comment-item clearfix">
														<div class="ltn__commenter-img">
															<img src="<?= base_url('upload/profile/' . $rev->image); ?>" alt="<?= $rev->name; ?>">
														</div>
														<div class="ltn__commenter-comment">
															<h6><a href="javascript:void(0)"><?= $rev->name; ?></a></h6>
															<div class="product-ratting">
																<ul>
																	<?php if ($rev->rating == 1) : ?>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="far fa-star"></i></li>
																		<li><i class="far fa-star"></i></li>
																		<li><i class="far fa-star"></i></li>
																		<li><i class="far fa-star"></i></li>
																	<?php elseif ($rev->rating == 2) : ?>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="far fa-star"></i></li>
																		<li><i class="far fa-star"></i></li>
																		<li><i class="far fa-star"></i></li>
																	<?php elseif ($rev->rating == 3) : ?>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="far fa-star"></i></li>
																		<li><i class="far fa-star"></i></li>
																	<?php elseif ($rev->rating == 4) : ?>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="far fa-star"></i></li>
																	<?php elseif ($rev->rating == 5) : ?>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																	<?php endif; ?>
																</ul>
															</div>
															<p><?= $rev->review; ?></p>
															<span class="ltn__comment-reply-btn"><?= date('d M Y', strtotime($rev->createdAt)); ?></span>
														</div>
													</div>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
								<!-- comment-reply -->
								<div class="ltn__comment-reply-area ltn__form-box mb-30">
									<h4 class="title-2">Add a Review</h4>
									<div class="mb-30">
										<div class="add-a-review">
											<h6>Your Ratings:</h6>
											<div class="product-ratting">
												<ul>
													<li><i class="far fa-star" id="star-1"></i></li>
													<li><i class="far fa-star" id="star-2"></i></li>
													<li><i class="far fa-star" id="star-3"></i></li>
													<li><i class="far fa-star" id="star-4"></i></li>
													<li><i class="far fa-star" id="star-5"></i></li>
												</ul>
											</div>
										</div>
									</div>
									<form action="<?= base_url('review'); ?>" method="POST">
										<input type="hidden" name="idBarang" value="<?= $product->id; ?>">
										<input type="hidden" name="rating" id="rating" value="0">
										<div class="input-item input-item-textarea ltn__custom-icon">
											<textarea name="review" placeholder="Type your comments...."></textarea>
										</div>
										<div class="input-item input-item-name ltn__custom-icon">
											<input type="text" name="name" id="name" value="<?= ($this->dt_user) ? $this->dt_user->name : ''; ?>" readonly required>
										</div>
										<div class="input-item input-item-email ltn__custom-icon">
											<input type="email" name="email" id="email" value="<?= ($this->dt_user) ? $this->dt_user->email : ''; ?>" readonly>
										</div>
										<div class="btn-wrapper">
											<button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Shop Tab End -->
			</div>
			<div class="col-lg-4">
				<aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
					<!-- Top Rated Product Widget -->
					<div class="widget ltn__top-rated-product-widget">
						<h4 class="ltn__widget-title ltn__widget-title-border">Most Popular Products</h4>
						<ul>
							<?php foreach ($productsPopuler as $prod) : ?>
								<li>
									<div class="top-rated-product-item clearfix">
										<div class="top-rated-product-img">
											<a href="<?= base_url('detail/' . $prod->id); ?>">
												<img src="<?= base_url('upload/gambar/' . gambar($prod->id)); ?>" alt="<?= $prod->nama_barang; ?>">
											</a>
										</div>
										<div class="top-rated-product-info">
											<div class="product-ratting">
												<?php $getRating = getRating($prod->id); ?>
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
											<h6><a href="<?= base_url('detail/' . $prod->id); ?>"><?= $prod->nama_barang; ?></a></h6>
											<div class="product-price">
												<span><?= 'Rp. ' . number_format($prod->harga, 0, ',', '.'); ?></span>
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

<div class="ltn__product-slider-area ltn__product-gutter pb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title-area ltn__section-title-2">
					<h6 class="section-subtitle ltn__secondary-color"><?= $kategori_sekarang->kategori; ?></h6>
					<h1 class="section-title">Related Products<span>.</span></h1>
				</div>
			</div>
		</div>
		<div class="row ltn__related-product-slider-one-active slick-arrow-1">
			<!-- ltn__product-item -->
			<?php foreach ($products as $prod) : ?>
				<div class="col-lg-12">
					<div class="ltn__product-item ltn__product-item-3 text-center">
						<div class="product-img">
							<a href="<?= base_url('detail/' . $prod->id); ?>"><img src="<?= base_url('upload/gambar/' . gambar($prod->id)); ?>" alt="<?= $prod->nama_barang; ?>"></a>
							<div class="product-hover-action">
								<ul>
									<li>
										<a href="#" title="Quick View" data-toggle="modal" data-target="<?= '#quick_view_modal_' . $prod->id; ?>">
											<i class="far fa-eye"></i>
										</a>
									</li>
									<?php if ($prod->stok > 0) : ?>
										<li>
											<a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
												<i class="fas fa-shopping-cart"></i>
											</a>
										</li>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div class="product-info">
							<div class="product-ratting">
								<?php $getRating = getRating($prod->id); ?>
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
							<h2 class="product-title"><a href="<?= base_url('detail/' . $prod->id); ?>"><?= $prod->nama_barang; ?></a></h2>
							<div class="product-price">
								<span><?= 'Rp. ' . number_format($prod->harga, 0, ',', '.'); ?></span>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<!-- MODAL AREA START (Add To Cart Modal) -->
<div class="modal fade" id="add_to_cart_modal" tabindex="-1">
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
<!-- MODAL AREA END -->

<script>
	function addToCart(id, stok, qty) {
		if (qty == 'cek') {
			qty = $(`#qty`).val();

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
					$(`#add_to_cart_modal`).modal('toggle');
				}
			}
		});
	}

	$('#star-1').click(function() {
		$(this).removeClass('far');
		$(this).addClass('fas');

		$('#star-2').removeClass('fas');
		$('#star-2').addClass('far');

		$('#star-3').removeClass('fas');
		$('#star-3').addClass('far');

		$('#star-4').removeClass('fas');
		$('#star-4').addClass('far');

		$('#star-5').removeClass('fas');
		$('#star-5').addClass('far');

		$('#rating').val(1);
	});

	$('#star-2').click(function() {
		$('#star-1').removeClass('far');
		$('#star-1').addClass('fas');

		$(this).removeClass('far');
		$(this).addClass('fas');

		$('#star-3').removeClass('fas');
		$('#star-3').addClass('far');

		$('#star-4').removeClass('fas');
		$('#star-4').addClass('far');

		$('#star-5').removeClass('fas');
		$('#star-5').addClass('far');

		$('#rating').val(2);
	});

	$('#star-3').click(function() {
		$('#star-1').removeClass('far');
		$('#star-1').addClass('fas');

		$('#star-2').removeClass('far');
		$('#star-2').addClass('fas');

		$(this).removeClass('far');
		$(this).addClass('fas');

		$('#star-4').removeClass('fas');
		$('#star-4').addClass('far');

		$('#star-5').removeClass('fas');
		$('#star-5').addClass('far');

		$('#rating').val(3);
	});

	$('#star-4').click(function() {
		$('#star-1').removeClass('far');
		$('#star-1').addClass('fas');

		$('#star-2').removeClass('far');
		$('#star-2').addClass('fas');

		$('#star-3').removeClass('far');
		$('#star-3').addClass('fas');

		$(this).removeClass('far');
		$(this).addClass('fas');

		$('#star-5').removeClass('fas');
		$('#star-5').addClass('far');

		$('#rating').val(4);
	});

	$('#star-5').click(function() {
		$('#star-1').removeClass('far');
		$('#star-1').addClass('fas');

		$('#star-2').removeClass('far');
		$('#star-2').addClass('fas');

		$('#star-3').removeClass('far');
		$('#star-3').addClass('fas');

		$('#star-4').removeClass('far');
		$('#star-4').addClass('fas');

		$(this).removeClass('far');
		$(this).addClass('fas');

		$('#rating').val(5);
	});
</script>