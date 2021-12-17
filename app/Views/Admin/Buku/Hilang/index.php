<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<div class="card shadow-lg">
    <div class="card-header bg-primary">
        <div class="row">
            <h3 class="text-white">Data Buku Hilang</h3>
            <div class="btn btn-success ml-auto" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</div>
        </div>
    </div>
    <div class="card-body">
        <!-- modal add -->
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Data Hilang</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/buku/BukuHilang/add') ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Buku</label>
                                        <input type="text" name="nama_buku" required class="form-control" id="exampleInputEmail1" placeholder="Masukan nama buku">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" name="jumlah" required class="form-control" id="jumlah" placeholder="Jumlah Buku">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img id="imageBuku" src="<?= base_url('img/upload-icon.png') ?>" class="img-thumbnail" width="200" alt="" srcset="">
                                    <input id="fileBuku" name="foto" type="file" style="display: none;">
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
        <!-- end modal add -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">Nama Buku</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">Nama Buku</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <td><?= $book['nama_buku'] ?></td>
                            <td><img src="<?= base_url('img/BukuHilang/' . $book['foto'] . '') ?>" width="70" height="70" alt="Image Books"></td>
                            <td><?= $book['jumlah'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/buku/bukuhilang/edit/' . $book['id'] . '') ?>" class="btn btn-circle btn-success"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('admin/buku/bukuhilang/delete/' . $book['id'] . '') ?>" class="btn btn-circle btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>