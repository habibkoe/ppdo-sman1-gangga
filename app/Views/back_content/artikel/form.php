<div class="modal fade bs-example-modal-center" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('rahasia/simpan-data-artikel', ['id' => 'simpandata', 'enctype' => 'multipart/form-data']) ?>
            <?= csrf_field() ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="judul">
                                Judul
                            </label>
                            <div>
                                <input class="form-control" type="text" id="judul" name="judul">
                                <div class="invalid-feedback" id="errorJudul"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">
                                Deskripsi
                            </label>
                            <div>
                                <textarea name="deskripsi" id="elm1"></textarea>
                                <p>
                                    <h6>Catatan:</h6>
                                    <ul>
                                        <li>Gambar yang diupload boleh extensi: jpg, png, jpeg</li>
                                        <li>Ukuran gambar maksimal 1MB</li>
                                        <li>Wajib mengisi judul, kategori, dan status</li>
                                        <li>Preview deskripi penting jika dibuat sebagai highlight postingan di halaman depan</li>
                                        <li>Sub kategori diperuntukkan untuk postingan ekstrakulikuler</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kategori_id">
                                Kategori
                            </label>
                            <div>
                                <select name="kategori_id" id="kategori_id" class="form-control" onchange="pilihSubKategori(this)">
                                    <option value="">-- Pilih Kategori</option>
                                    <option value="1">Tentang</option>
                                    <option value="2">Cara Daftar</option>
                                    <option value="3">Jurusan</option>
                                    <option value="4">Ekstra Kulikuler</option>
                                </select>
                                <div class="invalid-feedback" id="errorKategori"></div>
                            </div>
                        </div>

                        <div class="form-group d-none" id="elementSubKategori">
                            <label for="sub_kategori_id">
                               Sub Kategori
                            </label>
                            <div>
                                <select name="sub_kategori_id" id="sub_kategori_id" class="form-control">
                                    <option value="">-- Pilih Sub Kategori --</option>
                                    <option value="1">Olah Raga</option>
                                    <option value="2">Seni dan Musik</option>
                                    <option value="3">IT</option>
                                    <option value="4">Religi</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <div>
                                <select name="status" id="status_post" class="form-control">
                                    <option value="">-- Status Postingan --</option>
                                    <option value="1">Posting</option>
                                    <option value="2">Draft</option>
                                </select>
                                <div class="invalid-feedback" id="errorStatus"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="preview_deskripsi">Preview Deskripsi</label>
                            <div>
                                <textarea name="preview_deskripsi" id="preview_deskripsi" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_path">Gambar Primary</label>
                            <div>
                                <input type="file" class="form-control" accept="image/*" name="image_path" id="image_path" multiple="true" onchange="onFileUpload(this);">
                                <div class="invalid-feedback" id="errorGambar"></div>
                            </div>
                        </div>
                        <img class="mt-3" id="ajaxImgUpload" alt="Preview Image" src="https://via.placeholder.com/300" />
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect waves-light" id="btnsimpan">Simpan</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Tutup</button>
            </div>

            <?= form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Wysiwig js-->
<script src="<?= base_url('theme/back/assets/plugins/tinymce/tinymce.min.js') ?>"></script>
<script>

    function pilihSubKategori(_this) {

        if(_this.value == 4) {
            $("#elementSubKategori").removeClass('d-none');
        }else {
            $("#elementSubKategori").addClass('d-none');
        }
    }

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
                    if (response.error.judul) {
                        $('#judul').addClass('is-invalid');
                        $('#errorJudul').html(response.error.judul);
                    } else {
                        $('#judul').removeClass('is-invalid');
                        $('#errorJudul').html('');
                    }

                    if (response.error.kategori_id) {
                        $('#kategori_id').addClass('is-invalid');
                        $('#errorKategori').html(response.error.kategori_id);
                    } else {
                        $('#kategori_id').removeClass('is-invalid');
                        $('#errorKategori').html('');
                    }

                    if (response.error.status) {
                        $('#status_post').addClass('is-invalid');
                        $('#errorStatus').html(response.error.status);
                    } else {
                        $('#status_post').removeClass('is-invalid');
                        $('#errorStatus').html('');
                    }

                    // if (response.error.image_path) {
                    //     $('#image_path').addClass('is-invalid');
                    //     $('#errorGambar').html(response.error.image_path);
                    // } else {
                    //     $('#image_path').removeClass('is-invalid');
                    //     $('#errorGambar').html('');
                    // }
                } else {
                    $('#modaltambah').modal('hide');

                    // Fungsi tambil data diambil dari dalam file index.php
                    tampilData();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        })
    });

    $(document).ready(function() {

        if ($("#elm1").length > 0) {
            tinymce.init({
                selector: "textarea#elm1",
                setup: function(editor) {
                    editor.on('change', function() {
                        tinymce.triggerSave();
                    });
                },
                theme: "modern",
                height: 450,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [{
                        title: 'Bold text',
                        inline: 'b'
                    },
                    {
                        title: 'Red text',
                        inline: 'span',
                        styles: {
                            color: '#ff0000'
                        }
                    },
                    {
                        title: 'Red header',
                        block: 'h1',
                        styles: {
                            color: '#ff0000'
                        }
                    },
                    {
                        title: 'Example 1',
                        inline: 'span',
                        classes: 'example1'
                    },
                    {
                        title: 'Example 2',
                        inline: 'span',
                        classes: 'example2'
                    },
                    {
                        title: 'Table styles'
                    },
                    {
                        title: 'Table row 1',
                        selector: 'tr',
                        classes: 'tablerow1'
                    }
                ]
            });
        }
    });
</script>