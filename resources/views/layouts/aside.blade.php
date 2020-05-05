<aside class="main-sidebar elevation-4 sidebar-dark-info">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-info">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-expand" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="home" class="nav-link @yield('active1')">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
          @can('navegar.usuario')
          <li class="nav-item has-treeview @yield('menu-open')">
            <a href="#" class="nav-link @yield('active2') @yield('active3') @yield('active4') @yield('active5')">
              <i class="fas fa-users nav-icon"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('navegar.usuario')
              <li class="nav-item">
                <a href="usuarios" class="nav-link @yield('active2')">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              @endcan
              @can('navegar.rol')
              <li class="nav-item">
                <a href="roles" class="nav-link @yield('active3')">
                  <i class="fas fa-user-tag nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              @endcan
              @can('navegar.tipo.documento')
              <li class="nav-item">
                <a href="tipo_documento" class="nav-link @yield('active5')">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>Tipo documento</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
          @can('navegar.ubicacion')
          <li class="nav-item has-treeview @yield('menu-open1')">
            <a href="#" class="nav-link @yield('active6') @yield('active7') @yield('active8')">
              <i class="fas fa-map-marked-alt nav-icon"></i>
              <p>
                Ubicación
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('navegar.pais')
              <li class="nav-item">
                <a href="pais" class="nav-link @yield('active6')">
                  <i class="fas fa-globe-americas nav-icon"></i>
                  <p>pais</p>
                </a>
              </li>
              @endcan
              @can('navegar.departamento')
              <li class="nav-item">
                <a href="departamentos" class="nav-link @yield('active7')">
                  <i class="fas fa-location-arrow nav-icon"></i>
                  <p>departamento</p>
                </a>
              </li>
              @endcan
              @can('navegar.municipio')
              <li class="nav-item">
                <a href="municipios" class="nav-link @yield('active8')">
                  <i class="fas fa-thumbtack nav-icon"></i>
                  <p>Municipio</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>