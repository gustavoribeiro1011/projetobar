<?php 

session_start();


$app_item="configuracoes";
$app_page_name="Configurações";


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

   

        <!-- Content Row -->
        <div class="row">




  

<!-- Content Row -->


  <!-- Area Chart -->
  <div class="col-xl-12 col-lg-6">
    <div class="card shadow mb-12">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Configurações</h6>

      </div>
      <!-- Card Body -->
      <div class="card-body">



<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >

  <div class="form-group">
    <a href="fusoHorario.php"><i class="fas fa-clock"></i> Fuso horário</a> 
  </div>
</form>
      </div>
    </div>
  </div>

  


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include('../../inc/footer.php'); ?>


          <?php if ( !empty ( $_SESSION['msg_sucesso'.$app_token] )  ) { ?>

                <script language="javascript" type="text/javascript">
              function f_mostra_msg_sucesso() {
                
                alertify.success('<font color="white"><?php echo $_SESSION['msg_sucesso'.$app_token]; ?></font>');

              }
              f_mostra_msg_sucesso();
            </script>

          <?php }
          $_SESSION['msg_sucesso'.$app_token] = "";
           ?>


          <?php if ( !empty ( $_SESSION['msg_erro'.$app_token] )  ) { ?>

                <script language="javascript" type="text/javascript">
              function f_mostra_msg_erro() {
                
                alertify.error('<font color="white"><?php echo $_SESSION['msg_erro'.$app_token]; ?></font>');

              }
              f_mostra_msg_erro();
            </script>

          <?php }
          $_SESSION['msg_erro'.$app_token] = "";
           ?>



