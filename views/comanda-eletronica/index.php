<?php 

session_start();

//$app_item="controle";
$app_page_name="comanda eletronica";


include ('../../config.php');


include('../../inc/header.php'); 

?>


<!-- Custom styles for this page -->
<link href="<?php echo BASEURL;?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo BASEURL;?>views/comanda-eletronica/css/stylesheet.css" rel="stylesheet">



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


       
       <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><?php echo ucfirst($app_page_name); ?></h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Alertas Categoria-->
        <?php include ($AlertasComandaEletronica); ?>
        
      </div>



      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card shadow">
              <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Pedido nº <span id="spanPedido"></span></h4></div>
              </div>
            </div>
          </div>
        </div>


        <p>




          <?php include ('templates/TemplateMaster.php'); ?>




        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php include('../../inc/footer.php'); ?>



    <!-- Page level plugins -->
    <script src="<?php echo BASEURL;?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASEURL;?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    
    <script id="scriptDataTable">
  // Call the dataTables jQuery plugin
  $(document).ready(function() {
    $('#dataTable').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
      }
    });
  });

   $(document).ready(function() {
    $('#dataTable_mobile').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
      }
    });
  });

  </script>





  <!-- Controller Cadastrar Produtos-->
  <?php include($ControllerCapturaDados ); ?>








