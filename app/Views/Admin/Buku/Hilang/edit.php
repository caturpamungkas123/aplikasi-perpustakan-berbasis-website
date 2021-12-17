<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <form action="<?= base_url('admin/buku/BukuHilang/update/' . $book['id'] . '') ?>" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama__buku">Nama Buku</label>
                        <input type="text" name="nama_buku" value="<?= $book['nama_buku'] ?>" required class="form-control" id="nama__buku">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" value="<?= $book['jumlah'] ?>" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <img id="imageBuku" class="img-thumbnail" width="200" src="<?= base_url('img/BukuHilang/' . $book['foto'] . '') ?>" alt="Avatar">
                    <input type="file" name="foto" style="display: none;" id="fileBuku">
                    <input type="hidden" value="<?= $book['foto'] ?>" name="foto_lama">
                </div>
            </div>
            <div class="mt-4">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>