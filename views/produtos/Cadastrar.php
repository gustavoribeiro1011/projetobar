<?php 

session_start();

$app_item="controle";
$app_page_name="produto";


include ('../../config.php');


include('../../inc/header.php'); 

?>


<!-- Custom styles for this page -->
<link href="<?php echo BASEURL;?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


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
          <h1 class="h3 mb-0 text-gray-800"><?php echo ucfirst($app_page_name); ?></h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

         <!-- Alerta Cadastrar Mesa-->
        <?php include ($AlertasProduto); ?>

        <div id="contentTemplateMaster">
         <?php include ('templates/TemplateMaster.php'); ?>
       </div>

     </div>

   </div>

 </div>
 <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include('../../inc/footer.php'); ?>



<!-- Page level plugins -->
<script src="<?php echo BASEURL;?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo BASEURL;?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo BASEURL;?>vendor/maskmoney/dist/jquery.maskMoney.js" id="scriptMaskMoney"></script>


<!-- Controller Cadastrar Produtos-->
<?php include($ControllerCadastrarProduto); ?>

<!-- Controller Editar Produtos-->
<?php include($ControllerEditarProduto); ?>

<!-- Controller Cadastrar Produtos-->
<?php include($ControllerExcluirProduto); ?>

<script id="scriptDataTable">
  // Call the dataTables jQuery plugin
  $(document).ready(function() {
    $('#dataTable').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
      }
    });
  });
</script>





