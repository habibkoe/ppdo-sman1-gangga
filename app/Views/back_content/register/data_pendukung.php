<?php if(count($berkas_pendukung) > 0): ?>
  <?php if(isset($addData) && $addData == 2): ?>
    <?= form_open('rahasia/simpan-data-pendukung', ['id' => 'data_pendukung', 'enctype' => 'multipart/form-data']) ?>
    <?= csrf_field() ?>
    <div class="form-group row">
      <label for="nama_berkas" class="col-sm-3 col-form-label">Nama Berkas</label>
      <div class="col-sm-9">
        <input class="form-control" type="text" id="nama_berkas" name="nama_berkas">
        <div class="invalid-feedback" id="errorNamaBerkas"></div>
      </div>
    </div>
    <div class="form-group row">
      <label for="upload_berkas" class="col-sm-3 col-form-label">Upload</label>
      <div class="col-sm-9">
        <input type="file" name="upload_berkas" id="upload_berkas" class="form-control">
        <div class="invalid-feedback" id="errorUploadBerkas"></div>
      </div>
    </div>
    <button class="btn btn-outline-primary btn-sm" id="tombol_simpan_data_pendukung">Simpan</button>
    <?= form_close() ?>

    <script>
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
            } else {
              // Fungsi tambil data diambil dari dalam file index.php
              // tampilData();
              $('#notifikasi_data_pendukung').removeClass('d-none');
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
    </script>
  <?php else: ?>
    <button class="btn btn-primary btn-sm"
            onclick="tambahDataPendukung(<?= isset($siswaId) ? $siswaId : $data_siswa['id'] ?>, 2)">Tambah data</button>
    <div class="table-responsive">
    <hr>
      <table class="table table-bordered">
        <tr>
          <td>
            Nama Berkas
          </td>
          <td>
            Berkas
          </td>
        </tr>
        <?php foreach($berkas_pendukung as $data_berkas): ?>
        <tr>
          <td>
            <?= $data_berkas['nama'] ?>
          </td>
          <td>
            <a href="<?= base_url($data_berkas['path']) ?>">View</a>
          </td>
        </tr>
        <?php endforeach ?>
      </table>
    </div>  <?php endif ?>

<?php else: ?>
<?= form_open('rahasia/simpan-data-pendukung', ['id' => 'data_pendukung', 'enctype' => 'multipart/form-data']) ?>
<?= csrf_field() ?>
<div class="form-group row">
  <label for="nama_berkas" class="col-sm-3 col-form-label">Nama Berkas</label>
  <div class="col-sm-9">
    <input class="form-control" type="text" id="nama_berkas" name="nama_berkas">
    <div class="invalid-feedback" id="errorNamaBerkas"></div>
  </div>
</div>
<div class="form-group row">
  <label for="upload_berkas" class="col-sm-3 col-form-label">Upload</label>
  <div class="col-sm-9">
    <input type="file" name="upload_berkas" id="upload_berkas" class="form-control">
    <div class="invalid-feedback" id="errorUploadBerkas"></div>
  </div>
</div>
<button class="btn btn-outline-primary btn-sm" id="tombol_simpan_data_pendukung">Simpan</button>
<?= form_close() ?>
<?php endif; ?>