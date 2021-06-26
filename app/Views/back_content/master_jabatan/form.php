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
            <?= form_open('rahasia/simpan-data-jabatan', ['id' => 'simpandata']) ?>
            <?= csrf_field() ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">
                        Nama
                        <br>
                        <small>isi nama master data jabatan</small>
                    </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" id="nama" name="nama">
                        <div class="invalid-feedback" id="errorNama"></div>
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
                if(response.error) {
                    if(response.error.nama) {
                        $('#nama').addClass('is-invalid');
                        $('#errorNama').html(response.error.nama);
                    }else {
                        $('#nama').removeClass('is-invalid');
                        $('#errorNama').html('');
                    }
                }else {
                    $('#modaltambah').modal('hide');
                    // Fungsi tambil data diambil dari dalam file index.php
                    tampilData();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        })
    })
</script>