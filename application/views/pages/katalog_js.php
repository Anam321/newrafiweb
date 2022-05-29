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


    function listproduk() {

        $('#listkatalog').empty();

        $.ajax({
            url: "<?php echo site_url('katalog/listkatalog/') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                $('#listkatalog').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });

    }
    listproduk();

    function orderby(kategori) {

        $('#listkatalog').empty();

        $.ajax({
            url: "<?php echo site_url('katalog/orderbykategori/') ?>" + kategori,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                $('#listkatalog').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });

    }


    const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    let imgId = 1;

    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            slideImage();
        });
    });

    function slideImage() {
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);
</script>