<script>
    $.NotificationApp.send("Title", "Your awesome message text", "Position", "Background color", "Icon")
</script>

<script>
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

    // $(document).ready(function() {
    //     $('.summernote').summernote();
    // });





    function profil() {
        $('#profil').empty();
        $.ajax({
            url: "<?php echo site_url('administrasi/profil/dataprofil/') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#profil').html(data);


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
    profil();

    function ubahpoto() {
        save_method = 'add';
        $('#formlogo')[0].reset();
        $('#modalupload').modal('show');
        $('#imagePreview').html('');
        // $('#coverview').html(''); 

    }


    function falidatelogo() {
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

    function falidatecove() {
        var fileInput = document.getElementById('cove');
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
                    document.getElementById('imagePreview2').innerHTML = '<img style="max-width:350px;" src="' + e
                        .target
                        .result + '"/>';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }




    $('#formlogo').submit(function(e) {
        e.preventDefault();
        var form = $('#formlogo')[0];
        var data = new FormData(form);
        if (save_method == 'add') {
            if ($('[name="logo"]').val() == '') {
                alert('Pilih Foto Produk Yang Akan di Upload !');
                return false;
            }
        }

        $('#uplogo').text('Mohon tunggu...'); //change button text
        $('#uplogo').attr('disabled', true); //set button disable
        $.ajax({
            url: "<?php echo site_url('administrasi/profil/upload_logo/') ?>",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {
                if (data.status == '00') {
                    $.NotificationApp.send("Success", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "success");
                    $('#formlogo')[0].reset();
                    profil();

                } else {

                    $.NotificationApp.send("error", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "danger");
                }

                $('#uplogo').text('upload'); //change button text
                $('#uplogo').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                type = 'error';
                msg = 'Error adding / uplogo data';
                showAlert(type, msg); //utk show alert
                $('#uplogo').text('upload'); //change button text
                $('#uplogo').attr('disabled', false); //set button enable
            }
        });

    });


    $('#formcove').submit(function(e) {
        e.preventDefault();
        var form = $('#formcove')[0];
        var data = new FormData(form);

        if (save_method == 'add') {
            if ($('[name="foto"]').val() == '') {
                alert('Pilih Foto Produk Yang Akan di Upload !');
                return false;
            }
        }
        $('#upcove').text('Mohon tunggu...'); //change button text
        $('#upcove').attr('disabled', true); //set button disable
        $.ajax({
            url: "<?php echo site_url('administrasi/profil/upload_cover/') ?>",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {
                if (data.status == '00') {
                    $.NotificationApp.send("Success", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "success");
                    $('#formcove')[0].reset();
                    profil();

                } else {

                    $.NotificationApp.send("error", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "danger");
                }

                $('#upcove').text('upload'); //change button text
                $('#upcove').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                type = 'error';
                msg = 'Error adding / upcove data';
                showAlert(type, msg); //utk show alert
                $('#upcove').text('upload'); //change button text
                $('#upcove').attr('disabled', false); //set button enable
            }
        });

    });


    function profiledit() {
        // alert('you can edit here !');

        $('#formedit')[0].reset();
        $('#formeditkon')[0].reset();
        $('#modaledit').modal('show');
        $('.modal-title').text('Edit Data Profil');
        $.ajax({
            url: "<?php echo site_url('administrasi/profil/editprofil/') ?>",
            type: "POST",
            dataType: "JSON",

            success: function(data) {

                $('[name="profil_id"]').val(data.profil_id);
                $('[name="nama"]').val(data.nama);
                $('[name="alamat"]').val(data.alamat);

                $('#summernote').summernote('code', data.deskripsi);
                $('[name="company_name"]').val(data.company_name);
                $('[name="web_url"]').val(data.web_url);
                $('[name="telpon"]').val(data.telpon);
                $('[name="email"]').val(data.email);
                $('[name="facebook"]').val(data.facebook);
                $('[name="instagram"]').val(data.instagram);
                $('[name="whatsap"]').val(data.whatsap);
                $('[name="github"]').val(data.github);



            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });

    }





    $('#formedit').submit(function(e) {
        e.preventDefault();
        var form = $('#formedit')[0];
        var data = new FormData(form);
        $('#simpan').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#simpan').attr('disabled', true); //set button disable
        $.ajax({
            url: "<?php echo site_url('administrasi/profil/updateprof/') ?>",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {
                if (data.status == '00') {
                    $.NotificationApp.send("Success", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "success");
                    profil();
                    $('#formeditkon')[0].reset();

                } else {

                    $.NotificationApp.send("error", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "danger");
                }

                $('#simpan').text('Simpan'); //change button text
                $('#simpan').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                type = 'error';
                msg = 'Error adding / update data';
                showAlert(type, msg); //utk show alert
                $('#simpan').text('Simpan'); //change button text
                $('#simpan').attr('disabled', false); //set button enable
            }
        });

    });


    $('#formeditkon').submit(function(e) {
        e.preventDefault();
        var form = $('#formeditkon')[0];
        var data = new FormData(form);
        $('#save').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#save').attr('disabled', true); //set button disable
        $.ajax({
            url: "<?php echo site_url('administrasi/profil/updatekontak/') ?>",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {
                if (data.status == '00') {
                    $.NotificationApp.send("Success", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "success");
                    $('#formeditkon')[0].reset();
                    profil();

                } else {

                    $.NotificationApp.send("error", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "danger");
                }

                $('#save').text('save'); //change button text
                $('#save').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                type = 'error';
                msg = 'Error adding / update data';
                showAlert(type, msg); //utk show alert
                $('#save').text('save'); //change button text
                $('#save').attr('disabled', false); //set button enable
            }
        });

    });





    $('#formupload').submit(function(e) {
        e.preventDefault();
        var form = $('#formupload')[0];
        var data = new FormData(form);

        if ($('[name="foto"]').val() == '') {
            alert('Pilih Foto Produk Yang Akan di Upload !');
            return false;
        }
        $('#updatecover').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#updatecover').attr('disabled', true); //set button disable
        $.ajax({
            url: "<?php echo site_url('administrasi/identitas_desa/uploadcover/') ?>",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {
                if (data.status == '00') {
                    $.NotificationApp.send("Success", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "success");
                    $('#formupload')[0].reset();


                } else {

                    $.NotificationApp.send("error", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "danger");
                }

                $('#updatecover').text('upload'); //change button text
                $('#updatecover').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                type = 'error';
                msg = 'Error adding / updatecover data';
                showAlert(type, msg); //utk show alert
                $('#updatecover').text('upload'); //change button text
                $('#updatecover').attr('disabled', false); //set button enable
            }
        });

    });


    $('#formuploadlogo').submit(function(e) {
        e.preventDefault();
        var form = $('#formuploadlogo')[0];
        var data = new FormData(form);

        if ($('[name="logo"]').val() == '') {
            alert('Pilih Foto Produk Yang Akan di Upload !');
            return false;
        }
        $('#updatelogo').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#updatelogo').attr('disabled', true); //set button disable
        $.ajax({
            url: "<?php echo site_url('administrasi/identitas_desa/uploadlogo/') ?>",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {
                if (data.status == '00') {
                    $.NotificationApp.send("Success", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "success");
                    $('#formuploadlogo')[0].reset();


                } else {

                    $.NotificationApp.send("error", data.mess, "top-center",
                        "rgba(0,0,0,0.2)", "danger");
                }

                $('#updatelogo').text('upload'); //change button text
                $('#updatelogo').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                type = 'error';
                msg = 'Error adding / updatelogo data';
                showAlert(type, msg); //utk show alert
                $('#updatelogo').text('upload'); //change button text
                $('#updatelogo').attr('disabled', false); //set button enable
            }
        });

    });
</script>