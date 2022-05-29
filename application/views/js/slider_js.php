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


    $(document).ready(function() {

        table = $("#listslide").DataTable({

            "ajax": "<?= base_url("administrasi/slider/datatable") ?>",

            // select: {
            //     style: "multi"
            // },
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
                info: "Showing products _START_ to _END_ of _TOTAL_",
                lengthMenu: 'Display <select class=\'form-select form-select-sm ms-1 me-1\'><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="-1">All</option></select> products',
            },
            pageLength: 5,

            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
            },
        });

    });

    function addslide() {
        save_method = 'add';
        $('#form')[0].reset();
        $('#imagePreview').html('');
        $('#summernote').summernote('code', '');
        $('#modalslide').modal('show');
        $('.modal-title').text('Tambah Slide');
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
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('administrasi/slider/input_slide') ?>";
        } else {
            url = "<?php echo site_url('administrasi/slider/update_slide') ?>";
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
                    $('#modalslide').modal('hide');
                    $('#form')[0].reset();
                    reload_table();
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




    function activ(id) {
        if (confirm('Apakah Anda yakin menampilkan data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/slider/active/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        showAlert(data.type, data.mess);
                        reload_table();
                    } else {
                        showAlert(data.type, data.mess);
                        reload_table();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error data switch');
                }
            });
        }
    }

    function no_activ(id) {
        if (confirm('Apakah Anda yakin nonactifkan data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/slider/not_active/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        showAlert(data.type, data.mess);
                        reload_table();
                    } else {
                        showAlert(data.type, data.mess);
                        reload_table();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error data switch');
                }
            });
        }
    }

    function edit(id) {
        save_method = 'update';
        $('#form')[0].reset();
        $('#imagePreview').html('');
        $('#modalslide').modal('show');
        $('.modal-title').text('Edit Slider');
        $('#summernote').summernote('code', '');

        $.ajax({
            url: "<?php echo site_url('administrasi/slider/editslide/') ?>" + id,
            type: "POST",
            dataType: "JSON",

            success: function(data) {
                $('[name="hero_id"]').val(data.hero_id);
                $('[name="judul"]').val(data.judul);
                $('[name="link"]').val(data.link);
                $('#summernote').summernote('code', data.paragraf);
                $('[name="old_foto"]').val(data.foto);
                $('[#file').text(data.foto);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }


    function remove(id) {
        if (confirm('Apakah Anda yakin menghapus data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/slider/delete_data/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        showAlert(data.type, data.mess);
                        reload_table();
                    } else {
                        showAlert(data.type, data.mess);
                        reload_table();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        }
    }
</script>