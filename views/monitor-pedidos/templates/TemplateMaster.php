

<?php


if(!@include_once('../../../config.php')) {
  // do something
}



$sql = "SELECT * FROM pedidos WHERE status = 'pedido em processamento' ORDER BY num_pedido DESC";
$result=mysqli_query($conecta,$sql);

while ($row=mysqli_fetch_assoc($result)) { ?>

<div class="col-xl-5 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
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
    <div class="card-footer text-muted">
      <?php echo "Emissão da comanda: " . date("d/m/Y", strtotime($row['cadastro'])). " às ".date("H:i:s", strtotime($row['cadastro'])) ?> <br>
      <?php echo "Garçom: " . $row['usuario']; ?>
    </div>
  </div>
</div>

<?php } ?>
