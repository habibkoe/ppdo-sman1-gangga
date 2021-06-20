<?php if(count($data_orang_tua) > 0): ?>
<div class="table-responsive">
    <table class="table table-bordered">
        <?php foreach($data_orang_tua as $data_ortu): ?>
        <tr>
            <td>
                <?= $data_ortu['nama_awal'] ?>
            </td>
            <td>
                <?= $data_ortu['status'] ?>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>
<?php else: ?>
<?= form_open('rahasia/simpan-orang-tua-wali', ['id' => 'orang_tua_wali']) ?>
<?= csrf_field() ?>
<div class="form-group row">
    <label for="nik_ortu" class="col-sm-3 col-form-label">Nik</label>
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
    <div class="col-sm-4">
        <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;"
            name="jenis_kelamin_ortu">
            <option></option>
            <option value="1">Laki - Laki</option>
            <option value="2">Perempuan</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="agama_ortu" class="col-sm-3 col-form-label">Agama</label>
    <div class="col-sm-4">
        <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;"
            name="agama_ortu">
            <option value=""></option>
            <?php foreach($master_agama as $agama): ?>
            <option value="<?= $agama['id'] ?>"><?= $agama['nama'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="alamat_ortu" class="col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-9">
        <textarea name="alamat_ortu" id="alamat" rows="3" class="form-control"></textarea>
    </div>
</div>
<div class="form-group row">
    <label for="pendidikan_ortu" class="col-sm-3 col-form-label">Pendidikan</label>
    <div class="col-sm-5">
        <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;"
            name="pendidikan_ortu">
            <option value=""></option>
            <?php foreach($master_pendidikan as $pendidikan): ?>
            <option value="<?= $pendidikan['id'] ?>"><?= $pendidikan['nama'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="pekerjaan_ortu" class="col-sm-3 col-form-label">Pekerjaan</label>
    <div class="col-sm-5">
        <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;"
            name="pekerjaan_ortu">
            <option value=""></option>
            <?php foreach($master_pekerjaan as $pekerjaan): ?>
            <option value="<?= $pekerjaan['id'] ?>"><?= $pekerjaan['nama'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="status_ortu" class="col-sm-3 col-form-label">Status</label>
    <div class="col-sm-5">
        <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;"
            name="status_ortu">
            <option></option>
            <option value="1">Bapak / Ayah</option>
            <option value="2">Ibu / Mama</option>
            <option value="3">Kakek</option>
            <option value="4">Nenek</option>
            <option value="5">Paman / Om / Pak de</option>
            <option value="6">Bibi / Tante / Buk de</option>
        </select>
    </div>
</div>
<button class="btn btn-outline-primary btn-sm" id="tombol_simpan_ortu">Simpan</button>
<?= form_close() ?>

<?php endif; ?>