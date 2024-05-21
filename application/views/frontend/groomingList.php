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
						<th>Package Name</th>
						<th>Price</th>
						<th>Pet Type</th>
						<th>Photo</th>
						<th>Description</th>
						<th>Shipping</th>
						<th>Note</th>
						<th>Address</th>
						<th>Total Price</th>
						<th>Grooming Date</th>
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
								<?php if ($order->mulai == 1 || $order->selesai == 1) : ?>
									<?= $order->kecamatan . ' - Rp. ' . number_format($order->ongkir, 0, ',', '.'); ?>
								<?php else : ?>
									-
								<?php endif; ?>
							</td>
							<td>
								<p><?= ($order->mulai == 1) ? 'Self Delivered' : 'Taken by Officers'; ?></p>
								<p><?= ($order->selesai == 1) ? 'Taken by Myself' : 'Delivered by The Officer'; ?></p>
							</td>
							<td>
								<a href="<?= $order->link_maps; ?>" class="text-dark" target="gmaps"><?= $order->alamat; ?></a>
							</td>
							<td><?= 'Rp. ' . number_format($order->totalBiaya, 0, ',', '.'); ?></td>
							<td><?= date('d M Y - H:i:s', strtotime($order->createdAt)); ?></td>
							<td class="align-middle">
								<div class="btn-group">
									<?php if ($order->statusPembayaran == 0) : ?>
										<button type="button" class="tombol-upload upload_btn" data-toggle="modal" title="Upload transfer invoice" data-target="#uploadBerkas" data-id="<?= $order->id; ?>"><i class="fa fa-upload"></i></button>
									<?php endif; ?>
									<?php if ($order->bukti != null) : ?>
										<button type="button" class="tombol-view view_btn" data-toggle="modal" title="View transfer invoice" data-target="#viewFile" data-file="<?= $order->bukti; ?>"><i class="fa fa-eye"></i></button>
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
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
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
				<h5 class="modal-title">View transfer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Picture</label>
							<br>
							<img src="" alt="Picture invoice" class="img-thumbnail" width="100%" id="image-file">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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