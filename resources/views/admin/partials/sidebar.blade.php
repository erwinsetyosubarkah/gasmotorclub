 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('/') }}vendor/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/') }}vendor/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">HOME</li>
          <li class="nav-item">
            <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>  
          <li class="nav-header">PENGATURAN</li>
          <li class="nav-item">
            <a href="/admin-profile" class="nav-link {{ Request::is('admin-profile') ? 'active' : '' }}">
              <i class="nav-icon far fa-user-circle"></i>
              <p>
                Profile
              </p>
            </a>
          </li>          
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-eye"></i>
              <p>
                Visi dan Misi
              </p>
            </a>
          </li>          
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Produk Kami
              </p>
            </a>
          </li>          
          <li class="nav-item">
            <a href="/admin-category" class="nav-link {{ Request::is('admin-category','admin-category-edit/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>          

          <li class="nav-header">KONTEN WEBSITE</li>
          <li class="nav-item">
            <a href="iframe.html" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Artikel</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Event</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>Galery Foto</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>Klien Kami</p>
            </a>
          </li>

          <li class="nav-header">MANAGEMEN USER</li>
          <li class="nav-item">
            <a href="iframe.html" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>