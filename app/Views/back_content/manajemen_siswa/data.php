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
                <button class="btn btn-sm btn-danger" onclick="hapusData(<?= $data['id'] ?>)">Tolak</button>
                <button class="btn btn-sm btn-secondary">Detail</button>
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