<div class="modal fade bs-example-modal-center" id="modaltambah" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('rahasia/simpan-data-kelas', ['id' => 'simpandata']) ?>
            <?= csrf_field() ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">
                        Nama kelas
                        <br>
                        <small>isi nama kelas</small>
                    </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" id="nama" name="nama">
                        <div class="invalid-feedback" id="errorNama"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lokasi" class="col-sm-3 col-form-label">
                        Lokasi kelas
                        <br>
                        <small>Lokasi kelas</small>
                    </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" id="lokasi" name="lokasi">
                        <div class="invalid-feedback" id="errorLokasi"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="daya_tampung" class="col-sm-3 col-form-label">
                        Daya tampung
                        <br>
                        <small>isi daya tampung berapa orang</small>
                    </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" id="daya_tampung" name="daya_tampung">
                        <div class="invalid-feedback" id="errorDayaTampung"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inventaris" class="col-sm-3 col-form-label">
                        Inventaris kelas
                        <br>
                        <small>isi nama kelas</small>
                    </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" id="inventaris" name="inventaris">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="wali_kelas_id" class="col-sm-3 col-form-label">
                        Wali kelas
                        <br>
                        <small>isi nama wali kelas</small>
                    </label>
                    <div class="col-sm-9">
                        <select name="wali_kelas_id" id="wali_kelas_id" class="form-control select2">
                            <option value="">-- pilih wali kelas --</option>
                            <?php foreach($wali_kelas as $wali): ?>
                                <option value="<?= $wali['id'] ?>"><?= $wali['nip'] ?> <?= $wali['nama_awal'] . " " . $wali['nama_akhir'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback" id="errorWaliKelas"></div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect waves-light" id="btnsimpan">Simpan</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            </div>

            <?= form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $("#simpandata").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function () {
                $('#btnsimpan').attr('disable', 'disabled');
                $('#btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function () {
                $('#btnsimpan').removeAttr('disable');
                $('#btnsimpan').html('Simpan');
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.nama) {
                        $('#nama').addClass('is-invalid');
                        $('#errorNama').html(response.error.nama);
                    } else {
                        $('#nama').removeClass('is-invalid');
                        $('#errorNama').html('');
                    }

                    if (response.error.lokasi) {
                        $('#lokasi').addClass('is-invalid');
                        $('#errorLokasi').html(response.error.lokasi);
                    } else {
                        $('#lokasi').removeClass('is-invalid');
                        $('#errorLokasi').html('');
                    }

                    if (response.error.daya_tampung) {
                        $('#daya_tampung').addClass('is-invalid');
                        $('#errorDayaTampung').html(response.error.daya_tampung);
                    } else {
                        $('#daya_tampung').removeClass('is-invalid');
                        $('#errorDayaTampung').html('');
                    }

                    if (response.error.wali_kelas_id) {
                        $('#wali_kelas_id').addClass('is-invalid');
                        $('#errorWaliKelas').html(response.error.wali_kelas_id);
                    } else {
                        $('#wali_kelas_id').removeClass('is-invalid');
                        $('#errorWaliKelas').html('');
                    }
                } else {
                    $('#modaltambah').modal('hide');
                    tampilData();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        })
    });

    $(document).ready(function () {
    // Select2
    $(".select2").select2({
      width: '100%'
    });
  });
</script>