 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary elevation-1">
     <!-- Brand Logo -->
     <a href="<?= base_url('admin'); ?>" class="brand-link text-center">
         <span class="brand-text font-weight-bold"></i>KOTARO PETSHOP</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">

         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?= base_url('upload/profile/' . $this->dt_user->image); ?>" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"><?= $this->dt_user->name; ?></a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-header">Menu</li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == '') ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-home"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item <?= ($this->uri->segment(2) == 'kategori' || $this->uri->segment(2) == 'barang') ? 'menu-open' : '' ?>">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-list"></i>
                         <p>
                             Data Master
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url('admin/kategori'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kategori Barang</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('admin/barang'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Daftar Barang</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('admin/paket'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Daftar Paket Grooming</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item <?= ($this->uri->segment(2) == 'user') ? 'menu-open' : '' ?>">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-list"></i>
                         <p>
                             Data User
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url('admin/user'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>User</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-header">Order</li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/pesanan'); ?>" class="nav-link">
                         <i class="nav-icon fas fa-book"></i>
                         <p>
                             Pesanan
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/grooming'); ?>" class="nav-link">
                         <i class="nav-icon fas fa-cat"></i>
                         <p>
                             Grooming
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/pesan'); ?>" class="nav-link">
                         <i class="nav-icon fas fa-message"></i>
                         <p>
                             Pesan Masuk
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">Progress</li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/progress'); ?>" class="nav-link">
                         <i class="nav-icon fas fa-bookmark"></i>
                         <p>
                             Progress Pesanan
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">Laporan</li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/omset'); ?>" class="nav-link">
                         <i class="nav-icon fas fa-money-check-alt"></i>
                         <p>
                             Rekap Omset
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/laporan'); ?>" class="nav-link">
                         <i class="nav-icon fas fa-boxes"></i>
                         <p>
                             Lap. Penjualan Barang
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">Setting</li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/ongkir'); ?>" class="nav-link">
                         <i class="nav-icon fas fa-money-bill"></i>
                         <p>
                             Ongkir
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/profile'); ?>" class="nav-link">
                         <i class="nav-icon fas fa-user"></i>
                         <p>
                             Profile
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>