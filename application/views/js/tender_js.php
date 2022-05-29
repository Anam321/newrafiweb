<script type="text/javascript">
    var table; // for table
    var tables; // for table
    var tablesc; // for table
    var foor; // for table
    var save_method; // untuk metode save data varible global

    // itu yang buat add udah jalan ga bakalan bener soalna harus satu file lamun banyak pati menumpuk di file footer.php
    function reload_data() {
        foor.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_tablesc() {
        tablesc.ajax.reload(null, false); //reload datatable ajax
    }

    function reload_tables() {
        tables.ajax.reload(null, false); //reload datatable ajax
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

        table = $("#datatable").DataTable({

            "ajax": "<?= base_url("administrasi/tender/datatable") ?>",

            lengthChange: !1,
            buttons: ["copy", "print"],
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

    $(document).ready(function() {

        tablesc = $("#cleartender").DataTable({

            "ajax": "<?= base_url("administrasi/tender/datatablesclear/") ?>",

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
    $(document).ready(function() {

        tables = $("#datatableold").DataTable({

            "ajax": "<?= base_url("administrasi/tender/datatables/") ?>",

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

    function addtender() {
        save_method = 'add';
        $('#form')[0].reset();
        $('#modaltender').modal('show');
        $('.modal-title').text('Tambah Tender');
    }

    function cleartender() {
        window.location.href = "<?php echo site_url('administrasi/tender/tenderclear/') ?>";

    }

    function tenderusai() {
        window.location.href = "<?php echo site_url('administrasi/tender/old_tender/') ?>";

    }

    function backtender() {
        window.location.href = "<?php echo site_url('administrasi/tender/') ?>";

    }

    $('#form').submit(function(e) {
        e.preventDefault();
        var form = $('#form')[0];
        var data = new FormData(form);

        $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('administrasi/tender/input_data') ?>";
        } else {
            url = "<?php echo site_url('administrasi/tender/update_data') ?>";
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
                    $('#modaltender').modal('hide');
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


    function edit(id) {
        save_method = 'update';
        $('#form')[0].reset();
        $('#modaltender').modal('show');
        $('.modal-title').text('Edit Tender');

        $.ajax({
            url: "<?php echo site_url('administrasi/tender/editTender/') ?>" + id,
            type: "POST",
            dataType: "JSON",

            success: function(data) {
                $('[name="projek_id"]').val(data.projek_id);
                $('[name="nama_tender"]').val(data.nama_tender);
                $('[name="jenis"]').val(data.jenis);
                $('[name="pembuatan"]').val(data.pembuatan);
                $('[name="tgl_mulai"]').val(data.tgl_mulai);
                $('[name="tgl_akhir"]').val(data.tgl_akhir);
                $('[name="volume"]').val(data.volume);
                $('[name="alamat"]').val(data.alamat);
                $('[name="harga"]').val(data.harga);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function arsip(id) {
        if (confirm('Arsipkan Data Ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/tender/arsip/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        showAlert(data.type, data.mess);
                        reload_tablesc();
                    } else {
                        showAlert(data.type, data.mess);

                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error ubah data');
                }
            });
        }
    }

    function done(id) {
        if (confirm('Apakah Anda yakin ini sudah selesai ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/tender/done/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        showAlert(data.type, data.mess);
                        reload_table();
                    } else {
                        showAlert(data.type, data.mess);

                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error ubah data');
                }
            });
        }
    }

    function hapus(id) {
        if (confirm('Apakah Anda yakin menghapus data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/tender/delete_data/') ?>" + id,
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

    // $('#fileUpload').submit(function(e) {
    //     e.preventDefault();
    //     var form = $('#fileUpload')[0];
    //     var data = new FormData(form);
    //     if ($('[name="file"]').val() == '') {
    //         alert('Pilih Foto Produk Yang Akan di Upload !');
    //         return false;
    //     }

    //     $('#upload').text('Sedang Proses..'); //change button text
    //     $('#upload').attr('disabled', true); //set button disable

    //     $.ajax({
    //         url: "<?php echo site_url('administrasi/katalog/fileUpload') ?>",
    //         type: "POST",
    //         //contentType: 'multipart/form-data',
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         method: 'POST',
    //         data: data,
    //         dataType: "JSON",

    //         success: function(data, id) {
    //             if (data.status == '00') {
    //                 showAlert(data.type, data.mess);
    //                 $('#fileUpload')[0].reset();
    //                 $('#fotoProduk').html(data);
    //                 addfoto(id);

    //             } else {

    //                 showAlert(data.type, data.mess);
    //             }
    //             $('#upload').text('Simpan'); //change button text
    //             $('#upload').attr('disabled', false); //set button enable
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             type = 'error';
    //             msg = 'Error adding / update data';
    //             showAlert(type, msg); //utk show alert
    //             $('#upload').text('Simpan'); //change button text
    //             $('#upload').attr('disabled', false); //set button enable
    //         }
    //     });

    // });



    // function detail(id) {
    //     $('#produkdetail').modal('show');
    //     $('#detaildata').empty();

    //     $.ajax({
    //         url: "<?php echo site_url('administrasi/katalog/detailProduk/') ?>" + id,
    //         type: "POST",
    //         dataType: "JSON",
    //         success: function(data) {
    //             // console.log(data);
    //             $('#detaildata').html(data);
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             alert('Error get data from ajax');
    //         }
    //     });

    // }





    // function remove(id) {
    //     if (confirm('Apakah Anda yakin menghapus data ini ?')) {
    //         // ajax delete data to database
    //         $.ajax({
    //             url: "<?php echo site_url('administrasi/katalog/delete_foto/') ?>" + id,
    //             type: "POST",
    //             dataType: "JSON",
    //             success: function(data) {
    //                 if (data.status == '00') {
    //                     showAlert(data.type, data.mess);

    //                 } else {
    //                     showAlert(data.type, data.mess);

    //                 }
    //             },
    //             error: function(jqXHR, textStatus, errorThrown) {
    //                 alert('Error deleting data');
    //             }
    //         });
    //     }
    // }
</script>