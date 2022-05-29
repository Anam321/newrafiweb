<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Gallery</a></li>

                    </ol>
                </div>
                <h4 class="page-title">Gallery</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="javascript:void(0);" onclick="addfoto()" class="btn btn-danger btn-sm mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Foto</a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" onclick="listFoto()" class="btn btn-success btn-sm mb-2 me-1"><i class="mdi mdi-autorenew"></i></button>

                            </div>
                        </div>
                    </div>


                    <div id="datafoto" class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="modal fade" id="modalgallery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form id="form">
                <div class="modal-body">
                    <input type="hidden" name="produk_id" class="form-control form-control-sm">
                    <input type="hidden" id="old_foto" name="old_foto">
                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Nama Foto</label>
                        <input type="text" name="nama_foto" class="form-control form-control-sm">
                    </div>

                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control form-control-sm" id="file" onchange="return fileValidation()" valu accept="image/x-png,image/gif,image/jpeg" multiple />
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div id="imagePreview"></div>
                        </div>
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


<div id="zoomModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div id="zoomin"></div>

        </div>
    </div>
</div>