<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                Artikel
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-default.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Artikel</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit Artikel</a></li>

                </ol>
            </nav>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-dark btn-sm mb-3" href="<?= base_url() ?>administrasi/artikel/">
                            <i class="align-middle mr-2 fas fa-fw fa-long-arrow-alt-left"></i>
                        </a>
                        <h4 class="card-title">
                            Edit Artikel
                        </h4>

                        <div class="text-center">
                            <?php if ($this->session->flashdata('message')) : ?>

                            <?= $this->session->flashdata('message'); ?>

                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="card-body">
                        <?php foreach ($artikel as $row) : ?>
                        <form action="<?= base_url('administrasi/artikel/update/') ?>" method="POST">
                            <div class="row">
                                <div class="col-md">
                                    <input type="hidden" name="artikel_id" class="form-control"
                                        value="<?= $row['artikel_id'] ?>">
                                    <div class="form-group">
                                        <label class="form-label">Penerbit</label>
                                        <input type="text" name="penerbit" class="form-control"
                                            value="<?= $row['penerbit'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Judul Artikel</label>
                                        <input type="text" name="judul_artikel" class="form-control"
                                            value="<?= $row['judul_artikel'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" value="<?= $row['slug'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Link</label>
                                        <input type="text" name="link" class="form-control" value="<?= $row['link'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <button class="btn btn-secondary" type="button">Add foto</button>
                                            </span>
                                            <input type="file" name="foto" id="file" onchange="return fileValidation()"
                                                class="form-control" value="<?= $row['foto'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div id="imagePreview"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Konten</label>
                                <textarea class="form-control summernote" name="konten" id="paragraf" rows="1"
                                    value="<?= $row['konten'] ?>"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
</main>
