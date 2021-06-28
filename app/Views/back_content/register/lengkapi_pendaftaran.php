<?= $this->extend('layout/back_layout') ?>

<?= $this->section('title') ?>
Lengkapi Data Pendaftaran SMAN 1 Gangga
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('theme/back/assets/plugins/select2/select2.min.css') ?>" rel="stylesheet" type="text/css" />

<style>
  #ajaxImgUpload {
    width: 100%;
  }

  /* Select 2 custom */
  .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 4px;
  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 36px;
  }

  .select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 38px;
    user-select: none;
    -webkit-user-select: none;
  }

  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 36px;
    position: absolute;
    top: 1px;
    right: 1px;
    width: 20px;
  }

  .select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
    padding-left: 15px;
    padding-right: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
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
          <li class="breadcrumb-item active">Lengkapi pendaftaran</li>
        </ol>
      </div>
      <h4 class="page-title">Lengkapi pendaftaran</h4>
      <span>Usahakan mengisi data dengan urut sesuai Langkah di bawah:</span>
    </div>
  </div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-6">
    <div class="card m-b-30">
      <div class="card-body">
        <h5>1] Identitas Utama:</h5>
        <span>Pastikan semua form terisi untuk memudahkan verifikasi data</span>
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="notifikasi_data_diri">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span id="isi_pesan_berhasil"></span>
        </div>
        <div id="content_identitas_utama">
          <?= $this->include('back_content/register/identitas_utama') ?>
        </div>
      </div>
    </div>

    <div class="card m-b-30">
      <div class="card-body">
        <h5>2] Identitas Orang Tua / Wali:</h5>
        <span>Data orang tua dapat diisi lebih dari 1, misal, ayah dan ibu, om dan tante, kakek dan nenek</span>
        <div class="alert fade show d-none" role="alert" id="notifikasi_ortu">
          <button type="button" class="close" aria-label="Close" onclick="closePesan('notifikasi_ortu')">
            <span aria-hidden="true">&times;</span>
          </button>
          <span id="isi_pesan_berhasil_ortu"></span>
        </div>
        <div id="content_identitas_ortu">
          <?= $this->include('back_content/register/identitas_orang_tua') ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-lg-12 col-xl-6">
    <div class="card m-b-30">
      <div class="card-body">
        <h5>3] Data Sekolah Asal:</h5>
        <span>Data sekolah asal merupakan sekolah 1 level dibawah SMA, seperti SMP, MTs atau sederajat</span>
        <div class="alert alert-success fade show d-none" role="alert" id="notifikasi_data_sekolah">
          <button type="button" class="close" aria-label="Close" onclick="closePesan('notifikasi_data_sekolah')">
            <span aria-hidden="true">&times;</span>
          </button>
          <span id="isi_pesan_data_sekolah"></span>
        </div>
        <div id="content_sekolah_asal">
          <?= $this->include('back_content/register/data_sekolah_asal') ?>
        </div>
      </div>
    </div>

    <div class="card m-b-30">
      <div class="card-body">
        <h5>4] Data Nilai:</h5>
        <span>Data nilai diisi sesuai dengan mata pelajaran wajib yang di UN kan, seperti matematika, bahasa indonesia, bahasa inggris, IPA</span>
        <div class="alert alert-success fade show d-none" role="alert" id="notifikasi_nilai_mapel">
          <button type="button" class="close" aria-label="Close" onclick="closePesan('notifikasi_nilai_mapel')">
            <span aria-hidden="true">&times;</span>
          </button>
          <span id="isi_pesan_nilai_mapel"></span>
        </div>
        <div id="content_data_nilai">
          <?= $this->include('back_content/register/data_nilai') ?>
        </div>
      </div>
    </div>
    <div class="card m-b-30">
      <div class="card-body">
        <h5>5] Berkas Pendukung:</h5>
        <span>Berkas pendukung berisi Poto kopi KK, poto kopi Ijazah / Surat keterangan lulus, Transkrip nilai</span>
        <div class="alert alert-success fade show d-none" role="alert" id="notifikasi_data_pendukung">
          <button type="button" class="close" aria-label="Close" onclick="closePesan('notifikasi_data_pendukung')">
            <span aria-hidden="true">&times;</span>
          </button>
          <span id="isi_pesan_nilai_data_pendukung"></span>
        </div>
        <div id="content_data_berkas">
          <?= $this->include('back_content/register/data_pendukung') ?>
        </div>
      </div>
    </div>

    <!-- Card Konfirmasi -->
    <div class="card m-b-30">
      <div class="card-body">
        <h5>6] Konfirmasi:</h5>
        <span>Pastikan semua formulir sudah diisi dengan benar dan lengkap, priksa kembali dengan teliti, jika sudah silahkan klik tombol konfirmasi dibawah, <b>Semoga beruntung</b>.</span>
        <div class="alert fade show d-none" role="alert" id="notifikasi_konfirmasi">
          <button type="button" class="close" aria-label="Close" onclick="closePesan('notifikasi_konfirmasi')">
            <span aria-hidden="true">&times;</span>
          </button>
          <span id="isi_pesan_konfirmasi"></span>
        </div>
        <div id="content_data_berkas">
          <button class="btn btn-success btn-lg <?= $is_lengkap ? 'd-none' : '' ?>" id="tombol_konfirmasi" onclick="konfirmasiPendaftaran(<?= $session->get('user_id') ?>)">Konfimasi</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="<?= base_url('theme/back/assets/plugins/select2/select2.min.js') ?>" type="text/javascript"></script>
<script>
  //SIMPAN DATA DIRI 
  $('#simpan_data_diri').submit(function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      beforeSend: function() {
        $('#tombol_simpan_data_diri').attr('disable', 'disabled');
        $('#tombol_simpan_data_diri').html('<i class="fa fa-spin fa-spinner"></i>');
      },

      complete: function() {
        $('#tombol_simpan_data_diri').removeAttr('disable');
        $('#tombol_simpan_data_diri').html('Simpan');
      },
      success: function(response) {
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

          if (response.error.pas_poto) {
            $('#pas_poto').addClass('is-invalid');
            $('#errorPasPoto').html(response.error.pas_poto);
          } else {
            $('#pas_poto').removeClass('is-invalid');
            $('#errorPasPoto').html('');
          }

          if (response.error.agama) {
            $('#agama').addClass('is-invalid');
            $('#errorAgama').html(response.error.agama);
          } else {
            $('#agama').removeClass('is-invalid');
            $('#errorAgama').html('');
          }

          if (response.error.tempat_lahir) {
            $('#tempat_lahir').addClass('is-invalid');
            $('#errorTempatLahir').html(response.error.tempat_lahir);
          } else {
            $('#tempat_lahir').removeClass('is-invalid');
            $('#errorTempatLahir').html('');
          }

          if (response.error.alamat) {
            $('#alamat').addClass('is-invalid');
            $('#errorAlamat').html(response.error.alamat);
          } else {
            $('#alamat').removeClass('is-invalid');
            $('#errorAlamat').html('');
          }

          if (response.error.jurusan) {
            $('#jurusan').addClass('is-invalid');
            $('#errorJurusan').html(response.error.jurusan);
          } else {
            $('#jurusan').removeClass('is-invalid');
            $('#errorJurusan').html('');
          }
          if (response.error.jenis_kelamin) {
            $('#jenis_kelamin').addClass('is-invalid');
            $('#errorJenisKelamin').html(response.error.jenis_kelamin);
          } else {
            $('#jenis_kelamin').removeClass('is-invalid');
            $('#errorJenisKelamin').html('');
          }
        } else {
          // Fungsi tambil data diambil dari dalam file index.php
          // tampilData();
          $('#notifikasi_data_diri').removeClass('d-none');
          $('#isi_pesan_berhasil').html(response.berhasil);

          let urlLoad = "<?= site_url('rahasia/get-element-data-diri/') ?>" + response.user_id;

          // Load element lokal
          ajaxLoad(urlLoad, "content_identitas_utama");
        }
      },
      error: function(xhr, ajaxOptins, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }
    });
  });

  // SIMPAN DATA ORANG TUA
  $('#orang_tua_wali').submit(function(e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function() {
        $('#tombol_simpan_ortu').attr('disable', 'disabled');
        $('#tombol_simpan_ortu').html('<i class="fa fa-spin fa-spinner"></i>');
      },

      complete: function() {
        $('#tombol_simpan_ortu').removeAttr('disable');
        $('#tombol_simpan_ortu').html('Simpan');
      },
      success: function(response) {
        if (response.error) {
          if (response.error.nik_ortu) {
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

          if (response.error.status_ortu) {
            $('#status_ortu').addClass('is-invalid');
            $('#errorStatusOrtu').html(response.error.status_ortu);
          } else {
            $('#status_ortu').removeClass('is-invalid');
            $('#errorStatusOrtu').html('');
          }

          if (response.error.pekerjaan_ortu) {
            $('#pekerjaan_ortu').addClass('is-invalid');
            $('#errorPekerjaanOrtu').html(response.error.pekerjaan_ortu);
          } else {
            $('#pekerjaan_ortu').removeClass('is-invalid');
            $('#errorPekerjaanOrtu').html('');
          }

          if (response.error.pendidikan_ortu) {
            $('#pendidikan_ortu').addClass('is-invalid');
            $('#errorPendidikanOrtu').html(response.error.pendidikan_ortu);
          } else {
            $('#pendidikan_ortu').removeClass('is-invalid');
            $('#errorPendidikanOrtu').html('');
          }

          if (response.error.alamat_ortu) {
            $('#alamat_ortu').addClass('is-invalid');
            $('#errorAlamatOrtu').html(response.error.alamat_ortu);
          } else {
            $('#alamat_ortu').removeClass('is-invalid');
            $('#errorAlamatOrtu').html('');
          }

          if (response.error.agama_ortu) {
            $('#agama_ortu').addClass('is-invalid');
            $('#errorAgamaOrtu').html(response.error.agama_ortu);
          } else {
            $('#agama_ortu').removeClass('is-invalid');
            $('#errorAgamaOrtu').html('');
          }

          if (response.error.jenis_kelamin_ortu) {
            $('#jenis_kelamin_ortu').addClass('is-invalid');
            $('#errorJenisKelaminOrtu').html(response.error.jenis_kelamin_ortu);
          } else {
            $('#jenis_kelamin_ortu').removeClass('is-invalid');
            $('#errorJenisKelaminOrtu').html('');
          }

          if (response.error.data_siswa) {
            $('#notifikasi_ortu').removeClass('d-none');
            $('#notifikasi_ortu').addClass('alert-danger');
            $('#isi_pesan_berhasil_ortu').html(response.error.data_siswa);
          } else {
            $('#notifikasi_ortu').addClass('d-none');
            $('#isi_pesan_berhasil_ortu').html('');
          }
        } else {
          // Fungsi tambil data diambil dari dalam file index.php
          $('#notifikasi_ortu').removeClass('d-none');
          $('#notifikasi_ortu').addClass('alert-success');
          $('#isi_pesan_berhasil_ortu').html(response.berhasil);

          let urlLoad = "<?= site_url('rahasia/get-element-data-ortu/') ?>" + response.siswa_id + '/1';

          // Load element lokal
          ajaxLoad(urlLoad, "content_identitas_ortu");
        }
      },
      error: function(xhr, ajaxOptins, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }
    });
  });

  // SIMPAN DATA SEKOLAH
  $('#data_sekolah').submit(function(e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function() {
        $('#tombol_simpan_data_sekolah').attr('disable', 'disabled');
        $('#tombol_simpan_data_sekolah').html('<i class="fa fa-spin fa-spinner"></i>');
      },

      complete: function() {
        $('#tombol_simpan_data_sekolah').removeAttr('disable');
        $('#tombol_simpan_data_sekolah').html('Simpan');
      },
      success: function(response) {
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

          if (response.error.data_siswa) {
            $('#notifikasi_data_sekolah').removeClass('d-none');
            $('#notifikasi_data_sekolah').addClass('alert-danger');
            $('#isi_pesan_data_sekolah').html(response.error.data_siswa);
          } else {
            $('#notifikasi_data_sekolah').addClass('d-none');
            $('#isi_pesan_data_sekolah').html('');
          }
        } else {
          // Fungsi tambil data diambil dari dalam file index.php
          $('#notifikasi_data_sekolah').removeClass('d-none');
          $('#notifikasi_data_sekolah').addClass('alert-success');
          $('#isi_pesan_data_sekolah').html(response.berhasil);

          let urlLoad = "<?= site_url('rahasia/get-element-data-sekolah-asal/') ?>" + response.siswa_id;

          // Load element lokal
          ajaxLoad(urlLoad, "content_sekolah_asal");
        }
      },
      error: function(xhr, ajaxOptins, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }
    });
  });

  // SIMPAN PENDUKUNG
  $('#data_pendukung').submit(function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      beforeSend: function() {
        $('#tombol_simpan_berkas').attr('disable', 'disabled');
        $('#tombol_simpan_berkas').html('<i class="fa fa-spin fa-spinner"></i>');
      },

      complete: function() {
        $('#tombol_simpan_berkas').removeAttr('disable');
        $('#tombol_simpan_berkas').html('Simpan');
      },
      success: function(response) {
        if (response.error) {
          if (response.error.nama_berkas) {
            $('#nama_berkas').addClass('is-invalid');
            $('#errorNamaBerkas').html(response.error.nama_berkas);
          } else {
            $('#nama_berkas').removeClass('is-invalid');
            $('#errorNamaBerkas').html('');
          }

          if (response.error.upload_berkas) {
            $('#upload_berkas').addClass('is-invalid');
            $('#errorUploadBerkas').html(response.error.upload_berkas);
          } else {
            $('#upload_berkas').removeClass('is-invalid');
            $('#errorUploadBerkas').html('');
          }

          if (response.error.data_siswa) {
            $('#notifikasi_data_pendukung').removeClass('d-none');
            $('#notifikasi_data_pendukung').addClass('alert-danger');
            $('#isi_pesan_nilai_data_pendukung').html(response.error.data_siswa);
          } else {
            $('#notifikasi_data_pendukung').addClass('d-none');
            $('#isi_pesan_nilai_data_pendukung').html('');
          }
        } else {
          // Fungsi tambil data diambil dari dalam file index.php
          $('#notifikasi_data_pendukung').removeClass('d-none');
          $('#notifikasi_data_pendukung').addClass('alert-success');
          $('#isi_pesan_nilai_data_pendukung').html(response.berhasil);

          let urlLoad = "<?= site_url('rahasia/get-element-data-pendukung/') ?>" + response.siswa_id + "/1";

          // Load element lokal
          ajaxLoad(urlLoad, "content_data_berkas");
        }
      },
      error: function(xhr, ajaxOptins, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }
    });
  });

  // SIMPAN DATA NILAI
  $('#berkas_nilai').submit(function(e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function() {
        $('#tombol_simpan_berkas').attr('disable', 'disabled');
        $('#tombol_simpan_berkas').html('<i class="fa fa-spin fa-spinner"></i>');
      },

      complete: function() {
        $('#tombol_simpan_berkas').removeAttr('disable');
        $('#tombol_simpan_berkas').html('Simpan');
      },
      success: function(response) {
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

          if (response.error.data_siswa) {
            $('#notifikasi_nilai_mapel').removeClass('d-none');
            $('#notifikasi_nilai_mapel').addClass('alert-danger');
            $('#isi_pesan_nilai_mapel').html(response.error.data_siswa);
          } else {
            $('#notifikasi_nilai_mapel').addClass('d-none');
            $('#isi_pesan_nilai_mapel').html('');
          }

        } else {
          // Fungsi tambil data diambil dari dalam file index.php
          $('#notifikasi_nilai_mapel').removeClass('d-none');
          $('#notifikasi_nilai_mapel').addClass('alert-success');
          $('#isi_pesan_nilai_mapel').html(response.berhasil);

          let urlLoad = "<?= site_url('rahasia/get-element-data-nilai/') ?>" + response.siswa_id + "/1";

          // Load element lokal
          ajaxLoad(urlLoad, "content_data_nilai");
        }
      },
      error: function(xhr, ajaxOptins, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }
    });
  });

  // Ajax Load Data secara dinamis tanpa refresh
  function ajaxLoad(_url, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    $.ajax({
      type: "GET",
      url: _url,
      contentType: false,
      success: function(data) {
        $("#" + content).html(data);
      },
      error: function(xhr, status, error) {
        bootbox.alert(xhr.responseText);
      }
    });
  }

  function onFileUpload(input, id) {
    id = id || '#ajaxImgUpload';
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $(id).attr('src', e.target.result)
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  function tambahDataOrangTua(siswaId, addData) {
    let urlLoad = "<?= site_url('rahasia/get-element-data-ortu/') ?>" + siswaId + '/' + addData;
    ajaxLoad(urlLoad, "content_identitas_ortu");
  }

  function tambahDataNilai(siswaId, addData) {
    let urlLoad = "<?= site_url('rahasia/get-element-data-nilai/') ?>" + siswaId + '/' + addData;
    ajaxLoad(urlLoad, "content_data_nilai");
  }

  function tambahDataPendukung(siswaId, addData) {
    let urlLoad = "<?= site_url('rahasia/get-element-data-pendukung/') ?>" + siswaId + '/' + addData;
    ajaxLoad(urlLoad, "content_data_berkas");
  }

  function closePesan(content) {
    $('#'+content).addClass('d-none');
    $('#'+content).removeClass('alert-success');
    $('#'+content).removeClass('alert-danger');
  }

  function konfirmasiPendaftaran(userId) {
    $.ajax({
      type: "post",
      url: "<?= site_url('rahasia/konfirmasi-pendaftaran') ?>",
      data: {
        user_id: userId
      },
      dataType: "json",
      beforeSend: function() {
        $('#tombol_konfirmasi').attr('disable', 'disabled');
        $('#tombol_konfirmasi').html('<i class="fa fa-spin fa-spinner"></i>');
      },

      complete: function() {
        $('#tombol_konfirmasi').removeAttr('disable');
        $('#tombol_konfirmasi').html('Konfirmasi');
      },
      success: function(response) {
        if (response.berhasil) {

          $('#notifikasi_konfirmasi').removeClass('d-none');
          $('#notifikasi_konfirmasi').addClass('alert-success');
          $('#isi_pesan_konfirmasi').html(response.berhasil);

          $('#tombol_konfirmasi').addClass('d-none');
          $('#tambah_data_nilai').addClass('d-none');
          $('#tambah_data_pendukung').addClass('d-none');
          $('#tambah_data_ortu').addClass('d-none');
        }
      },
      error: function(xhr, ajaxOptins, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }
    });
  }

  $(document).ready(function() {
    // Select2
    $(".select2").select2({
      width: '100%'
    });
  });
</script>
<?= $this->endSection() ?>