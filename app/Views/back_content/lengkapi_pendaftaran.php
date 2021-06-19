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
        <?= form_open('simpan-data-diri', ['id' => 'simpan_data_diri']) ?>
        <div class="form-group row">
          <label for="nik" class="col-sm-3 col-form-label">Nik</label>
          <div class="col-sm-5">
            <input class="form-control" type="text" id="nik">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama_awal" class="col-sm-3 col-form-label">Nama Awal</label>
          <div class="col-sm-5">
            <input class="form-control" type="text" id="nama_awal">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama_akhir" class="col-sm-3 col-form-label">Nama Akhir</label>
          <div class="col-sm-5">
            <input class="form-control" type="text" id="nama_akhir">
          </div>
        </div>
        <div class="form-group row">
          <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
          <div class="col-sm-4">
            <input class="form-control" type="date" id="tanggal_lahir">
          </div>
        </div>
        <div class="form-group row">
          <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-4">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;">
              <option></option>
              <option value="1">Laki - Laki</option>
              <option value="2">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="agama" class="col-sm-3 col-form-label">Agama</label>
          <div class="col-sm-4">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;">
              <option value=""></option>
              <?php foreach($master_agama as $agama): ?>
                <option value="<?= $agama['id'] ?>"><?= $agama['nama'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
          <div class="col-sm-9">
            <textarea name="tempat_lahir" id="tempat_lahir" rows="3" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="jurusant" class="col-sm-3 col-form-label">Jurusan</label>
          <div class="col-sm-6">
            <select name="jurusan" id="jurusan" class="select2 form-control custom-select" style="width: 100%; height:36px !important;">
              <option value=""></option>
              <?php foreach($master_jurusan as $jurusan): ?>
                <option value="<?= $jurusan['id'] ?>"><?= $jurusan['nama'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <button class="btn btn-outline-primary btn-sm">Simpan</button>
        <?= form_close() ?>
      </div>
    </div>

    <div class="card m-b-30">
      <div class="card-body">
        <h5>Identitas Orang Tua / Wali:</h5>
        <?= form_open('orang-tua-wali', ['id' => 'orang_tua_wali']) ?>
        <div class="form-group row">
          <label for="nik_orang_tua" class="col-sm-3 col-form-label">Nik</label>
          <div class="col-sm-5">
            <input class="form-control" type="text" id="nik_orang_tua">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama_awal_orang_tua" class="col-sm-3 col-form-label">Nama Awal</label>
          <div class="col-sm-5">
            <input class="form-control" type="text" id="nama_awal">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama_akhir_orang_tua" class="col-sm-3 col-form-label">Nama Akhir</label>
          <div class="col-sm-5">
            <input class="form-control" type="text" id="nama_akhir">
          </div>
        </div>
        <div class="form-group row">
          <label for="jenis_kelamin_orang_tua" class="col-sm-3 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-4">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" name="jenis_kelamin_orang_tua">
              <option></option>
              <option value="1">Laki - Laki</option>
              <option value="2">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="agama_orang_tua" class="col-sm-3 col-form-label">Agama</label>
          <div class="col-sm-4">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" name="agama_orang_tua">
              <option value=""></option>
              <?php foreach($master_agama as $agama): ?>
                <option value="<?= $agama['id'] ?>"><?= $agama['nama'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="alamat_orang_tua" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea name="alamat_orang_tua" id="alamat" rows="3" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="pendidikan_orang_tua" class="col-sm-3 col-form-label">Pendidikan</label>
          <div class="col-sm-5">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" name="pendidikan_orang_tua">
              <option value=""></option>
              <?php foreach($master_pendidikan as $pendidikan): ?>
                <option value="<?= $pendidikan['id'] ?>"><?= $pendidikan['nama'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="pekerjaan_orang_tua" class="col-sm-3 col-form-label">Pekerjaan</label>
          <div class="col-sm-5">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" name="pekerjaan_orang_tua">
              <option value=""></option>
              <?php foreach($master_pekerjaan as $pekerjaan): ?>
                <option value="<?= $pekerjaan['id'] ?>"><?= $pekerjaan['nama'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="status_orang_tua" class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-5">
          <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" name="status_orang_tua">
              <option></option>
              <option value="1">Bapak / Ayah</option>
              <option value="2">Ibu / Mama</option>
              <option value="3">Kakek</option>
              <option value="4">Nenek</option>
              <option value="5">Paman / Om / Pak de</option>
              <option value="6">Bibi / Tante / Buk de</option>
            </select>
          </div>
        </div>
        <button class="btn btn-outline-primary btn-sm">Simpan</button>
        <?= form_close() ?>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-lg-12 col-xl-6">
  <div class="card m-b-30">
    <div class="card-body">
      <h5>Data Sekolah Asal:</h5>
      <?= form_open('data-sekolah', ['id' => 'data_sekolah']) ?>
      <div class="form-group row">
        <label for="no_ijazah_asal" class="col-sm-3 col-form-label">No. Ijazah</label>
        <div class="col-sm-9">
        <input class="form-control" type="text" id="no_ijazah_asal">
        </div>
      </div>
      <div class="form-group row">
        <label for="nama_sekolah_asal" class="col-sm-3 col-form-label">Nama Sekolah</label>
        <div class="col-sm-9">
        <input class="form-control" type="text" id="nama_sekolah_asal">
        </div>
      </div>
      <div class="form-group row">
        <label for="alamat_sekolah_asal" class="col-sm-3 col-form-label">Alamat Sekolah</label>
        <div class="col-sm-9">
          <textarea name="alamat" id="alamat_sekolah_asal" rows="3" class="form-control"></textarea>
        </div>
      </div>
      <button class="btn btn-outline-primary btn-sm">Simpan</button>
      <?= form_close() ?>
    </div>
  </div>

  <div class="card m-b-30">
    <div class="card-body">
      <h5>Data Nilai:</h5>
      <?= form_open('berkas-nilai', ['id' => 'berkas_nilai']) ?>
      <div class="form-group row">
        <label for="nama_mata_pelajaran" class="col-sm-3 col-form-label">Nama Mata Pelajaran</label>
        <div class="col-sm-9">
        <input class="form-control" type="text" id="nama_mata_pelajaran">
        </div>
      </div>
      <div class="form-group row">
        <label for="no_ijazah_asal" class="col-sm-3 col-form-label">Nilai</label>
        <div class="col-sm-9">
        <input class="form-control" type="text" id="no_ijazah_asal">
        </div>
      </div>
      <button class="btn btn-outline-primary btn-sm">Simpan</button>
      <?= form_close() ?>
    </div>
  </div>
  <div class="card m-b-30">
    <div class="card-body">
        <h5>Berkas Pendukung:</h5>
        <?= form_open('data-pendukung', ['id' => 'data_pendukung']) ?>
        <div class="form-group row">
          <label for="nama_mata_pelajaran" class="col-sm-3 col-form-label">Nama Berkas</label>
          <div class="col-sm-9">
          <input class="form-control" type="text" id="nama_mata_pelajaran">
          </div>
        </div>
        <div class="form-group row">
          <label for="upload_berkas" class="col-sm-3 col-form-label">Upload</label>
          <div class="col-sm-9">
            <input type="file" name="upload_berkas" id="upload_berkas">
          </div>
        </div>
        <button class="btn btn-outline-primary btn-sm">Simpan</button>\
        <?= form_close() ?>
    </div>
  </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="<?= base_url('theme/back/assets/plugins/select2/select2.min.js') ?>" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    // Select2
    $(".select2").select2({
            width: '100%'
        });
    });
</script>
<?= $this->endSection() ?>