<table id="datatable" class="table table-bordered">
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
            <td></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
$(document).ready(function() {
    $('#datatable').DataTable();
} );
</script>