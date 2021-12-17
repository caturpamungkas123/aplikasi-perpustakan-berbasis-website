<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-header bg-primary">
        <h5 class="text-white">Edit Data Buku Dipinjam</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/buku/BukuPinjam/update/' . $book['id'] . '') ?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Buku</label>
                        <input value="<?= $book['nama_buku'] ?>" name="nama_buku" required type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kondisi">Kondisi Buku</label>
                        <input required name="kondisi" value="<?= $book['kondisi'] ?>" type="text" class="form-control" id="kondisi">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama__siswa">Nama Siswa</label>
                        <input required name="nama_siswa" value="<?= $book['nama_siswa'] ?>" type="text" class="form-control" id="nama__siswa">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomer__siswa">Nomer Siswa</label>
                        <input type="text" class="form-control" required name="nomer_siswa" value="<?= $book['nomer_siswa'] ?>" id="nomer__siswa">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" required name="kelas" value="<?= $book['kelas'] ?>" id="kelas">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kembali">Tanggal Kembali</label>
                        <input type="date" name="kembali" class="form-control" value="<?= $book['kembali'] ?>" id="kembali">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-primary btn"><i class="fa fa-pencil-alt"></i> Update</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>