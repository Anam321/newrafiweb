  <?php
    function waktu_lalu($timestamp)
    {
        $selisih = time() - strtotime($timestamp);
        $detik = $selisih;
        $menit = round($selisih / 60);
        $jam = round($selisih / 3600);
        $hari = round($selisih / 86400);
        $minggu = round($selisih / 604800);
        $bulan = round($selisih / 2419200);
        $tahun = round($selisih / 29030400);
        if ($detik <= 60) {
            $waktu = $detik . ' detik yang lalu';
        } else if ($menit <= 60) {
            $waktu = $menit . ' menit yang lalu';
        } else if ($jam <= 24) {
            $waktu = $jam . ' jam yang lalu';
        } else if ($hari <= 7) {
            $waktu = $hari . ' hari yang lalu';
        } else if ($minggu <= 4) {
            $waktu = $minggu . ' minggu yang lalu';
        } else if ($bulan <= 12) {
            $waktu = $bulan . ' bulan yang lalu';
        } else {
            $waktu = $tahun . ' tahun yang lalu';
        }
        return $waktu;
    }
    ?>


  <main id="main">
      <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">

              <div class="d-flex justify-content-between align-items-center">
                  <h2>Testimoni</h2>
                  <ol>
                      <li><a href="<?= base_url() ?>">Home</a></li>
                      <li>Testimoni</li>
                  </ol>
              </div>

          </div>
      </section>

      <section class="inner-page">
          <div class="container">
              <div class="single">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8">

                              <section id="testimonials" class="testimonials">
                                  <div class="container" data-aos="fade-up">

                                      <div class="section-title">
                                          <h2>Testimonials</h2>
                                          <p>Beberapa feedback dan penilaian clien kami yang kami, yang sudah mencoba
                                              pelayanan dan menggunakan
                                              jasa kami</p>
                                          <a href="#" onclick="add()" class="appointment-btn scrollto mt-4"><span
                                                  class="d-none d-md-inline">Berikan</span>
                                              Penilaian</a>
                                      </div>
                                      <div id="notifalert"></div>

                                      <div class="row">

                                          <?php foreach ($testimoni->result() as $fed) : ?>
                                          <div class="col-lg-6 ">
                                              <div class="swiper-wrapper">
                                                  <div class="swiper-slide shadow p-3 mb-5 bg-body rounded">
                                                      <div class="testimonial-item">
                                                          <p>
                                                              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                              <?= $fed->testi ?>
                                                              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                                          </p>
                                                          <img src="<?= base_url() ?>assets/upload/poto/<?= $fed->foto ?>"
                                                              class="testimonial-img" alt="">
                                                          <h3> <?= $fed->nama ?></h3>
                                                          <h4> <?= $fed->email ?></h4>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <?php endforeach ?>
                                      </div>
                                  </div>
                              </section>
                          </div>


                          <?php $this->load->view('pages/right_v') ?>
                      </div>
                  </div>
              </div>
          </div>
      </section>




      <div class="modal fade" id="modalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="form">
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="mb-3">
                                      <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                      <input class="form-control form-control-sm" type="text" name="nama"
                                          placeholder="Masukan Nama Anda">
                                  </div>
                              </div>
                              <div class="col-lg-12">
                                  <div class="mb-3">
                                      <label for="exampleFormControlInput1" class="form-label">Email</label>
                                      <input class="form-control form-control-sm" type="email" name="email"
                                          placeholder="Masukan Email Anda">
                                  </div>
                              </div>
                              <div class="col-lg-12">
                                  <div class="mb-3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Masukan
                                          Penilaian</label>
                                      <textarea class="form-control" id="exampleFormControlTextarea1" name="testi"
                                          rows="3"></textarea>
                                  </div>
                              </div>
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <div class="input-group">
                                          <span class="input-group-prepend">
                                              <button class="btn btn-secondary" type="button">Add foto</button>
                                          </span>
                                          <input type="file" name="foto" id="file" onchange="return fileValidation()"
                                              class="form-control form-control-sm">
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md mt-4">
                                  <div id="imagePreview"></div>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" id="btnSave" class="btn btn-primary">Kirim</button>
                          </div>
                  </form>
              </div>
          </div>
      </div>
      </div>
  </main>


  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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

function notif() {
    $('#notifalert').empty();
    $.ajax({
        url: "<?php echo site_url('testimoni/alertnotif') ?>",
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            $('#notifalert').html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}


function add() {
    save_method = 'add';
    $('#form')[0].reset();
    $('#modalForm').modal('show');
    $('.modal-title').text('Beri Penilaian');
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
                document.getElementById('imagePreview').innerHTML = '<img style="max-width:350px;" src="' + e
                    .target
                    .result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

$('#form').submit(function(e) {
    // alert("Form submitted!");
    e.preventDefault();
    var form = $('#form')[0];
    var data = new FormData(form);
    if ($('[name="foto"]').val() == '') {
        alert('Pilih Foto Produk Yang Akan di Upload !');
        return false;
    }

    $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable
    var url;

    if (save_method == 'add') {
        url = "<?php echo site_url('testimoni/input_testi') ?>";
    } else {
        url = "<?php echo site_url('testi/') ?>";
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
                $('#form')[0].reset();
                notif();
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
  </script>
