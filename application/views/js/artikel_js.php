<script type="text/javascript">
    var table; // for table
    var foor; // for table
    var save_method; // untuk metode save data varible global

    // itu yang buat add udah jalan ga bakalan bener soalna harus satu file lamun banyak pati menumpuk di file footer.php
    function reload_data() {
        foor.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax
    }

    function showAlert(type, msg) {

        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.extendedTimeOut = 1000; //1000

        toastr.options.timeOut = 3000;
        toastr.options.fadeOut = 250;
        toastr.options.fadeIn = 250;

        toastr.options.positionClass = 'toast-top-center';
        toastr[type](msg);
    }


    function fileValidation() {
        var fileInput = document.getElementById('file');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').innerHTML = '<img style="max-width:350px;" src="' + e.target
                        .result + '"/>';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }

    function listArtikel() {

        $('#dataArtikel').empty();
        $.ajax({
            url: "<?php echo site_url('administrasi/artikel/list_artikel/') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#dataArtikel').html(data);


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
    listArtikel();

    function kembali() {

        window.location.href = "<?php echo site_url('administrasi/artikel/') ?>";
    }


    function addartikel() {
        save_method = 'add';
        $('#form')[0].reset();
        $('#imagePreview').html('');
        $('#summernote').summernote('code', '');
        $('#modalartikel').modal('show');
        $('.modal-title').text('Tambah Artikel');
    }


    $('#form').submit(function(e) {
        e.preventDefault();
        var form = $('#form')[0];
        var data = new FormData(form);
        if (save_method == 'add') {
            if ($('[name="foto"]').val() == '') {
                alert('Pilih Foto Produk Yang Akan di Upload !');
                return false;
            }
        } else {
            ''
        }
        $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('administrasi/artikel/input_artikel') ?>";
        } else {
            url = "<?php echo site_url('administrasi/artikel/update_artikel') ?>";
        }
        $.ajax({
            url: url,
            type: "POST",
            //contentType: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {
                if (data.status == '00') {
                    showAlert(data.type, data.mess);
                    $('#modalartikel').modal('hide');
                    $('#form')[0].reset();
                    listArtikel();
                } else {

                    showAlert(data.type, data.mess);
                }
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                type = 'error';
                msg = 'Error adding / update data';
                showAlert(type, msg); //utk show alert
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
            }
        });

    });


    function edit(id) {
        save_method = 'update';
        $('#form')[0].reset();
        $('#imagePreview').html('');
        $('#modalartikel').modal('show');
        $('.modal-title').text('Edit Artikel');
        $('#summernote').summernote('code', '');

        $.ajax({
            url: "<?php echo site_url('administrasi/artikel/edit_data/') ?>" + id,
            type: "POST",
            dataType: "JSON",

            success: function(data) {
                $('[name="artikel_id"]').val(data.artikel_id);
                $('[name="judul_artikel"]').val(data.judul_artikel);
                $('[name="penerbit"]').val(data.penerbit);
                $('[name="link"]').val(data.link);

                $('#summernote').summernote('code', data.konten);
                $('[name="old_foto"]').val(data.foto);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function hapus(id) {
        if (confirm('Apakah Anda yakin menghapus data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/artikel/delete_data/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        // reload_list_produk();

                        showAlert(data.type, data.mess);
                        listArtikel();
                    } else {

                        showAlert(data.type, data.mess);
                        listArtikel();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        }
    }

    function mute(id) {
        if (confirm('Apakah Anda yakin menyembunykan data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/artikel/mute/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        // reload_list_produk();

                        showAlert(data.type, data.mess);
                        listArtikel();
                    } else {

                        showAlert(data.type, data.mess);
                        listArtikel();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        }
    }

    function tampil(id) {
        if (confirm('Apakah Anda yakin menampilkan data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/artikel/tampil/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        // reload_list_produk();

                        showAlert(data.type, data.mess);
                        listArtikel();
                    } else {

                        showAlert(data.type, data.mess);
                        listArtikel();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        }
    }
</script>