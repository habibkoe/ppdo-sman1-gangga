<table id="datatable" class="table table-hover">
    <thead>
        <tr>
            <th>Calon NIS</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th style="width: 20%;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datas as $data): ?>
        <tr>
            <td><?= $data['nis'] ?></td>
            <td><?= $data['nik'] ?></td>
            <td><?= $data['nama_awal'] ?> <?= $data['nama_akhir'] ?></td>
            <td><?= $data['jenis_kelamin'] = 1 ? 'Laki - Laki' : 'Perempuan' ?></td>
            <td>
                <button class="btn btn-sm btn-warning" onclick="terimaSiswa(<?= $data['id'] ?>)">Terima</button>
                <button class="btn btn-sm btn-danger" onclick="hapusData(<?= $data['id'] ?>)">Tolak</button>
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