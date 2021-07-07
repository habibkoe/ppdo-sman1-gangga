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
        <div id="content_identitas_utama"></div>
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
        <div id="content_identitas_ortu"></div>
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
        <div id="content_sekolah_asal"></div>
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
        <div id="content_data_nilai"></div>
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
        <div id="content_data_berkas"></div>
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

    // Load data diri / data utama
    let urlLoadDataDiri = "<?= site_url('rahasia/get-element-data-diri/0') ?>";
    ajaxLoad(urlLoadDataDiri, "content_identitas_utama");

    // Load data orang tua
    let urlLoadOrtu = "<?= site_url('rahasia/get-element-data-ortu/0/0') ?>";
    ajaxLoad(urlLoadOrtu, "content_identitas_ortu");

    // Load asal sekolah
    let urlLoadAsalSekolah = "<?= site_url('rahasia/get-element-data-sekolah-asal/0') ?>";
    ajaxLoad(urlLoadAsalSekolah, "content_sekolah_asal");

    // Load data nilai
    let urlLoadNilai = "<?= site_url('rahasia/get-element-data-nilai/0/0') ?>";
    ajaxLoad(urlLoadNilai, "content_data_nilai");

    // Load data pendukung
    let urlLoadNilai = "<?= site_url('rahasia/get-element-data-pendukung/0/0') ?>";
    ajaxLoad(urlLoadNilai, "content_data_berkas");
    
    $(".select2").select2({
      width: '100%'
    });
  });
</script>
<?= $this->endSection() ?>