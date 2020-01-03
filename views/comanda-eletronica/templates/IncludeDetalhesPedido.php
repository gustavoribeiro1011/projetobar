    <?php

    $num_pedido= $_POST['num_pedido'];

    if(!@include_once('../../../config.php')) {

    }

    ?>


    

          <!-- Datatable para versão desktop e tablet-->
          <?php
          $sql="
          select * from pedidos where num_pedido=".$num_pedido." and id_produto>0 order by cadastro asc";
          if ($result=mysqli_query($conecta,$sql))
            {?>
          <!-- versão desktop/tablet -->
          <div class="table-responsive" id="table-responsive">
            <br>          
            <table class="table cell-border table-hover" id="ModalDetalhesPedido_Desktop" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Item</th> 
                  <th>Categoria</th>  
                  <th>Preço</th>
                                           
                </tr>
              </thead>
              <tbody>  
                <?php while ($row=mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td ><?=strtoupper($row['produto']);?> - <?=$row['medida'];?> <?=strtoupper($row['unidade_medida']);?></td>
                  <td><?=$row['categoria'];?></td>
                  <td><?=number_format((float)$row['preco'],2,".","");?></td> 
                </tr>             
                <?php }//while?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="2" style="text-align:right">Total:</th>
                  <th colspan="1"></th>
                </tr>
              </tfoot>
            </table>
          </div>
      

      
        <?php }?>



        <!-- Datatable para versão mobile-->
        <?php

        if ($result=mysqli_query($conecta,$sql))
          {?>
        <!-- versão desktop/tablet -->
        <div class="table-responsive" id="table-responsive-mobile">
          <table class="table cell-border table-hover" id="ModalDetalhesPedido_Mobile" width="100%" cellspacing="0">
            <thead style="display:none;">
              <tr>
                <th>Item</th> 
                <th>Preco</th>
              </tr>
            </thead>
            <tbody>  
              <?php while ($row=mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td>                         

                  <div class="card border-left-primary shadow h-100 py-0">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div style="font-size:4vw;" class="h7 mb-0 font-weight-bold text-gray-800"><?=strtoupper($row['produto']);?> - <?=$row['medida'];?> <?=strtoupper($row['unidade_medida']);?></div>
                          <div style="font-size:3vw;" class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$row['categoria'];?> - R$<?= number_format($row['preco'], 2, ',', '.');?></div>
                        </div>          
                      </div>
                    </div>
                  </div>

                </td>

                <td><?=number_format((float)$row['preco'],2,".","");?></td> 
              </tr>       
              <?php }//while?>
            </tbody>
            <tfoot>
              <tr>
                <th></th>             
              </tr>
            </tfoot>
          </table>
     

          <?php }?>


<script id="scriptModalDetalhesPedido">
/**
 * Datatable para tela: "ModalDetalhesPedido.php"
 */
 $(document).ready(function() {
    $('#ModalDetalhesPedido_Desktop').DataTable({
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
              (pageTotal).toLocaleString('pt-BR', {minimumFractionDigits: 2}) +' ('+ ((total).toLocaleString('pt-BR', {minimumFractionDigits: 2}) + " total comanda").toLocaleString('pt-BR', {minimumFractionDigits: 2}) +')'
              );
          }
        });
});


$(document).ready(function() {
  $('#ModalDetalhesPedido_Mobile').DataTable({
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
             "Total: R$"+((total).toLocaleString('pt-BR', {minimumFractionDigits: 2})).toLocaleString('pt-BR', {minimumFractionDigits: 2}) 
              );
          }
        });
});


</script>







   