<div class="row" id="cardResumoPedido" style="display:none;">

<?php

$num_pedido= $_POST['num_pedido'];

if(!@include_once('../../../config.php')) {

}

?>


  <div class="col-sm-12"  >
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
          <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12" align="right" id="adicionar-item-desktop">
           <button class="btn btn-primary btn-voltar-categoria">Adicionar mais um item</button>
         </div>
         <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12" align="right" id="adicionar-item-mobile">
          <button class="btn btn-primary btn-voltar-categoria btn-block">Adicionar mais um item</button>
        </div>
      </div>    
    </div>



    <!-- Datatable para versão desktop e tablet-->
    <?php
    $sql="SELECT * FROM pedidos WHERE num_pedido=".$num_pedido." and id_produto>0 ORDER BY cadastro ASC";
    if ($result=mysqli_query($conecta,$sql))
      {?>
    <div class="card-body" id="table-responsive">
      <!-- versão desktop/tablet -->
      <div class="table-responsive" id="table-responsive">
        <table class="table cell-border table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Item</th> 
              <th>Categoria</th>  
              <th>Preço</th>
              <th></th>                              
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
        </div>
        <?php }?>


        <br>
        <br>

        <!-- Datatable para versão mobile-->
        <?php
        $sql2="SELECT * FROM pedidos WHERE num_pedido=".$num_pedido." and id_produto>0 ORDER BY cadastro ASC";
        if ($result2=mysqli_query($conecta,$sql2))
          {?>
        <div class="card-body">
          <!-- versão desktop/tablet -->
          <div class="table-responsive" id="table-responsive-mobile">
            <table class="table cell-border table-hover" id="dataTable_mobile" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Item</th> 
                </tr>
              </thead>
              <tfoot>
                <tbody>  
                  <?php while ($row2=mysqli_fetch_assoc($result2)) { ?>
                  <tr>
                    <td>                         
                     <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-primary shadow h-100 py-0">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="h7 mb-0 font-weight-bold text-gray-800"><?=$row2['produto'];?></div>
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$row2['categoria'];?> - R$<?= number_format($row2['preco'], 2, ',', '.');?></div>

                            </div>
                            <div class="col-auto">
                              <button type="button" class="btn btn-danger btnRemoverItem" item="<?=$row2['id']?>" num_pedido="<?=$row2['num_pedido'];?>"><i class="fas fa-minus"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>       
                <?php }//while?>
              </tbody>
            </table>
          </div>
        </div>
        <?php }?>