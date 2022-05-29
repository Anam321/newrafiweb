<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Slider</a></li>

                    </ol>
                </div>
                <h4 class="page-title">Slider</h4>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-body shadow-lg p-3 mb-5 bg-body rounded ">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="javascript:void(0);" onclick="addslide()" class="btn btn-danger btn-sm mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Hero</a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" onclick="reload_table('')" class="btn btn-success btn-sm mb-2 me-1"><i class="mdi mdi-autorenew"></i></button>

                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive table-sm " id="listslide">
                            <thead class="table-light">
                                <tr>

                                    <th class="all">Slider</th>
                                    <th style="">Paragraf</th>
                                    <th>Link</th>
                                    <th>Tampil Slide</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modalslide" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form id="form">
                <div class="modal-body">
                    <input type="hidden" name="hero_id" class="form-control form-control-sm">
                    <input type="hidden" id="old_foto" name="old_foto">
                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Judul Slide</label>
                        <input type="text" name="judul" class="form-control form-control-sm">
                    </div>
                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Link</label>
                        <input type="text" name="link" class="form-control form-control-sm">
                    </div>


                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control form-control-sm" id="file" onchange="return fileValidation()" valu accept="image/x-png,image/gif,image/jpeg">
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div id="imagePreview"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Paragraf</label>
                        <textarea name="paragraf" id="summernote" class="form-control form-control-sm" cols="30" rows="10"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btnSave" class="btn btn-primary">simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="produkdetail" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div id="detaildata" class="card-body">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="addfoto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-right">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="row mb-5">
                                    <div class="col">
                                        <form id="fileUpload">
                                            <input type="hidden" name="produk_id" class="form-control" multiple />
                                            <div class="mb-3">
                                                <label class="form-label">Upload Foto</label>
                                                <div class="input-group">
                                                    <input type="file" name="file" class="form-control" multiple />
                                                    <button type="submit" class="btn btn-dark" id="upload" type="button">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="row" id="fotoProduk">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>