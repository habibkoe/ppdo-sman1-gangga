<?php if(count($sekolah_asal) > 0): ?>
<div class="table-responsive">
    <table class="table table-bordered">
        <?php foreach($sekolah_asal as $data_sekolah): ?>
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
<?php else: ?>
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