

<div class="row" >
  <?php

  session_start();

  if(!@include_once('../../config.php')) {
  // do something
  }
  ?>



  <?php
  if (isset($_POST['getData'])) {

include('../../models/monitor-pedidos/ModelPeriodoExibicao.php');


$start = $conecta->real_escape_string($_POST['start']);
$limit = $conecta->real_escape_string($_POST['limit']);

$sql = $conecta->query("
  SELECT * FROM pedidos a

LEFT JOIN usuarios b  on (a.id_usuario=b.id)

 WHERE a.status = 'em produção' 
  $periodoExibicao ORDER BY a.num_pedido ASC LIMIT $start, $limit");
if ($sql->num_rows > 0) {
  $response = "";

  while($data = $sql->fetch_array()) {
    $response .=' 

    <div class="col-xl-4 col-md-6 col-sm-12" style="margin-bottom: 20px;">
    <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-header">


    <div class="h6 mb-0 font-weight-bold text-gray-800">      
    Pedido Nº '.$data['num_pedido'].' - Mesa '.$data['mesa'].'
    </div><br>
    <button class="btn btn-light btnAlteraStatusParaConcluido" num_pedido="'.$data['num_pedido'].'"><i class="far fa-thumbs-up"></i> Marcar como concluído</button>
    </div>
    <div class="card-body">

    ';

    $sql2 = "SELECT * FROM pedidos WHERE num_pedido = ".$data['num_pedido']." and status = 'item cadastrado'";

    $result2=mysqli_query($conecta,$sql2);

    while ($row2=mysqli_fetch_assoc($result2)) { 

      $response .='<div class="h7 mb-0 font-weight-bold text-gray-800">- '.$row2['produto'].'</div>';

    }


    $response .='

    <div class="row no-gutters align-items-center">
    <div class="col mr-2">


    </div>  
    </div>
    </div>';




    $response .='
    <div class="card-footer text-muted">

    <i class="fas fa-clipboard-list"></i> Origem: '.$data['origem'].'<br>
    <i class="fas fa-user"></i> Garçom: '. ucfirst(strtolower($data['nome'])) . " " . ucfirst(strtolower($data['sobrenome'])). '<br>
    <i class="fas fa-flag"></i> Emissão do pedido: <time class="timeago" datetime="'.$data['cadastro'].'"></time> atrás              
    ('.date("d/m/Y", strtotime($data['cadastro'])). " às ".date("H:i:s", strtotime($data['cadastro'])).')   
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

