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
                <h2>Katalog</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li>Katalog</li>
                </ol>
            </div>

        </div>
    </section>




    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row pt-5">
                <div class="col-lg-8 entries">

                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col text-center mb-4">
                            <h6 class="text-primary font-weight-normal text-uppercase mb-3">Our Katalog</h6>
                            <h1 class="mb-4">Katalog</h1>
                        </div>
                    </div>

                    <section id="portfolio" class="portfolio">
                        <div class="row" data-aos="fade-up">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <ul id="portfolio-flters">
                                    <li onclick="listproduk()" class="filter-active">All</li>
                                    <?php foreach ($kategori as $kategori) : ?>
                                        <li onclick="orderby('<?= $kategori->kategori ?>')" class="filter-active"><?= $kategori->kategori ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </section>


                    <section id="team" class="team ">
                        <div class="row pb-3" id="listkatalog"></div>
                    </section>


                </div>
                <?php $this->load->view('pages/right_v') ?>
            </div>

        </div>
    </section>
</main>