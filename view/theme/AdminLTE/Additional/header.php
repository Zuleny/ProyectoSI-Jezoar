<header class="main-header">
      <!-- Logo -->
      <a href="http://localhost/ProyectoSI-Jezoar/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>J</b>ZR</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>J</b>ezoar</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../../documentation/jezoar.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['user']?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../../documentation/jezoar.png" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $_SESSION['user']?>
                    <small>Usuario Jezoar</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-footer">
                  <div class="box-danger">
                    <a href="../../controller/loginController.php?user=<?php echo $_SESSION['user'];?>">
                      <button type="button" class="btn btn-block btn-danger" title="Cerrar Sesion" >
                          Sign Out <i class="fa fa-fw fa-check"></i>
                      </button>
                    </a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>