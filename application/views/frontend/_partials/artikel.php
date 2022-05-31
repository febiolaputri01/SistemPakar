 <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>ARTIKEL</h2>
          <p>Artikel berikut ini berisi tentang informasi terkait dengan Infeksi Saluran Pernafasan Akut, Sistem Pakar dan informasi informasi terkait dengan perkembangan Tekologi.</p>
        </div>
        <?php foreach ($artikel as $art) : ?>
        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="<?= base_url('assets/admin/img/artikel-image/' . $art['artikel_img']) ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3><?= $art['artikel_judul'] ?></h3>
            <p class="fst-italic">
              <?= date('d, M Y, H:i', $art['artikel_create']) ?>.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i><?= $art ['artikel_body']?></li>
            </ul>
          
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </section>
    <!-- End About Us Section -->
