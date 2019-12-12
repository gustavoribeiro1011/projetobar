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
    <li class="nav-item <?php if($app_item=='dashboard'){echo 'active';} else {'';} ?>">
      <a class="nav-link" href="<?php echo BASEURL.'index.php'; ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
      </li>


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if($app_item=='comanda eletronica'){echo 'active';} else {'';} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage1" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-clipboard"></i>
          <span>Comanda Eletrônica</span>
        </a>
        <div id="collapsePage1" class="collapse
         <?php if($app_item=='comanda eletronica'){if($CosultaToggle['status']=='toggled'){echo"";}else{echo"";}}else{echo"";}?>
         " aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <a class="collapse-item  <?php //if($app_page_name=='novo pedido'){echo "active";}else{echo"";} ?>" href="<?php echo BASEURL; ?>views/comanda-eletronica/index.php">Novo pedido</a>
         
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if($app_item=='monitor'){echo 'active';} else {'';} ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage2" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-desktop"></i>
        <span>Monitor</span>
      </a>
      <div id="collapsePage2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <!-- Menu: Mesas -->
        <a class="collapse-item <?php if($app_page_name=='monitor de pedidos'){echo "active";}else{echo"";} ?>" href="<?php echo BASEURL."views/monitor-pedidos/index.php";?>">Pedido</a>  
          <a class="collapse-item" href="#">Estoque</a>           
        <div class="collapse-divider"></div>
      </div>
    </div>
  </li>



  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item <?php if($app_item=='cadastro'){echo 'active';} else {'';} ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-plus"></i>
      <span>Cadastro</span>
    </a>
    <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <!-- Menu: Mesas -->
      <a class="collapse-item  <?php if($app_page_name=='mesas'){echo "active";}else{echo"";} ?>" 
        href="<?php echo BASEURL."views/mesas/Cadastrar.php";?>">Mesas</a>
        <!-- Menu: Produtos -->
        <a class="collapse-item
        <?php  if( $app_page_name=='produtos' ) { echo "active"; } else {echo""; } ?>
        " href="<?php echo BASEURL."views/produtos/Cadastrar.php";?>">Produtos</a>
        <!-- Menu: Categorias -->
        <a class="collapse-item
        <?php  if( $app_page_name=='categorias' ){echo "active"; }else{echo""; } ?>
        " href="<?php echo BASEURL."views/categorias/Cadastrar.php";?>">Categorias</a>
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
    <button class="rounded-circle border-0 sidebarToggle" id="sidebarToggle" name="sidebarToggle"></button>
  </div>

</ul>


