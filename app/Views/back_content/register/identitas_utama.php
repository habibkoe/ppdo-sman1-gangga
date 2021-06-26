<div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="notifikasi_data_diri">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <span id="isi_pesan_berhasil"></span>
</div>

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
                    Nama awal
                </td>
                <td>
                    <?= $data_siswa['nama_awal'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Nama akhir
                </td>
                <td>
                    <?= $data_siswa['nama_akhir'] ?>
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
            <input type="file" class="form-control" accept="image/*" name="pas_poto" id="pas_poto" multiple="true" onchange="onFileUpload(this);">
            <img class="mt-3" id="ajaxImgUpload" alt="Preview Image" src="https://via.placeholder.com/300" />
            <div class="invalid-feedback" id="errorPasPoto"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="nik" class="col-sm-3 col-form-label">Nik</label>
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
        <div class="col-sm-4">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" id="jenis_kelamin" name="jenis_kelamin">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="1">Laki - Laki</option>
                <option value="2">Perempuan</option>
            </select>
            <div class="invalid-feedback" id="errorJenisKelamin"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="agama" class="col-sm-3 col-form-label">Agama</label>
        <div class="col-sm-4">
            <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" id="agama" name="agama">
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
            <select name="jurusan" id="jurusan" class="select2 form-control custom-select" style="width: 100%; height:36px !important;">
                <option value="">-- Pilih Jurusan --</option>
                <?php foreach ($master_jurusan as $jurusan) : ?>
                    <option value="<?= $jurusan['id'] ?>"><?= $jurusan['nama'] ?></option>
                <?php endforeach ?>
            </select>
            <div class="invalid-feedback" id="errorJurusan"></div>
        </div>
    </div>
    <button class="btn btn-outline-primary btn-sm" id="tombol_simpan_data_diri" onclick="simpanDataDiri()">Simpan</button>
    <?= form_close() ?>
<?php endif; ?>