 <div class="content-page">
     <div class="content">

         <div id="load"></div>
         <!-- <div class="d-flex justify-content-center">
             <div class="spinner-border" role="status"></div>

             <button class="btn btn-primary" type="button" disabled>
                 <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                 Loading...
             </button>
         </div> -->


         <!-- Topbar Start -->
         <div class="navbar-custom">
             <ul class="list-unstyled topbar-menu float-end mb-0">

                 <li class="dropdown notification-list">
                     <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                         <i class="dripicons-bell noti-icon"></i>
                         <div id="notif"></div>

                     </a>
                     <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                         <!-- item-->
                         <div class="dropdown-item noti-title">
                             <h5 class="m-0">
                                 <span class="float-end">
                                     <a href="javascript: void(0);" class="text-dark">
                                         <small>Clear All</small>
                                     </a>
                                 </span>Notification
                             </h5>
                         </div>

                         <div style="max-height: 230px;" data-simplebar="" id="navlismessage">

                         </div>

                         <a onclick="allmessage()" href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                             View All
                         </a>

                     </div>
                 </li>

                 <li class="notification-list">
                     <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                         <i class="dripicons-gear noti-icon"></i>
                     </a>
                 </li>

                 <li class="dropdown notification-list">
                     <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                         <span class="account-user-avatar">
                             <img src="<?= base_url() ?>assets/upload/poto/<?= $user['foto'] ?>" alt="user-image" class="rounded-circle">
                         </span>
                         <span>
                             <span class="account-user-name"><?= $user['nama'] ?></span>
                             <span class="account-position"><?= $user['username'] ?></span>
                         </span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">

                         <!-- <div class=" dropdown-header noti-title">
                             <h6 class="text-overflow m-0">Welcome !</h6>
                         </div>

                         
                         <a href="javascript:void(0);" class="dropdown-item notify-item">
                             <i class="mdi mdi-account-circle me-1"></i>
                             <span>My Account</span>
                         </a>

                         
                         <a href="javascript:void(0);" class="dropdown-item notify-item">
                             <i class="mdi mdi-account-edit me-1"></i>
                             <span>Settings</span>
                         </a> -->

                         <a href="<?= base_url(); ?>administrasi/auth/logout" class="dropdown-item notify-item">
                             <i class="mdi mdi-logout me-1"></i>
                             <span>Logout</span>
                         </a>
                     </div>
                 </li>

             </ul>
             <button class="button-menu-mobile open-left">
                 <i class="mdi mdi-menu"></i>
             </button>

         </div>
         <!-- end Topbar -->