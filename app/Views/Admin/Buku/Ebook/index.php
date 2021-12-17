<?= $this->extend('pages/template') ?>;
<?= $this->section('content') ?>
<!-- deskripsi ebbok -->
<div class="card mb-3">
    <div class="card-header bg-primary">
        <h5 class="text-white">Detail Ebook</h5>
    </div>
    <div class="row no-gutters">
        <div class="col-md-4">
            <img id="foto" src="<?= base_url() ?>/img/ebook/default.png" width="100" height="130" class="card-img img-thumbnail" alt="avatar">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Nama Ebook</strong><br> <span id="nama"></span></li>
                    <li class="list-group-item"><strong>Prodi</strong> <br> <span id="prodi"></span></li>
                    <li class="list-group-item"><Strong>Pengapu</Strong> <br> <span id="pengapu"></span></li>
                    <li class="list-group-item"><strong>Keterangan</strong> <br> <span id="deskripsi"></span></li>
                </ul>
                <a href="" id="pdf" target="_blank" class="btn btn-outline-danger mt-4"><i class="fa fa-file-pdf"></i> Lihat E-Book</a>
                <a href="" id="download-pdf" class="btn btn-outline-primary mt-4"><i class="fa fa-file-download"></i> Download E-Book</a>
            </div>
        </div>
    </div>
</div>
<!-- end deskripsi ebook -->
<!-- table ebook -->
<div class="card shadow mb-4 ">
    <div class="card-header py-3 bg-primary">
        <h5 class="font-weight-bold text-white">Data Ebook</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Ebook</th>
                        <th class="text-center">Sampul</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Prodi</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1;
                    foreach ($ebook as $book) : ?>
                        <tr>
                            <td class="text-center"><?= $a++; ?></td>
                            <td class="text-center"><?= $book['nama'] ?></td>
                            <td class="text-center">
                                <img src="<?= base_url('img/ebook/' . $book['foto'] . '') ?>" width="70" height="70" alt="avatar">
                            </td>
                            <td class="text-center"><?= $book['nama_kategori'] ?></td>
                            <td class="text-center"><?= $book['nama_prodi'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/api/downloadEbook/' . $book['id'] . '') ?>" class="btn btn-outline-primary" data-toggle="tooltip" tabindex="0" title="Download"><i class="fa fa-download"></i></a>
                                <div onclick="getEbook(<?= $book['id'] ?>)" class="btn btn-outline-info" data-toggle="tooltip" tabindex="0" title="Detail"><i class="fa fa-eye"></i></div>
                                <button onclick="updateEbook(<?= $book['id'] ?>)" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil-alt"></i></button>
                                <a href="" class="btn btn-outline-danger" data-toggle="tooltip" tabindex="0" target="Hapus"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-update" method="POST" enctype="multipart/form-data">
                <div class="modal-body" id="modal-update">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="nama">Judul Ebook</label>
                                <input id="update_nama" name="nama" type="text" autocomplete="off" class="form-control" placeholder="Nama Ebook">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori Buku</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option id="update_kategori"></option>
                                    <option disabled>-------</option>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="prodi">Prodi</label>
                                <select name="prodi" id="prodi" class="form-control">
                                    <option id="update_prodi"></option>
                                    <option disabled>-------</option>
                                    <?php foreach ($prodi as $p) : ?>
                                        <option value="<?= $p['id_prodi'] ?>"><?= $p['nama_prodi'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pengapu">Pengapu</label>
                                <input type="text" class="form-control" name="pengapu" id="update_pengapu">
                            </div>
                            <div class="form-group">
                                <label for="des">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="update_deskripsi" cols="10" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ebook">File Ebook</label>
                                <input type="file" accept=".pdf" name="file_ebook">
                                <input type="hidden" name="file_ebook_lama" id="file_ebook_lama">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <img src="<?= base_url('img/ebook') ?>" class="img-thumbnail" width="260" id="imageBuku" height="260" alt="Avatar">
                            <input type="file" accept="image/*" name="foto" id="fileBuku" style="display: none;">
                            <input type="hidden" name="foto_lama" id="foto_lama">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary"><i class="fa fa-trash"></i> Reset</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end content -->
<?= $this->endSection() ?>