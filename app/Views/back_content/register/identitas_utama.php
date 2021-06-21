<?php if(count($data_siswa) > 0): ?>
<br>
<div class="table-responsive">
    <table class="table table-bordered">
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
                Jurusan
            </td>
            <td>
                <?= $data_siswa['nama_jurusan'] ?>
            </td>
        </tr>
    </table>
</div>
<?php else: ?>
<?= form_open('rahasia/simpan-data-diri', ['id' => 'simpan_data_diri']) ?>
<?= csrf_field() ?>
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
        <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;"
            name="jenis_kelamin">
            <option></option>
            <option value="1">Laki - Laki</option>
            <option value="2">Perempuan</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="agama" class="col-sm-3 col-form-label">Agama</label>
    <div class="col-sm-4">
        <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;" name="agama">
            <option value=""></option>
            <?php foreach($master_agama as $agama): ?>
            <option value="<?= $agama['id'] ?>"><?= $agama['nama'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
    <div class="col-sm-9">
        <textarea name="tempat_lahir" id="tempat_lahir" rows="3" class="form-control"></textarea>
    </div>
</div>
<div class="form-group row">
    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-9">
        <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
    </div>
</div>
<div class="form-group row">
    <label for="jurusant" class="col-sm-3 col-form-label">Jurusan</label>
    <div class="col-sm-6">
        <select name="jurusan" id="jurusan" class="select2 form-control custom-select"
            style="width: 100%; height:36px !important;">
            <option value=""></option>
            <?php foreach($master_jurusan as $jurusan): ?>
            <option value="<?= $jurusan['id'] ?>"><?= $jurusan['nama'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<button class="btn btn-outline-primary btn-sm" id="tombol_simpan_data_diri">Simpan</button>
<?= form_close() ?>
<?php endif; ?>