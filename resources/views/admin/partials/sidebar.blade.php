 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="{{ asset('storage/'. $site_profile->club_logo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" height="160" width="160">
      <span class="brand-text font-weight-light">{{ $site_profile->club_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (auth()->user()->photo == '')
            <img src="{{ asset('/') }}vendor/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              
          @else
            <img src="{{ asset('storage/'. auth()->user()->photo) }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
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
          @can('admin')
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
            <a href="/admin-visidanmisi" class="nav-link  {{ Request::is('admin-visidanmisi') ? 'active' : '' }}">
              <i class="nav-icon far fa-eye"></i>
              <p>
                Visi dan Misi
              </p>
            </a>
          </li>          
          <li class="nav-item">
            <a href="/admin-myproduct" class="nav-link {{ Request::is('admin-myproduct','admin-myproduct-edit/*') ? 'active' : '' }}">
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
          @endcan


          <li class="nav-header">KONTEN WEBSITE</li>          
          <li class="nav-item">
            <a href="/admin-post" class="nav-link {{ Request::is('admin-post','admin-post-edit/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Artikel</p>
            </a>
          </li>

          @can('admin')
          <li class="nav-item">
            <a href="/admin-event" class="nav-link {{ Request::is('admin-event','admin-event-edit/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Event</p>
            </a>
          </li>
          @endcan

          <li class="nav-item">
            <a href="/admin-galery" class="nav-link {{ Request::is('admin-galery','admin-galery-edit/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-images"></i>
              <p>Galery Foto</p>
            </a>
          </li>

          @can('admin')
          <li class="nav-item">
            <a href="/admin-myclient" class="nav-link {{ Request::is('admin-myclient','admin-myclient-edit/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>Klien Kami</p>
            </a>
          </li>

          <li class="nav-header">MANAGEMEN USER</li>
          <li class="nav-item">
            <a href="/admin-user" class="nav-link {{ Request::is('admin-user','admin-user-edit/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          @endcan

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>