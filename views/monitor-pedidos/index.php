<?php 

session_start();

$app_item="monitor";
$app_page_name="monitor de pedidos";
$app_page_status="pedidos em aberto";


include ('../../config.php');


include('../../inc/header.php'); 

?>


<!-- Custom styles for this page -->
<link href="<?php echo BASEURL;?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo BASEURL;?>views/comanda-eletronica/css/stylesheet.css" rel="stylesheet">
<script src="<?php echo BASEURL;?>vendor/jquery-timeago/jquery.timeago.js"></script>
<script src="<?php echo BASEURL;?>vendor/jquery-timeago/locales/jquery.timeago.pt-br.js"></script>

 





<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('../../inc/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       <!-- Topbar -->
       <?php include('../../inc/topbar.php'); ?>


       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><?=ucfirst($app_page_name);?></h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

          <?php include('templates/NavBarStatus.php');?>

        <!-- Content Row -->
        <div class="row">

          <?php include('templates/TemplateMaster.php');?>

        </div>
        <!-- /.container-fluid -->


      </div>
       </div>
      <!-- End of Main Content -->

      <?php include('../../inc/footer.php'); ?>



      <!-- Page level plugins -->
      <script src="<?php echo BASEURL;?>vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo BASEURL;?>vendor/datatables/dataTables.bootstrap4.min.js"></script>


      <!-- Controller Cadastrar Produtos-->
      <?php include($ControllerMainMonitorPedidos ); ?>

<script type="text/javascript">
   jQuery(document).ready(function() {
 $(".timeago").timeago();
   });
</script>
 






