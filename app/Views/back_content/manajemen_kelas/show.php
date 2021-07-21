<div class="modal fade bs-example-modal-center" id="modalshowsiswa" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar siswa pada kelas <?= $master_kelas['nama'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>
                                    No
                                </td>
                                <td>Poto</td>
                                <td>
                                    NIK
                                </td>
                                <td>Nis</td>
                                <td>
                                    Nama
                                </td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($siswa as $index => $s): ?>
                                <tr>
                                    <td>
                                        <?= $index+1 ?>
                                    </td>
                                    <td>
                                    <img src="<?= base_url($s['pas_poto']) ?>" width="50">
                                    </td>
                                    <td>
                                        <?= $s['nik'] ?>
                                    </td>
                                    <td>
                                        <?= $s['nis'] ?>
                                    </td>
                                    <td>
                                        <?= $s['nama_awal'] . " " . $s['nama_akhir']?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
</script>