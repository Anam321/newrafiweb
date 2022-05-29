<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Map</a></li>
                        <li class="breadcrumb-item active">Starter</li>
                    </ol>
                </div>
                <h4 class="page-title">Map</h4>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form id="form" action="">
                                <input type="hidden" name="id">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Masukan Kode Map</label>
                                    <div class="col-9">
                                        <textarea name="codemap" id="summernote" class="form-control form-control-sm" height="100"></textarea>
                                    </div>
                                </div>

                                <div class="justify-content-end row">
                                    <div class="col-9">
                                        <button type="submit" class="btn btn-info">simpan</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-8">
                            <div id="datamap"></div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>