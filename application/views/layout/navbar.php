<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com"><?= $email ?></a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 <?= $telpon ?></span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">

            <a href="<?= $facebook ?>" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="<?= $instagram ?>" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="<?= $whatsap ?>" class="linkedin"><i class="bi bi-whatsapp"></i></i></a>
        </div>
    </div>
</section>

<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div class="logo">
            <a href="<?= base_url() ?>" class="navbar-brand">
                <img src="<?= base_url() ?>assets/upload/logo/<?= $logo ?>" alt="" class="img-fluid">
            </a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>

                <a href="<?= base_url() ?>" class="active ">Home</a>
                <a href="<?= base_url('about') ?>">About</a>
                <a href="<?= base_url('katalog') ?>">Katalog</a>
                <a href="<?= base_url('gallery') ?>">Gallery</a>
                <a href="<?= base_url('artikel') ?>">Artikel</a>
                <a href="<?= base_url('contact') ?>">Contact</a>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>