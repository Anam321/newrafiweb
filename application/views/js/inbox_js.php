<script type="text/javascript">
    var save_method; //for save method string
    var table;
    var tablenotif;
    var type, msg; // for alert

    function showAlert(type, msg) {

        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.extendedTimeOut = 1000; //1000

        toastr.options.timeOut = 3000;
        toastr.options.fadeOut = 250;
        toastr.options.fadeIn = 250;

        toastr.options.positionClass = 'toast-top-full-width';
        toastr[type](msg);
    }



    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax
    }

    $(document).ready(function() {
        $('.summernote').summernote();
    });


    function listmessage() {
        $('#listinbox').empty();
        $.ajax({
            url: "<?php echo site_url('administrasi/inbox/datamessage/') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#listinbox').html(data);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
    listmessage();


    function navmessage() {
        $('#navlismessage').empty();
        $.ajax({
            url: "<?php echo site_url('administrasi/inbox/navmessage/') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#navlismessage').html(data);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
    navmessage();



    function listtrash() {

        $('#listinbox').empty();
        $.ajax({
            url: "<?php echo site_url('administrasi/inbox/datatrash/') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#listinbox').html(data);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function read(id) {
        // var id_inbox = id;
        hits(id);
        $('#listinbox').empty();
        $.ajax({
            url: "<?php echo site_url('administrasi/inbox/readData/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#listinbox').html(data);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }





    function jumlahnotif() {
        $('#jmlhnotif').empty();
        $.ajax({
            url: "<?php echo site_url('administrasi/inbox/jumlahnotif/') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#jmlhnotif').text(data);
                if (data > 0) {
                    $('#notif').html('<span class="noti-icon-badge"></span>');
                }




            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
    jumlahnotif();


    function hits(id) {
        $.ajax({
            url: "<?php echo site_url('administrasi/inbox/hits/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data.status == '00') {
                    jumlahnotif();
                } else {
                    jumlahnotif();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });

    }

    function remove(id) {
        if (confirm('Apakah Anda yakin menghapus  ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/inbox/remove/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        showAlert(data.type, data.mess);
                        jumlahnotif();
                        listmessage();

                    } else {
                        showAlert(data.type, data.mess);
                        jumlahnotif();
                        listmessage();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        }
    }

    function allmessage() {
        window.location.href = "<?php echo site_url('administrasi/inbox/') ?>";

    }

    // function section2(id) {
    //     $('#sectionid2').empty();
    //     $.ajax({
    //         url: "<?php echo site_url('administrasi/contact/section2/') ?>" + id,
    //         type: "POST",
    //         dataType: "JSON",
    //         success: function(data) {
    //             $('#sectionid2').html(data);
    //             $('#sectionid').html('hide');


    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             alert('Error get data from ajax');
    //         }
    //     });
    // }


    // function delete_data(id) {
    //     if (confirm('Apakah Anda yakin menghapus  ini ?')) {
    //         // ajax delete data to database
    //         $.ajax({
    //             url: "<?php echo site_url('administrasi/contact/delete_data/') ?>" + id,
    //             type: "POST",
    //             dataType: "JSON",
    //             success: function(data) {
    //                 if (data.status == '00') {
    //                     showAlert(data.type, data.mess);
    //                     reload_table();

    //                 } else {
    //                     showAlert(data.type, data.mess);
    //                     reload_table();
    //                 }
    //             },
    //             error: function(jqXHR, textStatus, errorThrown) {
    //                 alert('Error deleting data');
    //             }
    //         });
    //     }
    // }



    // function jumlahnotif() {
    //     $('#jumlah').empty();
    //     $.ajax({
    //         url: "<?php echo site_url('administrasi/contact/jumlahnotif/') ?>",
    //         type: "POST",
    //         dataType: "JSON",
    //         success: function(data) {
    //             $('#jumlah').text(data);


    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             alert('Error get data from ajax');
    //         }
    //     });
    // }
    // jumlahnotif();

    // function notif() {
    //     $('#notif').modal('show');
    //     $('.modal-title').text('New');
    //     $('#listnotif').empty();
    //     $.ajax({
    //         url: "<?php echo site_url('administrasi/contact/new_testi/') ?>",
    //         type: "POST",
    //         dataType: "JSON",
    //         success: function(data) {
    //             $('#listnotif').html(data);


    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             alert('Error get data from ajax');
    //         }
    //     });
    // }
</script>