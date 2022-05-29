<style>
.blog {
    position: relative;
    width: 100%;
    padding: 45px 0 0 0;
}

.blog .blog-item {
    margin-bottom: 45px;
}

.blog .blog-img {
    position: relative;
    width: 100%;
}

.blog .blog-img img {
    width: 100%;
    border-radius: 5px;
}

.blog .meta-date {
    position: absolute;
    width: 70px;
    height: 70px;
    bottom: 10%;
    left: calc(50% - 35px);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    border-radius: 70px;
    background: #202C45;
    color: #ffffff;
    opacity: 0;
    transition: .5s;
}



.blog .meta-date strong {
    font-size: 16px;
    font-weight: 700;
    line-height: 16px;
    letter-spacing: 3px;
    text-transform: uppercase;
}

.blog .blog-item:hover .meta-date {
    bottom: calc(50% - 35px);
    opacity: 1;
}

.blog .blog-text {
    padding: 25px 0 20px 0;
}

.blog .blog-text h3 {
    font-size: 22px;
    font-weight: 700;
}

.blog .blog-text h3 a {
    color: #202C45;
}

.blog .blog-text h3 a:hover {
    color: #E81C2E;
}

.blog .blog-text p {
    margin: 0;
}

.blog .blog-meta {
    display: flex;
}

.blog .blog-meta p {
    margin: 0;
    font-size: 14px;
    line-height: 14px;
    padding: 0 10px;
    border-right: 1px solid rgba(0, 0, 0, .15);
}

.blog .blog-meta p:first-child {
    padding-left: 0;
}

.blog .blog-meta p:last-child {
    padding-right: 0;
    border: none;
}

.blog .blog-meta i {
    color: #999999;
    margin-right: 5px;
}

.blog .blog-meta a {
    color: #999999;
}

.blog .blog-meta a:hover {
    color: #E81C2E;
}

.blog .pagination {
    margin-bottom: 15px;
}

.blog .pagination .page-link {
    color: #202C45;
    border-radius: 0;
    border-color: #202C45;
}

.blog .pagination .page-link:hover,
.blog .pagination .page-item.active .page-link {
    color: #E81C2E;
    background: #202C45;
}

.blog .pagination .disabled .page-link {
    color: #999999;
}




.preview {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
}

@media screen and (max-width: 996px) {
    .preview {
        margin-bottom: 20px;
    }
}

.preview-pic {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
}

.preview-thumbnail.nav-tabs {
    border: none;
    margin-top: 15px;
}

.preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%;
}

.preview-thumbnail.nav-tabs li img {
    max-width: 100%;
    display: block;
}

.preview-thumbnail.nav-tabs li a {
    padding: 0;
    margin: 0;
}

.preview-thumbnail.nav-tabs li:last-of-type {
    margin-right: 0;
}

.tab-content {
    overflow: hidden;
}

.tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
    animation-name: opacity;
    -webkit-animation-duration: .3s;
    animation-duration: .3s;
}



@media screen and (min-width: 997px) {
    .wrapper {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }
}

.details {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
}

.colors {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
}

.product-title,
.price,
.sizes,
.colors {
    text-transform: UPPERCASE;
    font-weight: bold;
}

.checked,
.price span {
    color: #6c757d;
}

.product-title,
.rating,
.product-description,
.price,
.vote,
.sizes {
    margin-bottom: 15px;
}

.product-title {
    margin-top: 0;
}

.size {
    margin-right: 10px;
}

.size:first-of-type {
    margin-left: 40px;
}

.color {
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
    height: 2em;
    width: 2em;
    border-radius: 2px;
}

.color:first-of-type {
    margin-left: 20px;
}



.add-to-cart:hover,
.like:hover {
    background: #b36800;
    color: #fff;
}

.not-available {
    text-align: center;
    line-height: 2em;
}

.not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff;
}

.orange {
    background: #ff9f1a;
}

.green {
    background: #85ad00;
}

.blue {
    background: #0076ad;
}

.tooltip-inner {
    padding: 1.3em;
}

@-webkit-keyframes opacity {
    0% {
        opacity: 0;
        -webkit-transform: scale(3);
        transform: scale(3);
    }

    100% {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
}

@keyframes opacity {
    0% {
        opacity: 0;
        -webkit-transform: scale(3);
        transform: scale(3);
    }

    100% {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
}

</style>

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                Histori
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-default.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Histori</a></li>

                </ol>
            </nav>
            <button onclick="tambah('')" class="btn mb-1 btn-facebook"><i class="align-middle fas fa-plus"></i> Tambah
                Histori</button>
        </div>
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <p>Our Histor</p>
                    <h2>Histori Pemasangan</h2>
                </div>
                <div class="row" id="histori">



                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Small modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <form action="" id="formhis">
                    <div class="row">
                        <div class="col-md">
                            <input type="hidden" name="histori_id" class="form-control">
                            <div class="form-group">
                                <label class="form-label">Judul Histori</label>
                                <input type="text" name="judul_histori" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Keterangan Histori</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" rows="1"></textarea>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <button class="btn btn-secondary" type="button">Add foto</button>
                                    </span>
                                    <input type="file" name="foto" id="file" onchange="return fileValidation()"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div id="imagePreview"></div>
                        </div>
                    </div>

                    <button type="submit" id="btnSave" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Small modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <div id="detaildata"></div>
            </div>

        </div>
    </div>
</div>
