<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>Invoice Order | Petshop</title>

	<!-- Invoice styling -->
	<style>
		body {
			font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial,
				sans-serif;
			text-align: center;
			color: #777;
		}

		body h1 {
			font-weight: 300;
			margin-bottom: 0px;
			padding-bottom: 0px;
			color: #000;
		}

		body h3 {
			font-weight: 300;
			margin-top: 10px;
			margin-bottom: 20px;
			font-style: italic;
			color: #555;
		}

		body a {
			color: #06f;
		}

		.invoice-box {
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			font-size: 16px;
			line-height: 24px;
			font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial,
				sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
			border-collapse: collapse;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}
	</style>
</head>

<body>
	<h3>
		Terima kasih telah membeli produk kami, ini adalah tagihan pembayaran Anda.
	</h3>

	<div class="invoice-box">
		<table>
			<tr class="top">
				<td colspan="2">
					<table>
						<tr>
							<td class="title">
								<div style="border-bottom: 1px solid #eee">
									<a href="" style="
                                                font-size: 1.1em;
                                                color: #00466a;
                                                text-decoration: none;
                                                font-weight: 600;
                                            ">Petshop</a>
								</div>
							</td>
							<td>
								Invoice #: <?= $pesanan[0]->idKhusus; ?><br />
								Created: <?= $pesanan[0]->createdAt; ?><br />
							</td>
							<td><button onclick="window.print()">Print</button></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table>
			<tr class="heading">
				<td>Personal Detail</td>
				<td></td>
			</tr>

			<tr class="item">
				<td>Full Name</td>
				<td><?= $this->dt_user->name; ?></td>
			</tr>
			<tr class="details">
				<td>Nomor HandPhone</td>
				<td><?= $this->dt_user->noHp; ?></td>
			</tr>
		</table>
		<table>
			<tr class="heading">
				<td>Payment Method</td>
				<?php if ($pesanan[0]->metodePembayaran == 1) {
					$p = 'QRIS';
				} elseif ($pesanan[0]->metodePembayaran == 2) {
					$p = 'Bank Transfer';
				} else {
					$p = 'Cash on Delivery';
				}
				?>
				<td><?= $p; ?></td>
			</tr>
		</table>
		<table>
			<?php if ($pesanan[0]->metodePembayaran == 1) : ?>
				<tr>
					<td>Barcode</td>
					<td>
						<img width="200" src="<?= base_url('upload/gambar/sample-qris.png'); ?>" alt="Code QR">
					</td>
				</tr>
			<?php elseif ($pesanan[0]->metodePembayaran == 2) : ?>
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
			<?php endif; ?>
		</table>
		<br />
		<table>
			<tr class="heading">
				<td>#</td>
				<td>Product Menu</td>
				<td>Price</td>
				<td>Sum</td>
				<td>Sub Total</td>
			</tr>
			<?php $totalHarga = 0;
			$finalHarga; ?>
			<?php foreach ($pesanan as $i => $psn) : ?>
				<?php $totalHarga += ($psn->harga * $psn->total); ?>
				<tr>
					<td><?= $i + 1; ?></td>
					<td><?= $psn->nama_barang; ?></td>
					<td><?= 'Rp. ' . number_format($psn->harga, 0, ',', '.'); ?></td>
					<td><?= $psn->total; ?></td>
					<td align="right"><?= 'Rp. ' . number_format(($psn->harga * $psn->total), 0, ',', '.'); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php $finalHarga = 'Rp. ' . number_format(($totalHarga), 0, ',', '.');; ?>

			<tr class="heading">
				<td>Total</td>
				<td><?= count($pesanan); ?></td>
				<td colspan="3" align="right"><?= $finalHarga; ?></td>
			</tr>
		</table>
		<br />
		<table>
			<tr class="heading">
				<td>Payment Status</td>
				<td>
					<?php if ($pesanan[0]->statusPembayaran == 0) : ?>
						<?= ($pesanan[0]->buktiPembayaran != null) ? 'Menunggu Konfirmasi' : 'Belum Dibayarkan'; ?>
					<?php else : ?>
						Lunas
					<?php endif; ?>
				</td>
			</tr>
		</table>
		<br />
		<table>
			<tr class="information">
				<td colspan="2">
					<table>
						<tr>
							<td>
								Jl. Kita Solusi no. 1<br />
								Tegal, Jawa Tengah.
							</td>

							<td>
								Petshop Corp.<br />
								admin@petshop.com
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>