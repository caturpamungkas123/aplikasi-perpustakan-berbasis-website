<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<div class="card shadow mb-4">
    <div class="my-3 mr-3 ml-auto">
        <div class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</div>
    </div>
    <div class="card-body">
        <!-- modal add -->
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/buku/bukurusak/add') ?>" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Buku</label>
                                        <input required type="text" name="nama_buku" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama buku">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah__buku">Jumlah Buku</label>
                                        <input required type="number" name="jumlah_buku" class="form-control" id="jumlah__buku" placeholder="Masukan jumlah buku">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Kategori">Kategori Buku</label>
                                        <select required name="id_ketegori" class="form-control" id="kategori">
                                            <?php foreach ($kategori as $k) : ?>
                                                <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img id="imageBuku" class="img-thumbnail" src="<?= base_url('img/upload-icon.png') ?>" width="200" alt="Upload Icon">
                                    <input type="file" name="foto" id="fileBuku" style="display: none;">
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

        <!-- alert -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata('success') ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <!-- end alert -->

        <!-- table -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1;
                    foreach ($books as $book) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $book['nama_buku'] ?></td>
                            <td><img src="<?= base_url('img/bukurusak/' . $book['foto'] . '') ?>" width="70" height="70" alt="Avatar Buku"></td>
                            <td><?= $book['nama_kategori'] ?></td>
                            <td><?= $book['jumlah'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/buku/bukurusak/edit/' . $book['id'] . '') ?>" class="btn btn-circle btn-success"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('admin/buku/bukurusak/hapus/' . $book['id'] . '') ?>" class="btn btn-circle btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>