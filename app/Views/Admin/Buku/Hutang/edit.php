<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <form action="<?= base_url('admin/buku/HutangBuku/update/' . $data['id'] . '') ?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama__buku">Nama Buku</label>
                        <input type="text" name="nama_buku" value="<?= $data['nama_buku'] ?>" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama__siswa">Nama Siswa</label>
                        <input type="text" name="nama_siswa" value="<?= $data['nama_siswa'] ?>" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kelas__siswa">Kelas</label>
                        <input type="text" class="form-control" name="kelas" value="<?= $data['kelas'] ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="" id="jumlah" name="jumlah" value="<?= $data['jumlah'] ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tempo">Tempo</label>
                        <input type="date" class="form-control" value="<?= $data['tempo'] ?>" name="tempo" required>
                    </div>
                </div>
            </div>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>