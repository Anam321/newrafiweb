<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Register | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/backend/images/favicon.ico">

        <!-- App css -->
        <link href="<?= base_url() ?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/backend/css/app.min.css" rel="stylesheet" type="text/css"
            id="light-style" />
        <link href="<?= base_url() ?>assets/backend/css/app-dark.min.css" rel="stylesheet" type="text/css"
            id="dark-style" />

    </head>

    <body class="loading authentication-bg"
        style="background-image: url('<?= base_url() ?>assets/upload/poto/src.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;"
        data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <!-- Logo-->
                            <div class="card-header pt-4 pb-4 text-center  bg-dark">
                                <a href="index.html">
                                    <span><img src="<?= base_url() ?>assets/backend/images/logo.png" alt=""
                                            height="18"></span>
                                </a>
                            </div>

                            <div class="card-body p-4  bg-dark">

                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                                    <?php if ($this->session->flashdata('message')) : ?>

                                    <?= $this->session->flashdata('message'); ?>

                                    <?php endif; ?>
                                </div>

                                <?php echo form_open_multipart(base_url('administrasi/auth/regist')); ?>

                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Full Name</label>
                                    <input class="form-control" type="text" name="nama" id="fullname"
                                        placeholder="Enter your name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Username</label>
                                    <input class="form-control" type="text" name="username" id="emailaddress" required
                                        placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="pass" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Enter Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="pass2" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>



                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary" type="submit"> Sign Up </button>
                                </div>

                                <?php echo form_close(); ?>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Already have account? <a href="pages-login.html"
                                        class="text-muted ms-1"><b>Log In</b></a></p>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2018 - 2021 © Hyper - Coderthemes.com
        </footer>

        <!-- bundle -->
        <script src="<?= base_url() ?>assets/backend/js/vendor.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/app.min.js"></script>

    </body>

</html>
