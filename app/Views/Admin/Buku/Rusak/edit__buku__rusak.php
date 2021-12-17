<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<!-- content -->
<div class="card">
    <div class="card-header">
        <h5>Edit Data Buku Rusak</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/buku/bukurusak/update/' . $books['id'] . '') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Buku</label>
                        <input required type="text" name="nama_buku" value="<?= $books['nama_buku'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama buku">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jumlah__buku">Jumlah Buku</label>
                        <input required type="number" name="jumlah" value="<?= $books['jumlah'] ?>" class="form-control" id="jumlah__buku" placeholder="Masukan jumlah buku">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Kategori">Kategori Buku</label>
                        <select required class="form-control" name="id_kategori" id="kategori">
                            <option value="<?= $books['id_kategori'] ?>"><?= $books['nama_kategori'] ?></option>
                            <option disabled>-----------</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <img id="imageBuku" class="img-thumbnail" src="<?= base_url('img/BukuRusak/' . $books['foto'] . '') ?>" width="200" alt="Upload Icon">
                    <input type="file" name="foto" id="fileBuku" style="display: none;">
                    <input type="hidden" name="foto_lama" value="<?= $books['foto'] ?>">
                </div>
            </div>
            <button type="submit" class="btn-primary btn">Update</button>
        </form>
    </div>
</div>
<!-- end Content -->
<?= $this->endSection() ?>