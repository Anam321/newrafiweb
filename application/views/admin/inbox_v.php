<div class="container-fluid">

    <!-- start page email-title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                        <li class="breadcrumb-item active">Inbox</li>
                    </ol>
                </div>
                <h4 class="page-title">Inbox</h4>
            </div>
        </div>
    </div>
    <!-- end page email-title -->

    <div class="row">

        <!-- Right Sidebar -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Left sidebar -->
                    <div class="page-aside-left">
                        <div class="d-grid">
                            <a href="javascript:void(0);" onclick="listmessage()" class="btn btn-success btn-sm mb-2"><i class="mdi mdi-autorenew me-2"></i> Reload</a>
                        </div>
                        <div class="email-menu-list mt-3">
                            <a onclick="listmessage()" href="javascript: void(0);" class="text-danger fw-bold"><i class="dripicons-inbox me-2"></i>Inbox<span id="jmlhnotif" class="badge badge-danger-lighten float-end ms-2"></span></a>
                            <a onclick="listtrash()" href="javascript: void(0);"><i class="dripicons-trash me-2"></i>Trash</a>
                        </div>
                    </div>
                    <!-- End Left sidebar -->

                    <div class="page-aside-right">

                        <div class="mt-3">
                            <ul class="email-list" id="listinbox">





                            </ul>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>