<?php 

session_start();

$app_item="comanda eletronica";
$app_page_name="novo pedido";

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
        <!-- Page Heading 
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><?php echo ucfirst($app_page_name); ?></h1>
        </div>
      -->


      <!-- Modal Detalhes Pedido -->
      <?php include ($ModalDetalhesPedido); ?> 
      <!-- Alertas -->
      <?php include ($AlertasComandaEletronica); ?>

      <!-- Modal Pedido Existente-->
      <?php include ($ModalPedidoExistente); ?>

      <!-- Modal Mesa Inexistente-->
      <?php include ($ModalMesaInexistente); ?>

      <!-- Modal Pedido em Produção -->
      <?php include ($ModalPedidoEmProducao); ?> 




    </div>



    <div class="container-fluid cardNumeroPedido">
      <div class="row">
        <div class="col-sm-12">
          <div class="card shadow">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Pedido nº <span id="spanPedido"></span> | Mesa: <span id="spanMesa"></h5></div>
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
      },

      columns: [
      { data: "0", render: $.fn.dataTable.render},
      { data: "1", render: $.fn.dataTable.render}, 
      {
        data: "2", render: function(data, type, row) {
          if (type === "display" || type === "filter") {
            return parseFloat(data).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
          }
          if (type === "export") {
            return data;
          }
          return data;
        }
      },  
      null
      ],

      "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
              return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
              i : 0;
            };

            // Total over all pages
            total = api
            .column( 2 )
            .data()
            .reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );

            // Total over this page
            pageTotal = api
            .column( 2, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 2 ).footer() ).html(
              (pageTotal).toLocaleString('pt-BR', {minimumFractionDigits: 2}) +' ('+ ((total).toLocaleString('pt-BR', {minimumFractionDigits: 2}) + " total pedido").toLocaleString('pt-BR', {minimumFractionDigits: 2}) +')'
              );
          }
        });
});

$(document).ready(function() {
  $('#dataTable_mobile').DataTable({
    "dom": '<"top">rt<"bottom"ip><"clear">',
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
    },

    "columnDefs": [
    {
      "targets": [ 1 ],
      "visible": false,
      "searchable": false
    }
    ],
    "footerCallback": function ( row, data, start, end, display ) {
      var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
              return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
              i : 0;
            };

            // Total over all pages
            total = api
            .column( 1 )
            .data()
            .reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );

            // Total over this page
            pageTotal = api
            .column( 1, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 0 ).footer() ).html(
              (pageTotal).toLocaleString('pt-BR', {minimumFractionDigits: 2}) +' ('+ ((total).toLocaleString('pt-BR', {minimumFractionDigits: 2}) + " total pedido").toLocaleString('pt-BR', {minimumFractionDigits: 2}) +')'
              );
          }
        });
});


$(document).ready(function() {
  $('#DataTableResumoMesaDesktop').DataTable({
    "dom": '<"top">rt<"bottom"ip><"clear">',
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
    },
    columns: [
    null,  
    null,    
    {
      data: "total", render: function(data, type, row) {
        if (type === "display" || type === "filter") {
          return parseFloat(data).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        }
        if (type === "export") {
          return data;
        }
        return data;
      }
    },  
    null,
    ],         
    "footerCallback": function ( row, data, start, end, display ) {
      var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
              return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
              i : 0;
            };

            // Total over all pages
            total = api
            .column( 2 )
            .data()
            .reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );

            // Total over this page
            pageTotal = api
            .column( 2, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 2 ).footer() ).html(
              (pageTotal).toLocaleString('pt-BR', {minimumFractionDigits: 2}) +' ('+ ((total).toLocaleString('pt-BR', {minimumFractionDigits: 2}) + " total mesa").toLocaleString('pt-BR', {minimumFractionDigits: 2}) +')'
              );
          }
        });
});

$(document).ready(function() {
  $('#DataTableResumoMesaMobile').DataTable({
    "dom": '<"top">rt<"bottom"ip><"clear">',

    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
    },
    columns: [
    null,    
    null,  
    {
      data: "total", render: function(data, type, row) {
        if (type === "display" || type === "filter") {
          return parseFloat(data).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        }
        if (type === "export") {
          return data;
        }
        return data;
      }
    },  
    null,
    ],

        "footerCallback": function ( row, data, start, end, display ) {
      var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
              return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
              i : 0;
            };

            // Total over all pages
            total = api
            .column( 2 )
            .data()
            .reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );

            // Total over this page
            pageTotal = api
            .column( 2, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 2 ).footer() ).html(
              "R$"+((total).toLocaleString('pt-BR', {minimumFractionDigits: 2})).toLocaleString('pt-BR', {minimumFractionDigits: 2}));
          }

  });
});
</script>






<!-- Controller Cadastrar Produtos-->
<?php include($ControllerCapturaDados ); ?>








