<script type="text/javascript">
var table; // for table
var foor; // for table
var save_method; // untuk metode save data varible global

// itu yang buat add udah jalan ga bakalan bener soalna harus satu file lamun banyak pati menumpuk di file footer.php
function reload_data() {
    foor.ajax.reload(null, false); //reload datatable ajax
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
    $('.summernote').summernote();
});


function list_histori() {
    $('#histori').empty();
    $.ajax({
        url: "<?php echo site_url('administrasi/histori/list_histori/') ?>",
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            $('#histori').html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}
list_histori();

function detailhistor(id) {
    $('#modaldetail').modal('show');
    $('.modal-title').text('Detail Produk');
    $('#detaildata').empty();
    $.ajax({
        url: "<?php echo site_url('administrasi/histori/detailhistori/') ?>" + id,
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


function tambah() {
    save_method = 'add';
    $('#formhis')[0].reset(); // reset form on modals
    $('#modalForm').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Histori');
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

function edit(id) {
    // alert('you can edit here !');
    save_method = "update";
    $('#formhis')[0].reset();
    $('#modalForm').modal('show');
    $('.modal-title').text('Edit Histori');

    $.ajax({
        url: "<?php echo site_url('administrasi/histori/edit_histori') ?>/" + id,
        type: "POST",
        dataType: "JSON",

        success: function(data) {

            $('[name="histori_id"]').val(data.histori_id);
            $('[name="judul_histori"]').val(data.judul_histori);
            $('[name="alamat"]').val(data.alamat);
            $('[name="foto"]').val(data.foto);

            $('[name="keterangan"]').val(data.keterangan);



        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });

}

function delete_data(id) {
    if (confirm('Apakah Anda yakin menghapus data ini ?')) {
        // ajax delete data to database
        $.ajax({
            url: "<?php echo site_url('administrasi/histori/delete') ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                if (data.status == '00') {
                    showAlert(data.type, data.mess);
                    list_histori();
                } else {
                    showAlert(data.type, data.mess);
                    list_histori();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });
    }
}


$('#formhis').submit(function(e) {
    // alert("Form submitted!");
    e.preventDefault();
    var form = $('#formhis')[0];
    var data = new FormData(form);
    // if ($('[name="foto"]').val() == '') {
    //     alert('Pilih Foto Produk Yang Akan di Upload !');
    //     return false;
    // }

    $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable
    var url;

    if (save_method == 'add') {
        url = "<?php echo site_url('administrasi/histori/input_histori') ?>";
    } else {
        url = "<?php echo site_url('administrasi/histori/update/') ?>";
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
                $('#modalForm').modal('hide');
                list_histori();
                $('#formhis')[0].reset();

            } else {

                showAlert(data.type, data.mess);
                list_produk();

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



// AJAX EDIT SERVERSIDE




$('#formupload').submit(function(e) {
    // alert("Form submitted!");
    e.preventDefault();
    var form = $('#formupload')[0];
    var data = new FormData(form);
    $('#upload').text(' Proses...'); //change button text
    $('#upload').attr('disabled', true); //set button disable

    $.ajax({
        url: "<?php echo site_url('administrasi/produk/upload') ?>",
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        data: data,
        dataType: "JSON",

        success: function(data) {
            if (data.status == '00') //if success close modal and reload ajax table
            {
                showAlert(data.type, data.mess);
                $('#formupload')[0].reset(); // reset form on modals
                $('#modalfotosub').modal('hide'); // show bootstrap modal
                subfoto(id);
            } else {
                showAlert(data.type, data.mess);
                // ajax_list();
            }

            $('#upload').text('Simpan'); //change button text
            $('#upload').attr('disabled', false); //set button enable
        },
        error: function(jqXHR, textStatus, errorThrown) {
            type = 'error';
            msg = 'Error uploading / update data';
            showAlert(type, msg); //utk show alert
            $('#upload').text('Simpan'); //change button text
            $('#upload').attr('disabled', false); //set button enable
        }
    });

});
</script>
