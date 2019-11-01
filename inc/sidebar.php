    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion  <?php echo $CosultaToggle['status']; ?>" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo BASEURL.'index.php'; ?>">
        <img src="<?php echo BASEURL;?>img/logo_azul_small.png" width="50%">
        <!--<div class="sidebar-brand-icon rotate-n-15">
          Projeto Bar
        </div>
      -->
      <div class="sidebar-brand-text mx-3"><?php echo $app_name; ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo BASEURL.'index.php'; ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
       <!-- <div class="sidebar-heading">
          INICIO
        </div>-->

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php  if( $app_item == 'mesa' ) { echo "active"; } else { echo""; } ?>">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-th-list"></i>
            <span>Mesas</span>
          </a>
          <div id="collapseTwo" class="collapse 
          <?php  

          if( $app_item == 'mesa' ) {
            if($CosultaToggle['status'] == 'toggled'){
              echo "";
            }else{
             echo "show"; 
           }
         } else {
          echo"";
        }

        ?>
        " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Gerenciamento de mesas:</h6>
          <a class="collapse-item  <?php  if( $app_page_name == 'cadastrar mesa' ) { echo "active"; } else { echo""; } ?>" 
            href="<?php echo BASEURL . "views/mesas/Cadastrar.php";?>">Cadastrar</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
    <!--  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>-->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!--<div class="sidebar-heading">
        Gerenciamento
      </div>-->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-th-list"></i>
          <span>BAR</span>
        </a>
        <div id="collapsePages" class="collapse

        <?php  

        if( $app_item == 'controle' ) {
          if($CosultaToggle['status'] == 'toggled'){
            echo "";
          }else{
           echo "show"; 
         }
       } else {
        echo"";
      }

      ?>
      " aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Controle:</h6>

        <a class="collapse-item
        <?php  if( $app_page_name == 'produto' ) { echo "active"; } else { echo""; } ?>
        " href="<?php echo BASEURL . "views/produtos/Cadastrar.php";?>">Produtos</a>

        <a class="collapse-item
        <?php  if( $app_page_name == 'categoria' ) { echo "active"; } else { echo""; } ?>
        " href="<?php echo BASEURL . "views/categorias/Cadastrar.php";?>">Categorias</a>
        <a class="collapse-item" href="#">..</a>

        <div class="collapse-divider"></div>
        <!--
        <h6 class="collapse-header">Other Pages:</h6>
        <a class="collapse-item" href="#">..</a>
        <a class="collapse-item" href="#">..</a>
      -->
    </div>
  </div>
</li>

<!-- Nav Item - Charts -->
<!--<li class="nav-item">
  <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Charts</span></a>
  </li>
-->

<!-- Nav Item - Tables -->
  <!--<li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
    </li>
  -->
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle" name="sidebarToggle"></button>
  </div>

</ul>


