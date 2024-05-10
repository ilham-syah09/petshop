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
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover" id="example">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Nama</th>
											<th>Email</th>
											<th>Subject</th>
											<th>Message</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
										foreach ($pesan as $psn) : ?>
											<tr>
												<td class="text-center"><?= $i++; ?></td>
												<td><?= $psn->name; ?></td>
												<td><?= $psn->email; ?></td>
												<td><?= $psn->subject; ?></td>
												<td><?= $psn->message; ?></td>
												<td>
													<a href="<?= base_url('admin/pesan/delete/' . $psn->id); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="badge badge-danger">Delete</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
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