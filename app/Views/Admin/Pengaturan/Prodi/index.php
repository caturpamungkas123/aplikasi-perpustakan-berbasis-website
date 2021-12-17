<?= $this->extend('pages/template') ?>
<?= $this->section('content') ?>
<!-- modal add -->
<div class="modal fade" id="modal_prodi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!-- end modal add -->
<?= $validate->listErrors() ?>
<div class="card shadow mb-4 ">
    <div class="card-header py-3 bg-primary">
        <div class="row">
            <h4 class="font-weight-bold text-white">Tabel Daftar Prodi</h4>
            <div data-toggle="modal" data-target="#modal_prodi" onclick="addProdi()" class="btn btn-success ml-auto"><i class="fa fa-plus"></i> Tambah</div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">Nama Prodi</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-body">
                    <?php $i = 1;
                    foreach ($prodi as $p) : ?>
                        <tr id="<?= $p['id_prodi'] ?>" class="tr-data">
                            <td class="text-center"><?= $p['nama_prodi'] ?></td>
                            <td class="text-center">
                                <div data-toggle="modal" onclick="findProdi(<?= $p['id_prodi'] ?>)" id="update_prodi" data-target="#modal_prodi" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Edit</div>
                                <div onclick="deleteProdi(<?= $p['id_prodi'] ?>, event)" class="btn btn-danger"><i class="fa fa-fa-trash"></i> Hapus</div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>