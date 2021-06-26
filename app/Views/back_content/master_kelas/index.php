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

<link href="<?= base_url('theme/back/assets/plugins/select2/select2.min.css') ?>" rel="stylesheet" type="text/css" />

<style>
    /* Select 2 custom */
    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 36px;
    }

    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 38px;
        user-select: none;
        -webkit-user-select: none;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        display: block;
        padding-left: 15px;
        padding-right: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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
                <button class="btn btn-primary btn-lg mb-3" id="tambahdata" onclick="tambahData()">Buat baru</button>
                <a class="btn btn-info btn-lg mb-3" href="<?= base_url('rahasia/manajemen-kelas') ?>">Manajemen Kelas</a>
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
<script src="<?= base_url('theme/back/assets/plugins/select2/select2.min.js') ?>" type="text/javascript"></script>
<!-- Datatable init js -->
<script>
    function tampilData() {
        $.ajax({
            url: "<?= site_url('rahasia/get-data-kelas') ?>",
            dataType: "json",
            success: function(response) {
                $('#tampildata').html(response.data);
                $('#datatable').DataTable();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function tambahData() {
        $.ajax({
            url: "<?= site_url('rahasia/get-form-kelas') ?>",
            dataType: "json",
            success: function(response) {
                $('#tampilmodal').html(response.data).removeClass('d-none');
                $('#modaltambah').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        });

    }

    function editData(id) {
        $.ajax({
            type: "get",
            url: "<?= site_url('rahasia/get-form-edit-kelas/') ?>" + id,
            dataType: "json",
            success: function(response) {
                $('#tampilmodal').html(response.data).removeClass('d-none');
                $('#modaledit').modal('show');
            }
        });
    }

    function hapusData(id) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('rahasia/hapus-kelas') ?>",
            data: {
                _method: "DELETE",
                jabatan_id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.berhasil) {
                    tampilData();
                }
            }
        });
    }

    $(document).ready(function() {
        tampilData();
    });
</script>
<?= $this->endSection() ?>