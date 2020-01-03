

<?php


if(!@include_once('../../../config.php')) {
  // do something
}



$sql = "SELECT * FROM pedidos WHERE status = 'pedido em processamento' ORDER BY num_pedido ASC";
$result=mysqli_query($conecta,$sql);
$rowcount=mysqli_num_rows($result);

if  ($rowcount>0) {

  while ($row=mysqli_fetch_assoc($result)) { ?>

  <div class="col-xl-5 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-header">
        <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i> Pedido Nº <?=$row['num_pedido'];?> - Mesa <?=$row['mesa'];?></div><br>
        <button class="btn btn-light btnAlteraStatusParaConcluido" num_pedido="<?=$row['num_pedido'];?>"><i class="far fa-thumbs-up"></i> Marcar como concluído</button>
      </div>
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">

            <?php $sql2 = "SELECT * FROM pedidos WHERE num_pedido = ".$row['num_pedido']." and status = 'item cadastrado' ORDER BY categoria";

            $result2=mysqli_query($conecta,$sql2);      


            while ($row2=mysqli_fetch_assoc($result2)) { ?>

            <div class="h7 mb-0 font-weight-bold text-gray-800"><?="- ".$row2['produto'] . 
            " <span class='badge badge-info'>" . $row2['categoria'].'</span>';?></div>

            <?php }?>


          </div>  
        </div>
      </div>
      <div class="card-footer text-muted">

        <?php echo '<i class="fas fa-clipboard-list"></i> Origem: ' . $row['origem']; ?><br>
        <?php echo '<i class="fas fa-user"></i> Garçom: ' . $row['usuario']; ?><br>
        <?php echo '<i class="fas fa-flag"></i> Emissão do pedido:';?>
        <time class="timeago" datetime="<?=$row['cadastro'];?>"></time> 
        <?php echo '('.date("d/m/Y", strtotime($row['cadastro'])). " às ".date("H:i:s", strtotime($row['cadastro'])).')'; ?> <br>

      </div>
    </div>
  </div>

  <?php }
} else {
  ?>
  <div class="col">
    <h4><i class="far fa-smile-beam"></i> Uau! Parece que nao tem nenhum pedido em aberto.</h4>
  </div>
  <?php
}?>
