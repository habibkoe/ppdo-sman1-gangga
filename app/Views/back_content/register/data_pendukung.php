<?= form_open('rahasia/simpan-data-pendukung', ['id' => 'data_pendukung']) ?>
<?= csrf_field() ?>
<div class="form-group row">
  <label for="nama_berkas" class="col-sm-3 col-form-label">Nama Berkas</label>
  <div class="col-sm-9">
    <input class="form-control" type="text" id="nama_berkas">
    <div class="invalid-feedback" id="errorNamaBerkas"></div>
  </div>
</div>
<div class="form-group row">
  <label for="upload_berkas" class="col-sm-3 col-form-label">Upload</label>
  <div class="col-sm-9">
    <input type="file" name="upload_berkas" id="upload_berkas">
  </div>
</div>
<button class="btn btn-outline-primary btn-sm" id="tomvol_simpan_data_pendukung">Simpan</button>
<?= form_close() ?>