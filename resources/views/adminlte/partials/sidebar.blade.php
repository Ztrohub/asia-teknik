<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('/adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Asia Teknik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/today" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Pekerjaan Hari Ini
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/bayar" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Pekerjaan Belum Dibayar
              </p>
            </a>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Teknisi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="/teknisi/1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Eko</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/teknisi/2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/teknisi/3" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Joko</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>