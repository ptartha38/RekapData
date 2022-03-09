    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="#">
                        <img src="<?= base_url() ?>/assets/img/gambar/mobile_logo.png" alt="Data Nomor" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li>
                        <a class="js-arrow" href="<?= base_url('Home') ?>">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="<?= base_url('Rekapan') ?>">
                            <i class="fas fa-calculator"></i>Rekapan Nomor</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="<?= base_url('Keuangan/input_nomor_keluar') ?>">
                            <i class="fas fa-database"></i>Input Nomor Keluar</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="<?= base_url('Keuangan') ?>">
                            <i class="fas fa-dollar-sign"></i>Laporan Keuangan</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="<?= base_url('Grafik') ?>">
                            <i class="fas fa-chart-bar"></i>Grafik Keuntungan</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="<?= base_url('Personil') ?>">
                            <i class="fas fa-users"></i>Personil</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->