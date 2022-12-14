<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="profile-image">
            <img src="images/faces/face5.jpg" alt="image"/>
          </div>
          <div class="profile-name">
            <p class="name">
              Welcome Jane
            </p>
            <p class="designation">
              Super Admin
            </p>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route("dashboard")}}">
          <i class="fa fa-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/widgets.html">
          <i class="fa fa-puzzle-piece menu-icon"></i>
          <span class="menu-title">Widgets</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
          <i class="fab fa-trello menu-icon"></i>
          <span class="menu-title">Page Layouts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page-layouts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route("categories.index")}}">Categorias</a></li>
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route("clients.index")}}">Clientes</a></li>
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route("products.index")}}">Productos</a></li>
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route("providers.index")}}">Proveedores</a></li>
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route("purchases.index")}}">Compras</a></li>
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route("sales.index")}}">Ventas</a></li>
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route("bussinesses.index")}}">Empresas</a></li>
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route("printers.index")}}">Impresoras</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/documentation.html">
          <i class="far fa-file-alt menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>
