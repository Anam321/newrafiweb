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
        <div class="col-lg-8">
            <div class="card ">
                <div class="card-body shadow-lg p-3 mb-5 bg-body rounded ">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="javascript:void(0);" onclick="addProduk()" class="btn btn-danger btn-sm mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Products</a>
                            <button type="button" onclick="reload_table('')" class="btn btn-success btn-sm mb-2 me-1"><i class="mdi mdi-autorenew"></i></button>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-sm btn-primary" onclick="newTesti()">
                                    Testimoni Baru <span id="jumlah" class="badge bg-light text-dark"></span>
                                </button>


                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive table-sm  nowrap" id="testimoni">
                            <thead class="table-light">
                                <tr>

                                    <th class="all">Nama</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Status</th>
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

        <div class="col-lg-4">
            <div class="card text-center" id="datatesti">

            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modaltesti" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="m-0">
                    <span class="float-end">

                    </span>Notification
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                <div class="card">

                    <div class="card-body">
                        <table class="table table-centered w-100 dt-responsive table-sm  nowrap">

                            <tbody id="listnotif">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>