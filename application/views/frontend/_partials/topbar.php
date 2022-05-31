   <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> <?php
        $tgl=date('l, d-m-Y'); 
        echo $tgl;
        ?>
      </div>
      <div class="d-flex align-items-center">
       
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
 <a class="logo me-auto" href="<?= base_url('home') ?>">
                        <img src="<?= base_url('assets/template/')?>img/logosypa.png" alt="logo">
                        <img src="<?= base_url('assets/template/') ?>img/jti_black.png" height="35" alt="logo">
                    </a>
     
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="<?= base_url('home') ?>">Beranda</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('frontend/artikel') ?>">Informasi</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('frontend/cara') ?>">Cara Deteksi</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('frontend/tentang') ?>">Tentang</a></li>
         <!--  <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <!-- <li><a class="nav-link scrollto" href="#contact"></a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="<?=base_url('konsultasi') ?>" class="appointment-btn scrollto"><span class="d-none d-md-inline">Deteksi Dini</span> ISPA</a>

    </div>
  </header><!-- End Header -->