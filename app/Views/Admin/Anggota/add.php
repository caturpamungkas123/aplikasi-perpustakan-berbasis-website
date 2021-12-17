<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <form action="<?= base_url('admin/anggota/data/save') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="nama">Nama Anggota Baru</label>
                        <input id="nama" name="nama" type="text" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input style="text-transform: uppercase;" type="text" name="kelas" id="kelas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <select name="prodi" id="prodi" class="form-control" required>
                            <option>-----</option>
                            <?php foreach ($prodi as $p) : ?>
                                <option value="<?= $p['nama_prodi'] ?>"><?= $p['nama_prodi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ttl">Tempat Tanggal Lahir</label>
                        <input type="text" name="ttl" id="ttl" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nomer">Nomer Kartu Pelajar</label>
                        <input type="text" name="nomer_pelajar" class="form-control" id="nomer">
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="<?= base_url('img/upload-icon.png') ?>" class="img-thumbnail" width="260" id="imageBuku" height="260" alt="Avatar">
                    <input type="file" name="foto" id="fileBuku" style="display: none;">
                </div>
            </div>
            <div class="mt-3">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>