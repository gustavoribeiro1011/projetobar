  <div class="row" id="cardResumoPedido" style="display:block;">

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
             <button class="btn btn-primary btnAdicionarItem">Adicionar mais um item</button>
           </div>
           <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12" align="right" id="adicionar-item-mobile">
            <button class="btn btn-primary btnAdicionarItem">+</button>
          </div>
        </div>    
      </div>



      <!-- Datatable para versão desktop e tablet-->
      <?php
      $sql="
      select * from pedidos where num_pedido=".$num_pedido." and id_produto>0 order by cadastro asc";
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
            <tbody>  
              <?php while ($row=mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?=$row['produto'];?></td>
                <td><?=$row['categoria'];?></td>
                <td><?=number_format((float)$row['preco'],2,".","");?></td>    
                <td align="right">                                
                  <button type="button" class="btn btn-danger btnRemoverItem" item="<?=$row['id']?>" num_pedido="<?=$row['num_pedido'];?>"><i class="fas fa-minus"></i></button>
                </td>
              </tr>             
              <?php }//while?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="2" style="text-align:right">Total:</th>
                <th colspan="2"></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12" align="right" id="adicionar-item-desktop">
            <button class="btn btn-lg btn-warning btnFinalizarPedido" num_pedido="<?=$num_pedido;?>">Finalizar pedido nº<?=$num_pedido;?></button>
          </div>
        </div>   
      </div>
      <?php }?>


      <br>
      <br>

      <!-- Datatable para versão mobile-->
      <?php

      if ($result=mysqli_query($conecta,$sql))
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
                <?php while ($row=mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td>                         
                   <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-0">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="h7 mb-0 font-weight-bold text-gray-800"><?=strtoupper($row['produto']);?> <?=$row['medida'];?> <?=$row['unidade_medida'];?></div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$row['categoria'];?> - R$<?= number_format($row['preco'], 2, ',', '.');?></div>

                          </div>
                          <div class="col-auto">
                            <button type="button" class="btn btn-danger btnRemoverItem" item="<?=$row['id']?>" num_pedido="<?=$row['num_pedido'];?>"><i class="fas fa-minus"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>       
              <?php }//while?>
            </tbody>
            <tfoot>
              <tr>
                <th></th>
              </tr>
            </tfoot>
          </table>
          <br>

          <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12" align="right" id="adicionar-item-mobile">
            <button class="btn btn-lg btn-warning btnFinalizarPedido" num_pedido="<?=$num_pedido;?>">Finalizar pedido nº<?=$num_pedido;?></button>

          </div>

        </div>
        <?php }?>