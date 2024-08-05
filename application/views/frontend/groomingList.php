<style>
	.tombol-upload {
		background-color: green;
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

	.tombol-progres {
		background-color: skyblue;
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

	.tombol-detail {
		background-color: blue;
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

	.tombol-view {
		background-color: yellow;
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

	.tombol-view-danger {
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
</style>
<!-- Cart Start -->
<div class="container-fluid pt-5">
	<div class="row">
		<div class="col-xl-12 text-center">
			<h2>List Grooming</h2>
		</div>
	</div>
	<div class="row px-xl-5">
		<div class="col-lg-12 table-responsive mb-5">
			<table class="table table-bordered text-center mb-0">
				<thead class="bg-secondary text-dark">
					<tr>
						<th>Nama Paket</th>
						<th>Harga</th>
						<th>Jenis Kucing</th>
						<th>Foto</th>
						<th>Deskripsi</th>
						<th>Ongkir</th>
						<th>Catatan</th>
						<th>Alamat</th>
						<th>Total Harga</th>
						<th>Tanggal Grooming</th>
						<th>Status</th>
						<th>Progres</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($grooming as $order) : ?>
						<tr>
							<td><?= $order->namaPaket; ?></td>
							<td><?= 'Rp. ' . number_format($order->harga, 0, ',', '.'); ?></td>
							<td><?= $order->jenis; ?></td>
							<td>
								<a href="<?= base_url('upload/gambar/' . $order->foto); ?>" target="photo">
									<img src="<?= base_url('upload/gambar/' . $order->foto); ?>" alt="Photo" class="img-thumbnail" width="180">
								</a>
							</td>
							<td><?= $order->deskripsi; ?></td>
							<td>
								<?php if ($order->mulai == 2 || $order->selesai == 2) : ?>
									<?= $order->kecamatan . ' - Rp. ' . number_format($order->ongkir, 0, ',', '.'); ?>
								<?php else : ?>
									-
								<?php endif; ?>
							</td>
							<td>
								<p><?= ($order->mulai == 1) ? 'Di antar sendiri' : 'Di jemput pihak petshop'; ?></p>
								<p><?= ($order->selesai == 1) ? 'Di ambil sendiri' : 'Di antar pihak petshop'; ?></p>
							</td>
							<td>
								<a href="<?= $order->link_maps; ?>" class="text-dark" target="gmaps"><?= $order->alamat; ?></a>
							</td>
							<td><?= 'Rp. ' . number_format($order->totalBiaya, 0, ',', '.'); ?></td>
							<td><?= date('d M Y - H:i', strtotime($order->tanggal . ' ' . $order->jam)); ?></td>
							<td>
								<?php if ($order->statusPembayaran == 0) : ?>
									<span class="btn btn-sm btn-warning">Menunggu Konfirmasi Pembayaran</span>
								<?php elseif ($order->statusPembayaran == 1) : ?>
									<span class="btn btn-sm btn-success">Sukses</span>
								<?php elseif ($order->statusPembayaran == 2) : ?>
									<span class="btn btn-sm btn-danger">Cancel</span>
								<?php endif; ?>
							</td>
							<td>
								<?php if ($order->progres == 0) : ?>
									<span class="btn btn-sm btn-warning">Menunggu</span>
								<?php elseif ($order->progres == 1) : ?>
									<span class="btn btn-sm btn-success">Selesai</span>
								<?php elseif ($order->progres == 2) : ?>
									<span class="btn btn-sm btn-primary">Di Proses</span>
								<?php endif; ?>
							</td>
							<td class="align-middle">
								<div class="btn-group">
									<?php if ($order->statusPembayaran == 0) : ?>
										<button type="button" class="tombol-upload upload_btn" data-toggle="modal" title="Upload transfer invoice" data-target="#uploadBerkas" data-id="<?= $order->id; ?>"><i class="fa fa-upload"></i></button>
									<?php endif; ?>
									<?php if ($order->bukti != null) : ?>
										<button type="button" class="tombol-view view_btn" data-toggle="modal" title="View transfer invoice" data-target="#viewFile" data-file="<?= $order->bukti; ?>"><i class="fa fa-eye"></i></button>
									<?php endif; ?>
									<?php if ($order->statusPembayaran != 2) : ?>
										<a href="<?= base_url('frontend/cancelGrooming/' . $order->id); ?>" class="btn-danger tombol-view-danger" title="Batalkan" onclick="return confirm('Batalkan booking grooming?')"><i class="fa fa-times"></i></a>
									<?php endif; ?>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Cart End -->

<!-- modal upload berkas -->
<div class="modal fade" id="uploadBerkas" tabindex="-1" role="dialog" aria-labelledby="uploadBerkas" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload transfer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('grooming/upload'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<input type="hidden" name="id" id="id">
							<div class="form-group">
								<label>File</label>
								<input type="file" class="form-control" name="gambar" accept=".jpeg, .jpg, .png">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- modal view file -->
<div class="modal fade" id="viewFile" tabindex="-1" role="dialog" aria-labelledby="viewFile" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Lihat bukti transfer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Gambr</label>
							<br>
							<img src="" alt="Picture invoice" class="img-thumbnail" width="100%" id="image-file">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	let upload_btn = $('.upload_btn');

	$(upload_btn).each(function(i) {
		$(upload_btn[i]).click(function() {
			let id = $(this).data('id');

			$('#id').val(id);
		})
	});

	let view_btn = $('.view_btn');

	$(view_btn).each(function(i) {
		$(view_btn[i]).click(function() {
			let file = $(this).data('file');

			$("#image-file").attr("src", `<?= base_url('upload/bukti/'); ?>${file}`);
		});
	});
</script>