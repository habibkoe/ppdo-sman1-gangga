<?php if (count($data_siswa) > 0) : ?>
<br>
<div class="table-responsive">
    <table class="table">
        <tr>
            <td>
                Pas poto
            </td>
            <td>
                <img src="<?= base_url($data_siswa['pas_poto']) ?>" width="100">
            </td>
        </tr>
        <tr>
            <td>
                Calon NIS
            </td>
            <td>
                <?= $data_siswa['nis'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Nik
            </td>
            <td>
                <?= $data_siswa['nik'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Nama
            </td>
            <td>
                <?= $data_siswa['nama_awal'] ?> <?= $data_siswa['nama_akhir'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Tanggal lahir
            </td>
            <td>
                <?= $data_siswa['tanggal_lahir'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Jenis kelamin
            </td>
            <td>
                <?= $data_siswa['jenis_kelamin'] = 1 ? 'Laki - Laki' : 'Perempuan' ?>
            </td>
        </tr>
        <tr>
            <td>
                Agama
            </td>
            <td>
                <?= $data_siswa['nama_agama'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Tempat lahir
            </td>
            <td>
                <?= $data_siswa['tempat_lahir'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Alamat
            </td>
            <td>
                <?= $data_siswa['alamat'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Jurusan yang di pilih
            </td>
            <td>
                <?= $data_siswa['nama_jurusan'] ?>
            </td>
        </tr>
    </table>
</div>
<?php else : ?>
<?= form_open('rahasia/simpan-data-diri', ['id' => 'simpan_data_diri', 'enctype' => 'multipart/form-data']) ?>
<?= csrf_field() ?>
<div class="form-group row">
    <label for="nik" class="col-sm-3 col-form-label">Pas Poto
        <small>ukurang poto maksimal 1MB, ukuran 3 x 4, extensi jpg, png, jpeg</small>
    </label>
    <div class="col-sm-5">
        <input type="file" class="form-control" accept="image/*" name="pas_poto" id="pas_poto" multiple="true"
            onchange="onFileUpload(this);">
        <img class="mt-3" id="ajaxImgUpload" alt="Preview Image" src="https://via.placeholder.com/300" />
        <div class="invalid-feedback" id="errorPasPoto"></div>
    </div>
</div>
<div class="form-group row">
    <label for="nik" class="col-sm-3 col-form-label">
        Nik
        <small>Nik berdasarkan KK, sebanyak 16 digit</small>
    </label>
    <div class="col-sm-5">
        <input class="form-control" type="text" id="nik" name="nik">
        <div class="invalid-feedback" id="errorNik"></div>
    </div>
</div>
<div class="form-group row">
    <label for="nama_awal" class="col-sm-3 col-form-label">Nama Awal</label>
    <div class="col-sm-5">
        <input class="form-control" type="text" id="nama_awal" name="nama_awal">
        <div class="invalid-feedback" id="errorNamaAwal"></div>
    </div>
</div>
<div class="form-group row">
    <label for="nama_akhir" class="col-sm-3 col-form-label">Nama Akhir</label>
    <div class="col-sm-5">
        <input class="form-control" type="text" id="nama_akhir" name="nama_akhir">
    </div>
</div>
<div class="form-group row">
    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-4">
        <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir">
        <div class="invalid-feedback" id="errorTanggalLahir"></div>
    </div>
</div>
<div class="form-group row">
    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-5">
        <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;"
            id="jenis_kelamin" name="jenis_kelamin">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="1">Laki - Laki</option>
            <option value="2">Perempuan</option>
        </select>
        <div class="invalid-feedback" id="errorJenisKelamin"></div>
    </div>
</div>
<div class="form-group row">
    <label for="agama" class="col-sm-3 col-form-label">Agama</label>
    <div class="col-sm-5">
        <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" id="agama"
            name="agama">
            <option value="">-- Pilih Agama --</option>
            <?php foreach ($master_agama as $agama) : ?>
            <option value="<?= $agama['id'] ?>"><?= $agama['nama'] ?></option>
            <?php endforeach ?>
        </select>
        <div class="invalid-feedback" id="errorAgama"></div>
    </div>
</div>
<div class="form-group row">
    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
    <div class="col-sm-9">
        <textarea name="tempat_lahir" id="tempat_lahir" rows="3" class="form-control"></textarea>
        <div class="invalid-feedback" id="errorTempatLahir"></div>
    </div>
</div>
<div class="form-group row">
    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-9">
        <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
        <div class="invalid-feedback" id="errorAlamat"></div>
    </div>
</div>
<div class="form-group row">
    <label for="jurusant" class="col-sm-3 col-form-label">Jurusan yang di pilih</label>
    <div class="col-sm-6">
        <select name="jurusan" id="jurusan" class="select2 form-control custom-select"
            style="width: 100%; height:36px !important;">
            <option value="">-- Pilih Jurusan --</option>
            <?php foreach ($master_jurusan as $jurusan) : ?>
            <option value="<?= $jurusan['id'] ?>"><?= $jurusan['nama'] ?></option>
            <?php endforeach ?>
        </select>
        <div class="invalid-feedback" id="errorJurusan"></div>
    </div>
</div>
<button class="btn btn-outline-primary btn-sm" id="tombol_simpan_data_diri">Simpan</button>
<?= form_close() ?>
<?php endif; ?>

<script>
    //SIMPAN DATA DIRI 
    $('#simpan_data_diri').submit(function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('#tombol_simpan_data_diri').attr('disable', 'disabled');
                $('#tombol_simpan_data_diri').html('<i class="fa fa-spin fa-spinner"></i>');
            },

            complete: function () {
                $('#tombol_simpan_data_diri').removeAttr('disable');
                $('#tombol_simpan_data_diri').html('Simpan');
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.nik) {
                        $('#nik').addClass('is-invalid');
                        $('#errorNik').html(response.error.nik);
                    } else {
                        $('#nik').removeClass('is-invalid');
                        $('#errorNik').html('');
                    }

                    if (response.error.nama_awal) {
                        $('#nama_awal').addClass('is-invalid');
                        $('#errorNamaAwal').html(response.error.nama_awal);
                    } else {
                        $('#nama_awal').removeClass('is-invalid');
                        $('#errorNamaAwal').html('');
                    }

                    if (response.error.tanggal_lahir) {
                        $('#tanggal_lahir').addClass('is-invalid');
                        $('#errorTanggalLahir').html(response.error.tanggal_lahir);
                    } else {
                        $('#tanggal_lahir').removeClass('is-invalid');
                        $('#errorTanggalLahir').html('');
                    }

                    if (response.error.pas_poto) {
                        $('#pas_poto').addClass('is-invalid');
                        $('#errorPasPoto').html(response.error.pas_poto);
                    } else {
                        $('#pas_poto').removeClass('is-invalid');
                        $('#errorPasPoto').html('');
                    }

                    if (response.error.agama) {
                        $('#agama').addClass('is-invalid');
                        $('#errorAgama').html(response.error.agama);
                    } else {
                        $('#agama').removeClass('is-invalid');
                        $('#errorAgama').html('');
                    }

                    if (response.error.tempat_lahir) {
                        $('#tempat_lahir').addClass('is-invalid');
                        $('#errorTempatLahir').html(response.error.tempat_lahir);
                    } else {
                        $('#tempat_lahir').removeClass('is-invalid');
                        $('#errorTempatLahir').html('');
                    }

                    if (response.error.alamat) {
                        $('#alamat').addClass('is-invalid');
                        $('#errorAlamat').html(response.error.alamat);
                    } else {
                        $('#alamat').removeClass('is-invalid');
                        $('#errorAlamat').html('');
                    }

                    if (response.error.jurusan) {
                        $('#jurusan').addClass('is-invalid');
                        $('#errorJurusan').html(response.error.jurusan);
                    } else {
                        $('#jurusan').removeClass('is-invalid');
                        $('#errorJurusan').html('');
                    }
                    if (response.error.jenis_kelamin) {
                        $('#jenis_kelamin').addClass('is-invalid');
                        $('#errorJenisKelamin').html(response.error.jenis_kelamin);
                    } else {
                        $('#jenis_kelamin').removeClass('is-invalid');
                        $('#errorJenisKelamin').html('');
                    }
                } else {
                    // Fungsi tambil data diambil dari dalam file index.php
                    // tampilData();
                    $('#notifikasi_data_diri').removeClass('d-none');
                    $('#isi_pesan_berhasil').html(response.berhasil);

                    let urlLoad = "<?= site_url('rahasia/get-element-data-diri') ?>";

                    // Load element lokal
                    ajaxLoad(urlLoad, "content_identitas_utama");
                }
            },
            error: function (xhr, ajaxOptins, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
        });
    });

    $(document).ready(function () {
        $(".select2").select2({
            width: '100%'
        });
    });
</script>