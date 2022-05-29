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
                <h2>Artikel Det</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url() ?>artikel">Artikel</a></li>
                    <li>Artikel Det</li>
                </ol>
            </div>

        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row pt-5">
                <div class="col-lg-8 entries">

                    <?php foreach ($single as $sa) : ?>
                        <article class="entry">

                            <div class="entry-img">
                                <img src="<?= base_url() ?>assets/upload/artikel/<?= $sa->foto ?>" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="blog-single.html"><?= $sa->judul_artikel ?></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="javascript: void(0);"><?= $sa->penerbit ?></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="javascript: void(0);"><time datetime="2020-01-01"><?= waktu_lalu($sa->date_post) ?></time></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="javascript: void(0);"><?= $view ?> View</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="javascript: void(0);">12 Comments</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    <?= $sa->konten ?>
                                </p>

                            </div>
                            <div class="entry-footer">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">Business</a></li>
                                </ul>

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                </ul>
                            </div>
                        </article>
                    <?php endforeach ?>
                </div>





                <?php $this->load->view('pages/right_v') ?>

            </div>
        </div>
</main>