<aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="../../documentation/jezoar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p><?php echo $_SESSION['user']?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÚ DE NAVEGACIÓN</li>
            <?php 
            
              echo $_SESSION['listPermisos'];

            ?>
            <!-- Equipo de Trabajo -->
            <li>
              <a href="../../view/DevelopersView/Developers.php">
                  <i class="fa fa-laptop"></i>
                  <span>Developers</span>
              </a>
            </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>