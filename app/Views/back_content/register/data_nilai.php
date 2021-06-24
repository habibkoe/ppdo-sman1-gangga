<?php if(count($berkas_nilai) > 0): ?>
    <?php if(isset($addData) && $addData == 2): ?>
        <?= form_open('rahasia/simpan-berkas-nilai', ['id' => 'berkas_nilai']) ?>
        <?= csrf_field() ?>
        <div class="form-group row">
            <label for="nama_mata_pelajaran" class="col-sm-3 col-form-label">Nama Mata Pelajaran</label>
            <div class="col-sm-9">
                <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;"
                    name="nama_mata_pelajaran" id="nama_mata_pelajaran">
                    <option value="">-- Pilih Mata Pelajaran --</option>
                    <option value="Matematika">Matematika</option>
                    <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                    <option value="IPA">IPA</option>
                </select>
                <div class="invalid-feedback" id="errorMapel"></div>
            </div>
        </div>
        <div class="form-group row">
            <label for="nilai_mapel" class="col-sm-3 col-form-label">Nilai</label>
            <div class="col-sm-9">
                <input class="form-control" type="text" id="nilai_mapel" name="nilai_mapel">
                <div class="invalid-feedback" id="errorNilaiMapel"></div>
            </div>
        </div>
        <button class="btn btn-outline-primary btn-sm" id="tombol_simpan_berkas">Simpan</button>
        <?= form_close() ?>

        <script>
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
                } else {
                // Fungsi tambil data diambil dari dalam file index.php
                // tampilData();
                $('#notifikasi_nilai_mapel').removeClass('d-none');
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

        $(document).ready(function() {
            // Select2
            $(".select2").select2({
            width: '100%'
            });
        });
        </script>
    <?php else: ?>
        <button class="btn btn-primary btn-sm"
            onclick="tambahDataNilai(<?= isset($siswaId) ? $siswaId : $data_siswa['id'] ?>, 2)">Tambah data</button>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>
                        Mata Pelajaran
                    </td>
                    <td>
                        Nilai
                    </td>
                </tr>
                <?php foreach($berkas_nilai as $data_nilai): ?>
                <tr>
                    <td>
                        <?= $data_nilai['mata_pelajaran'] ?>
                    </td>
                    <td>
                        <?= $data_nilai['nilai'] ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    <?php endif; ?>

<?php else: ?>
<?= form_open('rahasia/simpan-berkas-nilai', ['id' => 'berkas_nilai']) ?>
<?= csrf_field() ?>
<div class="form-group row">
    <label for="nama_mata_pelajaran" class="col-sm-3 col-form-label">Nama Mata Pelajaran</label>
    <div class="col-sm-9">
        <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;"
            name="nama_mata_pelajaran" id="nama_mata_pelajaran">
            <option value="">-- Pilih Mata Pelajaran --</option>
            <option value="Matematika">Matematika</option>
            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
            <option value="Bahasa Inggris">Bahasa Inggris</option>
            <option value="IPA">IPA</option>
        </select>
        <div class="invalid-feedback" id="errorMapel"></div>
    </div>
</div>
<div class="form-group row">
    <label for="nilai_mapel" class="col-sm-3 col-form-label">Nilai</label>
    <div class="col-sm-9">
        <input class="form-control" type="text" id="nilai_mapel" name="nilai_mapel">
        <div class="invalid-feedback" id="errorNilaiMapel"></div>
    </div>
</div>
<button class="btn btn-outline-primary btn-sm" id="tombol_simpan_berkas">Simpan</button>
<?= form_close() ?>
<?php endif; ?>