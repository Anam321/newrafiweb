<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">CRM</li>
                    </ol>
                </div>
                <h4 class="page-title">CRM</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xxl-3 col-lg-6">

            <?php $date = date("Y-m-d");
            foreach ($pengunjung as $col) : ?>
                <?php $pengunjungHariini = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "'")->num_rows(); ?>
            <?php endforeach ?>

            <div class="card widget-flat bg-primary text-white">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Pengunjung</h6>
                    <h3 class="mt-3 mb-3"><?= $pengunjungHariini ?> Hari Ini</h3>
                    <p class="mb-0">
                        <span class="badge badge-light-lighten me-1">
                            <i class="mdi mdi-arrow-up-bold"></i> <?= $allpengunjung ?></span>
                        <span class="text-nowrap">Total Pengunjung</span>
                    </p>
                </div>
            </div>

        </div>

        <?php $date = date("Y-m-d");
        foreach ($panggilan as $col) : ?>
            <?php $jmlHariini = $this->db->query("SELECT * FROM Whatsapptracking WHERE date='" . $date . "'")->num_rows(); ?>
        <?php endforeach ?>
        <div class="col-xxl-3 col-lg-6">
            <div class="card widget-flat bg-primary text-white">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-phone-incoming widget-icon bg-white text-success"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Menghubungi</h6>
                    <h3 class="mt-3 mb-3"> <?= $jmlHariini ?> Hari Ini</h3>
                    <p class="mb-0">
                        <span class="badge badge-light-lighten me-1">
                            <i class="mdi mdi-arrow-up-bold"></i><?= $totalmenghubungi ?></span>
                        <span class="text-nowrap">Total Dari Semua</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-lg-6">

            <div class="card widget-flat bg-success text-white">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-tag widget-icon bg-white text-success"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Produk</h6>
                    <h3 class="mt-3 mb-3"><?= $jmlproduk ?></h3>
                    <p class="mb-0">
                        <span class="badge badge-light-lighten me-1">
                            <i class="mdi mdi-arrow-up-bold"></i> -</span>
                        <span class="text-nowrap">-</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-lg-6">
            <div class="card widget-flat bg-success text-white">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-tools widget-icon bg-white text-success"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Projek</h6>
                    <h3 class="mt-3 mb-3"><?= $jmlprojek ?></h3>
                    <p class="mb-0">
                        <span class="badge badge-light-lighten me-1 text-light">
                            <i class="mdi mdi-arrow-up-bold"></i> <?= $projekselesai ?></span>
                        <span class="text-nowrap">Selesai</span>
                    </p>
                </div>
            </div>
        </div>


    </div>
    <!-- end row -->






</div> <!-- container -->