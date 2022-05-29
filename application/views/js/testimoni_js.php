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

        table = $("#testimoni").DataTable({

            "ajax": "<?= base_url("administrasi/testimoni/datatable") ?>",

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

    function lihat(id) {
        $('#datatesti').empty();

        $.ajax({
            url: "<?php echo site_url('administrasi/testimoni/detTesti/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                $('#datatesti').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });

    }


    function activ(id) {
        if (confirm('Apakah Anda yakin menampilkan data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/testimoni/active/') ?>" + id,
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
                url: "<?php echo site_url('administrasi/testimoni/not_active/') ?>" + id,
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



    function hapus(id) {
        if (confirm('Apakah Anda yakin menghapus data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/testimoni/delete_data/') ?>" + id,
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

    function jumlahnotif() {
        $('#jumlah').empty();
        $.ajax({
            url: "<?php echo site_url('administrasi/testimoni/jumlahnotif/') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#jumlah').text(data);


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
    jumlahnotif();

    function newTesti() {
        $('#modaltesti').modal('show');
        $('#listnotif').empty();
        $.ajax({
            url: "<?php echo site_url('administrasi/testimoni/new_testi/') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#listnotif').html(data);


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }



    function terima(id) {
        if (confirm('Apakah Anda yakin masukan dalam list data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/testimoni/terima/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        showAlert(data.type, data.mess);
                        jumlahnotif();
                        newTesti();
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


    function remove(id) {
        if (confirm('Apakah Anda yakin menghapus data ini ?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('administrasi/testimoni/delete_data/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    if (data.status == '00') {
                        showAlert(data.type, data.mess);
                        jumlahnotif();
                        newTesti();
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