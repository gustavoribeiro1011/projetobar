

<div class="row" >
  <?php

  session_start();

  if(!@include_once('../../config.php')) {
  // do something
  }
  ?>



  <?php
  if (isset($_POST['getData'])) {


    $start = $conecta->real_escape_string($_POST['start']);
    $limit = $conecta->real_escape_string($_POST['limit']);




    $sql = $conecta->query("SELECT * FROM comanda_eletronica a
      left join usuarios b on a.usuario=b.id
      WHERE a.data_hora_fechado >1 ORDER BY 1 desc LIMIT $start, $limit");
    if ($sql->num_rows > 0) {
      $response = "";

      while($data = $sql->fetch_array()) {
        $response .=' 

        <div class="col-xl-4 col-md-6 col-sm-12" style="margin-bottom: 20px;">
        <div class="card border-left-success shadow h-100 py-2">
        <div class="card-header">


        <div class="h6 mb-0 font-weight-bold text-gray-800">      
        Comanda Nº '.$data['num_comanda'].' - Mesa '.$data['mesa'].'
        </div><br>
        </div>
        <div class="card-body">

        ';


        $sql2 = "SELECT distinct num_pedido FROM pedidos WHERE 
        mesa = ".$data['mesa']." 
        and cadastro between '".$data['data_hora_aberto']."' and  '".$data['data_hora_fechado']."'
        and status = 'item cadastrado'";

        $sql3 = "SELECT num_pedido,sum(preco) val_total_consumido FROM pedidos WHERE 
        mesa = ".$data['mesa']." 
        and cadastro between '".$data['data_hora_aberto']."' and  '".$data['data_hora_fechado']."'
        and status = 'item cadastrado'";
        $result3=mysqli_query($conecta,$sql3);
        $row3=mysqli_fetch_assoc($result3);

        $result2=mysqli_query($conecta,$sql2);

        while ($row2=mysqli_fetch_assoc($result2)) { 

         $response .='<div class="h7 mb-0 font-weight-bold text-gray-800">'.
         '<h4><span class="badge badge-pill badge-primary">Pedido nº '.$row2['num_pedido'].'</span></h4>';  

         $sqlListaPedidos = "SELECT * FROM pedidos WHERE 

         mesa = ".$data['mesa']." 
         and cadastro between '".$data['data_hora_aberto']."' and  '".$data['data_hora_fechado']."'
         and status = 'item cadastrado'
         and num_pedido=".$row2['num_pedido'];

         $resultListaPedido=mysqli_query($conecta,$sqlListaPedidos);


         while ($listaPedido=mysqli_fetch_assoc($resultListaPedido)) { 

         $val_total_consumido = $row3['val_total_consumido'];

          $response .= $listaPedido['produto'] . " - R$ " .number_format($listaPedido['preco'], 2, ',', '.');
          $response .="<br>";
        }

        $response .="</div>";

      }


      $response .='

      <div class="row no-gutters align-items-center">
      <div class="col mr-2">
-------------------------------------<br>
<h2>Total: R$ '. number_format($val_total_consumido, 2, ',', '.').'</h2>

      </div>  
      </div>
      </div>';




      $response .='
      <div class="card-footer text-muted">
      <i class="fas fa-flag"></i> Data/hora aberto: '.date("d/m/Y H:i:s", strtotime($data['data_hora_aberto'])).'<br>
      <i class="fas fa-flag"></i> Data/hora fechado: '. date("d/m/Y H:i:s", strtotime($data['data_hora_fechado'])).'<br> 
      <i class="fas fa-flag"></i> Garçom: '.ucfirst(strtolower($data['nome'])) . " " . ucfirst(strtolower($data['sobrenome'])). '<br>  
      </div>
      </div>

      </div>';


    }

    exit($response);
  } else
  {



  }

}
?>
</div>

