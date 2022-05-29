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
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row pt-5">
                <div class="col-lg-8 entries">

                    <section id="blog" class="blog">

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
                                <div class="col-lg-6 entries">
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
                    </section>
                </div>
                <?php $this->load->view('pages/right_v') ?>
            </div>
        </div>
    </section>


</main>