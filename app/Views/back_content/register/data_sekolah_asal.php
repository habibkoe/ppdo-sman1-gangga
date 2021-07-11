
<?php if (count($sekolah_asal) > 0) : ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <?php foreach ($sekolah_asal as $data_sekolah) : ?>
                <tr>
                    <td>
                        No Ijazah
                    </td>
                    <td>
                        <?= $data_sekolah['no_ijazah'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nama Sekolah
                    </td>
                    <td>
                        <?= $data_sekolah['nama_sekolah'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat Sekolah
                    </td>
                    <td>
                        <?= $data_sekolah['alamat_sekolah'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
<?php else : ?>
    <?= form_open('rahasia/simpan-data-sekolah', ['id' => 'data_sekolah']) ?>
    <?= csrf_field() ?>
    <div class="form-group row">
        <label for="no_ijazah_asal" class="col-sm-3 col-form-label">No. Ijazah</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" id="no_ijazah_asal" name="no_ijazah_asal">
            <div class="invalid-feedback" id="errorNoIjazah"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_sekolah_asal" class="col-sm-3 col-form-label">Nama Sekolah</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" id="nama_sekolah_asal" name="nama_sekolah_asal">
            <div class="invalid-feedback" id="errorNamaSekolah"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="alamat_sekolah_asal" class="col-sm-3 col-form-label">Alamat Sekolah</label>
        <div class="col-sm-9">
            <textarea name="alamat_sekolah_asal" id="alamat_sekolah_asal" rows="3" class="form-control"></textarea>
        </div>
    </div>
    <button class="btn btn-outline-primary btn-sm" id="tombol_simpan_data_sekolah">Simpan</button>
    <?= form_close() ?>
<?php endif; ?>

<script>
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
                } else {
                    // Fungsi tambil data diambil dari dalam file index.php
                    // tampilData();
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
</script>