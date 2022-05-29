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

<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Gallery</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li>Gallery</li>
                </ol>
            </div>

        </div>
    </section>





    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row pt-5">
                <div class="col-lg-8 entries">

                    <section id="team" class="portfolio">
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
                    </section>

                </div>
                <?php $this->load->view('pages/right_v') ?>
            </div>

    </section>
</main>