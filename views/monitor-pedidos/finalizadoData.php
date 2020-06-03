
<div class="row" >
  <?php

session_start();

  if(!@include_once('../../config.php')) {
  // do something
  }


  if (isset($_POST['getData'])) {

    include('../../models/monitor-pedidos/ModelPeriodoExibicao.php');

    $start = $conecta->real_escape_string($_POST['start']);
    $limit = $conecta->real_escape_string($_POST['limit']);

    $sql = $conecta->query("
      SELECT * FROM pedidos a
      LEFT JOIN usuarios b  on (a.id_usuario=b.id)
      WHERE a.status = 'concluido' $periodoExibicao 
      ORDER BY a.finalizadoem DESC LIMIT $start, $limit");
    if ($sql->num_rows > 0) {
      $response = "";

      while($data = $sql->fetch_array()) {
        $response .=' 

        <div class="col-xl-4 col-md-6 col-sm-12" style="margin-bottom: 20px;">
        <div class="card border-left-success shadow h-100 py-2">
        <div class="card-header">

        
        <div class="h6 mb-0 font-weight-bold text-gray-800">      
        Pedido Nº '.$data['num_pedido'].' - Mesa '.$data['mesa'].'
        </div>

        

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

        if ( date("d", strtotime($data['cadastro'])) == date("d", strtotime($data['finalizadoem'])) ){
          $entrada = date("H:i:s", strtotime($data['cadastro']));
          $saida = date("H:i:s", strtotime($data['finalizadoem']));
          $hora1 = explode(":",$entrada);
          $hora2 = explode(":",$saida);
          $acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
          $acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
          $resultado = $acumulador2 - $acumulador1;
          $hora_ponto = floor($resultado / 3600)."h";

          $resultado = $resultado - ($hora_ponto * 3600);

          $min_ponto = floor($resultado / 60)."m";
          $resultado = $resultado - ($min_ponto * 60)."s";
          $secs_ponto = $resultado;


        $tempo = $hora_ponto.$min_ponto.$secs_ponto;
    
    } else {
      $tempo = "<font color='red'>Mais de 1 dia</font>";
      }


    $response .='
    <div class="card-footer text-muted">

    <i class="fas fa-clipboard-list"></i> Origem: '.$data['origem'].'<br>
    <i class="fas fa-user"></i> Garçom: '. ucfirst(strtolower($data['nome'])) . " " . ucfirst(strtolower($data['sobrenome'])). '<br>
    <i class="fas fa-flag"></i> Emissão do pedido: '.date("d/m/Y", strtotime($data['cadastro'])).' às '.date("H:i:s", strtotime($data['cadastro'])).'<br>
    <i class="fas fa-flag-checkered"></i> Finalizado em: '.date("d/m/Y", strtotime($data['finalizadoem'])). ' às '.date("H:i:s", strtotime($data['finalizadoem'])).' <br>
    <i class="fas fa-stopwatch"></i> Tempo total: '.$tempo.'
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