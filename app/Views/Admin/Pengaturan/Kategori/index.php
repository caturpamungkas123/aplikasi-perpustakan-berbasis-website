<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<!-- add -->
<div class="modal fade" id="modal_kategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title"></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body"></div>
        </div>
    </div>
</div>
<!-- end add -->

<div class="card shadow mb-4 ">
    <div class="card-header py-3 bg-primary">
        <div class="row">
            <h4 class="font-weight-bold text-white">Tabel Daftar Kategori Buku</h4>
            <div data-toggle="modal" onclick="addKategori()" data-target="#modal_kategori" class="btn btn-success ml-auto"><i class="fa fa-plus"></i> Tambah</div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">Kategori Buku</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-body">
                    <?php foreach ($kategori as $p) : ?>
                        <tr id="<?= $p['id_kategori'] ?>" class="tr-data">
                            <td class="text-center"><?= $p['nama_kategori'] ?></td>
                            <td class="text-center">
                                <div data-toggle="modal" onclick="findKategori(<?= $p['id_kategori'] ?>)" id="update_kategori" data-target="#modal_kategori" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Edit</div>
                                <div onclick="deleteKategori(<?= $p['id_kategori'] ?>, event)" class="btn btn-danger"><i class="fa fa-fa-trash"></i> Hapus</div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>