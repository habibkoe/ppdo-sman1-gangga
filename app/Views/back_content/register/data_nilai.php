<?php if(count($berkas_nilai) > 0): ?>
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
<?php else: ?>
<?= form_open('rahasia/simpan-berkas-nilai', ['id' => 'berkas_nilai']) ?>
<?= csrf_field() ?>
<div class="form-group row">
    <label for="nama_mata_pelajaran" class="col-sm-3 col-form-label">Nama Mata Pelajaran</label>
    <div class="col-sm-9">
        <select class="form-control select2 custom-select" style="width: 100%; height:36px !important;"
            name="nama_mata_pelajaran" id="nama_mata_pelajaran">
            <option></option>
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