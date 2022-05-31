<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $judulHalaman ?></h1>
    <p class="mb-4"><?= $detailHalaman ?></p>

    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $cardHeader ?></h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="<?= base_url('add-cfpakar') ?>">Tambah Baru</a>
                    <!-- <a class="dropdown-item" href="<?= base_url('truncate-probabilitas') ?>">Kosongkan Tabel</a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('download-probabilitas') ?>">Download Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gejala</th>
                            <th>Penyakit</th>
                            <th>Nilai CF PAKAR</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($count > 0) : ?>
                            <?php foreach ($cfp as $cfpakar) : ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $cfpakar['nama_gejala'] ?></td>
                                    <td><?= $cfpakar['nama_penyakit'] ?></td>
                                    <td><?= $cfpakar['evidence_nilai'] ?></td>
                                    <td>
                                        <!-- <a href="" class="badge badge-primary"><i class="fas fa-fw fa-info-circle"></i></a> -->
                                        <a href="<?= base_url('edit-cf/' . $cfpakar['evidence_id']) ?>" class="badge badge-warning"><i class="fas fa-fw fa-edit"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModal-<?= $cfpakar['evidence_id'] ?>" class=" badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <h4 class="text-danger text-center">Belum ada Data yang di Input</h4>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Delete Modal-->
<?php foreach ($cfp as $cfpakar) : ?>
    <div class="modal fade" id="deleteModal-<?= $cfpakar['evidence_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang Dihapus tidak bisa dikembalikan</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('delete-cf/' . $cfpakar['evidence_id']) ?>">Yakin</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>