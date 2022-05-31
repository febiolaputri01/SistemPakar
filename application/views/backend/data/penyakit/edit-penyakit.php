<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $judulHalaman ?></h1>
    <p class="mb-4"><?= $detailHalaman ?></p>

    <div class="row justify-content-center">
        <?php echo $this->session->flashdata('message'); ?>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <form action="<?= base_url('edit-penyakit/' . $penyakitdata['id_penyakit']) ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" style="display: none;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $cardHeader ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" name="kd" id="kd" readonly value="<?= $penyakitdata['id_penyakit'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" name="nama" id="nama" value="<?= $penyakitdata['nama_penyakit'] ?>"><?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <img src="<?= base_url('assets/admin/img/img-penyakit/' . $penyakitdata['penyakit_image']) ?>" width="200" id="image-prev" class="img-thumbnails" alt="">
                                <p></p>
                                <label for="image">Gambar</label>
                                <input type="file" accept="image/*" class="form-control form-control-user" name="image" id="image" onchange="previewFile(this);">
                            </div>
                        </div>
                        <script>
                            function previewFile(input) {
                                var file = $("input[type=file]").get(0).files[0];
                                if (file) {
                                    var reader = new FileReader();
                                    reader.onload = function() {
                                        $("#image-prev").attr("src", reader.result);
                                    }
                                    reader.readAsDataURL(file);
                                }
                            }
                        </script>
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