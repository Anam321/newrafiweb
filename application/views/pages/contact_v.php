<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Contact</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Contact</li>
                </ol>
            </div>

        </div>
    </section>


    <div class="map-section">
        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
            <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div>
            <script>
                (function() {
                    var setting = {
                        "height": 540,
                        "width": '100%',
                        "zoom": 17,
                        "queryString": "Bengkel Las Rafi Utama, Pondok Petir, Depok City, West Java, Indonesia",
                        "place_id": "ChIJ3T-2_VDvaS4R1bD4J6NBojQ",
                        "satellite": false,
                        "centerCoord": [-6.3757588906131515, 106.7316891609245],
                        "cid": "0x34a241a327f8b0d5",
                        "lang": "en",
                        "cityUrl": "/indonesia/jakarta",
                        "cityAnchorText": "Map of Jakarta, Java, Indonesia",
                        "id": "map-9cd199b9cc5410cd3b1ad21cab2e54d3",
                        "embed_id": "534520"
                    };
                    var d = document;
                    var s = d.createElement('script');
                    s.src = 'https://1map.com/js/script-for-user.js?embed_id=534520';
                    s.async = true;
                    s.onload = function(e) {
                        window.OneMap.initMap(setting)
                    };
                    var to = d.getElementsByTagName('script')[0];
                    to.parentNode.insertBefore(s, to);
                })();
            </script>
        </div>

    </div>



    <section id="contact" class="contact">
        <div class="container">
            <div id="notifalert"></div>
            <div class="row justify-content-center" data-aos="fade-up">

                <div class="col-lg-10">

                    <div class="info-wrap">
                        <div class="row">
                            <div class="col-lg-4 info">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>A<?= $alamat ?></p>
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p><?= $email ?></p>
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+62 <?= $telpon ?><br>+62 <?= $whatsap ?></p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row mt-5 justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                    <form id="contactForm" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="nama" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>

                        <div class="text-center"><button type="submit" id="btnSave">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section>


</main>

<script>
    // function showAlert(type, msg) {

    //     toastr.options.closeButton = true;
    //     toastr.options.progressBar = true;
    //     toastr.options.extendedTimeOut = 1000; //1000

    //     toastr.options.timeOut = 3000;
    //     toastr.options.fadeOut = 250;
    //     toastr.options.fadeIn = 250;

    //     toastr.options.positionClass = 'toast-top-center';
    //     toastr[type](msg);
    // }
    $(document).ready(function() {
        $('#summernote').summernote();
    });


    function notif() {
        $('#notifalert').empty();
        $.ajax({
            url: "<?php echo site_url('contact/alertnotif') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#notifalert').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    $('#contactForm').submit(function(e) {
        e.preventDefault();
        var form = $('#contactForm')[0];
        var data = new FormData(form);
        $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable
        $.ajax({
            url: "<?php echo site_url('contact/input_message') ?>",
            type: "POST",
            //contentType: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {
                if (data.status == '00') {
                    // showAlert(data.type, data.mess);
                    $('#contactForm')[0].reset();
                    $('#summernote').summernote('code', '');
                    notif();

                } else {
                    // showAlert(data.type, data.mess);
                }
                $('#btnSave').text('Send Message'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
                $('#btnSave').attr('hide', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                type = 'error';
                msg = 'Error adding / update data';
                showAlert(type, msg); //utk show alert
                $('#btnSave').text('Send Message'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
                $('#btnSave').attr('hide', false); //set button enable
            }
        });

    });
</script>