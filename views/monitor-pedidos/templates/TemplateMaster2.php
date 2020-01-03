<?php


if(!@include_once('../../../config.php')) {
  // do something
}



$sql = "SELECT * FROM pedidos WHERE status = 'concluido' ORDER BY finalizadoem DESC";
$result=mysqli_query($conecta,$sql);
$rowcount=mysqli_num_rows($result);

if  ($rowcount>0) {

  while ($row=mysqli_fetch_assoc($result)) { ?>

  <div class="col-xl-5 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-header">
        <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i> Pedido Nº <?=$row['num_pedido'];?> - Mesa <?=$row['mesa'];?></div><br>
      </div>
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">

            <?php $sql2 = "SELECT * FROM pedidos WHERE num_pedido = ".$row['num_pedido']." and status = 'item cadastrado'";

            $result2=mysqli_query($conecta,$sql2);

            while ($row2=mysqli_fetch_assoc($result2)) { ?>

            <div class="h7 mb-0 font-weight-bold text-gray-800"><?="- ".$row2['produto'];?></div>

            <?php }?>

          </div>  
        </div>
      </div>

      <?php 
      if ( date("d", strtotime($row['cadastro'])) == date("d", strtotime($row['finalizadoem'])) ){
        $entrada = date("H:i:s", strtotime($row['cadastro']));
        $saida = date("H:i:s", strtotime($row['finalizadoem']));
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
        if($hora_ponto==0){$hora_ponto="";}else{$hora_ponto = floor($resultado / 3600)."h:";}
        if($min_ponto==0){$secs_ponto = $resultado;}else{$secs_ponto="";}
      //Grava na variável resultado final
 
         if ($hora_ponto == "0h:" or $hora_ponto == "" ) { //nao mostra a hora  

        if ($min_ponto == "0m"){//nao mostra os minutos
          $tempo = $secs_ponto;
        } else {          
          $tempo = $min_ponto.$secs_ponto;
        }

        } else {
          $tempo = $hora_ponto.$min_ponto.$secs_ponto;
        }
      } else {
        $tempo = "<font color='red'>Mais de 1 dia</font>";
      }

      ?>
      <div class="card-footer text-muted">
        <?php echo '<i class="fas fa-clipboard-list"></i> Origem: ' . $row['origem']; ?><br>
        <?php echo '<i class="fas fa-user"></i> Garçom: ' . $row['usuario']; ?><br>
        <?php echo '<i class="fas fa-flag"></i> Emissão do pedido: ' . date("d/m/Y", strtotime($row['cadastro'])). " às ".date("H:i:s", strtotime($row['cadastro'])) ?> <br>
        <?php echo '<i class="fas fa-flag-checkered"></i> Finalizado em: ' . date("d/m/Y", strtotime($row['finalizadoem'])). " às ".date("H:i:s", strtotime($row['finalizadoem'])) ?> <br>
        <?php echo '<i class="fas fa-stopwatch"></i> Tempo total: '.$tempo;?>
      </div>
    </div>
  </div>
  <?php }
} else {
  ?>
  <div class="col-xl-5 col-md-6 mb-4">
    <h4><i class="far fa-smile"></i> Hum...nada por aqui.</h4>
  </div>
  <?php
}?>

