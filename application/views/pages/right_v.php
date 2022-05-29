<div class="col-lg-4 mt-5 mt-lg-0">
    <div class="sidebar">

        <h3 class="sidebar-title">Categories</h3>
        <div class="sidebar-item categories">
            <ul>

                <?php $c = 'Canopy';
                $canopy = $this->db->query("SELECT * FROM ref_produk WHERE kategori='" . $c . "'")->num_rows(); ?>
                <?php $t = 'Tangga';
                $tangga = $this->db->query("SELECT * FROM ref_produk WHERE kategori='" . $t . "'")->num_rows(); ?>
                <?php $p = 'Pagar';
                $pagar = $this->db->query("SELECT * FROM ref_produk WHERE kategori='" . $p . "'")->num_rows(); ?>
                <?php $t = 'Tralis';
                $tralis = $this->db->query("SELECT * FROM ref_produk WHERE kategori='" . $t . "'")->num_rows(); ?>

                <li><a href="#"> Canopy <span>(<?= $canopy ?>)</span></a></li>
                <li><a href="#">Raling Tangga <span>(<?= $tangga ?>)</span></a></li>
                <li><a href="#">Pagar Tralis <span>(<?= $pagar ?>)</span></a></li>
                <li><a href="#">Tralis <span>(<?= $tralis ?>)</span></a></li>

            </ul>
        </div>

        <div class="mb-5">
            <img src="<?= base_url() ?>assets/upload/poto/<?= $foto ?>" alt="" class="img-fluid">
        </div>

        <h3 class="sidebar-title">Recent Posts</h3>
        <div class="sidebar-item recent-posts">

            <?php foreach ($artikellimit as $art) : ?>
                <?php $id = $art->artikel_id;
                $visitart  = $this->db->query("SELECT * FROM section_visit WHERE artikel_id='" . $id . "'")->num_rows(); ?>
                <div class="post-item clearfix">
                    <img src="<?= base_url() ?>assets/upload/artikel/<?= $art->foto ?>" alt="">
                    <h4><a href="<?= base_url() ?>artikel/single/<?= $art->slug ?>/<?= $art->artikel_id ?>"><?= $art->judul_artikel ?></a></h4>
                    <time datetime="2020-01-01"><?= waktu_lalu($art->date_post) ?></time>
                    <time><?= $visitart ?> Lihat</time>
                    <time><?= $art->penerbit ?></time>
                </div>

            <?php endforeach ?>
        </div>

        <h3 class="sidebar-title">Recent Produk</h3>
        <div class="sidebar-item recent-posts">

            <?php foreach ($produklimit as $produk) : ?>
                <?php $id = $produk->produk_id;
                $visitproduk  = $this->db->query("SELECT * FROM section_visit WHERE produk_id='" . $id . "'")->num_rows(); ?>
                <div class="post-item clearfix">
                    <img src="<?= base_url() ?>assets/upload/gallery/<?= $produk->foto ?>" alt="">
                    <h4><a href="<?= base_url() ?>katalog/detailproduk/<?= $produk->slug ?>/<?= $produk->produk_id ?>"><?= $produk->nama_produk ?></a></h4>
                    <time datetime="2020-01-01"><?= waktu_lalu($produk->date_post) ?></time>
                </div>

            <?php endforeach ?>
        </div>

        <!-- <div>
        <h3 class="mb-4 section-title">Plain Text</h3>
        Aliquyam sed lorem stet diam dolor sed ut sit. Ut sanctus erat ea est aliquyam dolor et. Et no consetetur eos labore ea erat voluptua et. Et aliquyam dolore sed erat. Magna sanctus sed eos tempor rebum dolor, tempor takimata clita sit et elitr ut eirmod.
    </div> -->
    </div>
</div>