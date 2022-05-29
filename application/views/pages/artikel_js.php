<script>
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

    function listartikel() {

        $('#cardartikel').empty();

        $.ajax({
            url: "<?php echo site_url('artikel/listartikel/') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                $('#cardartikel').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });

    }
    listartikel();
</script>