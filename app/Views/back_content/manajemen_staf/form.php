<div class="modal fade bs-example-modal-center" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Staf</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="notifikasi_register">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <span id="isi_notifikasi_register"></span>
                        </div>
                        <?= form_open('rahasia/daftar-login-staf', ['id' => 'simpanregister']) ?>
                        <?= csrf_field() ?>
                        <h6>Setting user login</h6>
                        <small>Jika staf diperkenankan bisa login ke aplikasi, maka setting user login terlebih dahulu
                            kemudian setting data staf</small>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
                            <div class="invalid-feedback" id="errorUsername"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="invalid-feedback" id="errorPassword"></div>
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Ulangi Password</label>
                            <input type="password" name="confpassword" class="form-control" id="confpassword">
                            <div class="invalid-feedback" id="errorConfirmPassword"></div>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control select2">
                                <option value="">-- pilih role --</option>
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r['id'] ?>"><?= $r['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>

                            <div class="invalid-feedback" id="errorRole"></div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit_user_login">Daftar</button>
                        <?= form_close() ?>
                    </div>
                    <div class="col-md-8">
                        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="notifikasi_daftar_staf">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <span id="isi_notifikasi_daftar_staf"></span>
                        </div>
                        <?= form_open('rahasia/simpan-data-staf', ['id' => 'simpandata', 'enctype' => 'multipart/form-data']) ?>
                        <?= csrf_field() ?>
                        <h6>Setting data staf</h6>
                        <small>Bagian ini untuk memasukkan info seluruh staf di sekolah, baik guru maupun yang lain,
                            jika user dikehendaki dapat login di aplikasi ini, maka wajib mengisi form di samping kiri
                            terlebih dahulu</small>
                        <div class="form-group row">
                            <label for="pas_poto" class="col-sm-2 col-form-label">
                                Poto:
                            </label>
                            <div class="col-md-3">
                                <input type="file" class="form-control" accept="image/*" name="pas_poto" id="pas_poto" multiple="true" onchange="onFileUpload(this);">
                                <img class="mt-3" id="ajaxImgUpload" alt="Preview Image" src="https://via.placeholder.com/300" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-sm-2 col-form-label">
                                NIP:
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="nip" name="nip">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-2 col-form-label">
                                NIK:
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="nik" name="nik"">
                                <div class="invalid-feedback" id="errorNik"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_awal" class="col-sm-2 col-form-label">
                                Nama Awal:
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="nama_awal" name="nama_awal">
                                <div class="invalid-feedback" id="errorNamaAwal"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_akhir" class="col-sm-2 col-form-label">
                                Nama Akhir:
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="nama_akhir" name="nama_akhir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">
                                Tempat Lahir:
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">
                                Tanggal Lahir:
                            </label>
                            <div class="col-md-5">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                <div class="invalid-feedback" id="errorTanggalLahir"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">
                                Alamat:
                            </label>
                            <div class="col-md-7">
                                <textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-5">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
                                    <option value="">-- pilih jenis kelamin --</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                                <div class="invalid-feedback" id="errorJenisKelamin"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agama_id" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-md-5">
                                <select name="agama_id" id="agama_id" class="form-control custom-select select2">
                                    <option value="">-- pilih agama --</option>
                                    <?php foreach ($agama as $ag) : ?>
                                        <option value="<?= $ag['id'] ?>"><?= $ag['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" id="errorAgama"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendidikan_id" class="col-sm-2 col-form-label">Pendidikan</label>
                            <div class="col-md-5">
                                <select name="pendidikan_id" id="pendidikan_id" class="form-control custom-select select2">
                                    <option value="">-- pilih pendidikan --</option>
                                    <?php foreach ($pendidikan as $pend) : ?>
                                        <option value="<?= $pend['id'] ?>"><?= $pend['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" id="errorPendidikan"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan_id" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-md-5">
                                <select name="jabatan_id" id="jabatan_id" class="form-control custom-select select2">
                                    <option value="">-- pilih jabatan --</option>
                                    <?php foreach ($jabatan as $jab) : ?>
                                        <option value="<?= $jab['id'] ?>"><?= $jab['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" id="errorJabatan"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light" id="btnsimpan">Simpan</button>
                        <?= form_close() ?>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal" onclick="tutupModal()">Close</button>
            </div>

            <?= form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    //REGISTER LOGIN 
    $("#simpanregister").submit(function(event) {
        event.preventDefault();

        let formData = new FormData(this);
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                $('#submit_user_login').attr('disable', 'disabled');
                $('#submit_user_login').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('#submit_user_login').removeAttr('disable');
                $('#submit_user_login').html('Daftar');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.username) {
                        $('#username').addClass('is-invalid');
                        $('#errorUsername').html(response.error.username);
                    } else {
                        $('#username').removeClass('is-invalid');
                        $('#errorUsername').html('');
                    }

                    if (response.error.password) {
                        $('#password').addClass('is-invalid');
                        $('#errorPassword').html(response.error.password);
                    } else {
                        $('#password').removeClass('is-invalid');
                        $('#errorPassword').html('');
                    }

                    if (response.error.confpassword) {
                        $('#confpassword').addClass('is-invalid');
                        $('#errorConfirmPassword').html(response.error.confpassword);
                    } else {
                        $('#confpassword').removeClass('is-invalid');
                        $('#errorConfirmPassword').html('');
                    }

                    if (response.error.role) {
                        $('#role').addClass('is-invalid');
                        $('#errorRole').html(response.error.role);
                    } else {
                        $('#role').removeClass('is-invalid');
                        $('#errorRole').html('');
                    }
                } else {
                    $('#notifikasi_register').removeClass('d-none');
                    $('#isi_notifikasi_register').html(response.berhasil);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        })
    });

    // SIMAPAN DATA STAF
    $("#simpandata").submit(function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                $('#btnsimpan').attr('disable', 'disabled');
                $('#btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('#btnsimpan').removeAttr('disable');
                $('#btnsimpan').html('Simpan');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nik) {
                        $('#nik').addClass('is-invalid');
                        $('#errorNik').html(response.error.nik);
                    } else {
                        $('#nik').removeClass('is-invalid');
                        $('#errorNik').html('');
                    }

                    if (response.error.nama_awal) {
                        $('#nama_awal').addClass('is-invalid');
                        $('#errorNamaAwal').html(response.error.nama_awal);
                    } else {
                        $('#nama_awal').removeClass('is-invalid');
                        $('#errorNamaAwal').html('');
                    }

                    if (response.error.tanggal_lahir) {
                        $('#tanggal_lahir').addClass('is-invalid');
                        $('#errorTanggalLahir').html(response.error.tanggal_lahir);
                    } else {
                        $('#tanggal_lahir').removeClass('is-invalid');
                        $('#errorTanggalLahir').html('');
                    }

                    if (response.error.jenis_kelamin) {
                        $('#jenis_kelamin').addClass('is-invalid');
                        $('#errorJenisKelamin').html(response.error.jenis_kelamin);
                    } else {
                        $('#jenis_kelamin').removeClass('is-invalid');
                        $('#errorJenisKelamin').html('');
                    }

                    if (response.error.agama_id) {
                        $('#agama_id').addClass('is-invalid');
                        $('#errorAgama').html(response.error.agama_id);
                    } else {
                        $('#agama_id').removeClass('is-invalid');
                        $('#errorAgama').html('');
                    }

                    if (response.error.pendidikan_id) {
                        $('#pendidikan_id').addClass('is-invalid');
                        $('#errorPendidikan').html(response.error.pendidikan_id);
                    } else {
                        $('#pendidikan_id').removeClass('is-invalid');
                        $('#errorPendidikan').html('');
                    }

                    if (response.error.jabatan_id) {
                        $('#jabatan_id').addClass('is-invalid');
                        $('#errorJabatan').html(response.error.jabatan_id);
                    } else {
                        $('#jabatan_id').removeClass('is-invalid');
                        $('#errorJabatan').html('');
                    }
                } else {
                    $('#notifikasi_daftar_staf').removeClass('d-none');
                    $('#isi_notifikasi_daftar_staf').html(response.berhasil);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        })
    });

    function onFileUpload(input, id) {
        id = id || '#ajaxImgUpload';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(id).attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function tutupModal() {
        $('#modaltambah').modal('hide');
        tampilData();
    }

    $(document).ready(function() {
        // Select2
        $(".select2").select2({
            width: '100%'
        });
    });
</script>