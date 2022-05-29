<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Profil</a></li>

                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div id="profil"></div>
        </div>
    </div>


</div>


<div id="modalupload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form action="" id="formlogo">
                    <input type="hidden" name="profil_id" value="1">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="social-sky" class="form-label">Upload Logo</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="logo" id="file" onchange="return falidatelogo()">
                                    <button type="submit" id="uplogo" class="btn btn-info"><i class="mdi mdi-cloud-upload"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="" id="formcove">
                    <input type="hidden" name="profil_id" value="1">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="social-sky" class="form-label">Upload Cover</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="foto" id="cove" onchange="return falidatecove()">
                                    <button type="submit" id="upcove" class="btn btn-info"><i class="mdi mdi-cloud-upload"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-md">
                        <div id="imagePreview"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <div id="imagePreview2"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form id="formedit">
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal
                        Info</h5>
                    <input type="hidden" name="profil_id" value="1">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Name Perusahaan</label>
                                <input type="text" class="form-control" name="nama" id="firstname" placeholder="Enter  name">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="firstname">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="userbio" class="form-label">Bio</label>
                                <textarea class="form-control" id="summernote" name="deskripsi" rows="4" placeholder="Write something..."></textarea>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="companyname" class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="company_name" id="companyname" placeholder="Enter company name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cwebsite" class="form-label">Website</label>
                                <input type="text" class="form-control" id="cwebsite" name="web_url" placeholder="Enter website url">
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="text-end">
                        <button type="submit" id="simpan" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>
                            Save</button>
                    </div>
                </form>

                <form id="formeditkon">
                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social
                    </h5>
                    <input type="hidden" name="kontak_id" value="1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter email">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="userpassword" class="form-label">No Telpon</label>
                                <input type="number" class="form-control" name="telpon" id="userpassword" placeholder="Enter password">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-fb" class="form-label">Facebook</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                                    <input type="text" class="form-control" name="facebook" id="social-fb" placeholder="Url">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-tw" class="form-label">Whatsapp</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-whatsapp"></i></span>
                                    <input type="text" class="form-control" name="whatsap" id="social-tw" placeholder="Number">
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="social-insta" class="form-label">Instagram</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                                    <input type="text" class="form-control" name="instagram" id="social-insta" placeholder="Url">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="text-end">
                        <button type="submit" id="save" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>
                            Save</button>
                    </div>
                </form>
            </div>
            </form>
        </div>
    </div>
</div>