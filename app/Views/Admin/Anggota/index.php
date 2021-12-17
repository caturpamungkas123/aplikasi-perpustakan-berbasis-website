<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<!-- qrcode -->
<div class="card mb-4">
    <div class="card-header bg-primary">
        <div class="row">
            <h5 class="text-white">Scan QR COde</h5>
            <div class="ml-auto">
                <div class="btn btn-success" id="startButton"><i class="fas fa-qrcode"></i> Scan</div>
                <div class="btn btn-warning" id="resetButton">Reset</div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- scan qr -->
            <div class="col-3">
                <div>
                    <video id="video" width="250" height="250" poster="<?= base_url('img/upload-icon.png') ?>" style="border: 2px solid grey"></video>
                </div>

                <div id="sourceSelectPanel" style="display: none">
                    <label for="sourceSelect">Change video source:</label>
                    <select id="sourceSelect" style="max-width: 400px"></select>
                </div>
            </div>
            <!-- end scan qr -->

            <!-- data scan -->
            <div class="col-9">
                <div class="card  border-left-success">
                    <div class="row no-gutters">
                        <div class="col-4">
                            <img src="<?= base_url() ?>/img/anggota/profil.svg" width="250px" height="250px" id="qr-image" class="card-img" alt="image">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h3 class="card-title text-center" id="qr-nama"></h3>
                                <table>
                                    <tr>
                                        <td>
                                            <h5>Kartu Pelajar</h5>
                                        </td>
                                        <td>
                                            <h5>: <span id="qr-kartu-pelajar"></span></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Tempat Tanggal Lahir</h5>
                                        </td>
                                        <td>
                                            <h5>: <span id="qr-tempat-tinggal"></span></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Kelas</h5>
                                        </td>
                                        <td>
                                            <h5>: <span id="qr-kelas"></span></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Prodi</h5>
                                        </td>
                                        <td>
                                            <h5>: <span id="qr-prodi"></span></h5>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end data scan -->
        </div>
    </div>
</div>
<!-- endqrcode -->


<!-- modal edit -->
<?php foreach ($members as $m) : ?>
    <div class="modal fade" id="update-<?= $m['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Data Anggota <?= $m['nama'] ?></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/anggota/data/update/' . $m['id'] . '') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" value="<?= $m['nama'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nomer">Nomer Pelajar</label>
                                    <input type="text" class="form-control" name="nomer_pelajar" value="<?= $m['nomer_pelajar'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" name="kelas" value="<?= $m['kelas'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <img id="imageBuku" class="img-thumbnail" width="240" height="300" src="<?= base_url('img/Anggota/' . $m['foto'] . '') ?>" alt="Avatar">
                                <input id="fileBuku" type="file" name="foto" style="display: none;">
                                <input type="hidden" name="foto_lama" value="<?= $m['foto'] ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end modal edit -->

<!-- tanle anggota -->
<div class="card shadow mb-4 ">
    <div class="card-header py-3 bg-primary">
        <h4 class="font-weight-bold text-white">Tabel Anggota</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">QR Code</th>
                        <th class="text-center">Nama Lengkap</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Nomer Pelajar</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($members as $member) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>
                                <img src="<?= base_url() ?>/img/anggota/qrcode/<?= $member['qrcode'] ?>.png" width="70" height="70" alt="Foto">
                            </td>
                            <td><?= $member['nama'] ?></td>
                            <td><?= $member['kelas'] ?></td>
                            <td><?= $member['nomer_pelajar'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/anggota/data/download/' . $member['id'] . '') ?>" class="btn btn-primary btn-circle"><i class="fas fa-qrcode"></i></a>
                                <div data-toggle="modal" data-target="#update-<?= $member['id'] ?>" class="btn btn-success btn-md btn-circle"><i class="fas fa-pencil-alt"></i></div>
                                <a href="<?= base_url('admin/anggota/data/delete/' . $member['id'] . '') ?>" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>