<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?= $title; ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
						<li class="breadcrumb-item active"><?= $title; ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row mb-3">
				<div class="col-lg-4 col-md-12">
					<label>Tanggal</label>
					<input type="date" class="form-control" value="<?= $date; ?>" id="by_tanggal">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover" id="examples">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Nama Pembeli</th>
											<th>Nama Paket</th>
											<th>Harga Paket</th>
											<th>Jenis</th>
											<th>Foto</th>
											<th>Deskripsi</th>
											<th>Ongkir</th>
											<th>Bukti Pembayaran</th>
											<th>Status Pembayaran</th>
											<th>Total Biaya</th>
											<th>Metode Pembayaran</th>
											<th>Catatan</th>
											<th>Alamat</th>
											<th>Tanggal</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $total = 0;
										foreach ($grooming as $i => $gro) : ?>
											<?php $total += $gro->totalBiaya; ?>
											<tr>
												<td><?= $i + 1; ?></td>
												<td><?= $gro->name; ?></td>
												<td><?= $gro->namaPaket; ?></td>
												<td><?= 'Rp. ' . number_format($gro->harga, 0, ',', '.'); ?></td>
												<td><?= $gro->jenis; ?></td>
												<td>
													<a href="<?= base_url('upload/gambar/' . $gro->foto); ?>" target="photo">
														<img src="<?= base_url('upload/gambar/' . $gro->foto); ?>" alt="Photo" class="img-thumbnail" width="180">
													</a>
												</td>
												<td><?= $gro->deskripsi; ?></td>
												<td>
													<?php if ($gro->mulai == 2 || $gro->selesai == 2) : ?>
														<?= $gro->kecamatan . ' - Rp. ' . number_format($gro->ongkir, 0, ',', '.'); ?>
													<?php else : ?>
														-
													<?php endif; ?>
												</td>
												<td>
													<?php if ($gro->bukti != null) : ?>
														<a href="<?= base_url('upload/bukti/' . $gro->bukti); ?>" target="bukti_pembayaran">
															<img src="<?= base_url('upload/bukti/' . $gro->bukti); ?>" alt="<?= $gro->bukti; ?>" class="img-thumbnail" width="180">
														</a>
													<?php else : ?>
														-
													<?php endif; ?>
												</td>
												<td>
													<?php if ($gro->statusPembayaran == 0) : ?>
														<span class="badge badge-warning">Menunggu Pembayaran</span>
													<?php elseif ($gro->statusPembayaran == 1) : ?>
														<span class="badge badge-success">Lunas</span>
													<?php else : ?>
														<span class="badge badge-danger">Booking di Cancel</span>
													<?php endif; ?>
												</td>
												<td><?= 'Rp. ' . number_format($gro->totalBiaya, 0, ',', '.'); ?></td>
												<td>
													<?php if ($gro->metodePembayaran == 1) : ?>
														<span>QRIS</span>
													<?php elseif ($gro->metodePembayaran == 2) : ?>
														<span>Bank Transfer</span>
													<?php elseif ($gro->metodePembayaran == 3) : ?>
														<span>Cash on Delivery</span>
													<?php endif; ?>
												</td>
												<td>
													<p><?= ($gro->mulai == 1) ? 'Di antar sendiri' : 'Di jemput pihak petshop'; ?></p>
													<p><?= ($gro->selesai == 1) ? 'Di ambil sendiri' : 'Di antar pihak petshop'; ?></p>
												</td>
												<td>
													<a href="<?= $gro->link_maps; ?>" class="text-dark" target="gmaps"><?= $gro->alamat; ?></a>
												</td>
												<td><?= date('d M Y - H:i', strtotime($gro->tanggal . ' ' . $gro->jam)); ?></td>
												<td>
													<a href="#" class="badge badge-success statusPem_btn" data-toggle="modal" data-target="#statusPembayaranModal" data-id="<?= $gro->id; ?>" data-statuspembayaran="<?= $gro->statusPembayaran; ?>">Pembayaran</a>
													<a href="#" class="badge badge-info progresBtn" data-toggle="modal" data-target="#progres-modal" data-id="<?= $gro->id; ?>" data-progres="<?= $gro->progres; ?>">Progres</a>
													<a href="<?= base_url('admin/grooming/delete/' . $gro->id); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="badge badge-danger">Delete</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="7" class="text-center">Total pemasukan hari ini</td>
											<td colspan="2"><?= 'Rp. ' . number_format($total, 0, ',', '.'); ?></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal status pembayaran -->
<div class="modal fade" id="statusPembayaranModal" tabindex="-1" role="dialog" aria-labelledby="statusPembayaranModalTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Status Pembayaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/grooming/status'); ?>" method="POST">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="hidden" name="id" id="id">
								<label>Daftar Pesanan</label>
								<select name="statusPembayaran" id="statusPembayaran" class="form-control">
									<option value="0">Belum Bayar</option>
									<option value="1">Lunas</option>
									<option value="2">Cancel</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- modal progres -->
<div class="modal fade" id="progres-modal" tabindex="-1" role="dialog" aria-labelledby="progres-modalTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Progres Grooming</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/grooming/progres'); ?>" method="POST">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="hidden" name="id" id="id-2">
								<label>Status</label>
								<select name="progres" id="progres" class="form-control">
									<option value="0">Menunggu</option>
									<option value="2">Di Proses</option>
									<option value="1">Selesai</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$('#by_tanggal').change(function() {
		let tanggal = $(this).val();

		document.location.href = `<?php echo base_url('admin/grooming?tgl=') ?>${tanggal}`;
	});

	let statusPem_btn = $('.statusPem_btn');

	$(statusPem_btn).each(function(i) {
		$(statusPem_btn[i]).click(function() {
			let id = $(this).data('id');
			let statusPembayaran = $(this).data('statuspembayaran');

			$('#id').val(id);
			$('#statusPembayaran').val(statusPembayaran);
		});
	});

	let progresBtn = $('.progresBtn');

	$(progresBtn).each(function(i) {
		$(progresBtn[i]).click(function() {
			let id = $(this).data('id');
			let progres = $(this).data('progres');

			$('#id-2').val(id);
			$('#progres').val(progres);
		});
	});
</script>