<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="images/faces-clipart/pic-4.png" alt="Perfil del Usuario">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?=$datnomuser;?></p>
                  <div>
                    <small class="designation text-muted">Usuario: <?=$datuser;?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <!--<button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button>-->
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dasboard.php">
             <strong>
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Principal</span>
              </strong>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="categoria.php">
             <strong>
              <i class="menu-icon mdi mdi-format-list-numbers"></i>
              <span class="menu-title">Crear Categorias</span>
              </strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="editorial.php">
             <strong>
              <i class="menu-icon mdi mdi-home-modern"></i>
              <span class="menu-title">Crear Editoriales</span>
              </strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="banner.php">
             <strong>
              <i class="menu-icon mdi mdi-compare"></i>
              <span class="menu-title">Banner Slider</span>
              </strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mensaje.php">
             <strong>
              <i class="menu-icon mdi mdi-comment-processing"></i>
              <span class="menu-title">Mensaje Pop-up</span>
              </strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="libros.php">
             <strong>
              <i class="menu-icon mdi mdi-book-open-page-variant"></i>
              <span class="menu-title">Libros</span>
              </strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="prestamos.php">
             <strong>
              <i class="menu-icon mdi mdi-book"></i>
              <span class="menu-title">Prestamos</span>
              </strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reservacion.php">
             <strong>
              <i class="menu-icon mdi mdi-book-plus"></i>
              <span class="menu-title">Reservaciones</span>
              </strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="solicitudes.php">
             <strong>
              <i class="menu-icon mdi mdi-book-plus"></i>
              <span class="menu-title">Solicitudes de Prestamos</span>
              </strong>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="user-admin.php">
             <strong>
              <i class="menu-icon mdi mdi-account-key"></i>
              <span class="menu-title">Crear Usuarios</span>
              </strong>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php">
             <strong>
              <i class="menu-icon mdi mdi-login"></i>
              <span class="menu-title">Cerrar Sesion</span>
              </strong>
            </a>
          </li>
        </ul>
      </nav>