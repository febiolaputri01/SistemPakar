
 <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
<br><br><br><br>
        <div class="row">
          <div class="col-md col-lg d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4 class="title"><a href="">data pasien</a></h4>
               <div class="p-5">
                                    <?php foreach ($whosconsult as $who) : ?>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td><strong>Nama Lengkap &nbsp;</strong></td>
                                                    <td> : &nbsp;&nbsp;&nbsp;</td>
                                                    <td>&nbsp;<?= $who['nama_pasien']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Usia &nbsp;</strong></td>
                                                    <td>: &nbsp;&nbsp;&nbsp;</td>
                                                    <td>&nbsp;<?= $who['usia']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>No Telepon &nbsp;</strong></td>
                                                    <td>: &nbsp;&nbsp;&nbsp;</td>
                                                    <td>&nbsp;<?= $who['no_telfon']; ?></td>
                                                </tr>
                                                 <tr>
                                                    <td><strong>Alamat &nbsp;</strong></td>
                                                    <td>: &nbsp;&nbsp;&nbsp;</td>
                                                    <td>&nbsp;<?= $who['alamat']; ?></td>
                                                </tr>
                                                 <tr>
                                                    <td><strong>Jenis Kelamin &nbsp;</strong></td>
                                                    <td>: &nbsp;&nbsp;&nbsp;</td>
                                                    <td>&nbsp;<?= $who['jenis_kelamin']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <form action="<?= base_url('konfirmasi') ?>" method="POST">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" style="display: none;">
                                            <input type="hidden" name="konsul-id" id="konsul-id" value="<?= $who['id_deteksi_pasien']; ?>"><?= form_error('konsul-id', '<small class="text-danger pl-3">', '</small>') ?>
                                            <?php foreach ($wajib as $w) : ?>
                                                <div class="form-group row" hidden>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="id_per[]" name="id_per[]" value="<?= $w->id_pertanyaan ?>">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="pertanyaan[]" name="pertanyaan[]" value="<?= $w->pertanyaan ?>">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="o1[]" name="o1[]" value="<?= $w->jawaban_1 ?>">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="o2[]" name="o2[]" value="<?= $w->jawaban_2 ?>">
                                                    </div> 
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="o3[]" name="o3[]" value="<?= $w->jawaban_3 ?>">
                                                    </div>
                                                     <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="o4[]" name="o4[]" value="<?= $w->jawaban_4 ?>">
                                                    </div> <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="05[]" name="05[]" value="<?= $w->jawaban_5 ?>">
                                                    </div> <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="06[]" name="o6[]" value="<?= $w->jawaban_6 ?>">
                                                    </div>
                                                </div>
                                                <?php foreach ($umum as $u) : ?>
                                                    <div class="form-group row" hidden>
                                                         <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="id_per[]" name="id_per[]" value="<?= $u->id_pertanyaan ?>">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="pertanyaan[]" name="pertanyaan[]" value="<?= $u->pertanyaan ?>">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="o1[]" name="o1[]" value="<?= $u->jawaban_1 ?>">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="o2[]" name="o2[]" value="<?= $u->jawaban_2 ?>">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="o3[]" name="o3[]" value="<?= $u->jawaban_3 ?>">
                                                    </div>
                                                     <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="o4[]" name="o4[]" value="<?= $u->jawaban_4 ?>">
                                                    </div> 
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="05[]" name="05[]" value="<?= $u->jawaban_5 ?>">
                                                    </div> 
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" id="06[]" name="o6[]" value="<?= $u->jawaban_6 ?>">
                                                    </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                            <br>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Mulai Konsultasi</button>
                                            </div>
                                        </form>
                                    <?php endforeach; ?>
                                </div>
            </div>
          </div>


        </div>

      </div>
    </section>

    <!-- ======= Featured Services Section ======= -->
   <!-- End Featured Services Section -->

