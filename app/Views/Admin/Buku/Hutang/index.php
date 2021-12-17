<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<div class="card shadow-lg">
    <div class="my-3 mr-3 ml-auto">
        <div class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</div>
    </div>
    <div class="card-body">
        <!-- modal add -->
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Hutang Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/buku/HutangBuku/add') ?>" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Buku</label>
                                        <input type="text" required name="nama_buku" class="form-control" id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama__siswa">Nama Siswa</label>
                                        <input type="text" required name="nama_siswa" class="form-control" id="nama__siswa">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kelas__siswa">Kelas Siswa</label>
                                        <input type="text" required name="kelas" class="form-control" id="kelas__siswa">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" required name="jumlah" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal__kembali">Tempo</label>
                                        <input type="date" required name="tempo" class="form-control" id="tanggal__kembali">
                                    </div>
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
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Tempo</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">Nama Buku</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Tempo</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $d['nama_buku'] ?></td>
                            <td><?= $d['nama_siswa'] ?></td>
                            <td><?= $d['kelas'] ?></td>
                            <td><?= $d['jumlah'] ?></td>
                            <td><?= date('d-m-Y', strtotime($d['tempo'])) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/buku/hutangbuku/edit/' . $d['id'] . '') ?>" class="btn btn-circle btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('admin/buku/hutangbuku/delete/' . $d['id'] . '') ?>" class="btn btn-circle btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>