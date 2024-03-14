<div class="br-sideleft overflow-y-auto">
  <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
  <div class="br-sideleft-menu">
    <a href="{{route('home')}}" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Inicio</span>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <a href="#" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
        <span class="menu-item-label">Clientes</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{route('usuarios')}}" class="nav-link">Clientes</a></li>
      
    <li class="nav-item"><a href="{{route('categorias')}}" class="nav-link">Categoria Cliente</a></li>
      <li class="nav-item"><a href="{{route('cursos')}}" class="nav-link">Prestamos</a></li>
  <!--  <li class="nav-item"><a href="{{route('cargaUsuario')}}" class="nav-link">Carga de Clientes</a></li>-->
      <li class="nav-item"><a href="{{Route('cargaCurso')}}" class="nav-link">Cargar Prestamos</a></li>
  <!-- <li class="nav-item"><a href="{{route('cargaCategorias')}}" class="nav-link">Cargar Categorias</a></li>-->

    </ul>
    
    <ul class="br-menu-sub nav flex-column">
    
    </ul>
 
    <a href="#" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
        <span class="menu-item-label">Estados Cuenta</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{route('certificados')}}" class="nav-link">Consulta Estados</a></li>
      <li class="nav-item"><a href="{{route('cargarCertificados')}}" class="nav-link">Cargar Estados</a></li>
    </ul>

    <a href="#" class="br-menu-link">
      <div class="br-menu-item">

        <!-- br-menu-link   
        <i class="menu-item-icon icon ion-ios-file tx-22"></i>
        <span class="menu-item-label">Archivos Modelos</span>--> 
        <i class="fa-regular fa-file-lines"></i>
        <i class="fa fa-file-lines tx-22" ></i>
        <span class="menu-item-label">Archivos Modelos</span>

        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="../modelos/carga-cursos.xlsx" class="nav-link">Carga Empresa</a></li>
      <li class="nav-item"><a href="../modelos/carga-categorias.xlsx" class="nav-link">Carga Categorias</a></li>
      <li class="nav-item"><a href="../modelos/carga-usuarios.xlsx" class="nav-link">Carga Clientes</a></li>
      <li class="nav-item"><a href="../modelos/carga-certificados.xlsx" class="nav-link">Carga Estados</a></li>
    </ul>

  </div><!-- br-sideleft-menu -->



  <br>
</div><!-- br-sideleft -->