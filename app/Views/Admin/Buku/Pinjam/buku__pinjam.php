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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pinjaman</h5>
                        <h5 class="modal-title ml-auto"><?php date_default_timezone_set('Asia/Jakarta');
                                                        echo date('d-m-Y') ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/buku/bukupinjam/add') ?>" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Buku</label>
                                        <input required name="nama_buku" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama buku">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kondisi Buku</label>
                                        <input type="text" required name="kondisi" class="form-control" id="exampleInputEmail1" placeholder="Kondisi buku">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama__siswa">Nama Siswa</label>
                                        <input type="text" required name="nama_siswa" class="form-control" id="nama__siswa" placeholder="Masukan nama siswa">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nomer__siswa">Nomer Siswa</label>
                                        <input type="text" required name="nomer_siswa" class="form-control" id="nomer__siswa" placeholder="Masukan nama siswa">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kelas__siswa">Kelas Siswa</label>
                                        <input type="text" class="form-control" required name="kelas" id="kelas__siswa" placeholder="Masukan nama siswa">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal__kembali">Tanggal Kembali</label>
                                        <input type="date" class="form-control" required name="kembali" id="tanggal_kembali">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button onclick="cekDate()" id="submit" class="btn btn-primary">Save</button>
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

        <div class="table-responsive">
            <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Nomer Siswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Nama Buku</th>
                        <th class="text-center">Kondisi</th>
                        <th class="text-center">Tanggal Meminjam</th>
                        <th class="text-center">Tanggal Kembali</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot class="bg-primary text-white">
                    <tr>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Nomer Siswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Nama Buku</th>
                        <th class="text-center">Kondisi</th>
                        <th class="text-center">Tanggal Meminjam</th>
                        <th class="text-center">Tanggal Kembali</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <td><?= $book['nama_siswa'] ?></td>
                            <td><?= $book['nomer_siswa'] ?></td>
                            <td><?= $book['kelas'] ?></td>
                            <td><?= $book['nama_buku'] ?></td>
                            <td><?= $book['kondisi'] ?></td>
                            <td><?= date('d-m-Y', strtotime($book['meminjam'])) ?></td>
                            <td><?= date('d-m-Y', strtotime($book['kembali'])) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/buku/bukupinjam/edit/' . $book['id'] . '') ?>" class="btn btn-circle btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('admin/buku/bukupinjam/hapus/' . $book['id'] . '') ?>" class="btn btn-circle btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>