<?php 

session_start();

$app_item="comanda eletronica";
$app_page_name="comandas fechadas";


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

        <?php //include('templates/NavBarStatus.php');?>


        <?php include('templates/TemplateMasterComandasFechadas.php');?>

        <?php 

     //echo ">>>>> <br>";


     // echo $_SESSION['periodoExibicao'.$app_token]."<br>";
     // echo $_SESSION['periodoExibicaod1'.$app_token]."<br>";
     // echo $_SESSION['periodoExibicaod2'.$app_token];



        ?>

        <!-- /.container-fluid -->


      </div>
    </div>
    <!-- End of Main Content -->

    <?php include('../../inc/footer.php'); ?>



    <!-- Page level plugins -->
    <script src="<?php echo BASEURL;?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASEURL;?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.js"></script>
    <script type="text/javascript">
    var start = 0;
    var limit = 6;
    var reachedMax = false;

    $(window).scroll(function () {
               // if ($(window).scrollTop() == $(document).height() - $(window).height())
               if ($(window).scrollTop() >= $(document).height() - $(window).height()) 
                getData();
            });

    $(document).ready(function () {
     getData();
   });

    function getData() {
      if (reachedMax)
        return;

      $.ajax({
       url: 'comandas-fechadasData.php',
       method: 'POST',
       dataType: 'text',
       data: {
         getData: 1,
         start: start,
         limit: limit
       },
       success: function(response) {

        if (response == "reachedMax")
          reachedMax = true;
        else {
          start += limit;
          $(".results").append(response);
        }
        jQuery(document).ready(function() {
         $(".timeago").timeago();
       });

        $(".btnAlteraStatusParaConcluido").click(function(){ 

          var instrucao = 'alterar status para concluido';
          var num_pedido    =  $(this).attr('num_pedido');

          $.ajax({
            type: "POST",
            url: '../../models/monitor-pedidos/ModelProcessaInstrucoes.php',
            data: {
              instrucao:instrucao,
              num_pedido:num_pedido 
            },
            success: function(data) {

              if (data == 'sucesso'){

                alertify.success('<font color="white">Status alterado com sucesso</font>');
      location.reload(); // dar um reload na página

    }else if (data == 'falha'){

      alertify.error('<font color="white">Falha ao alterar status</font>');

    } else {

      alertify.error('<font color="white">Erro desconhecido</font>');
    }
  }

});//fim ajax


        });

      }
    });
}
</script>


<!-- Controller Cadastrar Produtos-->
<?php include($ControllerMainMonitorPedidos ); ?>








