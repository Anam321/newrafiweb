 </main>

 <footer id="footer">

     <div class="footer-top">
         <div class="container">
             <div class="row">

                 <div class="col-lg-3 col-md-6 footer-contact">
                     <h3>Flattern</h3>
                     <p>
                         Indonesia <br>
                         <?= $alamat ?>
                         <strong>Phone:</strong> <?= $telpon ?><br>
                         <strong>Phone:</strong> <?= $whatsap ?><br>
                         <strong>Email:</strong> <?= $email ?><br>
                     </p>
                 </div>

                 <div class="col-lg-2 col-md-6 footer-links">
                     <h4>Useful Links</h4>
                     <ul>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                     </ul>
                 </div>

                 <div class="col-lg-3 col-md-6 footer-links">
                     <h4>Our Services</h4>
                     <ul>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                     </ul>
                 </div>

                 <div class="col-lg-4 col-md-6 footer-newsletter">
                     <h4>Join Our Newsletter</h4>
                     <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                     <form action="" method="post">
                         <input type="email" name="email"><input type="submit" value="Subscribe">
                     </form>
                 </div>

             </div>
         </div>
     </div>

     <div class="container d-md-flex py-4">

         <div class="me-md-auto text-center text-md-start">
             <div class="copyright">
                 &copy; Copyright <strong><span><?= $perusahaan ?></span></strong>. All Rights Reserved
             </div>
             <div class="credits">
                 Designed by <a href="https://www.anamsaepul.site">AnbomekerDev</a>
             </div>
         </div>
         <div class="social-links text-center text-md-right pt-3 pt-md-0">
             <a href="<?= $whatsap ?>" class="twitter"><i class="bx bxl-whatsapp"></i></a>
             <a href="<?= $facebook ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
             <a href="<?= $instagram ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
         </div>
     </div>
 </footer><!-- End Footer -->

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files -->
 <script src="<?= base_url() ?>assets/frontend/vendor/aos/aos.js"></script>
 <script src="<?= base_url() ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url() ?>assets/frontend/vendor/glightbox/js/glightbox.min.js"></script>
 <script src="<?= base_url() ?>assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
 <script src="<?= base_url() ?>assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
 <script src="<?= base_url() ?>assets/frontend/vendor/waypoints/noframework.waypoints.js"></script>
 <script src="<?= base_url() ?>assets/frontend/vendor/php-email-form/validate.js"></script>

 <!-- Template Main JS File -->
 <script src="<?= base_url() ?>assets/frontend/js/main.js"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
 <script src="<?= base_url() ?>assets/backend/js/pages/demo.toastr.js"></script>

 </body>

 </html>