

<?php

if(!@include_once('../../../config.php')) {
  // do something
}


$sql = "SELECT * FROM pedidos WHERE status = 'pedido em processamento'";
$result=mysqli_query($conecta,$sql);

while ($row=mysqli_fetch_assoc($result)) { ?>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="h5 mb-0 font-weight-bold text-gray-800 pb-3"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i> Pedido <?=$row['num_pedido'];?>   | Mesa <?=$row['mesa'];?></div>
          
          <?php $sql2 = "SELECT * FROM pedidos WHERE num_pedido = ".$row['num_pedido']." and status = 'item cadastrado'";

          $result2=mysqli_query($conecta,$sql2);

          while ($row2=mysqli_fetch_assoc($result2)) { ?>

           <div class="h7 mb-0 font-weight-bold text-gray-800"><?="- ".$row2['produto'];?></div>

           <?php }?>

         </div>  
       </div>
     </div>
   </div>
 </div>

 <?php } ?>
