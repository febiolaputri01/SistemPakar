 <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <br><br><br><br>
          <h2><?= $header; ?></h2>
          <?php if (isset($detail)) : ?>
                    <p class="text-black"><?= $detail; ?></p>
                <?php endif; ?>
        </div>

         <form method="POST" action="<?= base_url('mulai-konsul') ?>">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="nama" class="form-control" id="nama" placeholder=" Nama Lengkap" required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="usia" id="usia" placeholder="Usia" required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="phone" id="phone" placeholder="No Telefon" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <!-- <input type="datetime" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required> -->
							<textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" row="5" required></textarea>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="jk" id="jk" class="form-select">
                <option value="">Jenis Kelamin</option>
                <option value="perempuan">Perempuan</option>
                <option value="Laki-laki">Laki-Laki</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
     <button type="submit" class="btn btn-primary btn-next-form ml-auto">Submit</button>
            </div>
          </div>

        </form>
  
      </div>
    </section><!-- End Appointment Section -->
