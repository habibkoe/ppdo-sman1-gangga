<!-- MENU Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li>
                    <a href="<?= base_url('/') ?>"><i class="mdi mdi-airplay"></i>Home</a>
                </li>
                <li>
                    <a href="<?= base_url('rahasia/dashboard') ?>"><i class="mdi mdi-airplay"></i>Dashboard</a>
                </li>
                <?php if ($session->get('user_role') != 3) : ?>
                    <li>
                        <a href="<?= base_url('rahasia/manajemen-siswa') ?>"><i class="mdi mdi-layers"></i>Manajemen Siswa</a>
                    </li>
                    <li>
                        <a href="<?= base_url('rahasia/manajemen-kelas') ?>"><i class="mdi mdi-gauge"></i>Manajemen Kelas</a>
                    </li>
                    <li>
                        <a href="<?= base_url('rahasia/manajemen-staf') ?>"><i class="mdi mdi-gauge"></i>Manajemen Staf</a>
                    </li>
                    <li>
                        <a href="<?= base_url('rahasia/artikel') ?>"><i class="mdi mdi-gauge"></i>Artikel</a>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-bullseye"></i>Master Data</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="<?= base_url('rahasia/master-jabatan') ?>">Master Jabatan</a></li>
                                    <li><a href="<?= base_url('rahasia/master-jurusan') ?>">Master Jurusan</a></li>
                                    <li><a href="<?= base_url('rahasia/master-pendidikan') ?>">Master Pendidikan</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><a href="<?= base_url('rahasia/master-pekerjaan') ?>">Master Pekerjaan</a></li>
                                    <li><a href="<?= base_url('rahasia/master-agama') ?>">Master Agama</a></li>
                                    <li><a href="<?= base_url('rahasia/master-kelas') ?>">Master Kelas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php endif ?>
            </ul>
            <!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div> <!-- end navbar-custom -->