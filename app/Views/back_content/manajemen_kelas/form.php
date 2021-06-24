<div class="modal fade bs-example-modal-center" id="modaltambahsiswa" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data siswa ke kelas <?= $master_kelas['nama'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('rahasia/simpan-data-siswa-kelas', ['id' => 'simpandata']) ?>
            <?= csrf_field() ?>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>
                                    No
                                </td>
                                <td>Poto</td>
                                <td>
                                    NIK
                                </td>
                                <td>Nis</td>
                                <td>
                                    Nama
                                </td>
                                <td>
                                    Pilih
                                </td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($siswa as $index => $s): ?>
                                <tr>
                                    <td>
                                        <?= $index+1 ?>
                                    </td>
                                    <td>
                                    <img src="<?= base_url($s['pas_poto']) ?>" width="50">
                                    </td>
                                    <td>
                                        <?= $s['nik'] ?>
                                    </td>
                                    <td>
                                        <?= $s['nis'] ?>
                                    </td>
                                    <td>
                                        <?= $s['nama_awal'] . " " . $s['nama_akhir']?>
                                    </td>
                                    <td>
                                        <input type="checkbox" value="<?= $s['id'] ?>" name="pilih_siswa[<?= $s['id'] ?>]" id="pilih_siswa_<?= $s['id'] ?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <div class="modal-footer">
                <input type="hidden" name="kelas_id" value="<?= $master_kelas['id'] ?>">
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
                    
                } else {
                    $('#modaltambahsiswa').modal('hide');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        })
    })
</script>