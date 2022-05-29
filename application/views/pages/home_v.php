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

<style>
    @media screen and (max-width: 500px) {
        .col-sm-4 {
            width: 50%;
            padding: 6px;
            margin: auto;
        }

        .col-lg-3 {
            width: 50%;
            padding: 6px;
            margin: auto;
        }

        .col-md-6 {
            width: 50%;
            padding: 6px;
            margin: auto;
        }


    }
</style>
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner" role="listbox">

            <?php foreach ($slide as $hero) : ?>
                <div class="carousel-item <?= $hero->class ?>" style="background-image: url(<?= base_url() ?>assets/upload/gallery/<?= $hero->foto ?>);">
                    <div class="carousel-container">
                        <div class="carousel-content animate__animated animate__fadeInUp">
                            <h2><?= $hero->judul ?></span></h2>
                            <p><?= $hero->paragraf ?></p>
                            <div class="text-center"><a href="<?= base_url() ?><?= $hero->link ?>" class="btn-get-started">Read More</a></div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
</section>
<main id="main">
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3>We've created more than <span>200 websites</span> this year!</h3>
                    <p> Puji syukur kami panjatkan kepada Tuhan yang maha esa , atas segala rahmat dan keridoan nya, sehingga kita masih di beri kesehatan dan kelncaran dalam menjalan kan aktifitas se hari-hari Rafi utama berdiri sejak 18 oktober 2009. Saat ini Rafi utama di kelola oleh dewan direksi yang telah berpengalaman dalam bidang konstruksi las dan gorden.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="<?= base_url() ?>katalog">Request a quote</a>
                </div>
            </div>

        </div>
    </section><!-- End Cta Section -->



    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h6 class="text-primary font-weight-normal text-uppercase mb-3">Our Katalog</h6>
                <h1 class="mb-4">Pilih Kebutuhan Anda</h1>
            </div>

            <div class="row">
                <?php foreach ($dataKatalog as $katalog) : ?>
                    <?php $id = $katalog->produk_id;
                    $visitorprod = $this->db->query("SELECT * FROM section_visit WHERE produk_id='" . $id . "'")->num_rows(); ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="<?= base_url() ?>assets/upload/gallery/<?= $katalog->foto ?>" height="50" class="img-fluid" alt="">
                                <!-- <div class="social">
                                <a href=""><i class="bi bi-eye"></i> <?= $visitorprod ?></a>
                                <a href=""><i class="bi bi-clock"></i> <?= waktu_lalu($katalog->date_post) ?></a>
                            </div> -->
                            </div>
                            <div class="member-info">
                                <a href="<?= base_url() ?>katalog/detailproduk/<?= $katalog->slug ?>/<?= $katalog->produk_id ?>">
                                    <h4><?= $katalog->nama_produk ?></h4>
                                </a>
                                <span><?= $katalog->kategori ?></span>
                                <span><i class="bi bi-eye"> </i><?= $visitorprod ?> Lihat</span>
                                <span><i class="bi bi-clock"></i></i> </i> <?= waktu_lalu($katalog->date_post) ?></span>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>


            <div class="row pb-3">

                <div class="col-md-4 mb-4">

                    <div class="d-flex align-items-center mb-3">
                        <a class="btn btn-primary" href="<?= base_url() ?>katalog">
                            <h5 class=" m-0 ml-3 text-truncate">Lihat Lebih Banyak </h5> <i class="fa fa-arrow-right "></i>
                        </a>

                    </div>


                </div>

            </div>
        </div>
    </section>




    <section id="services" class="services">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box" data-aos="fade-up">
                        <div class="icon"><i class="bi bi-currency-exchange"></i></div>
                        <h4 class="title"><a href="">Biaya Murah</a></h4>
                        <p class="description">Di Sini Anda Akan Hemat 10 %, Dan anda bisa order Produk sepuas nya.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bi bi-tags-fill"></i></div>
                        <h4 class="title"><a href="">Discont</a></h4>
                        <p class="description">Dapatkan Potongan Harga Dari Kami, Dan Promo promo Lain nya</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bi bi-cart-check"></i></div>
                        <h4 class="title"><a href="">Transaksi Mudah</a></h4>
                        <p class="description">Nikmati Kemudahan Bertransaksi, Kapan Pun din mana pun.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <section id="team" class="portfolio">
        <div class="container">

            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="section-title" data-aos="fade-up">
                        <h6 class="text-primary font-weight-normal text-uppercase mb-3">Our Gallery</h6>
                        <h1 class="mb-4">Gallery Foto Produk</h1>
                    </div>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up">
                <?php foreach ($gallery as $row) : ?>
                    <div class="col-lg-4 col-md-6 portfolio-item <?= $row->nama_foto ?>">
                        <img src="<?= base_url() ?>assets/upload/gallery/<?= $row->foto ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $row->nama_foto ?></h4>
                            <!-- <p>App</p> -->
                            <a href="<?= base_url() ?>assets/upload/gallery/<?= $row->foto ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $row->nama_foto ?>""><i class=" bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                <?php endforeach ?>

            </div>

            <div class="row pb-3 mt-5">
                <div class="col-md-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <a class="btn btn-primary" href="<?= base_url() ?>gallery">
                            <h5 class=" m-0 ml-3 text-truncate">Lihat Lebih Banyak </h5> <i class="fa fa-arrow-right "></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-7 py-5 pr-md-5">
                    <h6 class="text-primary font-weight-normal text-uppercase mb-3 pt-5">Testimonial</h6>
                    <button onclick="addtesti()" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Masukan Testimoni</button>
                    <h1 class="mb-4 section-title">Apa yang dikatan Client Kami</h1>
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <?php foreach ($testimoni as $testi) : ?>
                                <div class="carousel-item active">
                                    <section id="testimonials" class="testimonials">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-6" data-aos="fade-up">
                                                    <div class="testimonial-item">
                                                        <img src="<?= base_url() ?>assets/upload/poto/<?= $testi->foto ?>" class="testimonial-img" alt="">
                                                        <h3><?= $testi->nama ?></h3>
                                                        <h4><?= $testi->email ?></h4>
                                                        <p>
                                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                            <?= $testi->testi ?>
                                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            <?php endforeach ?>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100 overflow-hidden">
                        <img class="h-100" src="<?= base_url() ?>assets/upload/poto/<?= $foto ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="modal fade" id="modaltesti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form" action="">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="validationServer01" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" required>

                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationServer01" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>

                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationServer01" class="form-label">Foto</label>
                                <input type="file" class="form-control" name="foto" required>

                            </div>
                            <div class="mb-3">
                                <label for="validationTextarea" class="form-label">Textarea</label>
                                <textarea class="form-control" name="testi" placeholder="Required example textarea" required></textarea>

                            </div>
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

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col text-center mb-4">
                    <h6 class="text-primary font-weight-normal text-uppercase mb-3">Our Blog</h6>
                    <h1 class="mb-4">Artikel Terbaru</h1>
                </div>
            </div>
            <div class="row">
                <?php foreach ($artikel as $blog) : ?>
                    <?php $text = $blog->konten;
                    $limitext = word_limiter($text, 30);
                    ?>
                    <?php $id = $blog->artikel_id;
                    $visitartik = $this->db->query("SELECT * FROM section_visit WHERE artikel_id='" . $id . "'")->num_rows(); ?>
                    <div class="col-lg-4 entries">
                        <article class="entry">

                            <div class="entry-img">
                                <img src="<?= base_url() ?>assets/upload/artikel/<?= $blog->foto ?>" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="<?= base_url() ?>artikel/single/<?= $blog->slug ?>/<?= $blog->artikel_id ?>"><?= $blog->judul_artikel ?></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="javascript: void(0);"><?= $blog->penerbit ?></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="javascript: void(0);"><time datetime="2020-01-01"><?= waktu_lalu($blog->date_post) ?></time></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="javascript: void(0);"><?= $visitartik ?> Lihat</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    <?= $limitext ?>
                                </p>

                            </div>

                        </article>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

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

        function addtesti() {

            $('#form')[0].reset();
            // $('#imagePreview').html('');

            $('#modaltesti').modal('show');
            $('.modal-title').text('Tambah Testimoni Anda');
        }


        $('#form').submit(function(e) {
            e.preventDefault();
            var form = $('#form')[0];
            var data = new FormData(form);

            if ($('[name="foto"]').val() == '') {
                alert('Pilih Foto Produk Yang Akan di Upload !');
                return false;
            }

            $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
            $.ajax({
                url: "<?php echo site_url('home/inputtesti/') ?>",
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
                        $('#modaltesti').modal('hide');
                        $('#form')[0].reset();
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