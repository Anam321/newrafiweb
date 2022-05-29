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
                <h2>About</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li>About</li>
                </ol>
            </div>

        </div>
    </section>


    <!-- About Start -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row pt-5">
                <div class="col-lg-8 entries">
                    <section id="about-us" class="about-us">
                        <div class="row no-gutters">
                            <div style=" background: url(<?= base_url() ?>assets/frontend//img/about.jpg) center center no-repeat; background-size: cover; min-height: 400px;" class=" col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" data-aos="fade-right"></div>
                            <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
                                <div class="content d-flex flex-column justify-content-center">
                                    <?= $deskripsi ?>

                                </div><!-- End .content-->
                            </div>
                        </div>
                    </section>

                </div>

                <?php $this->load->view('pages/right_v') ?>
            </div>
        </div>
    </section>
</main>