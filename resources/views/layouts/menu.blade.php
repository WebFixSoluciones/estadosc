<div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
      <div class="br-sideleft-menu">
        <a href="index.html" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Inicio</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
            <span class="menu-item-label">Usuarios</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('usuarios')}}" class="nav-link">Usuarios</a></li>
          <li class="nav-item"><a href="{{route('cargaUsuario')}}" class="nav-link">Carga de Usuarios</a></li>
        </ul>
        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
            <span class="menu-item-label">Cursos</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('categorias')}}" class="nav-link">Categorias</a></li>
          <li class="nav-item"><a href="{{route('cursos')}}" class="nav-link">Cursos</a></li>
          <li class="nav-item"><a href="{{Route('cargaCurso')}}" class="nav-link">Cargar Cursos</a></li>
          <li class="nav-item"><a href="{{route('cargaCategorias')}}" class="nav-link">Cargar Categorias</a></li>
        </ul>

        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
            <span class="menu-item-label">Certifricados</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('certificados')}}" class="nav-link">Certificados</a></li>
          <li class="nav-item"><a href="{{route('cargarCertificados')}}" class="nav-link">Cargar Certificados</a></li>
        </ul>

      </div><!-- br-sideleft-menu -->



      <br>
    </div><!-- br-sideleft -->
