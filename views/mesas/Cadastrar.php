<?php 

session_start();

$app_item="cadastro";
$app_page_name="mesas";


include ('../../config.php');


include('../../inc/header.php'); 

?>

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

<!-- Controller Cadastrar Mesa-->
<?php include('../../controllers/mesas/ControllerCadastrar.php'); ?>

