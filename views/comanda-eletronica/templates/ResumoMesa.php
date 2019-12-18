  <div class="row" id="cardResumoMesa" style="display:none;">

  	<?php

  	$num_mesa= $_POST['num_mesa'];


  	if(!@include_once('../../../config.php')) {

  	}

  	?>



  	<!-- Datatable para versão desktop e tablet-->
  	<?php
  	$sql="

  	--  ce = comanda eletronica
  	--  ped = pedidos
  	select
  	ce.aberto,
  	ce.fechado,
  	ped.num_pedido,
  	ped.mesa,
    sum(ped.preco) total_pedido

  	from comanda_eletronica ce

  	left join pedidos ped on (ce.mesa=ped.mesa and ped.cadastro >= ce.aberto)

  	where ce.mesa=$num_mesa


  	";
  	if ($result=mysqli_query($conecta,$sql))

  		$header=mysqli_fetch_assoc($result);
  	{?>


  	<div class="col-sm-12">
  		<div class="card shadow col-xl-12 col-md-12 mb-4">
  			<div class="card-body">
  				<div class="mobile" style="margin-bottom:-30px;">
  					<div class="row">
  						<div class="col mr-2">
  							<div class="h4 mb-0 font-weight-bold text-gray-800" id="adicionar-item-mobile" style="margin-top:12px;margin-left:-12px;">Mesa <?=$num_mesa;?></div>               
  						</div>
  						<div class="col-auto">
  							<button type="button" class="btn btn-lg btn-primary btnAdicionarItem" id="adicionar-item-mobile" style="margin-right:0px;">Novo pedido</i></button>
  						</div>
  					</div> 
  					<div class='row'>
  						<div class="col mr-2 py-3" style="margin-left:-12px;">
  							<i class="far fa-clock"></i>
  							<?=date("H:i:s", strtotime($header['aberto']));?> ~ até agora</div>  
  						</div>	
  					</div>

  					<div class="desktop">
  						<div class="row">
  							<div class="col mr-2">
  								<div class="h4 mb-0 font-weight-bold text-gray-800" id="adicionar-item-desktop">Mesa <?=$num_mesa;?></div> 
  							</div>
  							<div class="col-auto">
  								<button type="button" class="btn btn-lg  btn-primary btnAdicionarItem" id="adicionar-item-desktop">Novo pedido</button>         
  							</div>
             </div>   
             <div class='row'>
              <div class="col mr-2 py-3">
               <i class="far fa-clock"></i>
               <?=date("H:i:s", strtotime($header['aberto']));?> ~ até agora</div>  
             </div> 
           </div>
           <?php
         }?>

         <?php
         if ($result=mysqli_query($conecta,$sql))
           {?>

         <!-- versão desktop/tablet -->
         <div class="table-responsive" id="table-responsive">
           <br>          
           <table class="table cell-border table-hover" id="DataTableResumoMesaDesktop" width="100%" cellspacing="0">
            <thead>
             <tr>
              <th>Pedido</th> 
              <th>Total</th>                  
              <th>Detalhes</th>                              
            </tr>
          </thead>
          <tbody>  
           <?php while ($row=mysqli_fetch_assoc($result)) { ?>
           <tr>
            <td><?=$row['num_pedido'];?></td>
            <td><?=number_format((float)$row['total_pedido'],2,".","");?></td>               
            <td align="right">                                
             <button type="button" class="btn btn-danger"><i class="fas fa-search"></i></button>
           </td>
         </tr>             
         <?php }//while?>
       </tbody>
              <!-- <tfoot>
                <tr>
                  <th colspan="2" style="text-align:right">Total:</th>
                  <th colspan="2"></th>
                </tr>
              </tfoot> -->
            </table>
          </div>
          <br>
          <div class="row">
           <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12" align="right" id="adicionar-item-desktop">
            <button class="btn btn-lg btn-primary btnVoltarParaMesas" >Voltar</button>
            <button class="btn btn-lg btn-warning" >Fechar mesa</button>
          </div>
        </div>   
      </div>
      <?php }?>



      <!-- Datatable para versão mobile-->
      <?php

      if ($result=mysqli_query($conecta,$sql))
       {?>
     <!-- versão desktop/tablet -->
     <div class="table-responsive" id="table-responsive-mobile">
       <table class="table cell-border table-hover" id="DataTableResumoMesaMobile" width="100%" cellspacing="0">
        <thead>
         <tr>
          <th>Pedido</th> 
          <th>Total</th>
          <th>Detalhes</th>
        </tr>
      </thead>
      <tbody>  
       <?php while ($row=mysqli_fetch_assoc($result)) { ?>
       <tr>
        <td><?=$row['num_pedido'];?></td>
        <td>99999</td>
        <td><i class="fas fa-search"></i></td> 
      </tr>       
      <?php }//while?>
    </tbody>
            <!--<tfoot>
              <tr>
                <th></th>             
              </tr>
            </tfoot>-->
          </table>
          <br>

          <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12" align="center" id="adicionar-item-mobile">
           <button class="btn btn-lg btn-warning btn-block" >Fechar mesa</button>
           <button class="btn btn-lg btn-primary btn-block btnVoltarParaMesas" >Voltar</button>
         </div>


         <?php }?>

       </div>