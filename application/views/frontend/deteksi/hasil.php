    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">
<br><br><br>
        <div class="section-title">
          <h2>Hasil</h2>
          <p>ini merupakan hasil dari deteksi dini penyakit Infeksi Saluran Pernafasan Akut (ISPA) sesuai dengan gejala yang telah dipilih. sistem pakar ini tidak 100 persen kebenarannya, tetap konsultasikan gejala yang anda alami kepada Dokter Paru Paru untuk mendapatkan hasil diagnosa yang akurat </p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="box" data-aos="fade-up" data-aos-delay="100">
              <h3>Data Pasien </h3>
            <!--   <h4><sup>$</sup>0<span> / month</span></h4> -->
              <ul>
                
                      <strong>Nama Lengkap</strong><br>
                      <?= $datapasien['nama_pasien']; ?><br><br>
                   
                      <strong class="pull-left">Usia</strong><br>
                      <?= $datapasien['usia']; ?><br><br>
                        
                      <strong>No Telepon </strong><br>
                      &nbsp;<?= $datapasien['no_telfon']; ?><br><br>
                        
                      <strong>Alamat </strong><br> 
                      &nbsp;<?= $datapasien['alamat']; ?><br><br>
                  
                      <strong>Jenis Kelamin </strong><br>
                      &nbsp;<?= $datapasien['jenis_kelamin']; ?><br><br>
                        
              </ul>
             
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="fade-up" data-aos-delay="200">
              <h3>Gejala yang terpilih</h3>
              <?php for ($i=1; $i <=$count ; $i++) { ?>
                <ul><li><?=$gejala[$i]->nama_gejala?></li></ul>         
              <?php } ?>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="300">
              <h3>Hasil Deteksi Sistem Pakar</h3>
              <h2><?=$penyakit?></h2>             
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="400">
              <span class="advanced">Identifikasi</span>
              <h3>Kesimpulan</h3>

              <h4>Dengan persentase sebesar <?=$persentase*100?> %</h4>
              
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->