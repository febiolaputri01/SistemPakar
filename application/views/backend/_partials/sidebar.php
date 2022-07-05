 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"  id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('backend/dashboard') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-stethoscope" style="font-size:48px;columns: nav;"></i>
                </div>
                <div class="sidebar-brand-text mx-3">EXSYSISPA <sup>Admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active ">
                <a class="nav-link" href="<?= base_url('data-artikel') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Data Artikel</span></a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('aturan') ?>" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Aturan</span>
                </a>
               <!--  <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data</h6>
                        <a class="collapse-item" href="buttons.html">Data User</a> -->
                      <!--   <a class="collapse-item" href="cards.html">Data Paramedis</a> -->
                   <!--  </div>
                </div> -->
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manajemen Data ISPA</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data</h6>
                        <a class="collapse-item" href="<?=base_url('gejala') ?>">Data Gejala</a>
                        <a class="collapse-item" href="<?= base_url('penyakit') ?>">Data Penyakit</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Certainty factor</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data</h6>
                        <a class="collapse-item" href="<?=base_url('cfpakar') ?>">Nilai CF</a>
                        <a class="collapse-item" href="<?=base_url('data-pertanyaan') ?>">Pertanyaan</a>
                       <!--  <a class="collapse-item" href="utilities-animation.html">Aturan</a> -->
                        <a class="collapse-item" href="utilities-other.html">Hasil Deteksi Dini</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            


        </ul>
        <!-- End of Sidebar -->