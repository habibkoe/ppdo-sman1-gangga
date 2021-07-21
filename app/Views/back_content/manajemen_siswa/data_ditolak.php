<a class="btn btn-success btn-sm" onclick="tampilData()" style="cursor: pointer;">Data siswa diterima</a>
<br>
<span>Table dibawah merupakan daftar calon siswa baru yang tidak lolos seleksi, jika anda berubah pikiran, klik batal tolak untuk menerima siswa</span>
<table id="datatable" class="table table-hover">
    <thead>
        <tr>
            <th>Calon NIS</th>
            <th>Poto</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan Pilihan</th>
            <th>Agama</th>
            <th>Status Berkas</th>
            <th style="width: 15%;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datas as $data): ?>
        <tr>
            <td><?= $data['nis'] ?></td>
            <td><img src="<?= base_url($data['pas_poto']) ?>" width="50"></td>
            <td><?= $data['nik'] ?></td>
            <td><?= $data['nama_awal'] ?> <?= $data['nama_akhir'] ?></td>
            <td><?= $data['jenis_kelamin'] == 1 ? '<span class="badge badge-pill badge-primary">Laki - Laki</span>' : '<span class="badge badge-pill badge-secondary">Perempuan</span>' ?></td>
            <td><?= $data['nama_jurusan'] ?></td>
            <td><?= $data['nama_agama'] ?></td>
            <td><?= $data['is_lengkap'] ? "Lengkap" : "Belum Lengkap" ?></td>
            <td>
                <button class="btn btn-sm btn-success" onclick="tolakOrTerimaDataSiswa(<?= $data['id'] ?>, 1)">Batal tolak</button>
                <button class="btn btn-sm btn-secondary" onclick="detailData(<?= $data['id'] ?>)">Detail</button>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
$(document).ready(function() {
    $('#datatable').DataTable();
} );

</script>