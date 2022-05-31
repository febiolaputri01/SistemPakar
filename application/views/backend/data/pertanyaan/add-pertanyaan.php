<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><?= $judulHalaman ?></h1>
    <p class="mb-4 text-center"><?= $detailHalaman ?></p>

    <div class="row justify-content-center">
        <?php echo $this->session->flashdata('message'); ?>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <form action="<?= base_url('add-pertanyaan') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" style="display: none;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $cardHeader ?></h6>
                    </div>
                    <div class="card-body">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-control" name="gejala" id="gejala" required>
                                    <option value="" selected disabled>Pilih GEJALA</option>
                                    <?php foreach ($gejalas as $gejala) : ?>
                                        <option value="<?= $gejala['id_gejala'] ?>"><?= $gejala['nama_gejala'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text-danger" class="form-control" name="pertanyaan1" id="pertanyaan1" placeholder="pertanyaan "><?= form_error('pertanyaan1', '<small class="text-danger pl-3">', '</small>') ?> 
                            </div>
                        </div>
                         <div class="form-group row">
                             <div class="col-sm-6">
                                <input type="text-danger" class="form-control" name="jawaban1" id="jawaban1"  placeholder=" opsi jawaban 1,00"><?= form_error('cfnilai', '<small class="text-danger pl-3">', '</small>') ?> <br>
                            </div>
                             <div class="col-sm-6">
                                <input type="text-danger" class="form-control" name="jawaban2" id="jawaban2"  placeholder="opsi jawaban 0,80"><?= form_error('jawaban2', '<small class="text-danger pl-3">', '</small>') ?> <br>
                            </div>
                             <div class="col-sm-6">
                                <input type="text-danger" class="form-control" name="jawaban3" id="jawaban3"  placeholder="opsi jawaban 0,60"><?= form_error('jawaban3', '<small class="text-danger pl-3">', '</small>') ?> <br>
                            </div>
                             <div class="col-sm-6">
                                <input type="text-danger" class="form-control" name="jawaban4" id="jawaban4"  placeholder="opsi jwaban 0,40"><?= form_error('jawaban4', '<small class="text-danger pl-3">', '</small>') ?> <br>
                            </div>
                             <div class="col-sm-6">
                                <input type="text-danger" class="form-control" name="jawaban5" id="jawaban5"  placeholder="opsi jawaban 0,20"><?= form_error('jawaban5', '<small class="text-danger pl-3">', '</small>') ?> <br>
                            </div>
                             <div class="col-sm-6">
                                <input type="text-danger" class="form-control" name="jawaban6" id="jawaban6"  placeholder="opsi jawaban 0,00"><?= form_error('jawaban6', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button class="btn btn-primary" type="submit">Simpan Data</button>
                            <a href="javascript:window.history.go(-1);" class="btn btn-secondary btn-user">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->