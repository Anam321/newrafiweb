 <div class="container-fluid">
     <div class="row">
         <div class="col-12">
             <div class="page-title-box">
                 <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                         <li class="breadcrumb-item"><a href="javascript: void(0);">Artikel</a></li>
                         <li class="breadcrumb-item"><a href="javascript: void(0);">Single Artikel</a></li>

                     </ol>
                 </div>
                 <h4 class="page-title">Artikel</h4>
             </div>
         </div>
     </div>

     <div class="row mb-2">
         <div class="col-sm-4">
             <a href="javascript: void(0);" onclick="kembali()" class="btn btn-danger btn-sm btn-rounded mb-3"><i class="mdi mdi-undo me-2"></i> Kembali</a>
         </div>

     </div>



     <div class="row ">
         <?php foreach ($artikelbyid as $row) : ?>

             <div class="col-md-12 col-xxl-8">
                 <div class="card d-block">
                     <img class="card-img-top" src="<?= base_url() ?>assets/upload/artikel/<?= $row->foto ?>" style="max-height:220px;" alt="project image cap">
                     <div class="card-img-overlay">
                         <div class="badge bg-secondary text-light p-1">
                             <a href="javascript: void(0);" class="btn-sm mb-3 " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-dots-horizontal text-white"></i></a>

                         </div>

                     </div>

                     <div class="card-body position-relative">
                         <h4 class="mt-0">
                             <a href="javascript: void(0);" class="text-title"><?= $row->judul_artikel ?></a>
                         </h4>


                         <p class="mb-3">
                             <span class="pe-2 text-nowrap">
                                 <i class="mdi mdi-format-list-bulleted-type"></i>
                                 <b>3</b> Tasks
                             </span>
                             <span class="text-nowrap">
                                 <i class="mdi mdi-comment-multiple-outline"></i>
                                 <b>104</b> Comments
                             </span>
                         </p>
                         <div class="mb-3" id="tooltip-container4">
                             <?= $row->konten ?>

                         </div>

                     </div>
                 </div>
             </div>
         <?php endforeach ?>
     </div>

 </div>
 </div>