<table id="datatable" class="table table-hover">
    <thead>
        <tr class="align-middle text-center">
            <th>NIP</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th>Agama</th>
            <th>Pendidikan</th>
            <th style="width: 20%;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datas as $data): ?>
        <tr class="align-middle text-center">
            <td><?= $data['nip'] ? $data['nip'] : 'Tanpa NIP' ?></td>
            <td><?= $data['nik'] ?></td>
            <td><?= $data['nama_awal'] ?> <?= $data['nama_akhir'] ?></td>
            <td><?= $data['jenis_kelamin'] == 1 ? 'Laki - Laki' : 'Perempuan' ?></td>
            <td><?= $data['nama_jabatan'] ?></td>
            <td><?= $data['nama_agama'] ?></td>
            <td><?= $data['nama_pendidikan'] ?></td>
            <td>
                <button class="btn btn-sm btn-warning" onclick="editData(<?= $data['id'] ?>)">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="hapusData(<?= $data['id'] ?>)">Hapus</button>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>

function editData(id) {
    $.ajax({
        type: "get",
        url: "<?= site_url('rahasia/get-form-edit-pekerjaan/') ?>" + id,
        dataType: "json",
        success: function (response) {
            $('#tampilmodal').html(response.data).removeClass('d-none');
            $('#modaledit').modal('show');
        }
    });
}

$(document).ready(function() {
    $('#datatable').DataTable();
} );

</script>