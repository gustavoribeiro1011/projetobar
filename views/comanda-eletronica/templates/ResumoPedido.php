<?php

     if(!@include_once('../../../config.php')) {

     }

$num_pedido= $_POST['num_pedido'];
?>

<div class="row">
   <?php echo $data_hora_atual; ?>

  <div class="col-sm-12" id="cardResumoPedido"  style="display:none;">
    <div class="card shadow">
      <div class="card-header py-3">
        <div class="progress" style="height: 2px;">
          <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>

      <div class="card-header py-3">
        <div class="row" align="left">
          <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12">
            <h6 class="m-0 font-weight-bold text-primary">Resumo do pedido</h6>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12" align="right">
           <button class="btn btn-primary btn-voltar-categoria">Adicionar mais um item</button>

         </div>
       </div>    
     </div>

     <?php


     $sql="SELECT * FROM pedidos WHERE num_pedido=".$num_pedido." and id_produto>0 ORDER BY cadastro ASC";

     if ($result=mysqli_query($conecta,$sql))
      {?>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table cell-border table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr style="display:block;">
              <th>Item</th> 
              <th>Categoria</th>  
              <th>Preço</th>
              <th></th>                              
            </tr>
            <tr>
              <th colspan="4">teste</th>           
            </tr>
          </thead>
          <tfoot>
            <tbody>  
              <?php while ($row=mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?=$row['produto'];?></td>
                <td><?=$row['categoria'];?></td>
                <td>R$<?= number_format($row['preco'], 2, ',', '.');?></td>    
                <td align="right">
                  <span id="acoes">                  
                    <button class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-minus"></i>
                    </span>
                  </td>
                </tr>             

                <?php }//while?>
              </tbody>
            </table>
          </div>
          <?php }?>
