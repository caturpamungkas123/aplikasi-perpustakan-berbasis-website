<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4 col-sm-12">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Dipinjam</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $bukuPinjam ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 col-sm-12">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Rusak</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $bukuRusak ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4 col-sm-12">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Hilang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $bukuHilang ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4 col-sm-12">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Hutang Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hutangBuku ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cars -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">STATISTIK PENGUNJUNG TAHUN <?= date('Y') ?></h6>
            </div>
            <!-- Card Body -->
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
    </div>
</div>
<?= $this->endSection() ?>