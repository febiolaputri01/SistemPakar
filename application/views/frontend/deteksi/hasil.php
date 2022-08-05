    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">
        <br><br><br>
        <br><br><br>
        <div class="section-title">
          <h2>Hasil</h2>
          <p>hasil Deteksi Dini ini merupakan hasil dugaan yang sifatnya </p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box featured" data-aos="fade-up" data-aos-delay="100" style="height: 360px;">
              <h3>Data Pasien </h3>
              <table class="table table-borderless table-hover" style="text-align: left;">
                <tr>
                  <td style="font-weight: bold;">Nama Lengkap</td>
                  <td><?= $pasien['nama_pasien']; ?></td>
                </tr>
                <tr>
                  <td style="font-weight: bold;">Usia</td>
                  <td><?= $pasien['usia']; ?></td>
                </tr>
                <tr>
                  <td style="font-weight: bold;">No Telepon</td>
                  <td><?= $pasien['no_telfon']; ?></td>
                </tr>
                <tr>
                  <td style="font-weight: bold;">Alamat</td>
                  <td><?= $pasien['alamat']; ?></td>
                </tr>
                <tr>
                  <td style="font-weight: bold;">Jenis Kelamin</td>
                  <td><?= $pasien['jenis_kelamin']; ?></td>
                </tr>
              </table>

            </div>
          </div>

          <div class="col-lg-8 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="fade-up" data-aos-delay="200" style="height: 360px; overflow-y: scroll;">
              <h3>Gejala yang terpilih</h3>
              <?php foreach ($gejala as $gjl) { ?>
              <span class="badge badge-secondary"><?= $gjl ?></span>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box featured" data-aos="fade-up" data-aos-delay="300">
              <h3>Hasil Deteksi Sistem Pakar</h3>
              <table class="table table-borderless" style="text-align: left;">
                <tr style="background-color: 3FBBC0;">
                  <th>Penyakit</th>
                  <th>Persentase</th>
                </tr>
                <?php foreach ($hasil as $key => $hsl) : ?>
                <tr>
                  <td style="font-weight: bold;"><?= $hsl['nama_penyakit'] ?></td>
                  <td>
                    <?= $hsl['hasil'] ?>%
                  </td>
                </tr>
                <?php endforeach ?>
              </table>
            </div>
          </div>

          <div class="col-lg-8 col-md-6 mt-4 mt-lg-0">
            <div class="box featured" data-aos="fade-up" data-aos-delay="400">
              <!-- <span class="advanced">Identifikasi</span> -->
              <h3>Kesimpulan
              </h3>
              <h6>Berdasarkan Gejala Yang Dipilih Menghasilkan
                Deteksi
                Dini Penyakit Sebagai Berikut</h6>
              <?php foreach ($kesimpulan as $key => $kes) : ?>
              <h6 style="font-size: 16pt;">
                <code>
                  <?= $key ?>
                </code>
                <?= $kes ?>%
              </h6>
              <?php endforeach ?>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Pricing Section -->