<table id="datatable" class="table table-hover">
    <thead>
        <tr>
            <th style="width: 5%;">ID</th>
            <th>Nama</th>
            <th style="width: 20%;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datas as $data): ?>
        <tr>
            <td><?= $data['id'] ?></td>
            <td><?= $data['nama'] ?></td>
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
        url: "<?= site_url('rahasia/get-form-edit-jurusan/') ?>" + id,
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