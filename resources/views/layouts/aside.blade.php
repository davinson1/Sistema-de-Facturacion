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
        <li class="nav-item">
          <a href="home" class="nav-link @yield('active1')">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Inicio
            </p>
          </a>
        </li>
        @can('navegar.modulo.usuarios')
          <li class="nav-item has-treeview @yield('menu-open-usuario')">
            <a href="#" class="nav-link @yield('active-usuario') @yield('active-roles') @yield('active-empresa') @yield('active-tipo-documento')">
              <i class="fas fa-users nav-icon"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('navegar.usuario')
              <li class="nav-item">
                <a href="usuarios" class="nav-link @yield('active-usuario')">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              @endcan
              @can('navegar.rol')
              <li class="nav-item">
                <a href="roles" class="nav-link @yield('active-roles')">
                  <i class="fas fa-user-tag nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              @endcan
              @can('navegar.tipo.documento')
              <li class="nav-item">
                <a href="tipo_documento" class="nav-link @yield('active-tipo-documento')">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>Tipo documento</p>
                </a>
              </li>
              @endcan
              @can('navegar.empresa')
              <li class="nav-item">
                <a href="empresa" class="nav-link @yield('active-empresa')">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Empresa</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
        @endcan
        @can('navegar.modulo.ubicacion')
          <li class="nav-item has-treeview @yield('menu-open-ubicacion')">
            <a href="#" class="nav-link @yield('active-pais') @yield('active-departamento') @yield('active-municipio')">
              <i class="fas fa-map-marked-alt nav-icon"></i>
              <p>
                Ubicación
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('navegar.pais')
              <li class="nav-item">
                <a href="pais" class="nav-link @yield('active-pais')">
                  <i class="fas fa-globe-americas nav-icon"></i>
                  <p>País</p>
                </a>
              </li>
              @endcan
              @can('navegar.departamento')
              <li class="nav-item">
                <a href="departamentos" class="nav-link @yield('active-departamento')">
                  <i class="fas fa-location-arrow nav-icon"></i>
                  <p>Departamento</p>
                </a>
              </li>
              @endcan
              @can('navegar.municipio')
              <li class="nav-item">
                <a href="municipios" class="nav-link @yield('active-municipio')">
                  <i class="fas fa-thumbtack nav-icon"></i>
                  <p>Municipio</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
        @endcan

        @can('navegar.modulo.productos')
          <li class="nav-item has-treeview @yield('menu-open-producto')">
            <a href="#" class="nav-link @yield('active-proveedor') @yield('active-articulo') @yield('active-forma-pago') @yield('active-iva') @yield('active-porcentaje') @yield('active-tipo-factura') @yield('active-tipo-tributario')">
              <i class="fas fa-shopping-cart nav-icon"></i>
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('navegar.proveedores')
              <li class="nav-item">
                <a href="proveedores" class="nav-link @yield('active-proveedor')">
                  <i class="fas fa-truck nav-icon"></i>
                  <p>Proveedores</p>
                </a>
              </li>
              @endcan
              @can('navegar.productos')
              <li class="nav-item">
                <a href="productos" class="nav-link @yield('active-articulo')">
                  <i class="fas fa-shopping-basket nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              @endcan
              @can('navegar.tipos.articulos')
              <li class="nav-item">
                <a href="tipo_articulo" class="nav-link @yield('active-tipo-articulo')">
                  <i class="fas fa-shopping-basket nav-icon"></i>
                  <p>Tipos de articulos</p>
                </a>
              </li>
              @endcan
              @can('navegar.formas.pagos')
              <li class="nav-item">
                <a href="formas_pago" class="nav-link @yield('active-forma-pago')">
                  <i class="fas fa-cash-register nav-icon"></i>
                  <p>Formas de pago</p>
                </a>
              </li>
              @endcan
               @can('navegar.iva')
              <li class="nav-item">
                <a href="iva" class="nav-link @yield('active-iva')">
                  <i class="fas fa-file-invoice-dollar nav-icon"></i>
                  <p>Iva</p>
                </a>
              </li>
              @endcan
              @can('navegar.porcentaje')
              <li class="nav-item">
                <a href="porcentaje" class="nav-link @yield('active-porcentaje')">
                  <i class="fas fa-percentage nav-icon"></i>
                  <p>Porcentaje</p>
                </a>
              </li>
              @endcan            
              @can('navegar.tipos.facturas')
              <li class="nav-item">
                <a href="tipo_factura" class="nav-link @yield('active-tipo-factura')">
                  <i class="fas fa-receipt nav-icon"></i>
                  <p>Tipos de facturas</p>
                </a>
              </li>
              @endcan
              @can('navegar.tipos.tributario')
              <li class="nav-item">
                <a href="tipo_tributario" class="nav-link @yield('active-tipo-tributario')">
                  <i class="fas fa-gavel nav-icon"></i>
                  <p>Tipos tributarios</p>
                </a>
              </li>
              @endcan

            </ul>
          </li>
        @endcan

        @can('navegar.modulo.configuracion')
          <li class="nav-item has-treeview @yield('menu-open-configuracion')">
            <a href="#" class="nav-link @yield('active-datosempresa')">
              <i class="fas fa-cogs nav-icon"></i>
              <p>
                Configuración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('navegar.configuracion')
              <li class="nav-item">
                <a href="datos_empresa" class="nav-link @yield('active-datosempresa')">
                  <i class="fas fa-cog nav-icon"></i>
                  <p>Datos Empresa</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
        @endcan

        @can('navegar.modulo.compras')
          <li class="nav-item has-treeview @yield('menu-open-compras')">
            <a href="#" class="nav-link @yield('active-compra') @yield('active-tipo-compra') @yield('active-articulo-compra') @yield('active-abono-compra')">
              <i class="fas fa-money-check-alt nav-icon"></i>              
              <p>
                Compras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('navegar.compra')
              <li class="nav-item">
                <a href="compra" class="nav-link @yield('active-compra')">
                  <i class="fas fa-store nav-icon"></i>
                  <p>Compra</p>
                </a>
              </li>
              @endcan
              @can('navegar.tipo.compra')
              <li class="nav-item">
                <a href="tipo_compra" class="nav-link @yield('active-tipo-compra')">
                  <i class="fas fa-store-alt nav-icon"></i>
                  <p>Tipo compra</p>
                </a>
              </li>
              @endcan
              @can('navegar.articulo.compra')
              <li class="nav-item">
                <a href="articulo_compra" class="nav-link @yield('active-articulo-compra')">
                  <i class="fas fa-shopping-bag nav-icon"></i>
                  <p>Artículo compra</p>
                </a>
              </li>
              @endcan
              @can('navegar.abono.compra')
              <li class="nav-item">
                <a href="abono_compra" class="nav-link @yield('active-abono-compra')">
                  <i class="fas fa-file-invoice-dollar nav-icon"></i>
                  <p>Abono compra</p>
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