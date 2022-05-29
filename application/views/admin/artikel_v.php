 <div class="container-fluid">
     <div class="row">
         <div class="col-12">
             <div class="page-title-box">
                 <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                         <li class="breadcrumb-item"><a href="javascript: void(0);">Artikel</a></li>

                     </ol>
                 </div>
                 <h4 class="page-title">Artikel</h4>
             </div>
         </div>
     </div>

     <div class="row mb-2">
         <div class="col-sm-4">
             <a href="javascript: void(0);" onclick="addartikel()" class="btn btn-danger btn-sm btn-rounded mb-3"><i class="mdi mdi-plus"></i> Create Artikel</a>

         </div>
         <div class="col-sm-8">
             <div class="text-sm-end">
                 <div class="btn-group mb-3">
                     <button type="button" class="btn btn-primary btn-sm">All</button>
                 </div>
                 <div class="btn-group mb-3 ms-1">
                     <button type="button" class="btn btn-light btn-sm">Ongoing</button>
                     <button type="button" class="btn btn-light btn-sm">Finished</button>
                 </div>
                 <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
                     <button type="button" class="btn btn-secondary btn-sm"><i class="dripicons-view-apps"></i></button>
                 </div>
                 <div class="btn-group mb-3 d-none d-sm-inline-block">
                     <button type="button" class="btn btn-link text-muted btn-sm"><i class="dripicons-checklist"></i></button>
                 </div>
             </div>
         </div>
     </div>



     <div class="row" id="dataArtikel">

     </div>
 </div>



 <div class="modal fade" id="modalartikel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
             </div>
             <form id="form">
                 <div class="modal-body">
                     <input type="hidden" name="artikel_id" class="form-control form-control-sm">
                     <input type="hidden" id="old_foto" name="old_foto">
                     <div class="mb-3">
                         <label for="example-input-small" class="form-label">Judul Artikel</label>
                         <input type="text" name="judul_artikel" class="form-control form-control-sm">
                     </div>
                     <div class="mb-3">
                         <label for="example-input-small" class="form-label">Penerbit</label>
                         <input type="text" name="penerbit" class="form-control form-control-sm">
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
                         <label for="example-input-small" class="form-label">Artikel</label>
                         <textarea name="konten" id="summernote" class="form-control form-control-sm" cols="30" rows="10" style="height:200px ;"></textarea>
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