  <!-- Apex js -->
  <script src="<?= base_url() ?>assets/backend/js/vendor/apexcharts.min.js"></script>

  <!-- Todo js -->
  <script src="<?= base_url() ?>assets/backend/js/ui/component.todo.js"></script>

  <!-- demo app -->
  <script src="<?= base_url() ?>assets/backend/js/pages/demo.dashboard-crm.js"></script>


  <!-- <script type="text/javascript">
var save_method; //for save method string
var table;

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

function projek_table() {

    table = $('#table_projek').DataTable({

        "processing": true,
        'paging': true,
        'lengthChange': true,
        'info': true,
        'autoWidth': false,
        "ajax": "<?= base_url("administrasi/projek/projek_list") ?>",
        stateSave: true,
        "order": []


    });
}
projek_table();

function jumlahnotif() {
    $('#jumlah').empty();
    $.ajax({
        url: "<?php echo site_url('administrasi/dashboard/jumlahnotif/') ?>",
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


function detailproduk(id) {
    $('#modaldetail').modal('show');
    $('.modal-title').text('Detail Produk');
    $('#detaildata').empty();
    $.ajax({
        url: "<?php echo site_url('administrasi/dashboard/detailProduk/') ?>" + id,
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            $('#detaildata').html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

// function count_status() {
//     $('#produk').empty();
//     $('#posts').empty();
//     $('#testi').empty();
//     // ajax get data status
//     $.ajax({
//         url: "<?php echo site_url('admin/dashboard/count_status') ?>",
//         type: "GET",
//         dataType: "JSON",
//         success: function(data) {

//             $('#produk').text(data.produk);
//             $('#testi').text(data.testi);
//             $('#posts').text(data.blog);

//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             type = 'error';
//             msg = 'Error get data from ajax :(';
//             showAlert(type, msg); //utk show alert
//         }
//     });
// }
// count_status();
</script> -->