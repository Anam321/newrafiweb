<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tender</a></li>

                    </ol>
                </div>
                <h4 class="page-title">Tender</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-body shadow-lg p-3 mb-5 bg-body rounded ">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="javascript:void(0);" onclick="addtender()" class="btn btn-danger btn-sm mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Project</a>
                            <a href="javascript:void(0);" onclick="cleartender()" class="btn btn-info btn-sm mb-2"><i class="mdi mdi-folder-multiple-plus me-2"></i>Tender Finish</a>
                            <a href="javascript:void(0);" onclick="tenderusai()" class="btn btn-info btn-sm mb-2"><i class="mdi mdi-folder-multiple-plus me-2"></i>Data Tender</a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" onclick="reload_table('')" class="btn btn-success mb-2 me-1"><i class="mdi mdi-autorenew"></i></button>

                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0 table-centered w-100 dt-responsive table-sm nowrap" id="datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tender</th>
                                    <th>Jenis</th>
                                    <th>Pembuatan</th>
                                    <th>Volume (meter)</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Harga</th>
                                    <th>Alamat</th>
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



<div class="modal fade" id="modaltender" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form id="form">
                <div class="modal-body">
                    <input type="hidden" name="projek_id" class="form-control form-control-sm">
                    <input type="hidden" id="old_foto" name="old_foto">
                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Nama Tender</label>
                        <input type="text" name="nama_tender" class="form-control form-control-sm">
                    </div>
                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Jenis</label>
                        <select name="jenis" class="form-select form-select-sm mb-3">
                            <option selected>Open this select menu</option>
                            <?php foreach ($kategori as $kat) : ?>
                                <option value="<?= $kat->kategori ?>"><?= $kat->kategori ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Pembuatan</label>
                        <input type="text" name="pembuatan" class="form-control form-control-sm">
                    </div>
                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tgl_mulai" class="form-control form-control-sm">
                    </div>
                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Tanggal Akhir</label>
                        <input type="date" name="tgl_akhir" class="form-control form-control-sm">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Volume ( meter )</label>
                        <input type="text" name="volume" class="form-control" data-toggle="input-mask" data-mask-format="099.099.099.099" data-reverse="true">

                    </div>

                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000.000.000,00" data-reverse="true">
                    </div>

                    <div class="mb-3">
                        <label for="example-input-small" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control form-control-sm" cols="30" rows="10" style="height:80px ;"></textarea>
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