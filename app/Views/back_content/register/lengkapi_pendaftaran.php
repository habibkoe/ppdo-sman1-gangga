<?= $this->extend('layout/back_layout') ?>

<?= $this->section('title') ?>
Lengkapi Data Pendaftaran SMAN 1 Gangga
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('theme/back/assets/plugins/select2/select2.min.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Page-Title -->
<div class="row">
  <div class="col-sm-12">
    <div class="page-title-box">
      <div class="btn-group pull-right">
        <ol class="breadcrumb hide-phone p-0 m-0">
          <li class="breadcrumb-item"><a href="#"><?= $session->get('user_name') ?></a></li>
          <li class="breadcrumb-item active">Lengkapi pendaftaran</li>
        </ol>
      </div>
      <h4 class="page-title">Lengkapi pendaftaran</h4>
    </div>
  </div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-6">
    <div class="card m-b-30">
      <div class="card-body">
        <h5>Identitas Utama:</h5>
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="notifikasi_data_diri">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span id="isi_pesan_berhasil"></span>
        </div>
        <?= $this->include('back_content/register/identitas_utama') ?>
      </div>
    </div>

    <div class="card m-b-30">
      <div class="card-body">
        <h5>Identitas Orang Tua / Wali:</h5>
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="notifikasi_ortu">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span id="isi_pesan_berhasil_ortu"></span>
        </div>
        <?= $this->include('back_content/register/identitas_orang_tua') ?>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-lg-12 col-xl-6">
    <div class="card m-b-30">
      <div class="card-body">
        <h5>Data Sekolah Asal:</h5>
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="notifikasi_data_sekolah">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span id="isi_pesan_data_sekolah"></span>
        </div>
        <?= $this->include('back_content/register/data_sekolah_asal') ?>
      </div>
    </div>

    <div class="card m-b-30">
      <div class="card-body">
        <h5>Data Nilai:</h5>
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="notifikasi_nilai_mapel">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span id="isi_pesan_nilai_mapel"></span>
        </div>
        <?= $this->include('back_content/register/data_nilai') ?>
      </div>
    </div>
    <div class="card m-b-30">
      <div class="card-body">
        <h5>Berkas Pendukung:</h5>
        <?= $this->include('back_content/register/data_pendukung') ?>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="<?= base_url('theme/back/assets/plugins/select2/select2.min.js') ?>" type="text/javascript"></script>
<script>

  //SIMPAN DATA PRIBADI 
  $('#simpan_data_diri').submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $('#tombol_simpan_data_diri').attr('disable', 'disabled');
        $('#tombol_simpan_data_diri').html('<i class="fa fa-spin fa-spinner"></i>');
      },

      complete: function () {
        $('#tombol_simpan_data_diri').removeAttr('disable');
        $('#tombol_simpan_data_diri').html('Simpan');
      },
      success: function (response) {
        if (response.error) {
          if (response.error.nik) {
            $('#nik').addClass('is-invalid');
            $('#errorNik').html(response.error.nik);
          } else {
            $('#nik').removeClass('is-invalid');
            $('#errorNik').html('');
          }

          if (response.error.nama_awal) {
            $('#nama_awal').addClass('is-invalid');
            $('#errorNamaAwal').html(response.error.nama_awal);
          } else {
            $('#nama_awal').removeClass('is-invalid');
            $('#errorNamaAwal').html('');
          }

          if (response.error.tanggal_lahir) {
            $('#tanggal_lahir').addClass('is-invalid');
            $('#errorTanggalLahir').html(response.error.tanggal_lahir);
          } else {
            $('#tanggal_lahir').removeClass('is-invalid');
            $('#errorTanggalLahir').html('');
          }
        } else {
          // Fungsi tambil data diambil dari dalam file index.php
          // tampilData();
          $('#notifikasi_data_diri').removeClass('d-none');
          $('#isi_pesan_berhasil').html(response.berhasil);
        }
      },
      error: function (xhr, ajaxOptins, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }
    });
  });

  // SIMPAN DATA ORANG TUA
  $('#orang_tua_wali').submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $('#tombol_simpan_ortu').attr('disable', 'disabled');
        $('#tombol_simpan_ortu').html('<i class="fa fa-spin fa-spinner"></i>');
      },

      complete: function () {
        $('#tombol_simpan_ortu').removeAttr('disable');
        $('#tombol_simpan_ortu').html('Simpan');
      },
      success: function (response) {
        if (response.error) {
          if (response.error.nik_orang_tua) {
            $('#nik_ortu').addClass('is-invalid');
            $('#errorNikOrtu').html(response.error.nik_ortu);
          } else {
            $('#nik_ortu').removeClass('is-invalid');
            $('#errorNikOrtu').html('');
          }

          if (response.error.nama_awal_ortu) {
            $('#nama_awal_ortu').addClass('is-invalid');
            $('#errorNamaAwalOrtu').html(response.error.nama_awal_ortu);
          } else {
            $('#nama_awal_ortu').removeClass('is-invalid');
            $('#errorNamaAwalOrtu').html('');
          }
        } else {
          // Fungsi tambil data diambil dari dalam file index.php
          // tampilData();
          $('#notifikasi_ortu').removeClass('d-none');
          $('#isi_pesan_berhasil_ortu').html(response.berhasil);
        }
      },
      error: function (xhr, ajaxOptins, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }
    });
  });

  // SIMPAN DATA SEKOLAH
  $('#data_sekolah').submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $('#tombol_simpan_data_sekolah').attr('disable', 'disabled');
        $('#tombol_simpan_data_sekolah').html('<i class="fa fa-spin fa-spinner"></i>');
      },

      complete: function () {
        $('#tombol_simpan_data_sekolah').removeAttr('disable');
        $('#tombol_simpan_data_sekolah').html('Simpan');
      },
      success: function (response) {
        if (response.error) {
          if (response.error.no_ijazah) {
            $('#no_ijazah_asal').addClass('is-invalid');
            $('#errorNoIjazah').html(response.error.no_ijazah);
          } else {
            $('#no_ijazah_asal').removeClass('is-invalid');
            $('#errorNoIjazah').html('');
          }

          if (response.error.nama_sekolah) {
            $('#nama_sekolah_asal').addClass('is-invalid');
            $('#errorNamaSekolah').html(response.error.nama_sekolah);
          } else {
            $('#nama_sekolah_asal').removeClass('is-invalid');
            $('#errorNamaSekolah').html('');
          }
        } else {
          // Fungsi tambil data diambil dari dalam file index.php
          // tampilData();
          $('#notifikasi_data_sekolah').removeClass('d-none');
          $('#isi_pesan_data_sekolah').html(response.berhasil);
        }
      },
      error: function (xhr, ajaxOptins, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }
    });
  });

  // SIMPAN DATA NILAI
  $('#berkas_nilai').submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $('#tombol_simpan_berkas').attr('disable', 'disabled');
        $('#tombol_simpan_berkas').html('<i class="fa fa-spin fa-spinner"></i>');
      },

      complete: function () {
        $('#tombol_simpan_berkas').removeAttr('disable');
        $('#tombol_simpan_berkas').html('Simpan');
      },
      success: function (response) {
        if (response.error) {
          if (response.error.mata_pelajaran) {
            $('#nama_mata_pelajaran').addClass('is-invalid');
            $('#errorMapel').html(response.error.mata_pelajaran);
          } else {
            $('#nama_mata_pelajaran').removeClass('is-invalid');
            $('#errorMapel').html('');
          }

          if (response.error.nilai) {
            $('#nilai_mapel').addClass('is-invalid');
            $('#errorNilaiMapel').html(response.error.nilai);
          } else {
            $('#nilai_mapel').removeClass('is-invalid');
            $('#errorNilaiMapel').html('');
          }
        } else {
          // Fungsi tambil data diambil dari dalam file index.php
          // tampilData();
          $('#notifikasi_nilai_mapel').removeClass('d-none');
          $('#isi_pesan_nilai_mapel').html(response.berhasil);
        }
      },
      error: function (xhr, ajaxOptins, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }
    });
  });

  $('#data_pendukung').submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {

      },

      complete: function () {

      },
      success: function (response) {

      },
      error: function (xhr, ajaxOptins, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }
    });
  });

  $(document).ready(function () {
    // Select2
    $(".select2").select2({
      width: '100%'
    });
  });
</script>
<?= $this->endSection() ?>