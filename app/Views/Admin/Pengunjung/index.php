<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <!-- Canvas Statistik -->
        <div class="card shadow mb-12">
            <div class="card-header py-3 bg-primary d-flex flex-row align-items-center justify-content-between">
                <h12 class="m-0 font-weight-bold text-white">Statistik Pengunjung Tahun <?= date('Y') ?></h12>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-1200 text-white"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Tahun <?= date('Y') ?></div>
                        <div class="dropdown-divider"></div>
                        <?php for ($a = 0; $a < 12; $a++) : ?>
                            <div data-toggle="modal" data-target="#<?= $bulan[$a] ?>" class="dropdown-item"><?= strtoupper($bulan[$a]) ?></div>
                        <?php endfor; ?>
                        <div class="dropdown-divider"></div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <!-- data pengunjung -->
                <div class="months" data-month="<?= $pengunjung['januari'] ?>"></div>
                <div class="months" data-month="<?= $pengunjung['februari'] ?>"></div>
                <div class="months" data-month="<?= $pengunjung['maret'] ?>"></div>
                <div class="months" data-month="<?= $pengunjung['april'] ?>"></div>
                <div class="months" data-month="<?= $pengunjung['mei'] ?>"></div>
                <div class="months" data-month="<?= $pengunjung['juni'] ?>"></div>
                <div class="months" data-month="<?= $pengunjung['juli'] ?>"></div>
                <div class="months" data-month="<?= $pengunjung['agustus'] ?>"></div>
                <div class="months" data-month="<?= $pengunjung['september'] ?>"></div>
                <div class="months" data-month="<?= $pengunjung['oktober'] ?>"></div>
                <div class="months" data-month="<?= $pengunjung['november'] ?>"></div>
                <div class="months" data-month="<?= $pengunjung['desember'] ?>"></div>
                <!-- end data pengunjung -->
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>

        </div>
        <!-- end Canvas Statistik -->

        <!-- Table Rekap -->
        <div class="card shadow-lg mt-5">
            <div class="card-header bg-primary text-white">
                <h5>Rekap Data Pengunjung</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Tahun</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">Januari</th>
                                <th class="text-center">Februari</th>
                                <th class="text-center">Maret</th>
                                <th class="text-center">April</th>
                                <th class="text-center">Mei</th>
                                <th class="text-center">Juni</th>
                                <th class="text-center">Juli</th>
                                <th class="text-center">Agustus</th>
                                <th class="text-center">September</th>
                                <th class="text-center">Oktober</th>
                                <th class="text-center">November</th>
                                <th class="text-center">Desember</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rekap as $r) : ?>
                                <tr>
                                    <td><?= $r['tahun'] ?></td>
                                    <td>
                                        <a target="_blank" href="<?= base_url('admin/laporan/laporan/index/' . $r['tahun'] . '') ?>" class="text-center h3 text-danger"><i class="fa fa-file-pdf"></i></a>
                                    </td>
                                    <td><?= $r['januari'] ?></td>
                                    <td><?= $r['februari'] ?></td>
                                    <td><?= $r['maret'] ?></td>
                                    <td><?= $r['april'] ?></td>
                                    <td><?= $r['mei'] ?></td>
                                    <td><?= $r['juni'] ?></td>
                                    <td><?= $r['juli'] ?></td>
                                    <td><?= $r['agustus'] ?></td>
                                    <td><?= $r['september'] ?></td>
                                    <td><?= $r['oktober'] ?></td>
                                    <td><?= $r['november'] ?></td>
                                    <td><?= $r['desember'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end Table Rekap -->
        <!-- modal -->
        <?php for ($a = 0; $a < 12; $a++) : ?>
            <div class="modal fade" id="<?= $bulan[$a] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?= strtoupper($bulan[$a]) ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('admin/pengunjung/Data/add/' . $bulan[$a] . '') ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="text" class="form-control" name="jumlah" id="jumlah">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
        <!-- end Modal -->
    </div>
</div>
<?= $this->endSection() ?>