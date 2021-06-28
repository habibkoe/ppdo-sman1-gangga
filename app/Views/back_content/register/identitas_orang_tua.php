<?php if ((count($data_orang_tua) > 0 && (isset($addData) && $addData == 2)) || count($data_orang_tua) == 0) : ?>
    <?= form_open('rahasia/simpan-orang-tua-wali', ['id' => 'orang_tua_wali']) ?>
    <?= csrf_field() ?>
    <div class="form-group row">
        <label for="nik_ortu" class="col-sm-3 col-form-label">
            Nik
            <small>Nik berdasarkan KK, sebanyak 16 digit</small>
        </label>
        <div class="col-sm-5">
            <input class="form-control" type="text" id="nik_ortu" name="nik_ortu">
            <div class="invalid-feedback" id="errorNikOrtu"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_awal_ortu" class="col-sm-3 col-form-label">Nama Awal</label>
        <div class="col-sm-5">
            <input class="form-control" type="text" id="nama_awal_ortu" name="nama_awal_ortu">
            <div class="invalid-feedback" id="errorNamaAwalOrtu"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_akhir_ortu" class="col-sm-3 col-form-label">Nama Akhir</label>
        <div class="col-sm-5">
            <input class="form-control" type="text" id="nama_akhir_ortu" name="nama_akhir_ortu">
        </div>
    </div>
    <div class="form-group row">
        <label for="jenis_kelamin_ortu" class="col-sm-3 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-5">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" id="jenis_kelamin_ortu" name="jenis_kelamin_ortu">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="1">Laki - Laki</option>
                <option value="2">Perempuan</option>
            </select>
            <div class="invalid-feedback" id="errorJenisKelaminOrtu"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="agama_ortu" class="col-sm-3 col-form-label">Agama</label>
        <div class="col-sm-5">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" id="agama_ortu" name="agama_ortu">
                <option value="">-- Pilih agama --</option>
                <?php foreach ($master_agama as $agama) : ?>
                    <option value="<?= $agama['id'] ?>"><?= $agama['nama'] ?></option>
                <?php endforeach ?>
            </select>
            <div class="invalid-feedback" id="errorAgamaOrtu"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="alamat_ortu" class="col-sm-3 col-form-label">Alamat</label>
        <div class="col-sm-9">
            <textarea name="alamat_ortu" id="alamat_ortu" rows="3" class="form-control"></textarea>
            <div class="invalid-feedback" id="errorAlamatOrtu"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="pendidikan_ortu" class="col-sm-3 col-form-label">Pendidikan</label>
        <div class="col-sm-5">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" id="pendidikan_ortu" name="pendidikan_ortu">
                <option value="">-- Pilih pendidikan --</option>
                <?php foreach ($master_pendidikan as $pendidikan) : ?>
                    <option value="<?= $pendidikan['id'] ?>"><?= $pendidikan['nama'] ?></option>
                <?php endforeach ?>
            </select>
            <div class="invalid-feedback" id="errorPendidikanOrtu"></div>
        </div>
    </div>

    <div class="form-group row">
        <label for="pekerjaan_ortu" class="col-sm-3 col-form-label">Pekerjaan</label>
        <div class="col-sm-5">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" id="pekerjaan_ortu" name="pekerjaan_ortu">
                <option value="">-- Pilih pekerjaan --</option>
                <?php foreach ($master_pekerjaan as $pekerjaan) : ?>
                    <option value="<?= $pekerjaan['id'] ?>"><?= $pekerjaan['nama'] ?></option>
                <?php endforeach ?>
            </select>
            <div class="invalid-feedback" id="errorPekerjaanOrtu"></div>
        </div>
    </div>

    <div class="form-group row">
        <label for="status_ortu" class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-5">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" id="status_ortu" name="status_ortu">
                <option>-- Pilih status --</option>
                <?php foreach ($status as $index => $stat) : ?>
                    <?php if (count($data_orang_tua) > 0) : ?>
                        <?php if (!in_array($index, $ortu_terpilih)) : ?>
                            <option value="<?= $index ?>"><?= $stat ?></option>
                        <?php endif ?>
                    <?php else : ?>
                        <option value="<?= $index ?>"><?= $stat ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback" id="errorStatusOrtu"></div>
        </div>
    </div>
    <button class="btn btn-outline-primary btn-sm" id="tombol_simpan_ortu">Simpan</button>
    <?= form_close() ?>
<?php else : ?>
    <button id="tambah_data_ortu" class="btn btn-primary btn-sm <?= $is_lengkap ? 'd-none' : '' ?>" onclick="tambahDataOrangTua(<?= isset($siswaId) ? $siswaId : $data_siswa['id'] ?>, 2)">Tambah data</button>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered">
            <?php foreach ($data_orang_tua as $data_ortu) : ?>
                <tr>
                    <td><?= $data_ortu['nik'] ?></td>
                    <td>
                        <?= $data_ortu['nama_awal'] . " " . $data_ortu['nama_akhir'] ?>
                    </td>
                    <td>
                        <?= $status[$data_ortu['status']] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
<?php endif ?>

<script>
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
                } else {
                    // Fungsi tambil data diambil dari dalam file index.php
                    // tampilData();
                    $('#notifikasi_ortu').removeClass('d-none');
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

    $(document).ready(function() {
        // Select2
        $(".select2").select2({
            width: '100%'
        });
    });
</script>