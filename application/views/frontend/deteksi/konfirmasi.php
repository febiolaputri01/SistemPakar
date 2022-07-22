<br><br><br>

 <section id="featured-services" class="featured-services">
    <div class="image-container set-full-height" style="background-image: url('assets/template/img/slide/bcc.jpg')">
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
                                       
                                            <br>
                                            <div class="text-center" style="color: white;">
                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#exampleModalCenter">Lanjutkan</button>
                                            </div>
                                      <!--   </form> -->
                                    <?php endforeach; ?>
                                </div>
            </div>
          </div>


        </div>

      </div>
    </section>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="text-center">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>PERHATIAN !!!</b></h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <p><b>Deteksi dini yang akan dilakukan adalah deteksi dini terhadap penyakit ISPA antara lain : </b></p> <p style="color: red;"><b>PNEUMONIA, DIFTERI, TUBERCULOSIS, DAN COVID-19.</b> </p> <P><b>Proses deteksi dini ini menggunakan metode Forward Chaining dan Certainty Factor, dan hasil yang didapatkan tidak bersifat mutlak, jika anda teridentifikasi penyakit ISPA maka perlu untuk segera konsultasikan ke dokter specialis Paru-paru</b></P>
      </div>
      <div class="modal-footer" >
        <div class="text-center" style="color: black;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        </div>
        <div class="text-center">
        <button type="button" class="btn btn-info"><a href="<?= base_url('pertanyaan') ?>" style=" color: white;">Mulai Konsultasi</a></button>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- ======= Featured Services Section ======= -->
   <!-- End Featured Services Section -->

