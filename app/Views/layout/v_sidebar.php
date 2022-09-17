<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="<?= base_url() ?>/assets/img/gambar/home.png" alt="Data Nomor" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a class="js-arrow" href="<?= base_url('Home') ?>">
                        <i class="fas fa-tachometer-alt"></i>Input Data Hari Ini</a>
                </li>
                <li>
                    <a class="js-arrow" href="<?= base_url('Rekapan') ?>">
                        <i class="fas fa-calculator"></i>Rekapan Data</a>
                </li>
                <li>
                    <a class="js-arrow" href="<?= base_url('Keuangan/input_nomor_keluar') ?>">
                        <i class="fas fa-database"></i>Input Keluaran</a>
                </li>
                <li>
                    <a class="js-arrow" href="<?= base_url('Keuangan') ?>">
                        <i class="fas fa-dollar-sign"></i>Laporan</a>
                </li>
                <li>
                    <a class="js-arrow" href="<?= base_url('Grafik') ?>">
                        <i class="fas fa-chart-bar"></i>Grafik</a>
                </li>
                <li>
                    <a class="js-arrow" href="<?= base_url('Personil') ?>">
                        <i class="fas fa-users"></i>Personil</a>
                </li>
                <li>
                    <a class="js-arrow" href="<?= base_url('Chat') ?>">
                        <i class="fas fa-comments"></i>Chat Room</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->