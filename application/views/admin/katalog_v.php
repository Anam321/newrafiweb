<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Katalog</a></li>
                        <li class="breadcrumb-item active">Starter</li>
                    </ol>
                </div>
                <h4 class="page-title">Katalog</h4>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-body shadow-lg p-3 mb-5 bg-body rounded ">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="javascript:void(0);" onclick="addProduk()" class="btn btn-danger btn-sm mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Products</a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" onclick="reload_table('')" class="btn btn-success btn-sm mb-2 me-1"><i class="mdi mdi-autorenew"></i></button>

                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive table-sm  nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>

                                    <th class="all">Product</th>
                                    <th>Category</th>
                                    <th>Added Date</th>
                                    <th>Price (meter)</th>
                                    <th>Utama</th>
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



<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <label for="example-input-small" class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control form-control-sm">
                    </div>
                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Kategori</label>
                        <select name="kategori" class="form-select form-select-sm mb-3">
                            <option selected>Open this select menu</option>
                            <?php foreach ($kategori as $kat) : ?>
                                <option value="<?= $kat->kategori ?>"><?= $kat->kategori ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000.000.000,00" data-reverse="true">
                        <span class="font-13 text-muted">e.g "Your money"</span>
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
                        <label for="example-input-small" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="summernote" class="form-control form-control-sm" cols="30" rows="10"></textarea>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="row mb-5 mt-5">
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