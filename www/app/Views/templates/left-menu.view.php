<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/" class="nav-link <?php echo isset($seccion) && $seccion === '/inicio' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inicio
              </p>
            </a>
          </li> 
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel de control
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/proveedores" class="nav-link <?php echo isset($seccion) && $seccion === '/proveedores' ? 'active' : ''; ?>">
                  <i class="fas fa-headset nav-icon"></i>
                  <p>Proveedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/demo-proveedores" class="nav-link <?php echo isset($seccion) && $seccion === '/demo-proveedores' ? 'active' : ''; ?>">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>Demo Proveedores</p>
                </a>
              </li>              
            </ul>
          </li>
            <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Ejercicios
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/proveedores" class="nav-link <?php echo isset($seccion) && $seccion === '/test' ? 'active' : ''; ?>">
                            <i class="fas fa-headset nav-icon"></i>
                            <p>Nombre</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/demo-proveedores" class="nav-link <?php echo isset($seccion) && $seccion === '/anagrama' ? 'active' : ''; ?>">
                            <i class="fas fa-laptop-code nav-icon"></i>
                            <p>Anagrama</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/demo-proveedores" class="nav-link <?php echo isset($seccion) && $seccion === '/mismas-letras' ? 'active' : ''; ?>">
                            <i class="fas fa-laptop-code nav-icon"></i>
                            <p>Mismas letras</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->