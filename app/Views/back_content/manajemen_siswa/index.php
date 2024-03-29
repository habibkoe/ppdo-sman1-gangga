<?= $this->extend('layout/back_layout') ?>

<?= $this->section('title') ?>
<?= $nama_halaman ?> SMAN 1 Gangga
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link href="<?= base_url('theme/back/assets/plugins/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('theme/back/assets/plugins/datatables/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="<?= base_url('theme/back/assets/plugins/datatables/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

<style>
    .modal-lg,
    .modal-xl {
        max-width: 1200px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#"><?= $session->get('user_name') ?></a></li>
                    <li class="breadcrumb-item active"><?= $nama_halaman ?></li>
                </ol>
            </div>
            <h4 class="page-title"><?= $nama_halaman ?></h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div id="tampildata"></div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- buat modal -->
<div id="tampilmodal" class="d-none"></div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<!-- Required datatable js -->
<script src="<?= base_url('theme/back/assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('theme/back/assets/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Responsive examples -->
<script src="<?= base_url('theme/back/assets/plugins/datatables/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('theme/back/assets/plugins/datatables/responsive.bootstrap4.min.js') ?>"></script>

<!-- Datatable init js -->
<script>

    function tampilData() {
        $.ajax({
            type: "GET",
            url: "<?= site_url('rahasia/get-data-siswa') ?>",
            dataType: "json",
            success: function(response) {
                $('#tampildata').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function detailData(id) {
        $.ajax({
            type: "GET",
            url: "<?= site_url('rahasia/get-detail-data/') ?>" + id,
            dataType: "json",
            success: function(response) {
                $('#tampilmodal').html(response.data).removeClass('d-none');
                $('#modalShow').modal('show');
            }
        });
    }

    function tolakOrTerimaDataSiswa(id, keputusan) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('rahasia/tolak-or-terima-siswa') ?>",
            data: {
                siswa_id: id,
                keputusan:keputusan
            },
            dataType: "json",
            success: function(response) {
                if (response.berhasil) {
                    tampilData();
                }
            }
        });
    }

    function tampilDataDitolak() {
        $.ajax({
            type: "GET",
            url: "<?= site_url('rahasia/get-data-siswa-ditolak') ?>",
            dataType: "json",
            success: function(response) {
                $('#tampildata').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    $(document).ready(function() {
        tampilData();
    });
</script>
<?= $this->endSection() ?>