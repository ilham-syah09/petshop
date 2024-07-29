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
            <div class="row">
                <div class="col-sm-4 col-xl-4">
                    <div class="form-group">
                        <label for="by_tahun">Tahun</label>
                        <select class="js-select2 form-control" name="by_tahun" id="by_tahun">
                            <option value="">-- Pilih Tahun --</option>
                            <?php foreach ($tahun as $th) : ?>
                                <option value="<?= $th->tahun; ?>" <?= ($th->tahun == $th_ini) ? 'selected' : ''; ?>>
                                    <?= $th->tahun; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-4">
                    <div class="form-group">
                        <label for="by_bulan">Bulan</label>
                        <select class="js-select2 form-control" name="by_bulan" id="by_bulan">
                            <option value="">-- Pilih Bulan --</option>
                            <?php foreach (range(1, 12) as $bulan) : ?>
                                <option value="<?= $bulan; ?>" <?= ($bulan == $bln_ini) ? 'selected' : ''; ?>>
                                    <?= bulan($bulan); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" title="Download Rekap" onclick="window.open('<?= base_url('admin/laporan/printLapBrg?bln_ini=' . $bln_ini . '&th_ini=' . $th_ini); ?>')">
                                <i class="fa fa-download"></i>
                            </button>
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-center">No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th class="text-center">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($laporan as $data) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= tglIndo($data->createdAt); ?></td>
                                                <td><?= $data->nama_barang; ?></td>
                                                <td class="text-center"><?= $data->jumlah; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $('#by_tahun').change(function() {
        let tahun = $(this).find(':selected').val();

        if (tahun === '') {
            return 0;
        }

        document.location.href = `<?php echo base_url('admin/laporan/index/') ?>${tahun}`;
    });

    $('#by_bulan').change(function() {
        let tahun = $('#by_tahun').find(':selected').val();
        let bulan = $(this).find(':selected').val();

        if (bulan === '') {
            return 0;
        }

        document.location.href = `<?php echo base_url('admin/laporan/index/') ?>${tahun}/${bulan}`;
    });
</script>