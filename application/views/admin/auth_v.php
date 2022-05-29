<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $judul ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="icon"" href=" <?= base_url() ?>assets/upload/logo/<?= $logo ?>">

    <!-- App css -->
    <link href="<?= base_url() ?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/backend/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="<?= base_url() ?>assets/backend/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading" style="background-image: url('<?= base_url() ?>assets/backend/images/background/33.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header text-center bg-dark">
                            <a href="index.html">
                                <span><img src="<?= base_url() ?>assets/upload/logo/<?= $logo ?>" alt="" height="50"></span>
                            </a>
                        </div>

                        <div class="card-body p-4 bg-dark">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>


                                <?php if ($this->session->flashdata('message')) : ?>

                                    <?= $this->session->flashdata('message'); ?>

                                <?php endif; ?>
                            </div>

                            <?php echo form_open_multipart(base_url('administrasi/auth')); ?>

                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Username</label>
                                <input class="form-control" type="text" name="username" id="emailaddress" required="" placeholder="Enter your email">
                            </div>

                            <div class="mb-3">
                                <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your
                                        password?</small></a>
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="pass" class="form-control" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>



                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary" type="submit"> Log In </button>
                            </div>

                            <?php echo form_close(); ?>
                        </div>
                    </div>

                    <!-- 
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="<?= base_url() ?>administrasi/auth/regist" class="text-muted ms-1"><b>Sign
                                        Up</b></a></p>
                        </div> 
                    </div> -->


                </div>
            </div>

        </div>

    </div>


    <footer class="footer footer-alt">
        2018 - 2021 © AnbomekerDev - Anbomeker.com
    </footer>

    <!-- bundle -->
    <script src="<?= base_url() ?>assets/backend/js/vendor.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/app.min.js"></script>

</body>

</html>