<table id="datatable" class="table table-hover">
    <thead>
        <tr>
            <th style="width: 5%;">ID</th>
            <th>Group Jurusan</th>
            <th>Nama</th>
            <th>Lokasi</th>
            <th>Daya Tampung</th>
            <th>Wali Kelas</th>
            <th style="width: 20%;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datas as $data): ?>
        <tr>
            <td><?= $data['id'] ?></td>
            <td><?= $data['nama_group'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['lokasi'] ?></td>
            <td><?= $data['daya_tampung'] ?> Siswa</td>
            <td><?= $data['nama_awal_wali'] ?> <?= $data['nama_akhir_wali'] ?></td>
            <td>
                <button class="btn btn-sm btn-warning" onclick="editData(<?= $data['id'] ?>)">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="hapusData(<?= $data['id'] ?>)">Hapus</button>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>