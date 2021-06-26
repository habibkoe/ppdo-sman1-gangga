<?= $this->extend('layout/back_layout') ?>

<?= $this->section('title') ?>
<?= $nama_halaman ?> SMAN 1 Gangga
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('theme/back/assets/css/kelas.css') ?>" rel="stylesheet" type="text/css" />
<style>
    .modal-lg,
    .modal-xl {
        max-width: 1200px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#"><?= $session->get('user_name') ?></a></li>
                    <li class="breadcrumb-item active"><?= $nama_halaman ?></li>
                </ol>
            </div>
            <h4 class="page-title"><?= $nama_halaman ?></h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <a class="btn btn-primary" href="<?= base_url('rahasia/master-kelas') ?>">Master Kelas</a>
                <p>
                    <small>Untuk melakukan registri siswa ke kelas yang ditentukan, silahkan klik list kelas
                        dibawah</small>
                </p>
                <div class="row" id="panduan">
                    <?php foreach($master_kelas as $kelas): ?>
                    <div class="col-lg-3" style="cursor: pointer;">
                        <div class="box wow fadeInLeft">
                            <div class="icon"><i class="fa fa-bar-chart"></i></div>
                            <h4 class="title"><?= $kelas['nama'] ?></h4>
                            <p class="description">
                                Kapasitas: <?= $kelas['daya_tampung'] ?> siswa
                                Terisi: <?= $kelas['daya_tampung'] ?> siswa
                                <br>
                                <button class="btn btn-outline-primary btn-xs"  onclick="pilihSiswa(<?= $kelas['id'] ?>)">+</button>
                                <button class="btn btn-outline-info btn-xs" onclick="showSiswa(<?= $kelas['id'] ?>)">Lihat</button>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<div id="tambahsiswa" class="d-none"></div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>

<script>
    function pilihSiswa(idKelas) {
        $.ajax({
            url: "<?= site_url('rahasia/get-form-tambah-siswa/') ?>" + idKelas,
            dataType: "json",
            success: function (response) {
                $('#tambahsiswa').html(response.data).removeClass('d-none');
                $('#modaltambahsiswa').modal('show');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        });

    }
</script>
<?= $this->endSection() ?>