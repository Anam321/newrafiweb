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



    function allmessage() {
        window.location.href = "<?php echo site_url('administrasi/inbox/') ?>";

    }
</script>