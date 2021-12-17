<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <form action="<?= base_url('admin/buku/ebook/save') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="nama">Judul Ebook</label>
                        <input id="nama" name="nama" type="text" autocomplete="off" class="form-control" placeholder="Nama Ebook">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori Buku</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="">-------</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <select name="prodi" id="prodi" class="form-control">
                            <option value="">-------</option>
                            <?php foreach ($prodi as $p) : ?>
                                <option value="<?= $p['id_prodi'] ?>"><?= $p['nama_prodi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pengapu">Pengapu</label>
                        <input type="text" class="form-control" name="pengapu" id="pengapu">
                    </div>
                    <div class="form-group">
                        <label for="des">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="des" cols="10" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ebook">File Ebook</label>
                        <input type="file" required accept=".pdf" name="file_ebook">
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="<?= base_url('img/upload-icon.png') ?>" class="img-thumbnail" width="260" id="imageBuku" height="260" alt="Avatar">
                    <input type="file" accept="image/*" name="foto" id="fileBuku" style="display: none;">
                </div>
            </div>
            <div class="mt-3">
                <button type="reset" class="btn  btn-secondary"><i class="fa fa-trash"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>