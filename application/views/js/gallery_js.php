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



    function addfoto() {

        $('#form')[0].reset();
        $('#imagePreview').html('');
        $('#modalgallery').modal('show');
        $('.modal-title').text('Tambah Foto');
    }

    function zoom(id) {
        $('#zoomin').empty();
        $('#zoomModal').modal('show');

        $.ajax({
            url: "<?php echo site_url('administrasi/gallery/datafotoid/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                $('#zoomin').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
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

    $('#form').submit(function(e) {
        e.preventDefault();
        var form = $('#form')[0];
        var data = new FormData(form);
        if (save_method == 'add') {
            if ($('[name="foto"]').val() == '') {
                alert('Pilih Foto Produk Yang Akan di Upload !');
                return false;
            }
        }
        $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable

        $.ajax({
            url: url = "<?php echo site_url('administrasi/gallery/uploadFoto') ?>",
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
                    $('#modalgallery').modal('hide');
                    $('#imagePreview').html('');
                    $('#form')[0].reset();
                    listFoto();

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

    function listFoto() {
        $('#datafoto').empty();
        $.ajax({
            url: "<?php echo site_url('administrasi/gallery/list_foto/') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                $('#datafoto').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });

    }
    listFoto();


    function remove(id) {
        if (confirm('Apakah Anda yakin menghapus data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/gallery/remove/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        showAlert(data.type, data.mess);
                        listFoto();

                    } else {
                        showAlert(data.type, data.mess);

                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        }
    }
</script>