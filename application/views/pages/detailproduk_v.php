<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail</h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url() ?>katalog">Katalog</a></li>
                    <li>Detail</li>
                </ol>
            </div>

        </div>
    </section>
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

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row pt-5">
                <div class="col-lg-8 entries">

                    <?php foreach ($detproduk as $produk) : ?>
                        <?php $id = $produk->produk_id;
                        $visitprod = $this->db->query("SELECT * FROM section_visit WHERE produk_id='" . $id . "'")->num_rows(); ?>
                        <div class="col-12">
                            <!-- card left -->
                            <div class="product-imgs">
                                <div class="img-display">
                                    <div class="img-showcase">
                                        <img src="<?= base_url() ?>assets/upload/gallery/<?= $produk->foto ?>" alt="shoe image">

                                        <?php foreach ($lisfoto as $foto) : ?>
                                            <img src="<?= base_url() ?>assets/upload/gallery/<?= $foto->foto ?>" alt="shoe image">
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="img-select">
                                    <div class="img-item">

                                        <a href="#" data-id="1">
                                            <img src="<?= base_url() ?>assets/upload/gallery/<?= $produk->foto ?>" alt="shoe image" height="100">
                                        </a>

                                    </div>
                                    <?php $no = 2;
                                    foreach ($lisfoto as $foto) : ?>
                                        <div class="img-item">
                                            <a href="#" data-id="<?= $no ?>">
                                                <img src="<?= base_url() ?>assets/upload/gallery/<?= $foto->foto ?>" alt="shoe image" height="100">
                                            </a>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <!-- card right -->
                            <div class="product-content">
                                <h2 class="product-title"><?= $produk->nama_produk ?></h2>
                                <a href="#" class="product-link"><i class="fa fa-eye "></i> <?= $visitprod ?></a>


                                <!-- <div class="product-price">
                    <p class="last-price">Old Price: <span>$257.00</span></p>
                    <p class="new-price">New Price: <span>$249.00 (5%)</span></p>
                </div> -->

                                <div class="product-detail">
                                    <h2>Deskripsi </h2>
                                    <p><?= $produk->deskripsi ?></p>

                                </div>
                                <div class="purchase-info">

                                    <a onclick="whatsappTracking()" href="https://api.whatsapp.com/send?phone=+62<?= $whatsap ?>&text=Halo%20<?= $perusahaan ?>,%20Saya%20mau%20order%20produk%20ini%20<?= base_url() ?>produk/detail_produk/<?= $produk->slug ?>" target="_blank"><button type="button" class="btn btn-primary">
                                            <i class="fab fa-whatsapp text-light"></i> Pesan Sekarang
                                        </button></a>
                                    <a href="<?= base_url() ?>katalog"><button type="button" class="btn btn-dark">Kembali</button></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

                <?php $this->load->view('pages/right_v') ?>
            </div>
        </div>


    </section>
</main>
<script>
    function whatsappTracking() {
        $.ajax({
            url: "<?php echo site_url('home/whatsappTracking') ?>",
            type: "POST",
        });

    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');



    img {

        width: 100%;
        display: block;
    }


    .img-display {
        overflow: hidden;
    }


    .img-showcase {
        display: flex;
        width: 100%;

        transition: all 0.5s ease;
    }


    .img- showcase img {
        min-width: 100%;
    }


    .img-select {
        display: flex;
    }


    .img-item {
        margin: 0.3rem;
    }


    .img-item:nth-child(1),
    .img-item:nth-child(2),

    .img-item:nth-child(3) {
        margin-right: 0;
    }

    .img-item:hover {
        opacity: 0.8;
    }


    .product-content {
        padding: 2rem 1rem;
    }

    .product-title {
        font-size: 3rem;
        text-transform: capitalize;
        font-weight: 700;
        position: relative;

        color: #12263a;
        margin: 1rem 0;
    }

    .product-title::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 4px;
        width: 80px;
        background: #12263a;

    }

    .product-link {

        text-decoration: none;
        text-transform: uppercase;
        font-weight: 400;

        font-size: 0 .9rem;
        display: inline-block;
        margin-bottom: 0.5rem;
        background: #dfb163;

        color: #fff;
        padding: 0 0.3rem;
        transition: all 0.5s ease;
    }


    .product-link:h over {
        opacity: 0.9;
    }



    .product-price {

        margin: 1rem 0;
        font-size: 1rem;
        font-weight: 700;
    }


    .product-price span {
        font-weight: 400;
    }


    .last-price span {
        color: #f64749;
        text-decoration: line-through;
    }

    .new-price span {
        color: #256eff;
    }

    .product-detail h2 {

        text-transform: capitalize;
        color: #12263a;
        padding-bottom: 0.6rem;

    }

    .product-detail p {

        font-size: 0.9rem;
        padding: 0.3rem;
        opacity: 0. 8;
    }




    .product-detail ul li span {
        font-weight: 400;

    }

    .purchase-info {

        margin: 1.5rem 0;
    }


    .purchase-info .btn {
        border: 1.5px solid #ddd;
        border-radius: 25px;
        text-align: center;
        padding: 0.45rem 0.8rem;
        outline: 0;
        margin-right: 0.2rem;
        margin-bottom: 1rem;
    }

    .purchase-info input {
        width: 60px;
    }


    .purchase-info .btn {
        cursor: point er;
        color: #fff;
    }

    /* .purchase-info .btn:first-of-type {
        background: #256eff;
    } */

    /* .purchase-info .btn:last-of-type {
        background: #f64749;
    } */


    .purchase-inf o .btn:hover {
        opacity: 0.9;
    }



    @media screen and (min-width: 992px) {
        .card {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 1.5rem;
        }

        .card-wrapper {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-imgs {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .product-content {
            padding-top: 0;
        }
    }
</style>