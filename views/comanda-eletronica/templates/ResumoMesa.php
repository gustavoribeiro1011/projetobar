  <div class="row" id="cardResumoMesa" style="display:none;">

  	<?php

  if(!@include_once('../../../config.php')) {

    }

    session_start();

    error_reporting(0);

    $num_mesa= $_POST['num_mesa'];

          
       
   //vou dizer que o 'cardesumomesta' esta ativo 
    $_SESSION['cardresumomesa'.$app_token] = 'ativo';
    $_SESSION['cardresumopedido'.$app_token] = 'inativo';
  	?>



  	<!-- Datatable para versão desktop e tablet-->
  	<?php


    $sqlComandaEletronica = "select * from comanda_eletronica where mesa = $num_mesa and not data_hora_fechado";
    $resultCE=mysqli_query($conecta,$sqlComandaEletronica);
    $rowCE=mysqli_fetch_assoc($resultCE);
    $CE = $rowCE['num_comanda'];
    

    $sql="
    select
    ped.num_pedido,
    ped.mesa,
    ped.status,       
    sum(ped.preco) total_pedido

    from pedidos ped
    where 
    ped.mesa = $num_mesa and 
    ped.cadastro >='".$rowCE['data_hora_aberto']."' and
    status not like '%pedido aberto%' 
    group by ped.num_pedido
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
         Comanda Nº <?=$CE;?>         
       </div> 
     </div>
       <div class='row'>
        <div class="col mr-2" style="margin-left:-12px;">
         <i class="far fa-clock"></i>
         <span id="spanDataHoraMesaAberta" style="display:none;"><?=date("Y-m-d H:i:s",strtotime($rowCE['data_hora_aberto']));?></span>
         <?=date("H:i:s", strtotime($rowCE['data_hora_aberto']));?> ~ <span class="badge badge-success">aberto</span></div>  
       </div>	
     </div>

     <div class="desktop">
      <div class="row">
       <div class="col mr-2">
        <div class="h4 mb-0 font-weight-bold text-gray-800" id="adicionar-item-desktop">Mesa <?=$num_mesa;?></div> 
      </div>
      <div class="col-auto">
        <button type="button" class="btn btn-lg  btn-primary btnAdicionarItem" id="adicionar-item-desktop" btnvoltar="voltar para tela resumo mesa">Novo pedido</button>         
      </div>
    </div>  
                  <div class='row'>
        <div class="col mr-2 py-3">
         Comanda Nº <?=$CE;?>         
       </div> 
     </div> 
    <div class="row">
      <div class="col mr-2 py-3">
       <i class="far fa-clock"></i>
       <?=date("H:i:s", strtotime($rowCE['data_hora_aberto']));?> ~ <span class="badge badge-success">aberto</span>
     </div>  
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
    <th>Status</th>
    <th>Total</th>                  
    <th>Detalhes </th>                              
  </tr>
</thead>
<tbody>  
 <?php while ($row=mysqli_fetch_assoc($result)) { 

  if ($row['status'] == 'concluido'){
    $status='<span class="badge badge-success">'.$row['status']."</span>";
  } else if ($row['status'] == 'em produção'){
    $status='<span class="badge badge-warning">'.$row['status']."</span>";
  } else{
   $status=$row['status'];
 }

 ?>
 <tr>
  <td><?=$row['num_pedido'];?></td>
  <td><h4><?=$status;?></h4></td>
  <td><?=number_format((float)$row['total_pedido'],2,".","");?></td>               
  <td align="right">  
    <button class="btn btn-warning btnDetalhesPedido" num_pedido="<?=$row['num_pedido']?>"> <i class="fas fa-search"></i></button> 
  </td>
</tr>             
<?php }//while?>
</tbody>
<tfoot>
  <tr>
    <th style="text-align:right" colspan="2">Total:</th>
    <th colspan="2"></th>  
  </tr>
</tfoot> 
</table>
</div>
<br>
<div class="row">
 <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12" align="right" id="adicionar-item-desktop">
  <button class="btn btn-lg btn-primary btnVoltarParaMesas">Voltar</button>
  <button class="btn btn-lg btn-warning btnFecharMesa">Fechar mesa</button>
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
    <th>Ped.</th> 
    <th>St.</th>
    <th>Total</th>
    <th></th>
  </tr>
</thead>
<tbody>  
 <?php while ($row=mysqli_fetch_assoc($result)) { 

   if ($row['status'] == 'concluido'){
    $status='<font color="#1CC88A">●</font>';
  } else if ($row['status'] == 'em produção'){
    $status='<font color="red">●</span>';
  } else{
   $status=$row['status'];
 }
 ?>
 <tr>
   <td><?=$row['num_pedido'];?></td>
   <td><h4><?=$status;?></h4></td>
   <td><?=number_format((float)$row['total_pedido'],2,".","");?></td> 
   <td align="right">                                
    <button class="btn btn-warning btnDetalhesPedido" num_pedido="<?=$row['num_pedido']?>"> <i class="fas fa-search"></i></button> 
  </td>
</tr>       
<?php }//while?>
</tbody>
<tfoot>
  <tr>
    <th style="text-align:right" colspan="2">Total:</th>
    <th colspan="2"></th>
  </tr>
</tfoot> 
</table>
<br>

<div class="col-md-12 col-sm-12 col-xl-12 col-lg-12 py-2" align="center" id="adicionar-item-mobile">
 <button class="btn btn-lg btn-warning btn-block btnFecharMesa">Fechar mesa</button>
 <button class="btn btn-lg btn-primary btn-block btnVoltarParaMesas" >Voltar</button>
</div>


<?php }?>

</div>